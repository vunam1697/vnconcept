<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\City;
// use App\Models\User;
// use App\Models\Order;
// use App\Models\Logs;
// use App\Models\Rechage;
// use App\Models\Withdrawal;
// use App\Models\Taikhoan_khachhang;
use Carbon\Carbon;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{    
    protected function module(){
        return [
            'name' => 'Tài khoản khách hàng',
            'module' => 'member',
            'table' =>[
                'name' => [
                    'title' => 'Họ tên', 
                    'with' => '',
                ],
                'email' => [
                    'title' => 'Email', 
                    'with' => '',
                ],
                'phone' => [
                    'title' => 'Số điện thoại', 
                    'with' => '',
                ],
                'type' => [
                    'title' => 'Loại tài khoản', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '',
                ],
            ]
        ];
    }

    protected function fields()
    {
        return [
            'email' => 'required|email',
        ];
    }


    protected function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không đúng định dạng'
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
            $list_data = Member::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_data)
                    ->addColumn('checkbox', function ($data) {
                        return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                    })->addColumn('name', function ($data) {
                        return $data->name;
                    })->addColumn('email', function ($data) {
                        return $data->email;
                    })->addColumn('phone', function ($data) {
                        return $data->phone;
                    })->addColumn('type', function ($data) {
                        if ($data->type == 1) {
                            $type = ' <span class="label label-success">Nhà phân phối</span>';
                        } else {
                            $type = ' <span class="label label-success">Đại lý</span>';
                        }
                        return $type;
                    })->addColumn('status', function ($data) {
                        if ($data->status == 1) {
                            $status = ' <span class="label label-success">Hoạt động</span>';
                        } else {
                            $status = ' <span class="label label-danger">Không hoạt động</span>';
                        }
                        return $status;
                    })->addColumn('action', function ($data) {
                        return '<a href="' . route('member.edit', ['id' => $data->id ]) . '" title="Sửa">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="btn-destroy" 
                                data-href="' . route('member.destroy', $data->id) . '"
                                data-toggle="modal" data-target="#confim">
                                <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                            ';
                    })->rawColumns(['checkbox', 'status', 'action', 'name', 'email', 'phone', 'type'])
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
        $data['city'] = City::all();
        $data['manufacture'] = Member::where('type', 1)->where('status', 1)->get();
        $data['day'] = getDay();
        $data['month'] = getMonth();
        $data['year'] = getYear();
        
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
        $this->validate($request, $this->fields(), $this->messages());

        $input = $request->all();
        $input['password'] = Hash::make('123456@!');
        $input['status'] = $request->status == 1 ? 1 : null;
        if (!empty($request->manufacture)) {
            $input['type'] = 2;
            $input['id_manufacture'] = $request->manufacture;
        } else {
            $input['type'] = 1;
        }

        $data = Member::create($input);

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
        $data['data'] = Member::findOrFail($id);
        $data['city'] = City::all();
        $data['manufacture'] = Member::where('id', '!=', $id)->where('type', 1)->where('status', 1)->get();
        $data['day'] = getDay();
        $data['month'] = getMonth();
        $data['year'] = getYear();

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
        $this->validate($request, $this->fields(), $this->messages());

        $input = $request->all();
        $input['status'] = $request->status == 1 ? 1 : null;
        if (!empty($request->manufacture)) {
            $input['type'] = 2;
            $input['id_manufacture'] = $request->manufacture;
        } else {
            $input['type'] = 1;
        }

        Member::findOrFail($id)->update($input);

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
        Member::destroy($id);
        flash('Xóa thành công.')->success();
        return back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Member::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
}