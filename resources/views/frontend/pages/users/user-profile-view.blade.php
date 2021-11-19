@extends('frontend.layouts.master')
@section('content')

<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Profile
                <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Health Speech</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card profile-header">
                    <div class="body text-center">
                        <div class="profile-image"> 
                            @if ($userID->userPicture == null)
                            <img src="{{asset('assets/frontend/assets/images/images.png')}}" alt="">
                            @else
                            <img src="{{asset('images/userPicture')}}/{{$userID->userPicture}}" alt="">
                            @endif
                        </div>
                        <div>
                            <h4 class="m-b-0"><strong>{{$userID->name}}</strong></h4>
                            <span class="job_post">{{$userID->occupation}}</span>
                            <p>{{$userID->address}}</p>
                        </div>
                        <div>
                            @if(Auth::id())
                            <form method="post" action="{{url('follower-create')}}">
                                @csrf
                                <input type="hidden" name="follow_user_id" value="{{$userID->id}}">
                                <input type="hidden" name="my_user_id" value="{{Auth::user()->id}}">
                                <button class="btn btn-primary btn-round" type="submit">Follow</button>
                            </form>
                            @else
                                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">Follow</button>
                            @endif
                            
                        </div>
                        <p class="social-icon m-t-5 m-b-0">
                            <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                            <a title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                        </p>
                    </div>                    
                </div>                
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About My Self</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <p>{{$userID->aboutme}}</p>
                            <strong>Qualifications</strong>
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <p><strong>Country: </strong>{{$userID->country}}</p>
                                </li>
                                <li>
                                    <p><strong>City: </strong>{{$userID->city}}</p>
                                </li>
                                <li>
                                    <p><strong>Gender: </strong>
                                        @if ($userID->gender == 1)
                                            Man
                                        @endif
                                        @if ($userID->gender == 2)
                                            Woman
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p><strong>Date of Birth: </strong> {{$userID->birthday}}</p>
                                </li>
                                <li>
                                    <p><strong>Heights Education: </strong> {{$userID->hightsEduction}}</p>
                                </li>
                                <li>
                                    <p><strong>Phone Number: </strong> {{$userID->phone}}</p>
                                </li>
                                <li>
                                    <p><strong>Address: </strong> {{$userID->address}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        {{-- <div class="model-footer">
            <h4>Registration</h4>
        </div> --}}
      </div>
    </div>
  </div>

@endsection