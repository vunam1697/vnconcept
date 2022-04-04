<div class="service__item">
    <div class="service__box">
        <div class="service__view">
            <div class="frame">
                <img src="{{ $item->image }}" alt="{{ $item->name }}" />
            </div>
            <h3 class="service__title">{{ $item->name }}</h3>
        </div>
        <div class="service__hover">
            <div class="service__content">
                <h3 class="service__title">{{ $item->name }}</h3>
                <div class="service__desc">
                    <p>
                    {{ $item->desc }}
                    </p>
                </div>
                <a href="{{ route('home.service-single', ['slug' => $item->slug]) }}" class="btn btn__detail" title="Chi tiết">
                    Chi tiết
                </a>
            </div>
        </div>
    </div>
</div>
