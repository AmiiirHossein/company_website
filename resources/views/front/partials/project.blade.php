<section class="project overflow-hidden w-100 py-5">
    <div class="project-title py-5">
        <h6 class="fs-6 fw-bold text-center text-primary">نمونه کارها</h6>
        <h1 class="text-center fw-bold mt-4">پروژه ها</h1>
    </div>

    <div class="row">
      @foreach($project as $item)

            <div class="col-lg-4 col-md-6">
                <div class="project-item">
                    <img src="{{asset('back/images/project/'.$item->image)}}" class="w-100" alt="{{$item->alt}}" />
                    <div class="project-search">
                        <a href="">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="project-description">
                        <h2 class="text-white fs-5">{{$item->title}}</h2>
                        <h3 class="fs-4 text-white">{{$item->description}}</h3>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

</section>
