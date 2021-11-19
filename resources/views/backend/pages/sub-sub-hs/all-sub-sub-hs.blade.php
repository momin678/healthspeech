@extends('admin.layouts.master')
@section('content')
    <div class="main-content">
        <section style="padding-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Categories Name
                                <a href="" class="float-right btn btn-success">Add Category</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($category as $cName)
                                            <tr>
                                                <td>{{$cName->category_name}}</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        @endforeach --}}
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
