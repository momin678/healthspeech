@extends('frontend.layouts.master')
@section('title', $details->title)
@section('meta_keywords', $details->hs_meta_keywords)
@section('meta_tages', $details->hs_meta_tages)
@section('meta_description', $details->hs_meta_description)
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
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 16px;
      border: none;
      outline: none;
      background-color: #00cfd1;
      color: white;
      cursor: pointer;
      padding: 10px;
      border-radius: 4px;
    }
    
    #myBtn:hover {
      background-color: #555;
    }
</style>
<section class="content blog-page">
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2><small>Welcome to Health Speech</small></h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('blog-list-by-topic', $health_topic->slug)}}">{{$health_topic->health_topic_name}}</a></li>
                    <li class="breadcrumb-item active">{{ $details->hs_title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card single_post" id="contents">
                    <div class="body">
                        <h1 class="m-t-0 m-b-5">{{ $details->hs_title }}</h1>
                        <ul class="meta">
                            @if ($add_by != null)
                            <li><i class="zmdi zmdi-account col-blue"></i>Posted By: {{$add_by->name}}</li> 
                            @endif                            
                            <li>
                                @foreach(\App\Models\HealthTopic::where('id', $details->hs_tipics_id)->get() as $topic)
                                    <a href="{{route('blog-list-by-topic', $topic->slug)}}"><i class="zmdi zmdi-label col-amber"></i>
                                        {{$topic->health_topic_name}}
                                    </a>
                                @endforeach
                            </li>
                            
                        </ul>
                    </div>
                    <div class="body pb-0">
                        <div class="img-post m-b-15">
                            <img src="{{asset('images/main-topic-pic')}}/{{ $details->hs_image }}" alt="{{ $details->hs_title }}">
                            <div class="social_share">
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                            </div>
                        </div>
                        <p>{!!$details->hs_description!!}</p>
                    </div>
                    <div class="body pt-0">
                        @php ($i = 1)
                        @foreach ($subDetails as $item)
                            <h2>{{$i}}. {{$item->sub_hs_title}}</h2>
                            <img src="{{asset('images/sub-topic-pic')}}/{{ $item->sub_hs_image }}" alt="{{$item->sub_hs_title}}">
                            <p>{!! $item->sub_hs_description !!}</p>

                            @php ($ii = 1)
                            @foreach ($subSubDetails as $itemss)
                                @if ($item->id==$itemss->sub_hs_topics_id)
                                    <button data-toggle="collapse" data-target="#demo{{$ii}}" >
                                        <h3 id="sub-heading-cpllapse">{{$i}}.{{$ii}}) {{$itemss->sub_sub_hs_title}}</h3>
                                        <img src="https://img.icons8.com/windows/32/000000/right.png"/style="float: right; margin: -22px 0px;width: 16px;" all="right arrow">
                                    </button>
                                    <div id="demo{{$ii}}" class="collapse">
                                    <img src="{{asset('images/sub-sub-topic-pic')}}/{{ $itemss->sub_sub_hs_image }}" alt="{{$itemss->sub_sub_hs_title}}">
                                        <div class="accordion-body">
                                            <p>{!! $itemss->sub_sub_hs_description !!}</p>
                                        </div>
                                    </div>
                                @php ($ii++)
                                @endif
                            @endforeach
                            @php ($i++)
                            @if($item->summery_of_topics !== null)
                                <div class="body">{!! $item->summery_of_topics !!}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div id="feedbackHide" class="m-2">
                    <div class="row">
                        <div id="successSmg" class="col-lg-12" style="margin: 0 auto;text-align: center;">
                        </div>
                        <div id="hideFeedbackForm">
                            <div class="title">Was this helpful?</div>
                            <div class="button-group" style="float: left;">
                                <form class="yesFeedbackSubmit" method="POST" >
                                    @csrf
                                    <input type="hidden" value="{{$details->id}}" name="post_id">
                                    <input type="hidden" value="Thanks give feedback" name="feedback">
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </form>
                                <button id="noFeedbackSubmit" class="btn btn-primary float-right">No</button>
                            </div>
                        </div>
                        <div class="button-group " id="showFeedbackForm">
                            <h5>Sorry about that</h5>
                            <p>How can we improve it?</p>
                            <form class="yesFeedbackSubmit" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$details->id}}" name="post_id">
                                <textarea name="feedback" class="form-control" id="" cols="15" rows="3"></textarea><br><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                @foreach ($blogList as $blogList)
                    <div class="card single_post">
                        <div class="body pb-0">
                            <h3 class="m-t-0 m-b-5"><a href="{{ url('article',$blogList->slug)}}">{{ $blogList->hs_title }}</a></h3>
                            <ul class="meta">
                                <li><a href="#">
                                    @foreach (\App\Models\Admin::where('id', $blogList->added_by)->get() as $add_by)
                                    <i class="zmdi zmdi-account col-blue"></i> Posted By: {{$add_by->name}}
                                    @endforeach
                                </a></li>
                                <li>
                                    @foreach(\App\Models\HealthTopic::where('id', $blogList->hs_tipics_id)->get() as $topic)
                                    <a href="{{route('blog-list-by-topic', $topic->slug)}}"><i class="zmdi zmdi-label col-amber"></i>
                                        {{$topic->health_topic_name}}
                                    </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!--<div class="img-post m-b-15">-->
                            <!--    <img src="{{asset('images/main-topic-pic')}}/{{ $blogList->hs_image }}" alt="Awesome Image">-->
                                
                            <!--</div>-->
                            <p>{!! substr(strip_tags($blogList->hs_description), 0, 250)  !!}</p>
                            <a href="{{ url('article',$blogList->slug)}}" title="read more" style="float: right; margin: 0;padding: 2px 16px;background: #01d8da;color: #FFF;">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12 right-box sidebar-item">
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
                <div class="card make-me-sticky">
                    <div class="header">
                            <div id='console'></div>
                            <div id="toc">
                                <h2><strong>Table</strong> of content</h2>
                            </div>
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
{{-- Feedback sent per post use ajax --}}

