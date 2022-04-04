@extends('frontend.customer.master')
@section('title')
vncpncept - Quên mật khẩu
@endsection
@section('main')
    <div class="container__wrapper">
        <div class="flex justify-center items-center  mt-11">
            <div class="page__login max-w-[479px] w-full mx-auto grid overflow-auto mt-auto">
                <a href="{{ url('/') }}" class="flex justify-center items-center max-w-[241px] w-full m-auto">
                    <img src="{{ url('/uploads/images/icons/icon__logo-login.svg') }}" alt="logo" class="w-full max-w-full object-contain flex">
                </a>

                <form action="{{ route('home.post-forgot-password') }}" method="POST" class=" pt-[17px] border-y border-[#ECECEC] h-[479px] mt-10">
                    @csrf
                    <p class="text-[#43484E] font-semibold text-sm mb-5 text-center">
                        Nhập địa chỉ email để khôi phục tài khoản của bạn
                    </p>
                    <div class="mb-[15px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1 ">
                            Email
                        </label>
                        <input type="email" placeholder="Nhập email của bạn" name="email" class="forgotDisabled w-full flex h-10 px-3 rounded placeholder:text-[#AFB0B2] outline-none text-sm  border border-[#AFB0B2] focus:border-[#629CFC]" />
                    </div>

                    <button type="submit" disabled="true" class="submit w-full mt-6 mb-3 bg-[#919191] rounded overflow-hidden text-white text-sm h-10 hover:opacity-90 transition-all">
                        Tiếp theo
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('body').addClass('overflow-hidden')
        });
    </script>
@endsection
