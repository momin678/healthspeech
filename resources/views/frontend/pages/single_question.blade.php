@extends('frontend.layouts.master')
@section('content')

<style>
    #showFeedbackForm{
        display: none;
    }
    .replyComment{
        display: none;
    }
    .replyForm{
        display: none;
    }
</style>
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
                                    <h2><strong>Details</strong> Questions</h2>
                                </div>
                                {{-- content show here --}}
                                <div id="more_questions">
                                    <div class="col-md-12">
                                        <div class="questionMan">
                                            <a href="{{url('user-profile-view', $userInfo->id)}}">
                                                @if ($userInfo->userPicture == null)
                                                <img class="rounded-circle img-responsive" src="{{asset('assets/frontend/assets/images/images.png ') }}" alt="Awesome Image" height='50'>
                                            @else
                                                <img class="rounded-circle img-responsive" src="{{asset('images/userPicture') }}/{{$userInfo->userPicture}}" alt="Awesome Image" height='50'>
                                            @endif
                                            </a>
                                            <a href="{{url('user-profile-view', $userInfo->id)}}">{{$userInfo->name}}</a>,
                                            <span class="pl-3">
                                                @if(Auth::id())
                                                    <form method="post" action="{{url('follower-create')}}">
                                                        @csrf
                                                        <input type="hidden" name="follow_user_id" value="{{$userInfo->id}}">
                                                        <input type="hidden" name="my_user_id" value="{{Auth::user()->id}}">
                                                        <button class="pointer" type="submit" >Follow</button>
                                                    </form>
                                                    @else
                                                        <span class="pointer" data-toggle="modal" data-target="#exampleModalCenter">Follow</span>
                                                    @endif
                                            </span>
                                            <p>Post: {{date('F d, Y', strtotime($ques_info->created_at))}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <p>{{$ques_info->question}}</p>
                                            <form method="post" action="{{url('question-comment-store')}}" >
                                                @csrf
                                                <input type="hidden" name="question_id" value="{{$ques_info->id}}">
                                                <div>
                                                    <textarea name="question_comment" rows="4" class="form-control no-resize" placeholder="Comment Wright here........"></textarea>
                                                @if(Auth::user())
                                                    <button type="submit" class="btn btn btn-primary btn-round float-right col-md-3">Comment</button>
                                                @else
                                                    <a type="submit" class="btn btn btn-primary btn-round float-right col-md-3" data-toggle="modal" data-target="#loginModal">Comment</a>
                                                @endif
                                                </div>
                                            </form>
                                           <div>
                                                @if(Auth::user())
                                                @foreach (\App\Models\Likedislike::where('user_id', Auth::user())->get() as $userInfo)
                                                    <form class="likedislike" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{$ques_info->id}}" name="question_id">
                                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">   
                                                        <input type="hidden" value="1" name="likes">
                                                        <button type="submit" class="btn bg-green">
                                                            <i class="fas fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                    <form class="likedislike" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{$ques_info->id}}" name="question_id">
                                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                                        <input type="hidden" value="1" name="dislike">
                                                        <button type="submit" class="btn">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                @endforeach
                                                @else
                                                    <span class="p-2 btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-thumbs-up"></i> </span>
                                                    <span class="p-2 btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-thumbs-down"></i> </span>
                                                @endif
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Comments</strong> </h2>
                    </div>
                    <div class="body">
                        <ul class="comment-reply list-unstyled">
                            @foreach ($ques_commnent as $comment)
                                @foreach (\App\Models\User::where('id', $comment->user_id)->get() as $user)
                                <li class="row">
                                    <div class="icon-box col-md-2 col-4">
                                        <a href="{{url('user-profile-view', $user->id)}}">
                                            @if ($user->userPicture == null)
                                                <img class="rounded-circle img-responsive" src="{{asset('assets/frontend/assets/images/images.png ') }}" alt="Awesome Image">
                                            @else
                                                <img class="rounded-circle img-responsive" src="{{asset('images/userPicture') }}/{{$user->userPicture}}" alt="Awesome Image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                        <a href="{{url('user-profile-view', $user->id)}}"><h5 class="m-b-0">{{$user->name}}</h5></a>
                                        <p>{{$comment->question_comment}}</p>
                                        <ul class="list-inline">
                                            <li>{{date('F d, Y', strtotime($comment->created_at))}}</li>
                                            <li  class="reply replyButton pointer" value="{{$comment->id}}" data-toggle="modal" data-target="#exampleModal">Reply</li>
                                        </ul>
                                    </div>
                                </li>
                                @foreach (\App\Models\ReplyCommentQuestion::where('commentID',$comment->id )->get() as $replyComment)
                                    @foreach (\App\Models\User::where('id', $replyComment->userID)->get() as $userInfo)
                                        <li class="row ml-5">
                                            <div class="icon-box col-md-2 col-4">
                                                <a href="{{url('user-profile-view', $userInfo->id)}}">
                                                    @if ($userInfo->userPicture == null)
                                                        <img class="rounded-circle img-responsive" src="{{asset('assets/frontend/assets/images/images.png ') }}" alt="Awesome Image">
                                                    @else
                                                        <img class="rounded-circle img-responsive" src="{{asset('images/userPicture') }}/{{$userInfo->userPicture}}" alt="Awesome Image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                                <a href="{{url('user-profile-view', $userInfo->id)}}"><h5 class="m-b-0">{{$userInfo->name}}</h5></a>
                                                <p>{{$replyComment->replyComment}}</p>
                                                <ul class="list-inline">
                                                    <li><a href="#">{{date('F d, Y', strtotime($replyComment->created_at))}}</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach
                                <div  id="replyForm{{$comment->id}}" class="replyForm">
                                    <form action="{{url('reply-question-comment-store')}}"  method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$comment->id}}" name="commentID">
                                        <textarea rows="4" class="form-control no-resize" name="replyComment" placeholder="Please type your  reply Comment......" required></textarea>
                                        @if(Auth::user())
                                        <button type="submit" class="btn btn btn-primary btn-round">SUBMIT</button>
                                        @else
                                            <a type="submit" class="btn btn btn-primary btn-round" data-toggle="modal" data-target="#loginModal">SUBMIT</a>
                                        @endif
                                    </form>
                                </div>
                                @endforeach
                            @endforeach
                        </ul>
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
                        <h2><strong>Related</strong> Question</h2>
                    </div>
                    <div class="body widget popular-post">
                        <ul class="list-unstyled m-b-0">
                            @foreach ($related_question as $item)
                            @if($item->id !== $ques_info->id)
                            <li class="row">
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">{{$item->question}}</a></h5>
                                    <small class="author-name">By: <a href="#">{{$item->name}}</a></small>
                                    <small class="date">{{ date('d/m/y', strtotime($item->created_at)) }}</small>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <a href="{{url('more-view-question')}}">More views</a>
                    </div>
                </div>
            </div>
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
                if(response == true){
                    console.log(response);   
                }
            }
        });
    });
</script>
@endpush
@endsection