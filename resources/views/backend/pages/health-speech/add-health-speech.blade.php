

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
                Main Health Speech Topic
                <a href="{{route('admin.all-health-speech')}}" class="float-right btn btn-success" >All View </a>
            </div>
            <div class="card-body" >
                <form class="form" action="{{route('admin.store-health-speech')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label ><b>Health Speech Topics</b></label>
                                        <select name="hs_tipics_id" id="" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($allTopics as $name)
                                            <option value="{{$name->id}}">{{$name->health_topic_name}}</option>
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
                                        <input type="text" autocomplete="off" class="form-control" id="" name="slug" placeholder="Enter Health Speech slug" required>
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
                                    <input type="text" autocomplete="off" class="form-control" id="" name="hs_title" placeholder="Enter Health Speech Title" required>
                                </div>
                                @error('hs_title')
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label ><b>Health Speech Picture</b></label>
                                    <input type="file" class="form-control" name="hs_image"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label ><b>Health Speech Description</b></label>
                            <div class="col-lg-12">
                                <textarea id="textEditor" name="hs_description" class="form-control" cols="117" rows="5"></textarea>
                            </div>
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
                                <input type="text" autocomplete="off" class="form-control" id="" name="hs_meta_title" placeholder="Enter Health Speech Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label ><b>Meta Tages</b></label>
                                <input type="text" autocomplete="off" class="form-control" id="" name="hs_meta_tages" placeholder="Enter Health Speech Tages">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label ><b>Meta Description</b></label>
                            <textarea class="form-control" name="hs_meta_description" id="" cols="117" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label ><b>Meta Keywords</b></label>
                            <input id="form-tags-4" class="metaKeywords" name="hs_meta_keywords" type="text" value="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
      toolbar: 'undo redo bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | preview searchreplace table',
      toolbar_mode: 'scrolling',
    });
</script>
@endpush

