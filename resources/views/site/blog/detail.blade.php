@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-9 blog-detail">
        <div class="blog-title">
            <h1>{{$result->title}}</h1>
        </div>
        <p>{{$result->created_at}}</p>
        @isset($result->detail_image)
        <div class="blog-image">
            <img src="{{ url('/storage/'.$result->detail_image)}}" alt="{{$result->title}}">
        </div>            
        @endisset

        @if(empty($result->detail_text))
        <div class="blog-anonce">
            {{$result->preview_text}}
        </div>
        @endif
        <div class="blog-text">
            {!!$result->detail_text!!}
        </div>
    </div>
    <div class="col-md-3">
        <x-blogrelated></x-blogrelated>
        <x-bloglist></x-bloglist>
    </div>
</div>

@endsection