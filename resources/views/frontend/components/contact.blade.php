<section class="section-contact">
    <div class="container">
        <div class="contact__group">
            <div class="contact__item">
                <h2 class="title__global">
                    Liên hệ vận chuyển
                </h2>
                <div class="contact__desc">
                    <a href="{{ @$site_info->address_map }}" target="_black" title="Địa chỉ">
                        <b>Địa chỉ:</b>
                        {{ @$site_info->address }}
                    </a>
                    <a href="tel:{{ @$site_info->phone }}" title="số điện thoại">
                        <b>SĐT:</b>
                        {{ @$site_info->phone }}
                    </a>
                    <a href="mailto:{{ @$site_info->email }}" title="Email">
                        <b>Email:</b>
                        {{ @$site_info->email }}
                    </a>
                </div>
            </div>
            <form action="{{ route('home.post-contact') }}" method="POST" class="contact__item" id="frm_contact">
                @csrf
                <div class="form__group">
                    <input type="text" name="name" class="contact__input" placeholder="Họ tên">
                    <span class="fr-error" id="error_name"></span>
                </div>
                <div class="form__group">
                    <input type="text" name="phone" class="contact__input" placeholder="Số điện thoại">
                    <span class="fr-error" id="error_phone"></span>
                </div>
                <div class="form__group">
                    <input type="text" name="address_from" class="contact__input" placeholder="Địa chỉ vận chuyển">
                    <span class="fr-error" id="error_address_from"></span>
                </div>
                <div class="form__group">
                    <input type="text" name="address_to" class="contact__input" placeholder="Địa chỉ giao">
                    <span class="fr-error" id="error_address_to"></span>
                </div>
                <div class="form__group">
                    <input type="text" name="time" class="contact__input" placeholder="Thời gian">
                    <span class="fr-error" id="error_time"></span>
                </div>
                <button type="submit" class="btn btn__registration btn_contact">
                    Đăng ký
                    <img src="{{ url('/uploads/images/icons/icon__res.png') }}" alt="icon__res.png">
                </button>
            </form>
        </div>
    </div>
</section>
