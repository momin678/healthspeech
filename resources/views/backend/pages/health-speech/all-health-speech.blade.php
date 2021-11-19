@extends('admin.layouts.master')
@section('content')
<section style="padding-top: 100px;">
    <div class="container">
        <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        <h5>{{ $message }}</h5>
        </div>
    @endif -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Health Speech Articals
                        <a href="{{route('admin.add-health-speech')}}" class="float-right btn btn-success">Add Health Speech</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <td>Section</td>
                                    <td>Images</td>
                                    <td>Status</td>
                                    <td>Publish</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allHealthSpeech as $HST)
                                    <tr>
                                        <td><a href="{{route('admin.details-health-speech', $HST->id)}}">{{$HST->hs_title}}</a></td>
                                        <td style="font-size:36px;"><a href="{{route('admin.section-health-speech', $HST->id)}}" ><i class="fa fa-puzzle-piece"></i></a></td>
                                        <td>
                                            <img src="{{asset('images/main-topic-pic')}}/{{ $HST->hs_image }}" style="max-width: 60px">
                                        </td>
                                        @if ($HST->status == 1)
                                        <td class="text-primary">Active</td>
                                        @else
                                        <td class="text-danger">Deactive</td>
                                        @endif
                                        <td style="font-size:x-large;">
                                            @if ($HST->status == 1)
                                                <a class="text-primary" title="Active" href="{{route('admin.active-health-speech', $HST->id)}}"><i class="fa fa-check"></i></a>
                                            @else
                                                <a class="text-danger" title="Deactive" href="{{route('admin.deactive-health-speech', $HST->id)}}"><i class="fa fa-ban"></i></a>
                                            @endif
                                        </td>
                                        <td style="font-size:1.4em;">
                                            <a href="{{route('admin.edit-health-speech', $HST->id)}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.delete-health-speech', $HST->id)}}" class="removePost"><i class="fa fa-trash fa-10x"></i></a>
                                            <a href="{{route('admin.add-sub-health-speech', $HST->id)}}"><i class="fa fa-plus-square"></i></a>
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
@push('hs_delete_speech')
<script>
    $(document).ready(function(){
        $(".removePost").click(function(){
            if (!confirm("Do you want to delete ?")){
            return false;
            }
        });
    });
</script>
@endpush
@endsection
