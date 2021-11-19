@extends('frontend.layouts.master')
@section('content')
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>My Accout
                <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Health Speech</a></li>
                    <li class="breadcrumb-item active">My Account</li>
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
                                <img src="{{asset('assets/frontend/assets/images/images.png')}}" alt="avatar" class="rounded-circle img-responsive" >
                            @else
                                <img src="{{asset('images/userPicture')}}/{{$userID->userPicture}}" alt="avatar" class="rounded-circle img-responsive" >
                            @endif
                        </div>
                        <div>
                            <h4 class="m-b-0">{{Auth::user()->name}}</h4>
                            <p>Occupation: {{$userID->occupation}}</p>
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
                        <li class="nav-item">My Account</li>
                    </ul>
                    <div class="tab-pane body" id="Account">
                        <form action="{{url('change-name-password')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="userName" class="form-control" placeholder="Username" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <input id="txtNewPassword" type="password" name="password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <input id="txtConfirmPassword" type="password" class="form-control" placeholder="Re-enter Password">
                                <strong class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"></strong>
                            </div>
                            <button class="btn btn-info btn-round">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('script')
    <script>
        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("Passwords does not match!");
            else
                $("#CheckPasswordMatch").html("Passwords match.");
        }
        $(document).ready(function () {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });
    </script>
@endpush
@endsection
