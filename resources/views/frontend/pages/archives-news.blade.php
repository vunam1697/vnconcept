@extends('frontend.master')
@section('main')
    <main id="main">
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
                </ul>
            </div>
        </section>
        <section class="page__new">
            <div class="container">
                <div class="new__group">
                    @foreach ($data as $item)
                        @include('frontend.components.news')
                    @endforeach
                </div>

                <ul class="addon__pagination">
                {{ $data->links('frontend.components.pagination') }}
                </ul>
            </div>
        </section>
    </main>
@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__new.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__banner.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/cm__new.css" />
@endsection
