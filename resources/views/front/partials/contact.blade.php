<section class="contact" style="background-image: url('{{asset('/front/images/contact.png')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mt-3 mt-lg-0">
                <div class="contact-form">
                    <div class="contact-form-title py-4">
                        <h6 class="fs-6 fw-bold text-right text-primary">یک پیام ارسال کنید </h6>
                        <h1 class="fs-5 text-right fw-bold mt-4">ارسال پیام به ما</h1>
                    </div>
                    <form action="{{route('contact.ajax')}}"  method="post" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label for="fullname">نام و نام خانوادگی شما</label>
                                    <input type="text" id="fullname" name="fullname" class="w-100 p-2 mt-2" placeholder="نام ونام خانوادگی">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label for="email">ایمیل شما</label>
                                    <input type="email" id="email" name="email" class="w-100 p-2 mt-2" placeholder="ایمیل شما">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="input-group">
                                    <label for="sobject">موضوع</label>
                                    <input type="text" id="sobject" name="subject" class="w-100 p-2 mt-2" placeholder="موضوع">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="input-group">
                                    <label for="desc">محتوای پیام شما</label>
                                    <textarea id="desc" name="description" class="w-100 p-2 mt-2" placeholder="پیام شما"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <button class="btn btn-primary w-25 text-dark py-2 border-0">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <div class="faq pe-3">
                    <h6 class="text-primary">سوالات متداول</h6>
                    <h1 class="text-dark fw-bold">{{$faq->title}}</h1>
                    <p class="mt-5 text-muted mb-3">{{$faq->description}}</p>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    {{$faq->faq_one}}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>{{$faq->faq_desc_one}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{$faq->faq_two}}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>{{$faq->faq_desc_two}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                   {{$faq->faq_three}}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>{{$faq->faq_desc_three}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@section('js')

    <script>
      $('#form').submit(function(e){
          e.preventDefault();
          let fullName = $('input[name=fullname]').val();
          let email = $('input[name=email]').val();
          let subject = $('input[name=subject]').val();
          let description = $('textarea[name=description]').val();
          let token = $('input[name=_token]').val();
          let action = $('#form').attr('action');

          $.ajax({
              url: action,
              type: 'Post',
              data: {
                  fullName : fullName,
                  email: email,
                  subject: subject,
                  description: description,
                  _token: token
              },
              success:function(data){
                  if (data == 1){
                      $.toast({
                          heading: 'با تشکر از شما',
                          text: ' پیام شما با موفقیت ارسال شد.',
                          icon: 'success',
                          position: 'bottom-right'
                      });
                      $('input[name=fullname]').val('');
                      $('input[name=email]').val('');
                      $('input[name=subject]').val('');
                      $('textarea[name=description]').val('');
                  }
              }
          })

      })
    </script>

@endsection
