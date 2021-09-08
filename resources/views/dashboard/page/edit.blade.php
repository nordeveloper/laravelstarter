@extends('dashboard.layouts.main')
@section('content')
<div class="card">
        
    <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('pages.index') }}">back to list </a></p>
        </div>

        <form class="card-body" action="{{ route('pages.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$result->title}}">
        </div>
    
        <div class="form-group">
            <label>Alias (slug)</label>
            <input type="text" class="form-control" name="slug" value="{{$result->slug}}">
        </div>
    
        <div class="form-group">
            @isset($result->image)
                <img class="img-responsive" src="{{ asset('/storage/'. $result->image )}}" alt=""><br>
            @endisset    
            <label>Image</label>
            <input type="file" name="image">
        </div>
    
        <div class="form-group">
        <label>Page text</label>
            <textarea name="text" class="form-control textarea" cols="30" rows="6">{{$result->text}}</textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$result->meta_title}}">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="{{$result->meta_description}}">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2">{{$result->meta_keywords}}</textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection