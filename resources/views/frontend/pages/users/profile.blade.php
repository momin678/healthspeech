@extends('frontend.layouts.master')
@section('content')

<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Profile
                <small>Welcome to HP</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
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
                            <button class="btn btn-icon bg-info btn-round d-none d-md-inline-block" type="button"  data-toggle="modal" data-target="#exampleModal">
                                <i class="zmdi zmdi-edit" title="Edit"></i>
                            </button>
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
                            <a href="{{url('user-about-update')}}" class="btn btn-info">Change</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{url('user-picture-update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="card profile-header">
                    <div class="body text-center">
                        <div class="profile-image ">
                            @if ($userID->userPicture == null)
                                <img src="{{asset('assets/frontend/assets/images/images.png')}}" alt="avatar" class="rounded-circle img-responsive" id="blah" width="300" height="300">
                            @else
                                <img src="{{asset('images/userPicture')}}/{{$userID->userPicture}}" alt="avatar" class="rounded-circle img-responsive" id="blah" width="300" height="300">
                            @endif
                        </div>
                    </div>
                    <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input" id="customFile" name="userPicture" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>

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
