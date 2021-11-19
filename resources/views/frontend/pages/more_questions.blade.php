@foreach ($questions as $question)
    @foreach (\App\Models\User::where('id', $question->user_id)->get() as $userInfo)
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
            <p>Post: {{date('F d, Y', strtotime($question->created_at))}}</p>
        </div>
        <div class="mt-2">
            <p>{{$question->question}}</p>
            {{-- <form method="post" action="{{url('question-comment-store')}}">
                @csrf
                <input type="hidden" name="question_id" value="{{$question->id}}">
                <div>
                    <input type="text" placeholder="Wright here........" name="question_comment" class="form-control col-md-9">
                @if(Auth::user())
                    <button type="submit" class="btn btn btn-primary btn-round float-right col-md-3">SUBMIT</button>
                @else
                    <a type="submit" class="btn btn btn-primary btn-round float-right col-md-3" data-toggle="modal" data-target="#loginModal">SUBMIT</a>
                @endif
                </div>
            </form> --}}
           <div class="row">
                @if(Auth::user())
                    <form class="likedislike" method="POST">
                        @csrf
                        <input type="hidden" value="{{$question->id}}" name="question_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">   
                        <input type="hidden" value="1" name="likes">
                        <button type="submit" class="btn">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </form>
                    <form class="likedislike" method="POST">
                        @csrf
                        <input type="hidden" value="{{$question->id}}" name="question_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <input type="hidden" value="1" name="dislike">
                        <button type="submit" class="btn">
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                    </form>
                @else
                    <span class="p-2 btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-thumbs-up"></i> </span>
                    <span class="p-2 btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-thumbs-down"></i> </span>
                @endif
                <div class="text-right">
                    <a href="{{url('see-anser-question')}}/{{$question->id}}" class="btn btn-raised btn-primary waves-effect btn-round" data-type="html-message" >See Ans</a>
                </div>
           </div>
        </div>
    </div>
    @endforeach

@endforeach
