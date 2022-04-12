<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Products;
use App\Models\Rooms;
use App\Models\Categories;

class RoomsController extends Controller
{
	protected function module(){
        return [
            'name' => 'Rooms',
            'module' => 'rooms',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh',
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tiêu đề',
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
            'categoryId' => 'required',

        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho rooms.',
            'categoryId.required' => 'Bạn chưa chọn danh mục rooms.',
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
            $list_data = Rooms::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_data)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('price', function ($data) {
                    $price = 'Giá bán: '.number_format($data->price).'đ';

                    return $price;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('rooms.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy"
                            data-href="' . route('rooms.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
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

        $data['categories'] = Categories::where('type', 'rooms')->get();

        $data['products'] = Products::where('status', 1)->get();

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
        $this->validate($request, $fields, $this->messages());

        $input = $request->all();
        $input['status'] = $request->status == 1 ? 1 : null;

        if(!empty($request->productId)){
            $input['list_product'] = json_encode($request->productId);
        }

        $product = Products::whereIn('id', $request->productId)->get();

        $price = 0;

        foreach ($product as $item) {
            $price += $item->price;
        }

        $input['price'] = $price;

        $data = Rooms::create($input);


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
        $data['categories'] = Categories::where('type', 'rooms')->get();

        $data['products'] = Products::where('status', 1)->get();

        $data['data'] = Rooms::findOrFail($id);

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

        $input = $request->all();
        $input['status'] = $request->status == 1 ? 1 : null;

        if(!empty($request->productId)){
            $input['list_product'] = json_encode($request->productId);
        }

        $product = Products::whereIn('id', $request->productId)->get();

        $price = 0;

        foreach ($product as $item) {
            $price += $item->price;
        }

        $input['price'] = $price;

        Rooms::findOrFail($id)->update($input);

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

        Rooms::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Rooms::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }

}
