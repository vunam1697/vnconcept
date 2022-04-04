@extends('frontend.customer.master')
@section('title')
vncpncept - Đăng nhập
@endsection
@section('main')
    <div class="container__wrapper">
        <div class="flex justify-center items-center h-screen">
            <div class="page__login sm:max-w-[479px] w-full mx-auto grid overflow-auto h-full py-6">
                <a href="{{ url('/') }}" class="flex justify-center items-center max-w-[241px] w-full m-auto">
                    <img src="{{ url('/uploads/images/icons/icon__logo-login.svg') }}" alt="logo" class="w-full max-w-full object-contain flex">
                </a>
                <form action="{{ route('home.post-login') }}" method="POST" class="mt-10 pt-14 border-y pb-6 border-[#ECECEC]">
                    @csrf
                    {{-- <p class="error mb-3 gap-1 flex px-2 py-1 items-center text-[#212529] text-sm bg-[#F9D9D8]  overflow-hidden rounded">
                        <span class="w-6 h-6 flex justify-center items-center">
                            <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76575 0.982572C10.0087 1.08325 10.2295 1.23081 10.4154 1.41682L16.5834 7.58382C16.7695 7.76976 16.9172 7.99057 17.018 8.23362C17.1188 8.47668 17.1706 8.73721 17.1706 9.00032C17.1706 9.26344 17.1188 9.52397 17.018 9.76702C16.9172 10.0101 16.7695 10.2309 16.5834 10.4168L10.4154 16.5838C10.2295 16.7698 10.0087 16.9174 9.76575 17.0181C9.52278 17.1187 9.26237 17.1706 8.99937 17.1706C8.73638 17.1706 8.47596 17.1187 8.23299 17.0181C7.99003 16.9174 7.76929 16.7698 7.58337 16.5838L1.41537 10.4168C1.22921 10.2309 1.08152 10.0101 0.980754 9.76702C0.87999 9.52397 0.828125 9.26344 0.828125 9.00032C0.828125 8.73721 0.87999 8.47668 0.980754 8.23362C1.08152 7.99057 1.22921 7.76976 1.41537 7.58382L7.58337 1.41682C7.76929 1.23081 7.99003 1.08325 8.23299 0.982572C8.47596 0.881896 8.73638 0.830078 8.99937 0.830078C9.26237 0.830078 9.52278 0.881896 9.76575 0.982572ZM8.29226 10.7069C8.4798 10.8945 8.73415 10.9998 8.99937 10.9998C9.26458 10.9998 9.51894 10.8945 9.70647 10.7069C9.89401 10.5194 9.99937 10.265 9.99937 9.99982V4.99982C9.99937 4.7346 9.89401 4.48025 9.70647 4.29271C9.51894 4.10517 9.26458 3.99982 8.99937 3.99982C8.73415 3.99982 8.4798 4.10517 8.29226 4.29271C8.10472 4.48025 7.99937 4.7346 7.99937 4.99982V9.99982C7.99937 10.265 8.10472 10.5194 8.29226 10.7069ZM8.29226 13.7069C8.4798 13.8945 8.73415 13.9998 8.99937 13.9998C9.26458 13.9998 9.51894 13.8945 9.70647 13.7069C9.89401 13.5194 9.99937 13.265 9.99937 12.9998C9.99937 12.7346 9.89401 12.4802 9.70647 12.2927C9.51894 12.1052 9.26458 11.9998 8.99937 11.9998C8.73415 11.9998 8.4798 12.1052 8.29226 12.2927C8.10472 12.4802 7.99937 12.7346 7.99937 12.9998C7.99937 13.265 8.10472 13.5194 8.29226 13.7069Z" fill="#E0433A" />
                            </svg>

                        </span>
                        <span>
                            Sai thông tin đăng nhập
                        </span>
                    </p> --}}
                    <div class="mb-[15px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1">
                            Tài khoản
                        </label>
                        <input type="text" placeholder="Nhập tài khoản của bạn" name="email" value="{{ old('email') }}" class="w-full flex h-10 px-3 rounded placeholder:text-[#AFB0B2] outline-none text-sm  border border-[#AFB0B2] focus:border-[#629CFC]">
                        @if ($errors->has('email'))
                            <span class="fr-error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-[13px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1">
                            Mật khẩu
                        </label>
                        <div class="w-full flex h-10 px-3 rounded border border-[#AFB0B2] hover:border-[#629CFC]">
                            <input type="password" name="password" placeholder="Nhập tài khoản của bạn" class="input__password w-full rounded placeholder:text-[#AFB0B2] outline-none text-sm" />
                            <span class="flex-shrink-0 w-6 h-10 flex items-center view__password justify-end cursor-pointer">
                                <svg width="16" height="12" viewbox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3291 11.0259C12.5063 11.2031 12.791 11.2085 12.9683 11.0259C13.1509 10.8379 13.1455 10.564 12.9683 10.3867L3.66553 1.09473C3.49365 0.91748 3.19824 0.91748 3.021 1.09473C2.84912 1.2666 2.84912 1.56201 3.021 1.73389L12.3291 11.0259ZM8 1.40625C7.06006 1.40625 6.20605 1.56201 5.4165 1.81982L6.54443 2.94775C7.00635 2.82959 7.48438 2.75977 8 2.75977C11.2495 2.75977 13.7417 5.52588 13.7417 6.13281C13.7417 6.5249 13.0005 7.4917 11.7974 8.28125L12.8394 9.32861C14.499 8.20068 15.4497 6.75586 15.4497 6.13281C15.4497 5.02637 12.5171 1.40625 8 1.40625ZM8 10.8594C8.97754 10.8594 9.87451 10.6982 10.6855 10.4243L9.56299 9.29639C9.06885 9.42529 8.55322 9.50586 8 9.50586C4.75049 9.50586 2.2583 6.86328 2.2583 6.13281C2.2583 5.79443 3.03711 4.7793 4.30469 3.96289L3.24658 2.90479C1.54395 4.03271 0.550293 5.49902 0.550293 6.13281C0.550293 7.23389 3.55273 10.8594 8 10.8594ZM10.5459 6.92236C10.6479 6.67529 10.6963 6.40674 10.6963 6.12744C10.6963 4.63428 9.49854 3.44189 8.00537 3.44189C7.7207 3.44189 7.45752 3.49023 7.21045 3.58154L10.5459 6.92236ZM8 8.82373C8.31689 8.82373 8.6123 8.75928 8.88623 8.64111L5.48096 5.24121C5.36816 5.50977 5.30371 5.81055 5.30371 6.13281C5.30371 7.59912 6.50146 8.82373 8 8.82373Z" fill="#AFB0B2" />
                                </svg>
                                <svg class="hidden" width="16" height="10" viewbox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99463 9.87549C12.5278 9.87549 15.4551 6.23389 15.4551 5.13281C15.4551 4.03174 12.5225 0.395508 7.99463 0.395508C3.53662 0.395508 0.539551 4.03174 0.539551 5.13281C0.539551 6.23389 3.53125 9.87549 7.99463 9.87549ZM7.99463 8.46826C4.77197 8.46826 2.32812 5.86328 2.32812 5.13281C2.32812 4.52588 4.77197 1.79736 7.99463 1.79736C11.2119 1.79736 13.6611 4.52588 13.6611 5.13281C13.6611 5.86328 11.2119 8.46826 7.99463 8.46826ZM8 7.78613C9.47705 7.78613 10.6587 6.57764 10.6587 5.13281C10.6587 3.65576 9.47705 2.47949 8 2.47949C6.51758 2.47949 5.33057 3.65039 5.33594 5.13281C5.34131 6.57764 6.51758 7.78613 8 7.78613ZM7.99463 5.93848C7.54883 5.93848 7.18896 5.56787 7.18896 5.13281C7.18896 4.69238 7.54883 4.32715 7.99463 4.32715C8.44043 4.32715 8.80029 4.69238 8.80029 5.13281C8.80029 5.56787 8.44043 5.93848 7.99463 5.93848Z" fill="#AFB0B2" />
                                </svg>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="fr-error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <p class="text-right">
                        <a href="{{ route('home.forgot-password') }}" title="Quên mật khẩu?" class="text-[#232323] text-sm font-semibold transition-all hover:opacity-80">
                            Quên mật khẩu?
                        </a>
                    </p>
                    <button type="submit" class="w-full mt-6 mb-3 bg-[#232323] rounded overflow-hidden text-white text-sm h-10 hover:opacity-90 transition-all">
                        Đăng nhập
                    </button>
                    <label id="save__password" class="flex save__password  cursor-pointer text-[#43484E] text-xs justify-center items-center">
                        <input type="checkbox" id="Đăng nhập" class="border border-[#BFBFBF]">
                        <span>
                            Lưu mật khẩu và giữ luôn đăng nhập
                        </span>
                    </label>


                    <div class="capcha flex justify-center items-center mt-[26px]">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="fr-error">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>

                </form>

                <div class="mt-8 max-w-[372px] w-full mx-auto">
                    <a href="https://accounts.google.com/signin/v2/identifier?hl=vi&continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dgoogle%2Bdich%26oq%3Dgoogle%26aqs%3Dchrome.0.69i59j69i57j69i65l2.2437j0j7%26sourceid%3Dchrome%26ie%3DUTF-8&ec=GAlAAQ&flowName=GlifWebSignIn&flowEntry=AddSession" class="flex items-center justify-start gap-10">
                        <span class="w-10 h-10 flex">
                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M39.1997 20.4541C39.1997 19.036 39.0725 17.6724 38.8361 16.3633H20V24.0995H30.7635C30.2999 26.5995 28.8908 28.7177 26.7726 30.1358V35.1539H33.2362C37.0179 31.6722 39.1997 26.545 39.1997 20.4541Z" fill="#4285F4" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0014 40.0006C25.4013 40.0006 29.9285 38.2097 33.2376 35.1552L26.774 30.1371C24.9831 31.337 22.6923 32.0461 20.0014 32.0461C14.7924 32.0461 10.3833 28.528 8.81063 23.8008H2.12891V28.9825C5.41977 35.5188 12.1833 40.0006 20.0014 40.0006Z" fill="#34A853" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.80897 23.7992C8.40897 22.5992 8.1817 21.3174 8.1817 19.9993C8.1817 18.6811 8.40897 17.3993 8.80897 16.1993V11.0176H2.12724C0.772716 13.7175 0 16.772 0 19.9993C0 23.2265 0.772716 26.281 2.12724 28.981L8.80897 23.7992Z" fill="#FBBC05" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0014 7.95443C22.9377 7.95443 25.574 8.96351 27.6467 10.9453L33.383 5.20902C29.9194 1.98179 25.3922 0 20.0014 0C12.1833 0 5.41977 4.48176 2.12891 11.018L8.81063 16.1998C10.3833 11.4726 14.7924 7.95443 20.0014 7.95443Z" fill="#EA4335" />
                            </svg>
                        </span>
                        <span class="text-black sm:text-lg md:text-2xl font-semibold">
                            Sign in with Google
                        </span>
                    </a>

                    <a href="{{ url('/auth/redirect/facebook') }}" class="flex justify-start items-center gap-10 mt-6">
                        <span class="w-10 h-10 flex">
                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="#3B5998" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.315 12.9578C24.6917 12.8331 23.8498 12.74 23.3204 12.74C21.8867 12.74 21.7936 13.3633 21.7936 14.3607V16.1361H25.3774L25.065 19.8137H21.7936V31H17.3063V19.8137H15V16.1361H17.3063V13.8613C17.3063 10.7453 18.7708 9 22.4477 9C23.7252 9 24.6602 9.187 25.8753 9.43633L25.315 12.9578Z" fill="white" />
                            </svg>

                        </span>
                        <span class="text-black sm:text-lg md:text-2xl font-semibold">
                            Sign in with Facebook
                        </span>
                    </a>
                </div>
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
