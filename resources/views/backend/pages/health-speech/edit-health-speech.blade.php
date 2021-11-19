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
                Edit Health Speech Topic
                <a href="{{route('admin.all-health-speech')}}" class="float-right btn btn-success" >All View </a>
            </div>
            <div class="card-body" >
                <form class="form" action="{{route('admin.update-health-speech', $getData->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Health Speech Topics</b></label>
                                    <select name="hs_tipics_id" id="" class="form-control" required>
                                        <option  value="">Select Option</option>
                                        @foreach ($getTopic as $topicName)
                                            <option value="{{$topicName->id}}" @if ($topicName->id == $getData->hs_tipics_id) selected @endif>{{$topicName->health_topic_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('hs_title_id')
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label ><b>Health Speech Slug</b></label>
                                    <input type="text" value="{{$getData->slug}}" autocomplete="off" class="form-control" id="" name="slug" placeholder="Enter Health Speech slug" required>
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label ><b>Health Speech Title</b></label>
                                <input type="text" value="{{$getData->hs_title}}" autocomplete="off" class="form-control" id="" name="hs_title" placeholder="Enter Health Speech Title">
                                </div>
                                @error('hs_title')
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label ><b>Health Speech Picture</b></label>
                                            <input value="{{$getData->hs_image}}" type="file" class="form-control" name="hs_image"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{asset('images/main-topic-pic')}}/{{ $getData->hs_image }}" style="max-width: 60px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label ><b>Health Speech Description</b></label>
                            <textarea name="hs_description" id="textEditor" style="height: 300px;">{{ $getData->hs_description }}</textarea>
                        </div>
                        @error('hs_description')
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label ><b>Meta Title</b></label>
                                <input type="text" value="{{ $getData->hs_meta_title }}" autocomplete="off" class="form-control" id="" name="hs_meta_title" placeholder="Enter Health Speech Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label ><b>Meta Tages</b></label>
                                <input type="text" value="{{ $getData->hs_meta_tages }}" autocomplete="off" class="form-control" id="" name="hs_meta_tages" placeholder="Enter Health Speech Tages">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label ><b>Meta Description</b></label>
                            <textarea class="form-control" name="hs_meta_description" id="" cols="117" rows="5">{{ $getData->hs_meta_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label ><b>Meta Keywords</b></label>
                            <input id="form-tags-4" class="metaKeywords" name="hs_meta_keywords" type="text" value="{{$getData->hs_meta_keywords}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
            $('.metaKeywords').tagsInput({
                'autocomplete': {
                    source: [

                    ]
                }
            });
        });
</script>
<script>
    tinymce.init({
      selector: '#textEditor',
      height: 400,
      plugins: 'advlist lists link code preview searchreplace wordcount media table emoticons image imagetools',
      toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code preview searchreplace table',
      toolbar_mode: 'scrolling',
    });
</script>
@endpush
