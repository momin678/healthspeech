
@extends('admin.layouts.master')
@section('content')

<!-- main content start -->
<div class="main-content">
    <div class="container-fluid content-top-gap">
        <section class="people">
            <div class="card card_border mb-5">
                <div class="cards__heading">
                    <h3>All Users</h3>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        @foreach($all_users as $users)
                            <div class="col-lg-3 col-md-6 mb-4 px-2">
                                <div class="card text-center card_border py-2">
                                    <div class="card-body">
                                        <div class="team-main-19">
                                            @if ($users->userPicture == null)
                                                <a href="#url"><img src="{{asset('assets/frontend/assets/images/images.png')}}" class="rounded-circle"></a>
                                                @else
                                                <a href="#url"><img src="{{asset('images/userPicture')}}/{{$users->userPicture}}" class="rounded-circle"></a>
                                                @endif
                                            <div class="right-team-9">
                                                <div>
                                                    <h5><a href="{{url('user-profile-view', $users->id)}}" class="card__title mb-2 mt-3">{{$users->name}}</a>
                                                    </h5>
                                                    <p class="">{{$users->occupation}}</p>
                                                </div>
                                                <a href="{{url('user-profile-view', $users->id)}}" class="btn mt-4 profile-btn text-primary">View profile </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- //people cards style 2 -->
        </section>
    </div>
</div>
@endsection