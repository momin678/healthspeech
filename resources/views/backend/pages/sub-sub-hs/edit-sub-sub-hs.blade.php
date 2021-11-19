

@extends('admin.layouts.master')
@section('content')
<section style="padding-top: 100px;">
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class="card col-md-12">
            <div class="card-header">
                Sub Health Speech Topic Edit
                <a href="{{route('admin.all-health-speech')}}" class="float-right btn btn-success" >Back To </a>
            </div>
            <div class="card-body" >
                <form class="form" action="{{route('admin.update-sub-sub-hs', $id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="hidden" value="{{$id}}" name="topicID">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label ><b>Sub Sub Health Speech Topic</b></label>
                                <input type="text" autocomplete="off" class="form-control" value="{{ $getData->sub_sub_hs_title }}" id="" name="sub_sub_hs_title" placeholder="Enter Health Speech Topic">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label ><b>Health Speech Picture</b></label>
                                            <input type="file" class="form-control" name="sub_sub_hs_image"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{asset('images/sub-sub-topic-pic')}}/{{ $getData->sub_sub_hs_image }}" style="max-width: 60px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label ><b>Sub Sub Health Speech Description</b></label>
                        <textarea name="sub_sub_hs_description" id="editor" style="height: 300px;">{{ $getData->sub_sub_hs_description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')

<script>
    tinymce.init({
      selector: '#editor',
      height: 400,
      plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
      toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code preview searchreplace table',
      toolbar_mode: 'scrolling',
    });
</script>
@endpush

