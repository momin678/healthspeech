@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <section style="padding-top: 100px;">
        <div class="container">
        	@if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                <h5>{{ $message }}</h5>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card col-md-9">
                        <div class="card-header">
                            Health Topic Name
                            <a href="{{url('add-health-topic')}}" class="float-right btn btn-success">Add Health-Topic</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Status</td>
                                        <td>Publish</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allTopics as $topicsName)
                                        <tr>
                                            <td>{{$topicsName->health_topic_name}}</td>
                                            @if ($topicsName->status == 1)
                                            <td class="text-primary">Active</td>
                                            @else
                                            <td class="text-danger">Deactive</td>
                                            @endif
                                            @if ($topicsName->status == 1)
                                            <td class="text-primary" style="font-size:x-large;">
                                                <a title="Active" href="{{url('active-health-topic', $topicsName->id)}}"><i class="fa fa-check"></i></a>
                                            </td>
                                            @else
                                            <td style="font-size:x-large;">
                                                <a class="text-danger" title="Deactive" href="{{url('deactive-health-topic', $topicsName->id)}}"><i class="fa fa-ban"></i></a>
                                            </td>
                                            @endif
                                            <td>
                                                <a href="{{url('edit-health-topic', $topicsName->id)}}" type="button" class="btn btn-info">Edit</a>
                                                <a href="{{url('delete-health-topic', $topicsName->id)}}" type="button" class="btn btn-danger ">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
