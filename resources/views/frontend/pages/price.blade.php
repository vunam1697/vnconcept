@extends('frontend.master')
@section('main')
<main id="main" class="main-price-list">
    <section class="page__banner" @if(!empty($dataSeo->banner)) style="background-image:url('{{ $dataSeo->banner }}')" @endif>
        <div class="container">
            <h1 class="title__global">
                Bảng giá
            </h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}" title="Trang chủ">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.price') }}" title="Bảng giá">
                        Bảng giá
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <?php
        if(!empty($dataSeo->content))
        $content = json_decode($dataSeo->content);
    ?>
    <section class="price-list">
        <div class="container">
            <div class="detail">
                <h2 class="detail__title">
                    {{ @$content->title }}
                </h2>
                {!! @$content->content !!}
            </div>
        </div>
    </section>
    <section class="service">
        <div class="container">
            <h2 class="title__global">Tham khảo các dịch vụ</h2>
            <div class="service__slide">
                @foreach($category_service as $item)
                    @include('frontend.components.category-service')
                @endforeach
            </div>
        </div>
    </section>

</main>
@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__price-list.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__banner.css" />
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            pageService = () => {
                $(".service__slide").slick({
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplay: true,
                    infinite: false,
                    responsive: [{
                        breakpoint: 1188.98,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }, {
                        breakpoint: 479.98,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }, ]
                });
            };
            pageService();
        });
    </script>
@endsection
