<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Carbon\Carbon;
use App\Models\Products;
use App\Models\Inventory;
use App\Models\Categories;

class ProductsController extends Controller
{
	protected function module(){
        return [
            'name' => 'Sản phẩm',
            'module' => 'products',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh',
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tên sản phẩm',
                    'with' => '',
                ],

                'status' => [
                    'title' => 'Trạng thái',
                    'with' => '100px',
                ],
            ]
        ];
    }


    protected function fields()
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'categoryId' => 'required',

        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho sản phẩm.',
            'categoryId.required' => 'Bạn chưa chọn danh mục sản phẩm.',
            'price.required' => 'Bạn chưa nhập giá'
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $list_products = Products::orderBy('createdDateTime', 'DESC')->get();
            return Datatables::of($list_products)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('price', function ($data) {
                    $price = 'Giá bán: '.number_format($data->price).'đ';
                    if(!is_null($data->sale_price)){
                        $price = $price.'<br>Giá KM:'.number_format($data->sale_price).'đ (-'.$data->sale.'%)';
                    }
                    return $price;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    if ($data->showHot) {
                        $status = $status . ' <span class="label label-primary">Nổi bật</span>';
                    }
                    if($data->showHome == 1){
                        $status = $status . ' <span class="label label-primary">Hiển thị trang chủ</span>';
                    }
                    if($data->showNew == 1){
                        $status = $status . ' <span class="label label-primary">Sản phẩm mới</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('products.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a>
                        ';
                })->rawColumns(['checkbox', 'image', 'status', 'action', 'name', 'price'])
                ->addIndexColumn()
                ->make(true);
        }
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();

        $data['categories'] = Categories::where('type', 'product_category')->get();

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields        = $this->fields();
        $fields['name'] = 'required|unique:products,name,'.$request->name;
        $this->validate($request, $fields, $this->messages());

        $input = $request->all();
        $input['typeId'] = 2;
        $input['detailProduct'] = !empty($request->detailProduct) ? json_encode($request->detailProduct) : null;
        $input['status'] = $request->status == 1 ? 1 : null;
        $input['showHot'] = $request->showHot == 1 ? 1 : null;
        $input['showNew'] = $request->showNew == 1 ? 1 : null;
        $input['showHome'] = $request->showHome == 1 ? 1 : null;

        $data = Products::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $data['categories'] = Categories::where('type', 'product_category')->get();

        $data['data'] = Products::findOrFail($id);

        $data['inventory'] = Inventory::where('productId', $data['data']->idNhanh)->get();

        return view("backend.{$this->module()['module']}.create-edit", $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$fields        = $this->fields();
        $this->validate($request, $fields, $this->messages());

        if(!empty($request->sale_price)){
            if($request->price < $request->sale_price){
                return redirect()->back()->withInput()->withErrors(['Giá khuyến mại không thể cao hơn giá bán']);
            }
        }

        $input = $request->all();
        // $input['slug'] = $this->createSlug(str_slug($request->name));
        $sale = !is_null($request->sale_price) && intval($request->sale_price) >= 0 && intval($request->price) >= 0 ? (1 -intval($request->sale_price) / intval($request->price)) * 100 : 0;
        $input['sale'] = $sale;
        $input['regular_price'] = !empty($request->sale_price) ? $request->sale_price : $request->price;
        $input['detailProduct'] = !empty($request->detailProduct) ? json_encode($request->detailProduct) : null;
        $input['status'] = $request->status == 1 ? 1 : null;
        $input['showHot'] = $request->showHot == 1 ? 1 : null;
        $input['showNew'] = $request->showNew == 1 ? 1 : null;
        $input['showHome'] = $request->showHome == 1 ? 1 : null;

        Products::findOrFail($id)->update($input);

        flash('Cập nhật thành công.')->success();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        flash('Xóa thành công.')->success();

        Products::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Products::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }

    public function syncData()
    {
        $parameter = getParameter();
        $parameterArray = array(
            "version" => "2.0",
            "appId" => $parameter['appId'],
            "businessId" => $parameter['businessId'],
            "accessToken" => $parameter['accessToken'],
        );

        $curl = curl_init("https://open.nhanh.vn/api/product/search");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $parameterArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $curlResult = curl_exec($curl);

        if(! curl_error($curl)) {
            // success
            $response = json_decode($curlResult);

            $arrayCate = [];
            $products = Products::all();

            foreach ($products as $item) {
                $arrayCate[] = $item->idNhanh;
            }

            foreach ($response->data->products as $key => $item) {
                if (in_array($item->idNhanh, $arrayCate)) {
                    Products::where('idNhanh', $item->idNhanh)->update([
                        'idNhanh' => $item->idNhanh,
                        // 'privateId' => $item->privateId,
                        'parentId' => $item->parentId,
                        'typeId' => $item->typeId,
                        'typeName' => $item->typeName,
                        'code' => $item->code,
                        'name' => $item->name,
                        'slug' => str_slug($item->name),
                        'otherName' => $item->otherName,
                        'description' => isset($item->description) ? $item->description : null,
                        'content' => isset($item->content) ? $item->content : null,
                    ]);
                    if (!empty($item->inventory)) {
                        Inventory::where('productId', $item->idNhanh)->update([
                            'depotId' => null,
                            'remain' => $item->inventory->remain,
                            'shipping' => $item->inventory->shipping,
                            'damage' => $item->inventory->damaged,
                            'holding' => $item->inventory->holding,
                            'warranty' => $item->inventory->warranty,
                            'warrantyHolding' => $item->inventory->warrantyHolding,
                            'available' => $item->inventory->available,
                        ]);

                        if (!empty($item->inventory->depots)) {
                            foreach ($item->inventory->depots as $keyInventory => $value) {
                                Inventory::where('productId', $item->idNhanh)->where('depotId', $keyInventory)->update([
                                    'remain' => $value->remain,
                                    'shipping' => $value->shipping,
                                    'damage' => $value->damaged,
                                    'holding' => $value->holding,
                                    'warranty' => $value->warranty,
                                    'warrantyHolding' => $value->warrantyHolding,
                                    'available' => $value->available,
                                ]);
                            }
                        }
                    }
                } else {
                    Products::create([
                        'idNhanh' => $item->idNhanh,
                        // 'privateId' => $item->privateId,
                        'parentId' => $item->parentId,
                        'typeId' => $item->typeId,
                        'typeName' => $item->typeName,
                        'code' => $item->code,
                        'name' => $item->name,
                        'slug' => str_slug($item->name),
                        'otherName' => $item->otherName,
                        'description' => isset($item->description) ? $item->description : null,
                        'content' => isset($item->content) ? $item->content : null,
                    ]);

                    if (!empty($item->inventory)) {
                        Inventory::create([
                            'productId' => $key,
                            'depotId' => null,
                            'remain' => $item->inventory->remain,
                            'shipping' => $item->inventory->shipping,
                            'damage' => $item->inventory->damaged,
                            'holding' => $item->inventory->holding,
                            'warranty' => $item->inventory->warranty,
                            'warrantyHolding' => $item->inventory->warrantyHolding,
                            'available' => $item->inventory->available,
                        ]);

                        if (!empty($item->inventory->depots)) {
                            foreach ($item->inventory->depots as $keyInventory => $value) {
                                Inventory::create([
                                    'productId' => $key,
                                    'depotId' => $keyInventory,
                                    'remain' => $value->remain,
                                    'shipping' => $value->shipping,
                                    'damage' => $value->damaged,
                                    'holding' => $value->holding,
                                    'warranty' => $value->warranty,
                                    'warrantyHolding' => $value->warrantyHolding,
                                    'available' => $value->available,
                                ]);
                            }
                        }

                    }
                }

            }

            flash('Đồng bộ dữ liệu thành công.')->success();

            return back();

        } else {
            // failed, cannot connect nhanh.vn
            $response = new \stdClass();
            $response->code = 0;
            $response->messages = array(curl_error($curl));
        }
        curl_close($curl);

        if ($response->code == 1) {
            // send product successfully
        } else {
            // failed, show error messages
            if(isset($response->messages) && is_array($response->messages)) {
                foreach($response->messages as $message) {
                    flash($message)->error();
                }
            }
        }
    }

}
