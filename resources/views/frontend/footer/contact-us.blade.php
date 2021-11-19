@extends('frontend.layouts.master')
@section('content')
    <!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>
                <small>Welcome to Health Speech</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
               
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="https://www.healthspeech.com/"><i class="zmdi zmdi-home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Contact-Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row justify-content-center" style=" background: #01d8da;">
                    		<div class="col-12 col-md-8 col-lg-6 pb-5">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form method="post" action="{{ route('contact.store') }}">
                                    @csrf
                                    <div class="card border-primary rounded-0">
                                        <div class="card-header p-0">
                                            <div class="btn-info text-white text-center py-2">
                                                <h3><i class="fa fa-envelope"></i> Contact us</h3>
                                                <p class="m-0">We will gladly help you</p>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control" id="nombre" name="name" placeholder="Name and surname" required>
                                                </div>
                                                @if ($errors->has('name'))
                                                <div class="error">
                                                    {{ $errors->first('name') }}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-at text-inf"></i></div>
                                                    </div>
                                                    <input type="email" class="form-control" id="nombre" name="email" placeholder="hs@gmail.com" required>
                                                </div>
                                                    @if ($errors->has('email'))
                                                    <div class="error">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control" id="nombre" name="subject" placeholder="Your subject" required>
                                                </div>
                                                    @if ($errors->has('subject'))
                                                    <div class="error">
                                                        {{ $errors->first('subject') }}
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Send us your message" required name="message"></textarea>
                                                </div>
                                                    @if ($errors->has('message'))
                                                    <div class="error">
                                                        {{ $errors->first('message') }}
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" value="To send" class="btn btn-info btn-block rounded-0 py-2">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
