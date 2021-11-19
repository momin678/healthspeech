@foreach ($allHealthSpeech as $blogList)
    <div class="card single_post">
        <div class="body pb-0">
            <h3 class="m-t-0 m-b-5"><a href="{{ url($blogList->slug)}}">{{ $blogList->hs_title }}</a></h3>
            <ul class="meta">
                <li><a href="#">
                    @foreach (\App\Models\Admin::where('id', $blogList->added_by)->get() as $add_by)
                    <i class="zmdi zmdi-account col-blue"></i> Posted By: {{$add_by->name}}
                    @endforeach
                </a></li>
                <li><a href="#"><i class="zmdi zmdi-label col-amber"></i>
                    @foreach(\App\Models\HealthTopic::where('id', $blogList->hs_tipics_id)->get() as $topic)
                        {{$topic->health_topic_name}}
                    @endforeach
                </a></li>
                <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 
                    @php 
                        $comment = \App\Models\Comment::where('postID', $blogList->id)->get()
                    @endphp
                    {{$comment->count()}}
                </a></li>
            </ul>
        </div>
        <div class="body">
            <div class="img-post m-b-15">
                <img src="{{asset('images/main-topic-pic')}}/{{ $blogList->hs_image }}" alt="Awesome Image">
                
            </div>
            <div class="social_share row">
                @php
                    $socialShare = \Share::page(url('blog-details', $blogList->slug))
                    ->facebook()
                    ->twitter()
                    ->linkedin()
                    ->whatsapp();
                @endphp
                {!! $socialShare !!}
            </div>
            <p>{!! substr(strip_tags($blogList->hs_description), 0, 250)  !!}</p>
            <a href="{{ url($blogList->slug)}}" title="read more" style="float: right; margin: 0;padding: 2px 16px;background: #01d8da;color: #FFF;">Read More</a>
        </div>
    </div>
@endforeach