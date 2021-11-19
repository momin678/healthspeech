@extends('admin.layouts.master')
@section('content')
<section style="padding-top: 100px;">
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
            <h5>{{ $message }}</h5>
            </div>
        @endif
        <div class="card col-md-6">
            <div class="card-header">
                Health Topic Name
                <a href="{{url('all-health-topic')}}" class="float-right btn btn-success" >View Health-Topic</a>
            </div>
            <div class="card-body">
                <form action="{{url('update-health-topic', $getData->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label >Health Topic Name</label>
                        <input type="text" autocomplete="off" class="form-control" id="health_topic_name" name="health_topic_name" value="{{ $getData->health_topic_name }}" placeholder="Enter health-topic">
                            @error('health_topic_name')
                            <div class="alert alert-danger alert-dismissible" data-dismiss="alert">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
 </section>
@endsection

