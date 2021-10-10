@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>{{$result->title}}</h1>
        <div class="blog-detail">
            {!!$result->detail_text!!}
        </div>
    </div>
</div>

@endsection