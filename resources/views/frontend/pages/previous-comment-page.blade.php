
                <div class="card">
                    <div class="header">
                        <h2><strong>Comments</strong> </h2>
                    </div>
                    <div class="body">
                        <ul class="comment-reply list-unstyled">
                            @foreach ($allComments as $comment)
                                @foreach (\App\Models\User::where('id', $comment->userID)->get() as $user)
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
                                        <p>{{$comment->comment}}</p>
                                        <ul class="list-inline">
                                            <li>{{date('F d, Y', strtotime($comment->created_at))}}</li>
                                            <li  class="reply replyButton pointer" value="{{$comment->id}}" data-toggle="modal" data-target="#exampleModal">Reply</li>
                                        </ul>
                                    </div>
                                </li>
                                @foreach (\App\Models\ReplyComment::where('commentID',$comment->id )->get() as $replyComment)
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
                                    <form action="{{url('reply-comment-store')}}"  method="POST">
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
                <div class="card">
                    <div class="header">
                        <h2><strong>Your Comment</strong> </h2>
                    </div>
                    <div class="body">
                        <div class="comment-form">
                            <form class="row" method="POST" action="{{url('post-comment')}}">
                                @csrf
                                <input class="form-control" type="hidden" name="postID" value="{{$details->id}}">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"  name="comment" placeholder="Please type your  Comment......" required></textarea>
                                    </div>
                                    @if(Auth::user())
                                    <button type="submit" class="btn btn btn-primary btn-round">SUBMIT</button>
                                    @else
                                        <a type="submit" class="btn btn btn-primary btn-round" data-toggle="modal" data-target="#loginModal">SUBMIT</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>