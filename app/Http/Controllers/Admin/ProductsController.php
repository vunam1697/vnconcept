<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Carbon\Carbon;
use App\Models\Products;
use App\Models\Inventory;

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
            'name' => 'required|unique:services,name',
            'image' => 'required',
            // 'category' => 'required',

        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tên dịch vụ không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho dịch vụ.',
            // 'category.required' => 'Bạn chưa chọn danh mục dịch vụ.',
            'name.unique' => 'Tên dịch vụ đã tồn tại',
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['module'] = $this->module();
        $parameter = getParameter();
        $postArray = array(
            "version" => "2.0",
            "appId" => $parameter['appId'],
            "businessId" => $parameter['businessId'],
            "accessToken" => $parameter['accessToken'],
        );

        $curl = curl_init("https://open.nhanh.vn/api/product/search");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $curlResult = curl_exec($curl);

        if(! curl_error($curl)) {
            // success
            $response = json_decode($curlResult);

            $data['data'] = $response->data->products;

            return view("backend.{$this->module()['module']}.list", $data);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();

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
        $fields['name'] = 'required|unique:services,name,'.$request->name;
        $this->validate($request, $fields, $this->messages());

        $data = $request->all();
        $data['slug'] = $this->createSlug(str_slug($request->name));
        $data['hot'] = $request->hot == 1 ? 1 : null;
        $data['is_display_home'] = $request->is_display_home == 1 ? 1 : null;
        $data['status'] = $request->status == 1 ? 1 : null;

        $services = Service::create($data);

        if(!empty($request->category)){
            foreach ($request->category as $item) {
                ServiceCategory::create(['id_category'=> $item, 'id_service'=> $services->id]);
            }
        }

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $services);
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

        $parameter = getParameter();
        $postArray = array(
            "version" => "2.0",
            "appId" => $parameter['appId'],
            "businessId" => $parameter['businessId'],
            "accessToken" => $parameter['accessToken'],
        );

        $curl = curl_init("https://open.nhanh.vn/api/product/detail?data=" . $id);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $curlResult = curl_exec($curl);

        if(! curl_error($curl)) {
            // success
            $response = json_decode($curlResult);

            foreach ($response->data as $item) {
                $data['data'] = $item;
            }

            return view("backend.{$this->module()['module']}.create-edit", $data);

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
        $fields['name'] = 'required|unique:services,name,'.$id;
        $this->validate($request, $fields, $this->messages());

        $input = $request->all();
        $input['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;
        $input['status'] = $request->status == 1 ? 1 : null;
        $input['hot'] = $request->hot == 1 ? 1 : null;
        $input['is_display_home'] = $request->is_display_home == 1 ? 1 : null;

        $services = Service::findOrFail($id)->update($input);

        if(!empty($request->category)){
            ServiceCategory::where('id_service', $id )->delete();
            foreach ($request->category as $item) {
                ServiceCategory::create(['id_category'=> $item, 'id_service'=> $id ]);
            }
        }

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

        Service::destroy($id);
        // ServiceCategory::where('id_service', $id)->delete();

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Service::destroy($id);
                // ServiceCategory::where('id_service', $id)->delete();
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }


    public function getAjaxSlug(Request $request)
    {
        $slug = str_slug($request->slug);
        $id = $request->id;
        $post = Service::find($id);
        $post->slug = $this->createSlug($slug, $id);
        $post->save();
        return $this->createSlug($slug, $id);
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug = $slugPost;
        $index = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }


    public function checkIfExistedSlug($slug, $id = null)
    {
        if($id != null) {
            $count = Service::where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else{
            $count = Service::where('slug', $slug)->count();
            return $count > 0;
        }
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

            $products = Products::all();

            foreach ($response->data->products as $key => $item) {

                Products::create([
                    'idNhanh' => $item->idNhanh,
                    'privateId' => $item->privateId,
                    'parentId' => $item->parentId,
                    'brandId' => $item->brandId,
                    'brandName' => $item->brandName,
                    'typeId' => $item->typeId,
                    'typeName' => $item->typeName,
                    'avgCost' => $item->avgCost,
                    'importType' => $item->importType,
                    'importTypeLabel' => $item->importTypeLabel,
                    'merchantCategoryId' => $item->merchantCategoryId,
                    'merchantProductId' => $item->merchantProductId,
                    'categoryId' => $item->categoryId,
                    'code' => $item->code,
                    'barcode' => $item->barcode,
                    'name' => $item->name,
                    'otherName' => $item->otherName,
                    'importPrice' => $item->importPrice,
                    'oldPrice' => $item->oldPrice,
                    'price' => $item->price,
                    'wholesalePrice' => $item->wholesalePrice,
                    'thumbnail' => $item->thumbnail,
                    'image' => $item->image,
                    'status' => $item->status,
                    'showHot' => $item->showHot,
                    'showNew' => $item->showNew,
                    'showHome' => $item->showHome,
                    'order' => $item->order,
                    'previewLink' => $item->previewLink,
                    'shippingWeight' => $item->shippingWeight,
                    'width' => $item->width,
                    'length' => $item->length,
                    'height' => $item->height,
                    'vat' => $item->vat,
                    'createdDateTime' => $item->createdDateTime,
                    'warrantyAddress' => $item->warrantyAddress,
                    'warrantyPhone' => $item->warrantyPhone,
                    'warranty' => $item->warranty,
                    'countryName' => $item->countryName,
                    'unit' => $item->unit,
                    'advantages' => isset($item->advantages) ? $item->advantages : null,
                    'description' => isset($item->description) ? $item->description : null,
                    'content' => isset($item->content) ? $item->content : null,
                ]);

                if (!empty($item->inventory)) {
                    Inventory::create([
                        'productId' => $key,
                        'depotId' => null,
                        'remain' => $item->inventory->remain,
                        'shipping' => $item->inventory->shipping,
                        'damaged' => $item->inventory->damaged,
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
                                'damaged' => $value->damaged,
                                'holding' => $value->holding,
                                'warranty' => $value->warranty,
                                'warrantyHolding' => $value->warrantyHolding,
                                'available' => $value->available,
                            ]);
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
