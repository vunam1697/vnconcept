@extends('frontend.customer.master')
@section('title')
vncpncept - Xác nhận mã OTP
@endsection
@section('main')
    <div class="container__wrapper">
        <div class="flex justify-center items-center  mt-11">
            <div class="page__login max-w-[479px] w-full mx-auto grid overflow-auto mt-auto">
                <a href="index.html" class="flex justify-center items-center max-w-[241px] w-full m-auto">
                    <img src="{{ url('/uploads/images/icons/icon__logo-login.svg') }}" alt="logo" class="w-full max-w-full object-contain flex">
                </a>

                <form action="{{ route('home.send-otp') }}" method="POST" class=" pt-[17px] border-y border-[#ECECEC] h-[479px] mt-10">
                    @csrf
                    <p class="text-[#43484E] font-semibold text-sm mb-5 text-center">
                        Hãy kiểm tra email
                        <a href="mailto:{{ $email }}" class="text-[#73c6fd]">{{ $email }}</a>
                        để nhận mã và điền vào ô bên dưới
                    </p>
                    <div class="mb-[15px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1 ">
                            Nhập mã OTP
                        </label>
                        <input type="text" placeholder="Nhập mã OTP tại đây" name="code_otp" class="forgotDisabled w-full flex h-10 px-3 rounded placeholder:text-[#AFB0B2] outline-none text-sm  border border-[#AFB0B2] focus:border-[#629CFC]" />
                    </div>
                    <div class="time__otp flex items-center justify-end text-[#43484E] text-sm font-semibold">
                        <a href="ForgotPassword.page.html" class="sen__opt hidden text-[#232323] text-sm font-semibold">
                            Gửi lại OTP</a>
                        <span class="flex items-center justify-end set__time">
                            <span class="flex justify-start items-center w-6 h-6">
                                <svg width="16" height="15" viewbox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 14.126C11.8828 14.126 15.0615 10.9404 15.0615 7.06445C15.0615 3.18848 11.8828 0.00292969 8.00684 0.00292969C7.58984 0.00292969 7.35742 0.249023 7.35742 0.65918V3.18164C7.35742 3.53027 7.59668 3.79688 7.93848 3.79688C8.28711 3.79688 8.52637 3.53027 8.52637 3.18164V1.4043C11.4316 1.6709 13.667 4.09082 13.667 7.06445C13.667 10.2021 11.1514 12.7314 8 12.7314C4.84863 12.7314 2.32617 10.2021 2.32617 7.06445C2.33301 5.7041 2.81152 4.45312 3.61133 3.48242C3.86426 3.13379 3.90527 2.76465 3.61816 2.47754C3.33105 2.18359 2.86621 2.21777 2.56543 2.60742C1.55371 3.82422 0.938477 5.38281 0.938477 7.06445C0.938477 10.9404 4.11719 14.126 8 14.126ZM9.10059 8.11035C9.66113 7.52246 9.54492 6.71582 8.875 6.25781L5.38867 3.8584C4.98535 3.58496 4.58887 3.98828 4.8623 4.38477L7.26172 7.87109C7.71973 8.54102 8.51953 8.6709 9.10059 8.11035Z" fill="#43484E" />
                                </svg>

                            </span>
                            <time class="time">
                                60s
                            </time>
                        </span>
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
