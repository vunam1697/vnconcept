<form action="">
    <input type="hidden" name="id_product" value="{{ $value->id }}">
    <input type="hidden" name="qty" value="1">
    <div class="product__global">
        <div class="product__avatar">
            @if ($value->is_sale == 1 && !empty($value->sale_price))
            <span class="sale__number">
                {{ $value->sale }}%
            </span>
            @endif
            <div class="product__control">
                <a data-url="{{ route('home.get-add-cart') }}" class="get_add_cart">
                    <button type="button" class="btn btn__shopping"></button>
                </a>
                <button type="button" class="btn btn__show" data-toggle="modal" data-target="#productView_{{ $value->id }}"></button>
            </div>

            <a href="{{ route('home.product-single', ['slug' => $value->slug]) }}" class="frame" title="{{ $value->name }}">
                <img src="{{ $value->image }}" alt="{{ $value->name }}" />
            </a>
        </div>
        <div class="product__content">
            <h3 class="product__title">
                <a href="{{ route('home.product-single', ['slug' => $value->slug]) }}">
                    {{ $value->name }}
                </a>
            </h3>
            <div class="product__price">
            @if (!empty($value->sale_price) && $value->is_sale == 1)
            <span class="price">
                {{ number_format($value->sale_price, '0','.','.') }}đ
            </span>
            <span class="sale">
                {{ number_format($value->price, '0','.','.') }}đ
            </span>
            <input type="hidden" name="price" value="{{ @$value->sale_price }}">
            @else
            <span class="price">
                {{ number_format($value->price, '0','.','.') }}đ
            </span>
            <input type="hidden" name="price" value="{{ @$value->price }}">
            @endif
            </div>
        </div>
    </div>
</form>

