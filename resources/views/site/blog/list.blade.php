@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-2">
        <x-bloglist></x-bloglist>
    </div>
    
    <div class="col-md-10">
        <div class="row">
            @foreach ($result as $item)
            <div class="col-md-4 blog-item">
                <div class="blog-wrapp">
                    <div class="blog-image">
                        @isset($item->preview_image)
                        <img class="img-responsive" src="{{ url('/storage/'.$item->preview_image)}}" alt="{{$item->title}}">  
                        @endisset
                    </div>
                    <div class="blog-title">
                        <h3><a href="/blog/{{$item->id}}">{{$item->title}}</a></h3>
                    </div>
                    <p>{{$item->created_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection