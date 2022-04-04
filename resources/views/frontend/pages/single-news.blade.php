@extends('frontend.master')
@section('main')
<main id="main" class="main-detail-new">
    <section class="page__banner" @if(!empty($dataSeo->banner)) style="background-image:url('{{ @$dataSeo->banner }}')" @endif>
        <div class="container">
            <h1 class="title__global">
                Tin tức
            </h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}" title="Trang chủ">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.news') }}" title="Tin tức">
                        Tin tức
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.news-single', ['slug' => $data->slug]) }}" title="{{ $data->name }}">
                        {{ $data->name }}
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="detail__new">
        <div class="container">

            <div class="detail">
                <h2 class="title__detail">
                    {{ $data->name }}
                </h2>
                <time class="detail__time">
                    {{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F, Y') }}
                </time>
                {!! $data->content !!}


                <div class="fb__like">
                    <div class="fb-like" data-href="{{ url()->current() }}" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                </div>
                <div class="fb__comment">
                    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="2"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-new">
        <div class="container">
            <h2 class="title__global">
                Bài viết tương tự
            </h2>
            <div class="new__group">
                @foreach($news_related as $item)
                    @include('frontend.components.news')
                @endforeach
            </div>
        </div>
    </section>
</main>
@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/detail__new.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__banner.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/cm__new.css" />
@endsection

@section('script')
<script>
    $(document).ready(function($) {
        $('.page-blog').addClass('active');
    });
</script>
@endsection
