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
            <div class="card profile-header">
            @foreach ($my_question as $question)
                    <div class="bod mt-2">
                        <p>{{$question->question}}</p>
                        <p>Post: {{date('F d, Y', strtotime($question->created_at))}}</p>
                        <div class="text-right">
                            <a href="{{url('see-anser-question')}}/{{$question->id}}" class="btn btn-raised btn-primary waves-effect btn-round" data-type="html-message" >See Ans</a>
                        </div>
                    </div>
            @endforeach
        </div>
        </div>
    </div>
</section>
@endsection