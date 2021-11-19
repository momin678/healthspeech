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
                            @if ($userID ->userPicture == null)
                                <img src="{{asset('assets/frontend/assets/images/images.png')}}" alt="avatar" class="rounded-circle img-responsive" id="blah" >
                            @else
                                <img src="{{asset('images/userPicture')}}/{{$userID->userPicture}}" alt="avatar" class="rounded-circle img-responsive">
                            @endif
                        </div>
                        <div>
                            <h4 class="m-b-0">{{Auth::user()->name}}</h4>
                            <span class="job_post">Occupation: {{$userID->occupation}}</span>
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
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">My About</a></li>
                    </ul>
                    <div class="tab-content">
                        <form action="{{url('user-about-store')}}" method="POST">
                            @csrf
                            <div class="tab-pane body active row" id="about">
                                <div class="form-group col-md-6">
                                    <small>Your Country</small>
                                    <input type="text" name="country" value="{{$userID->country}}" class="form-control" placeholder="Your Country">
                                </div>
                                <div class="form-group col-md-6">
                                    <small>Your City</small>
                                    <input type="text" name="city" value="{{$userID->city}}" class="form-control" placeholder="Your City">
                                </div>
                                <div class="form-group  col-md-6">
                                    <small>Your Date of Birth</small>
                                    <input type="date" name="birthday" value="{{$userID->birthday}}"  class="form-control" placeholder="">
                                </div>
                                <div class="form-group  col-md-6">
                                    <small>Your Gender</small>
                                    <br>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            @if ($userID->gender == 1)
                                            <input type="radio" value="1" checked id="customRadioInline1" name="gender" class="custom-control-input">
                                            @endif
                                            <label class="custom-control-label" for="customRadioInline1">Man</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            @if ($userID->gender == 2)
                                            <input type="radio" value="2" id="customRadioInline2" name="gender" class="custom-control-input" checked>
                                            @endif
                                            <label class="custom-control-label" for="customRadioInline2">Woman</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  col-md-6">
                                    <small>Your Heights Education</small>
                                    <select class="form-control" name="hightsEduction">
                                        <option>Select Education --</option>
                                        @foreach ($education as $item)
                                            <option value="{{$item}}" {{$item == $userID->hightsEduction ? 'selected': ''}}>{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-6">
                                    <small>Your Occupation</small>
                                    <select class="form-control" name="occupation">
                                            <option>Select Occupation --</option>
                                            @foreach ($occupation as $item)
                                            <option value="{{$item}}" {{$item == $userID->occupation ? 'selected': ''}} > {{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  col-md-12">
                                    <small>Your Phone</small>
                                    <input type="number" value="{{$userID->phone}}" name="phone" class="form-control" placeholder="Your Phone Number">
                                </div>
                                <div class="form-group  col-md-12">
                                    <small>Your Addrres</small>
                                    <textarea name="address" placeholder="Your Addrres" class="form-control">{{$userID->address}}</textarea>
                                </div>

                                <div class="form-group  col-md-12">
                                    <small>About Your self</small>
                                    <textarea name="aboutme" placeholder="About Your Self" class="form-control">{{$userID->aboutme}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(userPicture);
    });
    </script>
@endpush
