<section class="team py-5">
    <div class="container py-5">
        <div class="team-title">
            <h6 class="fs-6 fw-bold text-center text-primary">تیم و کارکنان</h6>
            <h1 class="text-center fw-bold mt-4">مهندسین و کارکنان ما</h1>
        </div>

        <div class="row mt-5">
            @foreach($team as $item)

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="team-item">
                        <div class="team-item-img" >
                            <img src="{{asset('back/images/team/'.$item->image)}}" alt="{{$item->alt}}">
                            <ul>
                                <li><a href="{{$item->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{$item->facebook}}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{$item->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$item->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-item-text py-3 px-3">
                            <h4 class="text-center fs-5 fw-bold">{{$item->name}}</h4>
                            <h6 class="text-muted text-center fs-6 fw-bold">{{$item->job}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
