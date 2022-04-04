@extends('frontend.master')
@section('main')
<main id="main">
    <section class="banner__page">
        <div class="frame">
            <img src="{{ !empty($category->banner) ? $category->banner : $dataSeo->banner }}" alt="baner__detail.jpg" />
        </div>
    </section>
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}" title="Trang chủ">Trang chủ</a></li>
                <li><a href="{{ route('home.products') }}" title="sản phẩm ">Sản phẩm</a></li>
                <li><a href="{{ route('home.product-category', ['slug' => $category->slug]) }}" title="{{ $category->name }} ">{{ $category->name }}</a></li>
            </ul>
        </div>
    </div>

    <section class="page-product page-product-2">
        <div class="container">
            <div class="module module__page-product">
                <div class="module__header">
                    <h1 class="title title__cus">
                    {{ $category->name }}
                    </h1>
                </div>
                <div class="module__content">
                    <div class="row">

                        @foreach ($data as $value)
                        <div class="col-12 col-sm-6 col-lg-3">
                            @include('frontend.components.product')
                        </div>
                        @endforeach

                    </div>

                    {{ $data->links('frontend.components.pagination') }}

                </div>

            </div>
        </div>
    </section>

</main>

@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page-product.css" />
@endsection
@section('script')
<script>
    $(document).ready(function($) {
        $('.page-product').addClass('active');

        $(".filter__option").click(function() {
            let text = $(this).text();
            $(".filter__name .text__name").text(text);
        });
    });
</script>
@endsection
