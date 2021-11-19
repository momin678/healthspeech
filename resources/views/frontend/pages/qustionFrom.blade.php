@extends('frontend.layouts.master')
@section('content')

<section class="content blog-page">

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Your Question Ask
                    <small>Welcome to HS</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> HS</a></li>
                    <li class="breadcrumb-item"><a href="blog-dashboard.html">Article</a></li>
                    <li class="breadcrumb-item active">Question</li>
                </ul>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="comment-form">
                            <form method="POST" action="{{url('question-store')}}">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <select class="form-control" name="topic_id">
                                      @foreach($healthTopic as $topic)
                                        <option value="{{$topic->id}}">{{$topic->health_topic_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="question" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn btn-primary btn-round">SUBMIT</button>
                                </div>
                            </form>
                        </div>
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
                        <h2><strong>Popular</strong> Questions</h2>
                    </div>
                    <div class="body widget popular-post">
                        <ul class="list-unstyled m-b-0">
                            @foreach ($allQuestion as $item)
                            <li class="row">
                                <div class="text-box col-8 p-l-0">
                                    <h5 class="m-b-0"><a href="#">{{$item->question}}</a></h5>
                                    <small class="author-name">By: <a href="#">{{$item->name}}</a></small>
                                    <small class="date">{{ date('d/m/y', strtotime($item->created_at)) }}</small>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{url('more-view-question')}}">More views</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
