@extends('dashboard.layouts.main')
@section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add Page')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('pages.index')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" value="1"> Active
            </label>
        </div>    
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
        </div>
    
        <div class="form-group">
            <label>Alias(slug)</label>
            <input type="text" class="form-control" name="slug">
        </div>
    
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>
    
        <div class="form-group">
        <label>Page text</label>
            <textarea name="text" class="form-control" cols="30" rows="6"></textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2"></textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>
@endsection