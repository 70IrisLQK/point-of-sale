<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ($images as $image)
                        <li>
                            <img class="light" src="{{ asset('upload/admin_images/' . $image->multi_image) }}">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="frontend/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $about->short_description }}</p>
                    <a href="{{ url('about') }}" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
