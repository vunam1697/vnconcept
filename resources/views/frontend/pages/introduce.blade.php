@extends('frontend.master')
@section('main')
<?php
    if(!empty($dataSeo->content))
    $content = json_decode($dataSeo->content);
?>
<main id="main" class="main-introduce">
    <section class="page__banner" @if(!empty($dataSeo->banner)) style="background-image:url('{{ $dataSeo->banner }}')" @endif>
        <div class="container">
            <h1 class="title__global">
                Giới thiệu
            </h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}" title="Trang chủ">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.introduce') }}" title="Giới thiệu">
                        Giới thiệu
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="page__introduce">
        <div class="container">
            <div class="introduce__group">
                <div class="introduce__item">
                    <div class="introduce__content">
                        <h2 class="title__global">
                            Giới thiệu về
                            <br>
                            Kiến Vàng
                        </h2>
                        <div class="introduce__desc">
                            {!! @$content->about_us->content !!}
                        </div>
                        <a href="{{ route('home.services') }}" class="btn btn__introduce" title="Xem tất cả dịch vụ">
                            Xem tất cả dịch vụ
                        </a>
                    </div>
                </div>
                <div class="introduce__item">
                    <div class="group">
                    @if (!empty($contentHome->whychoose))
                        @foreach ($contentHome->whychoose as $item)
                        <div class="item">
                            <div class="introduce__icon">
                                <img src="{{ $item->image }}" alt="{{ $item->title }}">
                            </div>
                            <h3 class="introduce__title">
                                {{ $item->title }}
                            </h3>
                            <div class="introduce__desc">
                                <p>{{ $item->desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="statistical">
        <div class="container">
            <div class="statistical__group">
                <div class="statistical__item">
                    <div class="statistical__total">{{ @$contentHome->statistical->customer }}</div>
                    <h3 class="statistical__name">Khách hàng</h3>
                </div>
                <div class="statistical__item">
                    <div class="statistical__total">{{ @$contentHome->statistical->staff }}</div>
                    <h3 class="statistical__name">Nhân viên</h3>
                </div>
                <div class="statistical__item">
                    <div class="statistical__total">
                        {{ @$contentHome->statistical->years_experience }}
                        <span>Năm</span>
                    </div>
                    <h3 class="statistical__name">Kinh nghiệm</h3>
                </div>
                <div class="statistical__item">
                    <div class="statistical__total">{{ @$contentHome->statistical->branch }}</div>
                    <h3 class="statistical__name">Chi nhánh</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="page__vision" style="background-image:url('{{ @$content->vision_mission->banner }}')">
        <div class="container">
            <h2 class="title__global">
                Tầm nhìn - Sứ mệnh
            </h2>
            <div class="vision__desc">
                {!! @$content->vision_mission->content !!}
            </div>
        </div>
    </section>
</main>
@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page-introduce.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__introduce.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__banner.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/cm__staistical.css" />
@endsection

