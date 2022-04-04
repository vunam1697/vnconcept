@extends('frontend.customer.master')
@section('title')
vncpncept - Thay đổi mật khẩu
@endsection
@section('main')
    <div class="container__wrapper">
        <div class="flex justify-center items-center  mt-11">
            <div class="page__login max-w-[479px] w-full mx-auto grid overflow-auto mt-auto">
                <a href="{{ url('/') }}" class="flex justify-center items-center max-w-[241px] w-full m-auto">
                    <img src="{{ url('/uploads/images/icons/icon__logo-login.svg') }}" alt="logo" class="w-full max-w-full object-contain flex">
                </a>

                <form action="{{ route('home.new-password') }}" method="POST" class=" pt-[17px] border-y border-[#ECECEC] h-[479px] mt-10">
                    @csrf
                    <input type="text" name="token" value="{{ $result->token }}" hidden="">
                    <div class="mb-[13px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1">
                            Tạo mật khẩu mới
                        </label>
                        <div class="w-full flex h-10 px-3 rounded border border-[#AFB0B2] hover:border-[#629CFC]">
                            <input type="password" name="password" placeholder="Nhập mật khẩu mới của bạn" class="forgotDisabled input__password w-full rounded placeholder:text-[#AFB0B2] outline-none text-sm" />
                            <span class="w-6 h-10 flex items-center view__password justify-end cursor-pointer">
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
                    <div class="mb-[13px]">
                        <label class="text-[#212529] font-semibold text-sm flex w-full mb-1">
                            Nhập lại mật khẩu mới
                        </label>
                        <div class="w-full flex h-10 px-3 rounded border border-[#AFB0B2] hover:border-[#629CFC]">
                            <input type="password" name="repassword" placeholder="Vui lòng xác nhận lại mật khẩu" class="input__password w-full rounded placeholder:text-[#AFB0B2] outline-none text-sm" />
                            <span class="w-6 h-10 flex items-center view__password justify-end cursor-pointer">
                                <svg width="16" height="12" viewbox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3291 11.0259C12.5063 11.2031 12.791 11.2085 12.9683 11.0259C13.1509 10.8379 13.1455 10.564 12.9683 10.3867L3.66553 1.09473C3.49365 0.91748 3.19824 0.91748 3.021 1.09473C2.84912 1.2666 2.84912 1.56201 3.021 1.73389L12.3291 11.0259ZM8 1.40625C7.06006 1.40625 6.20605 1.56201 5.4165 1.81982L6.54443 2.94775C7.00635 2.82959 7.48438 2.75977 8 2.75977C11.2495 2.75977 13.7417 5.52588 13.7417 6.13281C13.7417 6.5249 13.0005 7.4917 11.7974 8.28125L12.8394 9.32861C14.499 8.20068 15.4497 6.75586 15.4497 6.13281C15.4497 5.02637 12.5171 1.40625 8 1.40625ZM8 10.8594C8.97754 10.8594 9.87451 10.6982 10.6855 10.4243L9.56299 9.29639C9.06885 9.42529 8.55322 9.50586 8 9.50586C4.75049 9.50586 2.2583 6.86328 2.2583 6.13281C2.2583 5.79443 3.03711 4.7793 4.30469 3.96289L3.24658 2.90479C1.54395 4.03271 0.550293 5.49902 0.550293 6.13281C0.550293 7.23389 3.55273 10.8594 8 10.8594ZM10.5459 6.92236C10.6479 6.67529 10.6963 6.40674 10.6963 6.12744C10.6963 4.63428 9.49854 3.44189 8.00537 3.44189C7.7207 3.44189 7.45752 3.49023 7.21045 3.58154L10.5459 6.92236ZM8 8.82373C8.31689 8.82373 8.6123 8.75928 8.88623 8.64111L5.48096 5.24121C5.36816 5.50977 5.30371 5.81055 5.30371 6.13281C5.30371 7.59912 6.50146 8.82373 8 8.82373Z" fill="#AFB0B2" />
                                </svg>
                                <svg class="hidden" width="16" height="10" viewbox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99463 9.87549C12.5278 9.87549 15.4551 6.23389 15.4551 5.13281C15.4551 4.03174 12.5225 0.395508 7.99463 0.395508C3.53662 0.395508 0.539551 4.03174 0.539551 5.13281C0.539551 6.23389 3.53125 9.87549 7.99463 9.87549ZM7.99463 8.46826C4.77197 8.46826 2.32812 5.86328 2.32812 5.13281C2.32812 4.52588 4.77197 1.79736 7.99463 1.79736C11.2119 1.79736 13.6611 4.52588 13.6611 5.13281C13.6611 5.86328 11.2119 8.46826 7.99463 8.46826ZM8 7.78613C9.47705 7.78613 10.6587 6.57764 10.6587 5.13281C10.6587 3.65576 9.47705 2.47949 8 2.47949C6.51758 2.47949 5.33057 3.65039 5.33594 5.13281C5.34131 6.57764 6.51758 7.78613 8 7.78613ZM7.99463 5.93848C7.54883 5.93848 7.18896 5.56787 7.18896 5.13281C7.18896 4.69238 7.54883 4.32715 7.99463 4.32715C8.44043 4.32715 8.80029 4.69238 8.80029 5.13281C8.80029 5.56787 8.44043 5.93848 7.99463 5.93848Z" fill="#AFB0B2" />
                                </svg>
                            </span>
                        </div>
                        @if ($errors->has('repassword'))
                            <span class="fr-error">{{ $errors->first('repassword') }}</span>
                        @endif
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
