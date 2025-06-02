@extends('layouts.app')

@section('title', 'Trang chủ Teddy Paradise')

@section('content')
    <div class="content_banner">
        <img src="{{ asset('assets/img/DALL.png') }}" alt="Banner Teddy Paradise" />
    </div>

    <div class="content_introduce">
        <div class="content_logo">
            <img src="{{ asset('assets/img/Gemini_Generated_Image_opu087opu087opu0-fotor-20241009172321.jpg') }}" alt="Logo Teddy Paradise" class="content_logo-image" />
        </div>

        <div class="content_intro-text">
            <p class="content_intro-text-paragraph">
                Teddy Paradise là điểm đến lý tưởng cho những tín đồ yêu thích gấu bông, với sứ mệnh mang đến
                cho người tiêu dùng Việt Nam những sản phẩm gấu bông chất lượng cao, đáng yêu và phong phú.
                Chúng tôi không chỉ cung cấp những món đồ chơi dễ thương, mà còn gửi gắm vào đó tình yêu, sự
                chăm sóc và niềm vui cho mỗi khách hàng.
            </p>
            <p class="content_intro-text-paragraph">
                Với phương châm “Yêu Thương – Chất Lượng”, Teddy Paradise không ngừng nỗ lực để phát triển và
                cải thiện sản phẩm cũng như dịch vụ của mình. Chúng tôi cam kết mang đến cho khách hàng những
                trải nghiệm tuyệt vời với mỗi sản phẩm gấu bông.
            </p>
            <p class="content_intro-text-paragraph">
                Chúng tôi luôn đặt khách hàng làm trung tâm. Mỗi sản phẩm từ Teddy Paradise không chỉ là một món
                quà, mà còn là biểu tượng của sự quan tâm và tình yêu, mang lại giá trị cảm xúc sâu sắc cho người
                nhận.
            </p>
        </div>
    </div>
@endsection
