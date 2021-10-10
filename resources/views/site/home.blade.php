@extends('layouts.main')

@section('content')

<div class="row">
    @foreach ($result as $item)
    <div class="col-md-4 blog-item">
        <div class="blog-image">
            <img class="img-responsive" src="{{ asset('/storage/'. $item->preview_image )}}" alt="{{$item->title}}">  
        </div>   
        <h3 class="blog-title"><a href="/blog/{{$item->id}}">{{$item->title}}</a></h3>
    </div>
    @endforeach
</div>

@endsection