@extends('layouts.app')

@section('title', 'Giới thiệu - Teddy Paradise')

@section('content')
    <div class="grid">
        <div class="intro_container">
            <div class="intro_content">
                <h2 class="intro_content-header">Về Teddy Paradise</h2>
                <div class="content_introduce">
                    <div class="content_logo">
                        <img src="{{ asset('assets/img/Gemini_Generated_Image_opu087opu087opu0-fotor-20241009172321.jpg') }}"
                            alt="" class="content_logo-image">
                    </div>
                    <div class="content_intro-text">
                        <p class="content_intro-text-paragraph">
                            Teddy Paradise, một thương hiệu chuyên về gấu bông, ra đời vào ngày 12/10/2024 với sứ mệnh mang
                            đến cho người tiêu dùng Việt Nam những chú gấu bông đáng yêu, chất lượng cao với giá cả cạnh
                            tranh.
                        </p>
                        <p class="content_intro-text-paragraph">
                            Với phương châm ‘Yêu thương - Chất lượng’, Teddy Paradise luôn nỗ lực không ngừng trong việc
                            phát triển và nâng cao chất lượng sản phẩm cũng như dịch vụ.
                        </p>
                        <p class="content_intro-text-paragraph">
                            Chúng tôi cam kết 100% sản phẩm gấu bông của chúng tôi đều an toàn, mềm mại, và bền bỉ. Teddy
                            Paradise tự hào là điểm đến tin cậy cho những ai yêu thích sự ngọt ngào và dễ thương của gấu
                            bông.
                        </p>
                    </div>
                </div>
            </div>

            <div class="intro_content">
                <h2 class="intro_content-header">Tầm nhìn - Giá trị cốt lõi</h2>
                <div class="intro_content-container">
                    <div class="intro_content-container-half">
                        <h3 style="margin-top: 0;">Tầm nhìn</h3>
                        <p>Teddy Paradise hướng tới việc trở thành thương hiệu hàng đầu trong lĩnh vực quà tặng gấu bông.
                        </p>
                        <p>Sứ mệnh của chúng tôi là mang đến cho khách hàng những chú gấu bông độc đáo, chất lượng cao và
                            tràn đầy ý nghĩa.</p>
                        <h3 style="margin-top: 35px;">Giá trị</h3>
                        <p>Mỗi sản phẩm gấu bông tại Teddy Paradise đều được làm ra với sự chăm chút tỉ mỉ trong từng chi
                            tiết.</p>
                    </div>
                    <div class="intro_content-container-half">
                        <img src="{{ asset('assets/img/DALL·E 2024-10-09 06.44.23 - A cute and playful banner for a stuffed toy (teddy bear) shop. The banner features soft pastel colors such as light pink, baby blue, and soft yellow. .webp') }}"
                            alt="" class="intro_content-container-img">
                        <img src="{{ asset('assets/img/20.10_Banner.jpg') }}" alt="" class="intro_content-container-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection