@extends('admin.layouts.master')
@section('content')

<section style="padding-top: 100px;">
    <div class="container">
        <h1>{{ $getData->sub_hs_title }}</h1>
        <div>
            <img src="{{asset('images/sub-topic-pic')}}/{{ $getData->sub_hs_image }}" alt="">
        </div>
        <div>
            {!!$getData->sub_hs_description!!}
        </div>
        {{-- @foreach ($subDetails as $item)
            <h2 style="background-color: red">{{$item->sub_hs_title}}</h2>
            <div>
                <img src="{{asset('images/sub-topic-pic')}}/{{ $item->sub_hs_image }}" alt="">
            </div>
            <div>{!!$item->sub_hs_description!!}</div>
        @endforeach --}}
    </div>
</section>
@endsection
