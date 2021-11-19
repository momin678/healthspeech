@extends('admin.layouts.master')
@section('title', $details->hs_title )
@section('content')
<section style="padding-top: 100px;">
    <div class="container">
        <h1>{{ $details->hs_title }}</h1>
        <img src="{{asset('images/main-topic-pic')}}/{{ $details->hs_image }}" alt="">
        {!!$details->hs_description!!}
        @php ($i = 1)
        @foreach ($subDetails as $item)
            <h2>{{$i}}.) {{$item->sub_hs_title}}</h2>
            <img src="{{asset('images/sub-topic-pic')}}/{{ $item->sub_hs_image }}" alt="">
            <p>{!! $item->sub_hs_description !!}</p>

            @php ($ii = 1)
            @foreach ($subSubDetails as $itemss)
                @if ($item->id==$itemss->sub_hs_topics_id)
                    <h3>{{$i}}.{{$ii}}.) {{$itemss->sub_sub_hs_title}}</h3>
                    <img src="{{asset('images/sub-sub-topic-pic')}}/{{ $itemss->sub_sub_hs_image }}" alt="">
                    <p>{!! $itemss->sub_sub_hs_description !!}</p>
                    @php ($ii++)
                @endif
            @endforeach

            @php ($i++)
        @endforeach
    </div>
</section>
@endsection
