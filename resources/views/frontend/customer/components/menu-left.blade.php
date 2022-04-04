<div class="admin__sidebar bg-[#F7F7F7] max-w-[256px] w-full h-screen py-5 px-4">
    <div class="amdin__sidebar--header border-b border-[ #EEEEEE] pb-5">
        <h3 class="admin__sebar--title text-[#212529] text-base font-semibold">
            {{ @$member->email }}
        </h3>
    </div>
    <div class="admin__sidebar--body pt-4">
        <ul class="control grid gap-y-4">
            <li class="control__list active">
                <div class="flex items-center">
                    <a href="{{ route('admin.orders') }}" class="control__list--link   flex items-center text=[#212529] hover:text-[#2C6CD5] transition-all text-sm font-semibold" title="">
                        <span class="control__list--icon flex items-center w-6 h-6 mr-3">
                            <svg width="14" height="18" viewbox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.82812 17.8828H11.1719C12.8828 17.8828 13.7969 16.9609 13.7969 15.2344V3.49219C13.7969 1.75781 12.8828 0.851562 11.1719 0.851562H8.82031C8.51562 0.851562 8.33594 1.02344 8.33594 1.3125C8.33594 2.05469 7.82031 2.64844 7 2.64844C6.17969 2.64844 5.65625 2.05469 5.65625 1.3125C5.65625 1.02344 5.47656 0.851562 5.17188 0.851562H2.82812C1.10938 0.851562 0.203125 1.75781 0.203125 3.49219V15.2344C0.203125 16.9609 1.11719 17.8828 2.82812 17.8828ZM3.00781 16.1406C2.28906 16.1406 1.94531 15.7656 1.94531 15.0859V3.64062C1.94531 2.95312 2.28906 2.58594 3.00781 2.58594H4.45312C4.8125 3.64062 5.75781 4.28125 7 4.28125C8.24219 4.28125 9.1875 3.64062 9.54688 2.58594H10.9922C11.7109 2.58594 12.0547 2.95312 12.0547 3.64062V15.0859C12.0547 15.7656 11.7109 16.1406 10.9922 16.1406H3.00781ZM4.21875 6.96875H9.78125C10.0703 6.96875 10.2891 6.74219 10.2891 6.45312C10.2891 6.17188 10.0703 5.95312 9.78125 5.95312H4.21875C3.92188 5.95312 3.70312 6.17188 3.70312 6.45312C3.70312 6.74219 3.92188 6.96875 4.21875 6.96875ZM4.21875 9.625H6.95312C7.24219 9.625 7.46094 9.41406 7.46094 9.13281C7.46094 8.84375 7.24219 8.61719 6.95312 8.61719H4.21875C3.92188 8.61719 3.70312 8.84375 3.70312 9.13281C3.70312 9.41406 3.92188 9.625 4.21875 9.625Z" fill="#212529" />
                            </svg>
                        </span>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <button class="control__show  w-6 h-6 ml-auto">
                        <svg class="transition-all" width="7" height="11" viewbox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.75 5.76953C6.75 5.57031 6.67383 5.40039 6.52148 5.24805L1.95117 0.777344C1.82227 0.648438 1.66406 0.583984 1.47656 0.583984C1.0957 0.583984 0.791016 0.876953 0.791016 1.25781C0.791016 1.44531 0.867188 1.61523 0.996094 1.75L5.12109 5.76953L0.996094 9.78906C0.873047 9.91797 0.791016 10.0879 0.791016 10.2754C0.791016 10.6621 1.0957 10.9551 1.47656 10.9551C1.66406 10.9551 1.82227 10.8906 1.95117 10.7617L6.52148 6.29102C6.67969 6.13867 6.75 5.96875 6.75 5.76953Z" fill="#212529" />
                        </svg>
                    </button>
                </div>
                <!-- <div class="control__children">
                    <ul class="grid gap-y-4 pl-[34px] pt-4">
                        <li>
                            <a class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm" href="#">
                                item 1
                            </a>
                        </li>
                        <li>
                            <a class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm" href="#">
                                item 2
                            </a>
                        </li>
                        <li>
                            <a class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm" href="#">
                                item 3
                            </a>
                        </li>
                    </ul>
                </div> -->
            </li>
            @if ($member->type == 1)
            <li class="control__list">
                <div class="flex items-center">
                    <a href="{{ route('admin.agency') }}" class="control__list--link  flex items-center text=[#212529] hover:text-[#2C6CD5] transition-all text-sm font-semibold" title="">
                        <span class="control__list--icon flex items-center w-6 h-6 mr-3">
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15.3511C12.1895 15.3511 15.6392 11.9014 15.6392 7.71191C15.6392 3.52979 12.1821 0.0727539 7.99268 0.0727539C3.81055 0.0727539 0.36084 3.52979 0.36084 7.71191C0.36084 11.9014 3.81055 15.3511 8 15.3511ZM8 10.2681C6.00781 10.2681 4.4624 10.9712 3.66406 11.8135C2.66064 10.7441 2.04541 9.30127 2.04541 7.71191C2.04541 4.40869 4.68945 1.75 7.99268 1.75C11.3032 1.75 13.9546 4.40869 13.9619 7.71191C13.9619 9.30859 13.3467 10.7441 12.3359 11.8135C11.5449 10.9712 9.99951 10.2681 8 10.2681ZM8 9.08887C9.4209 9.10352 10.5269 7.88037 10.5269 6.31299C10.5269 4.84082 9.41357 3.5957 8 3.5957C6.58643 3.5957 5.4585 4.84082 5.47314 6.31299C5.47314 7.88037 6.5791 9.08154 8 9.08887Z" fill="#212529" />
                            </svg>
                        </span>
                        <span>Quản lý đại lý</span>
                    </a>
                    <button class="control__show w-6 h-6 ml-auto active">
                        <svg class="transition-all" width="7" height="11" viewbox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.75 5.76953C6.75 5.57031 6.67383 5.40039 6.52148 5.24805L1.95117 0.777344C1.82227 0.648438 1.66406 0.583984 1.47656 0.583984C1.0957 0.583984 0.791016 0.876953 0.791016 1.25781C0.791016 1.44531 0.867188 1.61523 0.996094 1.75L5.12109 5.76953L0.996094 9.78906C0.873047 9.91797 0.791016 10.0879 0.791016 10.2754C0.791016 10.6621 1.0957 10.9551 1.47656 10.9551C1.66406 10.9551 1.82227 10.8906 1.95117 10.7617L6.52148 6.29102C6.67969 6.13867 6.75 5.96875 6.75 5.76953Z" fill="#212529" />
                        </svg>
                    </button>
                </div>
                <div class="control__children">
                    <ul class="grid gap-y-4 pl-[34px] pt-4">
                        <li>
                            <a class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm" href="{{ route('admin.agency') }}">
                                Danh sách
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            <li class="control__list">
                <div class="flex items-center">
                    <a href="#" class="control__list--link  flex items-center text=[#212529] hover:text-[#2C6CD5] transition-all text-sm font-semibold" title="">
                        <span class="control__list--icon flex items-center w-6 h-6 mr-3">
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15.3511C12.1895 15.3511 15.6392 11.9014 15.6392 7.71191C15.6392 3.52979 12.1821 0.0727539 7.99268 0.0727539C3.81055 0.0727539 0.36084 3.52979 0.36084 7.71191C0.36084 11.9014 3.81055 15.3511 8 15.3511ZM8 10.2681C6.00781 10.2681 4.4624 10.9712 3.66406 11.8135C2.66064 10.7441 2.04541 9.30127 2.04541 7.71191C2.04541 4.40869 4.68945 1.75 7.99268 1.75C11.3032 1.75 13.9546 4.40869 13.9619 7.71191C13.9619 9.30859 13.3467 10.7441 12.3359 11.8135C11.5449 10.9712 9.99951 10.2681 8 10.2681ZM8 9.08887C9.4209 9.10352 10.5269 7.88037 10.5269 6.31299C10.5269 4.84082 9.41357 3.5957 8 3.5957C6.58643 3.5957 5.4585 4.84082 5.47314 6.31299C5.47314 7.88037 6.5791 9.08154 8 9.08887Z" fill="#212529" />
                            </svg>
                        </span>
                        <span>Tài khoản</span>
                    </a>
                    <button class="control__show w-6 h-6 ml-auto active">
                        <svg class="transition-all" width="7" height="11" viewbox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.75 5.76953C6.75 5.57031 6.67383 5.40039 6.52148 5.24805L1.95117 0.777344C1.82227 0.648438 1.66406 0.583984 1.47656 0.583984C1.0957 0.583984 0.791016 0.876953 0.791016 1.25781C0.791016 1.44531 0.867188 1.61523 0.996094 1.75L5.12109 5.76953L0.996094 9.78906C0.873047 9.91797 0.791016 10.0879 0.791016 10.2754C0.791016 10.6621 1.0957 10.9551 1.47656 10.9551C1.66406 10.9551 1.82227 10.8906 1.95117 10.7617L6.52148 6.29102C6.67969 6.13867 6.75 5.96875 6.75 5.76953Z" fill="#212529" />
                        </svg>
                    </button>
                </div>
                <div class="control__children" style="display:block">
                    <ul class="grid gap-y-4 pl-[34px] pt-4">
                        <li class="">
                            <a href="{{ route('admin.information') }}" class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm">
                                Thông tin tài khoản
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.change-password') }}" class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm">
                                Thay đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a class="text-[#212529] hover:text-[#2C6CD5] transition-all font-semibold text-sm" href="{{ route('home.logout') }}">
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
