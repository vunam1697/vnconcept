<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Http\Requests\InformationRequest;

class AdminController extends Controller
{
    public function getHome()
    {
        if (Auth::guard('customer')->check()){
            $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();
        }
        if (!empty($member)){

            return view('frontend.customer.home', compact('member'));

        } else {
            return redirect()->route('home.index')->with([
                'level' => 'error',
                'message' => 'Bạn chưa đăng nhập!'
            ]);
        }
    }

    // Quản lý đại lý

    public function getListAgency(Request $request)
    {
        $limit = $request->get('limit', 1);

        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();

        $agency = Member::where('type', 2)->where('id_manufacture', $member->id)->where('status', 1)->paginate($limit);

        $pagination = $agency->appends(['limit' => $limit])->render('frontend.customer.components.paginate');

        $totalRevenue = Order::totalRevenue();

        return view('frontend.customer.agency.list', compact('member', 'agency', 'pagination', 'limit', 'totalRevenue'));
    }

    // Quản lý đơn hàng

    public function getListOrder(Request $request)
    {
        $limit = $request->get('limit', 1);

        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();

        $order = Order::where('domain', url('/'))->orderBy('created_at', 'DESC')->paginate($limit);

        $pagination = $order->appends(['limit' => $limit])->render('frontend.customer.components.paginate');

        $totalRevenue = Order::totalRevenue();

        return view('frontend.customer.order.list', compact('member', 'order', 'pagination', 'limit', 'totalRevenue'));
    }

    public function getDetailOrder(Request $request, $id)
    {
        $limit = $request->get('limit', 1);

        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();

        $detailOrder = OrderDetail::where('id_order', $id)->paginate($limit);

        $pagination = $detailOrder->appends(['limit' => $limit])->render('frontend.customer.components.paginate');

        $totalRevenue = Order::totalRevenue();

        return view('frontend.customer.order.detail', compact('member', 'detailOrder', 'pagination', 'limit', 'totalRevenue'));
    }

    public function getTotalRevenue($param)
    {

    }

    // Quản lý tài khoản

    public function getInformation()
    {
        $member = Member::select()->where('id', Auth::guard('customer')->user()->id)->where('status', 1)->first();
        $day = getDay();
        $month = getMonth();
        $year = getYear();
        $city = City::all();

        return view('frontend.customer.information', compact('member', 'day', 'month', 'year', 'city'));
    }

    public function postInformation(InformationRequest $request)
    {
        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->date_of_birth = $request->date_of_birth;
        $member->month_of_birth = $request->month_of_birth;
        $member->year_of_birth = $request->year_of_birth;
        $member->id_city = $request->id_city;
        $member->id_district = $request->id_district;
        $member->id_ward = $request->id_ward;
        $member->address = $request->address;
        $member->save();

        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Thay đổi thông tin thành công!'
        ]);
    }

    public function getChangePasswoord()
    {
        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();

        return view('frontend.customer.change-password', compact('member'));
    }

    public function postChangePasswoord(Request $request)
    {
        $member = Member::select()->where('id',Auth::guard('customer')->user()->id)->where('status', 1)->first();

        $request->validate([
            'old_password' => 'required',
            'repassword' => 'required|same:newpassword|min:6',
            'newpassword' => 'required|min:6',
        ],[
            'old_password.required' => 'Bạn chưa nhập mật khẩu hiện tại',
            'newpassword.required'     => 'Bạn chưa nhập mật khẩu mới.',
            'newpassword.min'          => 'Bạn cần nhập mật khẩu mới nhiều hơn 6 ký tự.',
            'repassword.required'   => 'Bạn chưa nhập lại mật khẩu mới.',
            'repassword.same'       => 'Hai mật khẩu bạn nhập không khớp nhau.',
            'repassword.min'          => 'Bạn cần nhập mật khẩu mới nhiều hơn 6 ký tự.',
        ]);

        if (!Hash::check($request->old_password, $member->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu không chính xác']);
        }

        $member->password = Hash::make($request->newpassword);
        $member->save();

        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Thay đổi mật khẩu thành công!'
        ]);

    }

    public function getDistrict($id){

        $district = District::where('id_city', $id)->where('display_order', 1)->get();

        return view('backend.layouts.ajax.get-district', compact('district'))->render();
    }

    public function getWard($id){

        $ward = Ward::where('id_district', $id)->where('display_order', 1)->get();

        return view('backend.layouts.ajax.get-ward', compact('ward'))->render();
    }

    public function searchAll(Request $request)
    {
        dd($request->all());
    }
}