<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
            }
        });
        $('body').on('submit', '.yesFeedbackSubmit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'post',
                url: "{{ URL::to('feedback_store') }}",
                data:data,
                success:function(response){
                    if(response.success){
                        $("#showFeedbackForm").hide();
                        $("#hideFeedbackForm").hide();
                        $("#successSmg").html('<p>Thanks for your feedback!</p>');
                    }
                }
            });
        });
    });

    $('body').on('click', '#noFeedbackSubmit', function() {
        $("#showFeedbackForm").show();
        $("#hideFeedbackForm").hide();
    });
</script>
<script>
    $('.replyButton').click(function(){
        $('.replyForm').hide();
        var id = $(this).val();
        $("#replyForm"+id).toggle();
    })
</script>
<script>
    var c = function() {
    return({
        log: function(msg) {
          consoleDiv = document.getElementById('console');
          para = document.createElement('p');
          text = document.createTextNode(msg);
          para.appendChild(text);
          consoleDiv.appendChild(para);
        }
    });
}();

window.onload = function () {
    var toc = "";
    var level = 0;
    var maxLevel = 3;

    document.getElementById("contents").innerHTML =
        document.getElementById("contents").innerHTML.replace(
            /<h([\d])>([^<]+)<\/h([\d])>/gi,
            function (str, openLevel, titleText, closeLevel) {
                if (openLevel != closeLevel) {
				 c.log(openLevel)
                    return str + ' - ' + openLevel;
                }

                if (openLevel > level) {
                    toc += (new Array(openLevel - level + 1)).join("<ol>");
                } else if (openLevel < level) {
                    toc += (new Array(level - openLevel + 1)).join("</ol>");
                }

                level = parseInt(openLevel);

                var anchor = titleText.replace(/ /g, "_");
                toc += "<li><a href=\"#" + anchor + "\">" + titleText
                    + "</a></li>";

                return "<h" + openLevel + "><a name=\"" + anchor + "\">"
                    + titleText + "</a></h" + closeLevel + ">";
            }
        );

    if (level) {
        toc += (new Array(level + 1)).join("</ol>");
    }

    document.getElementById("toc").innerHTML += toc;
};
</script>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

@endpush
@endsection