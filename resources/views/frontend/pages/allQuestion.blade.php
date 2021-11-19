@extends('frontend.layouts.master')
@section('content')

<section class="content blog-page">

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Your Question Ask
                    <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> HS</a></li>
                    <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                    <li class="breadcrumb-item active">Blog Question</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="comment-form">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Popular</strong> Questions</h2>
                                </div>
                                {{-- content show here --}}
                                <div id="more_questions">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 right-box">
                <div class="card">
                    <div class="body search">
                        <div class="input-group m-b-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2><strong>Popular</strong> Posts</h2>
                    </div>
                    <div class="body widget popular-post">
                        <ul class="list-unstyled m-b-0">
                            <li class="row">
                                <div class="icon-box col-4">
                                    <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/assets/images/blog/1.jpg ') }}" alt="Awesome Image">
                                </div>
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">Web Design</a></h5>
                                    <small class="author-name">By: <a href="#">Michael Allenson</a></small>
                                    <small class="date">Dec, 05 2017</small>
                                </div>
                            </li>
                            <li class="row">
                                <div class="icon-box col-4">
                                    <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/assets/images/blog/2.jpg ') }}" alt="Awesome Image">
                                </div>
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">UI UX Design</a></h5>
                                    <small class="author-name">By: <a href="#">Michael Allenson</a></small>
                                    <small class="date">Dec, 15 2017</small>
                                </div>
                            </li>
                            <li class="row">
                                <div class="icon-box col-4">
                                    <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/assets/images/blog/3.jpg ') }}" alt="Awesome Image">
                                </div>
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">Photography</a></h5>
                                    <small class="author-name">By: <a href="#">Michael Allenson</a></small>
                                    <small class="date">Dec, 15 2017</small>
                                </div>
                            </li>
                            <li class="row">
                                <div class="icon-box col-4">
                                    <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/assets/images/blog/4.jpg ') }}" alt="Awesome Image">
                                </div>
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">New Technology</a></h5>
                                    <small class="author-name">By: <a href="#">Michael Allenson</a></small>
                                    <small class="date">Dec, 20 2017</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="ajax-loading"><img src="{{asset('images/loader.gif')}}" /></p>
        </div>
    </div>
</section>

 <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header  border-bottom">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Please</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" >
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary btn-m btn-block">
                            {{ __('Login') }}
                        </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>



@push('script')
<script>
        // start get data by scrolling
     function load_more(page){
         $.ajax({
            url:'?page=' + page,
            type: "get",
            datatype: "html",
            beforeSend: function()
            {
               $('.ajax-loading').show();
             }
         })
         .done(function(data)
         {
             if(data.length == 0){
             console.log(data.length);
             //notify user if nothing to load
             $('.ajax-loading').html("No more records!");
             return;
           }
           $('.ajax-loading').hide(); //hide loading animation once data is received
           $("#more_questions").append(data); //append data into #more_questions element
            console.log('data.length');
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
           alert('No response from server');
        });
     }
    var page = 1; //track user scroll as page number, right now page number is 1
    load_more(page); //initial content load
    $(window).scroll(function() { //detect page scroll
       if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
       page++; //page number increment
       load_more(page); //load content
       }
     });
    // end get data by scrolling

    //start like and dislike script
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        }
    });
    $('body').on('submit', '.likedislike', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{URL::to('store-like_dislike')}}",
            data: data,
            success: function (response) {
                console.log(response);
            }
        });
    });
    
    
</script>
@endpush
@endsection

