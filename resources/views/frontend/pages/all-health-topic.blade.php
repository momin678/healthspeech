@extends('frontend.layouts.master')
@section('content')

<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2> Article Categories
                    <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="https://healthspeech.com/"><i class="zmdi zmdi-home"></i> HS</a></li>
                    <li class="breadcrumb-item">Topic</li>
                    <li class="breadcrumb-item active">Common</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="list-group-item list-group-item-action">
              Explore by Conditions & Diseases
            </div>

            @foreach($allTopics as $topic)
                <div class="col-md-3">
                    <div>
                        <a href="{{route('article-categories', $topic->slug)}}">{{$topic->health_topic_name}}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection