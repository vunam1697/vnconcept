@extends('frontend.customer.master')
@section('title')
    vncpncept - Danh sách đại lý
@endsection
@section('main')
    <main id="main">
        <div class="page__admin flex flex-wrap items-start">
            @include('frontend.customer.components.menu-left')

            <div class="admin__main max-w-[calc(100%_-_256px)] w-full bg-white  flex flex-col h-screen ">
                <header class="px-5 pt-5 pb-3 flex items-center border-b border-[#D2D2D2]">
                    <div class="relative">
                        <div class="search__header flex items-center border border-[#D2D2D2] rounded  sm:max-w-[250px] md:max-w-[300px] lg:max-w-[392px] w-full">
                            <button class="flex items-center w-6 h-6 flex-shrink-0">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.89014 10.4463C3.89014 14.0986 6.86182 17.0703 10.5142 17.0703C11.9585 17.0703 13.2783 16.6055 14.3657 15.8252L18.4497 19.9175C18.6406 20.1084 18.8896 20.1997 19.1553 20.1997C19.7197 20.1997 20.1099 19.7764 20.1099 19.2202C20.1099 18.9546 20.0103 18.7139 19.8359 18.5396L15.7769 14.4556C16.6318 13.3433 17.1382 11.957 17.1382 10.4463C17.1382 6.79395 14.1665 3.82227 10.5142 3.82227C6.86182 3.82227 3.89014 6.79395 3.89014 10.4463ZM5.30957 10.4463C5.30957 7.57422 7.64209 5.2417 10.5142 5.2417C13.3862 5.2417 15.7188 7.57422 15.7188 10.4463C15.7188 13.3184 13.3862 15.6509 10.5142 15.6509C7.64209 15.6509 5.30957 13.3184 5.30957 10.4463Z" fill="#212529" />
                                </svg>
                            </button>
                            <input type="text" placeholder="Tìm kiếm" class="px-1 h-8 max-w-full w-[320px] outline-none text-sm placeholder:text-sm">
                            <button class="option__search flex items-center w-6 h-6 flex-shrink-0">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" fill="#F7F7F7" />
                                    <path d="M14.9717 8.94385C15.835 8.94385 16.5654 8.3877 16.8477 7.62402H19.7197C20.0601 7.62402 20.3589 7.3252 20.3589 6.95166C20.3589 6.57812 20.0601 6.2876 19.7197 6.2876H16.8477C16.5737 5.51562 15.835 4.95117 14.9717 4.95117C14.1084 4.95117 13.3613 5.51562 13.0874 6.2876H4.29688C3.92334 6.2876 3.63281 6.57812 3.63281 6.95166C3.63281 7.3252 3.92334 7.62402 4.29688 7.62402H13.0957C13.3696 8.3877 14.1084 8.94385 14.9717 8.94385ZM14.9717 7.92285C14.4238 7.92285 14.0005 7.49121 14.0005 6.94336C14.0005 6.39551 14.4238 5.97217 14.9717 5.97217C15.5195 5.97217 15.9429 6.39551 15.9429 6.94336C15.9429 7.49121 15.5195 7.92285 14.9717 7.92285ZM4.26367 11.3511C3.92334 11.3511 3.63281 11.6499 3.63281 12.0234C3.63281 12.397 3.92334 12.6875 4.26367 12.6875H7.23535C7.50928 13.4678 8.24805 14.0239 9.11133 14.0239C9.97461 14.0239 10.7134 13.4678 10.9956 12.6875H19.6865C20.0601 12.6875 20.3589 12.397 20.3589 12.0234C20.3589 11.6499 20.0601 11.3511 19.6865 11.3511H10.9873C10.7134 10.5874 9.97461 10.0312 9.11133 10.0312C8.24805 10.0312 7.50928 10.5874 7.23535 11.3511H4.26367ZM9.11133 12.9946C8.57178 12.9946 8.14014 12.563 8.14014 12.0234C8.14014 11.4756 8.57178 11.0522 9.11133 11.0522C9.65918 11.0522 10.0825 11.4756 10.0825 12.0234C10.0825 12.563 9.65918 12.9946 9.11133 12.9946ZM14.9717 19.0874C15.835 19.0874 16.5737 18.5312 16.8477 17.7593H19.7197C20.0601 17.7593 20.3589 17.4688 20.3589 17.0952C20.3589 16.7217 20.0601 16.4229 19.7197 16.4229H16.8477C16.5737 15.6509 15.835 15.103 14.9717 15.103C14.1084 15.103 13.3696 15.6509 13.0957 16.4229H4.29688C3.92334 16.4229 3.63281 16.7217 3.63281 17.0952C3.63281 17.4688 3.92334 17.7593 4.29688 17.7593H13.0874C13.3696 18.5312 14.1084 19.0874 14.9717 19.0874ZM14.9717 18.0664C14.4238 18.0664 14.0005 17.6348 14.0005 17.0952C14.0005 16.5391 14.4238 16.124 14.9717 16.124C15.5195 16.124 15.9429 16.5391 15.9429 17.0952C15.9429 17.6348 15.5195 18.0664 14.9717 18.0664Z" fill="#212529" />
                                </svg>

                            </button>
                        </div>
                        <div class="search__box hidden">
                            <div class=" absolute z-[9999] grid gap-y-6 left-0 top-full  p-4 w-[488px] bg-white border border-[#D2D2D2] rounded shadow-[0px_8px_15px_rgba(0,0,0,0.15)]">
                                <div class="flex items-center">
                                    <label class="text-[#212529] text-sm flex-shrink-0 max-w-[128px] w-full">
                                        Từ
                                    </label>
                                    <input type="text" class="w-full  text-sm border-b border-[ #D2D2D2] outline-none">
                                </div>
                                <div class="flex items-center">
                                    <label class="text-[#212529] text-sm flex-shrink-0 max-w-[128px] w-full">
                                        Tới
                                    </label>
                                    <input type="text" class="w-full  text-sm border-b border-[ #D2D2D2] outline-none">
                                </div>
                                <div class="amdin__ntk flex items-center">
                                    <label class="text-[#212529] text-sm flex-shrink-0 max-w-[128px] w-full">
                                        Ngày trong khoảng
                                    </label>
                                    <div class="w-full">
                                        <select class="select-admin">
                                            <option value="">1 ngày</option>
                                            <option value="">3 ngày</option>
                                            <option value="">1 tuần</option>
                                            <option value="">2 tuần</option>
                                            <option value="">1 tháng</option>
                                            <option value="">2 tháng</option>
                                        </select>
                                    </div>

                                    <input type="date" class="w-full h-7 text-sm border-b border-[ #D2D2D2] outline-none">
                                </div>
                                <div class="text-right">
                                    <button class="text-white rounded bg-[#2C6CD5] py-1 px-2 text-sm">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__admin-control flex items-center gap-3 ml-auto">
                        <p class="text=[#212529] text-sm font-semibold">
                            Doanh số đến thời điểm
                        </p>
                        <div class="w-[100px] time__select">
                            <select class="select-admin" name="param" id="param">
                                <option value="month">Tháng</option>
                                <option value="year">
                                    Năm</option>

                            </select>
                        </div>
                        <span class="flex px-3 py-[7px] font-semibold h-8 justify-center items-center text-[#2C6CD5] rounded border border-[#2C6CD5]">
                            {{ number_format($totalRevenue, 0, '.', '.') }}
                        </span>
                        <button class="menuAdmin w-6 h-6 bg-white flex justify-center items-center rounded ml-4">
                            &equiv;
                        </button>
                    </div>

                </header>

                <div class="agency_load">
                    <div class="admin__main-body px-5 py-3">
                        <div class="overflow-auto">
                            <table class="table w-full text-sm text-left min-w-[900px]">
                                <thead>
                                    <tr>
                                        <th class="w-[52px] border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            STT
                                        </th>
                                        <th class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            Tên đại lý
                                        </th>
                                        <th class="w-[108px] border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            Số điện thoại
                                        </th>
                                        <th class="w-[103px] border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            Email
                                        </th>
                                        <th class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            Địa chỉ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $offset = ($agency->currentPage() - 1) * $agency->perPage();
                                    @endphp
                                    @foreach ($agency as $item)
                                    <tr>
                                        <td class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            {{ ++$offset }}
                                        </td>
                                        <td class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            {{ $item->name }}
                                        </td>
                                        <td class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            {{ $item->email }}
                                        </td>
                                        <td class="border-[0.5px] px-2 py-[10px] border-[#D2D2D2]">
                                            {{ $item->address }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Phân trang -->
                    <div class="text-[#212529] flex items-center justify-end gap-x-8 mt-auto px-5 py-3">
                        @includeif('frontend.customer.components.pagination', [
                            'pagination'  => $pagination,
                            'data'   => $agency->toArray(),
                        ])
                </div>
            </div>
        </div>
    </main>
@endsection
