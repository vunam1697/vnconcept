<div class="new__item">
    <a href="{{ route('home.news-single', ['slug' => $item->slug]) }}" class="frame" title="{{ $item->name }}">
        <img src="{{ $item->image }}" alt="{{ $item->name }}">
    </a>
    <div class="new__content">
        <h3 class="new__title">
            <a href="{{ route('home.news-single', ['slug' => $item->slug]) }}" title="{{ $item->name }}">
                {{ $item->name }}
            </a>
        </h3>
        <time class="new__time">
            {{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F, Y') }}
        </time>
        <div class="new__desc">
            <p>
            {{ $item->desc }}
            </p>
        </div>
        <a href="{{ route('home.news-single', ['slug' => $item->slug]) }}" class="btn btn__link" title="Đọc tiếp">
            Đọc tiếp
        </a>
    </div>
</div>
