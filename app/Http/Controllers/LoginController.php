<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordRequest;
use Socialite;
use App\Models\Member;
use App\Models\ResetPass;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.customer.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = array('email' => $request->email, 'password' => $request->password);

        if(Auth::guard('customer')->attempt($credentials))
        {
            if ($request->remember == 1) {
                setcookie('status', 1, time()+31556926);
                setcookie('email', $request->email, time()+31556926);
                setcookie('password', $request->password, time()+31556926);
            } else {
                setcookie('status', 0, time()+31556926);
            }
            return redirect()->route('admin.index')->with([
                'level' => 'success',
                'message' => 'Đăng nhập thành công'
            ]);
        } else {
            return redirect()->back()->with([
                'level' => 'error',
                'message' => 'Đăng nhập thất bại'
            ]);
        }
    }

    // Đăng nhập facebook, google
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->updateUser($getInfo,$provider);
        auth()->login($user);

        return redirect()->route('home.index')->with([
            'level' => 'success',
            'message' => 'Đăng nhập thành công'
        ]);
    }

    function updateUser($getInfo,$provider)
    {
        $user = Member::where('email', $getInfo->email)->first();
        if ($user) {
            if ($provider == 'facebook') {
                $user->facebook_id = $getInfo->id;
            } else {
                $user->google_id = $getInfo->id;
            }
            $user->save();
        }
        return $user;
    }

    // Quên mật khẩu
    public function forgotPassword()
    {
        return view('frontend.customer.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $email = $request->email;
        $data = Member::where('email', $request->email)->first();

        if($data) {
            $resetPassword = ResetPass::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);

            $member = Member::where('email', $request->email)->first();
            $member->code_otp = generateRandomCodeOTP();
            $member->save();

            $content_email = [
                'code_otp' => $member->code_otp,
            ];

            Mail::send('frontend.mail.mail-resetpassword', $content_email , function ($msg) use ($request) {

                $msg->from('vunamc1601@gmail.com', 'Vnconcept');

                $msg->to($request->email)->subject('Vnconcept');

            });

            return view('frontend.customer.send-otp', compact('email'));
        }

    }

    public function sendOtp(Request $request)
    {
        $member = Member::where('code_otp', $request->code_otp)->first();

        if ($member) {
            $token = ResetPass::where('email', $member->email)->first();

            return redirect()->route('home.resetPassword', $token->token);
        } else {
            return redirect()->back()->with([
                'level' => 'error',
                'message' => 'Mã OTP sai'
            ]);
        }
    }

    public function resetPassword($token)
    {
        $result = ResetPass::where('token', $token)->first();

        if($result){
            return view('frontend.customer.new-password', compact('result'));
        } else {
            echo 'This link is expired';
        }
    }

    public function newPassword(NewPasswordRequest $request)
    {
        $result = ResetPass::where('token', $request->token)->first();

        Member::where('email', $result->email)->update(['password'=>Hash::make($request->password)]);

        ResetPass::where('token', $request->token)->delete();

        return redirect()->route('home.index')->with([
            'level' => 'success',
            'message' => 'Thay đổi mật khẩu thành công'
        ]);

    }

    public function postLogout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('home.index');
    }
}
