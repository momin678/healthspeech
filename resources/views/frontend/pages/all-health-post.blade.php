
@extends('frontend.layouts.master')
@section('content')
<style>
    .animationLoading{
  background: #fff;
  border: 1px solid;
  border-color: #e5e6e9;
  border-radius: 3px; 
  display: block;
  height: 180px;
  width: 100%;
  padding: 12px;
}
@keyframes animate {
    from {transition:none;}
    to {background-color:#f6f7f8;transition: all 0.3s ease-out;}
}

#container{
  width:100%;
  height:30px;
}
#one,#two,#three,#four,#five,#six
{
  position:relative;
  background-color: #CCC;
  height: 6px;
  animation-name: animate; 
  animation-duration: 2s; 
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

#one{  
  left:0; 
  height: 40px;
  width: 40px;  
}

#two{
  left:50px;
  top:-33px;
  width: 25%;
}

#Three{
  left:50px;
  top:-20px;
  width: 15%;
}

#four{
  left:0px;
  top:30px;
  width: 80%;
}

#five{
  left:0px;
  top:45px;
  width: 90%;
}

#six{
  left:0px;
  top:60px;
  width: 50%;
}
</style>


<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>
                    <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><i class="zmdi zmdi-home"></i> HS</li>
                    <li class="breadcrumb-item">Article</li>
                    <li class="breadcrumb-item active">Category</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12 left-box" id="results">
                {{-- blog list content show here --}}
                @foreach ($healthPost as $blogList)
                    <div class="card single_post">
                        <div class="body pb-0">
                            <h3 class="m-t-0 m-b-5"><a href="{{ url('article',$blogList->slug)}}">{{ $blogList->hs_title }}</a></h3>
                            <ul class="meta">
                                <li style="font-style: italic; color: #959595;text-decoration: none; font-size: 12px;">
                                    @foreach (\App\Models\Admin::where('id', $blogList->added_by)->get() as $add_by)
                                    <i class="zmdi zmdi-account col-blue" style="font-size: 12px;"></i> Posted By: {{$add_by->name}}
                                    @endforeach
                                </li>
                                <li>
                                    @foreach(\App\Models\HealthTopic::where('id', $blogList->hs_tipics_id)->get() as $topic)
                                    <a href="{{route('article-categories', $topic->slug)}}"><i class="zmdi zmdi-label col-amber"></i>
                                        {{$topic->health_topic_name}}
                                    </a>
                                    @endforeach
                                </li>
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                <img src="{{asset('images/main-topic-pic')}}/{{ $blogList->hs_image }}" alt="{{ $blogList->hs_title }}">
                                
                            </div>
                            <div class="social_share row">
                                @php
                                    $socialShare = \Share::page(url('article', $blogList->slug))
                                    ->facebook()
                                    ->twitter()
                                    ->linkedin()
                                    ->whatsapp();
                                @endphp
                                {!! $socialShare !!}
                            </div>
                            <p>{!! substr(strip_tags($blogList->hs_description), 0, 250)  !!}</p>
                            <a href="{{ url('article',$blogList->slug)}}" title="read more" style="float: right; margin: 0;padding: 2px 16px;background: #01d8da;color: #FFF;">Read More</a>
                        </div>
                    </div>
                @endforeach
                {{ $healthPost->links() }}
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
                        <h2><strong>Email</strong> Newsletter <small>Get our update earlier than others, let’s get in touch.</small></h2>
                    </div>
                    <div class="body widget newsletter">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Email">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-mail-send"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
    
@endpush
@endsection
