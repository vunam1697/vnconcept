@extends('frontend.master')
@section('main')
    <?php
        $content = json_decode($dataSeo->content);
    ?>
    <main id="main">
        <section class="page__banner" @if(!empty($dataSeo->banner)) style="background-image:url('{{ $dataSeo->banner }}')" @endif>
            <div class="container">
                <h1 class="title__global">
                    Liên hệ
                </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}" title="Trang chủ">
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home.contact') }}" title="Liện hệ">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="page__contact">
            <div class="container">
                <h2 class="title__global">
                    Thông tin liên hệ
                </h2>
                @if (!empty($content->branch))
                    <?php
                        $branchs = [];
                        foreach ($content->branch as $key => $item) {
                            $branchs[$item->province][$key] = array('order'=>$item->order,'address'=>$item->address,'phone'=>$item->phone,'map'=>$item->map);
                        }
                    ?>
                    @foreach ($branchs as $key => $branch)
                    <div class="contact">
                        <h3 class="contact__title">
                            Chi nhánh {{ $key }}
                        </h3>
                        <div class="contact__group">
                            @foreach($branch as $item)
                            <div class="contact__item">
                                <h4>
                                    Cơ sở {{ $loop->index + 1 }}:
                                </h4>

                                <a href="{{ $item['map'] }}" target="_black" title="Địa chỉ">
                                    Địa chỉ: {{ $item['address'] }}
                                </a>
                                <a href="tel:{{ $item['phone'] }}" title="Số điện thoại">
                                    SĐT: {{ $item['phone'] }}
                                </a>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>

        @include('frontend.components.contact')

        <section class="section__map">
            <div class="frame">
                {!! @$content->google_maps !!}
            </div>
        </section>
    </main>

@stop

@section('css')
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__contact.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/page__banner.css" />
    <link rel="stylesheet" href="{{ __BASE_URL__ }}/css/pages/cm__contact.css" />
@endsection

