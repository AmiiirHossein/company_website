<footer class="footer pt-5">
    <div class="container-lg pt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                <div class="footer-about">
                    <h5 class="fw-bold text-white">{{$footerAbout->title}}</h5>
                    <p class="mt-5 text-white">{{$footerAbout->description}}</p>
                    <ul class="d-flex mt-3">
                        <li><a href="{{$footerAbout->instagram}}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{$footerAbout->facebook}}"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="{{$footerAbout->twitter}}"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                <div class="footer-service">
                    <h5 class="fs-5 text-white mb-5">خدمات</h5>
                    @foreach($footerService as $item)
                        <div class="footer-service-item d-flex mt-3">
                            <div class="footer-service-img">
                                <img src="{{asset('back/images/footer/'.$item->image)}}"  alt="{{$item->alt}}" />
                            </div>
                            <div class="footer-service-text pe-3">
                                <h5><a href="{{$item->link}}" class="text-white fs-6">{{$item->title}}</a></h5>
                                <div class="footer-service-author text-primary mt-4">
                                    <span><i class="fas fa-user"></i>{{$item->author}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                <div class="footer-quick-link">
                    <h5 class="fs-5 text-white mb-5">دسترسی سریع</h5>
                    <ul>
                        @foreach($footerQuick as $item)
                            <li><a href="{{$item->link}}"><i class="fas fa-chevron-left"></i>{{$item->title}} </a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
                <div class="footer-question">
                    <h5 class="fs-5 text-white mb-5">سوالی دارید؟</h5>
                    <ul>
                        <li class="d-flex mt-3"><i class="fas fa-map text-primary"></i> <h5 class="text-white fs-6 pe-2">{{$footerContact->address}}</h5></li>
                        <li class="d-flex mt-3"><i class="fas fa-phone text-primary"></i><h5 class="text-white fs-6 pe-2">
                            {{$footerContact->phone}}</h5></li>
                        <li class="d-flex mt-3"><i class="fas fa-envelope text-primary"></i><h5 class="text-white fs-6 pe-2">{{$footerContact->email}}</h5></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copy-right">
        <p>&copy; تمامی حقوق مادی و معنوی این وب سایت متعلق به Ruzmareh  میباشد.</p>
    </div>
</footer>
