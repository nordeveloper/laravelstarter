@extends('dashboard.layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add blogcategory')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('blogcategory.store')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('blogcategory.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label>
            <input type="checkbox" name="active" value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="{{old('sort')}}" >
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>
    
        <div class="form-group">
            <label>Alias(slug)</label>
            <input type="text" class="form-control" name="slug" value="{{old('slug')}}">
        </div>
    
        <div class="form-group">
            <label>Preview image</label><br>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
        <label>Anonce text</label>
            <textarea name="preview_text" class="form-control" cols="30" rows="6">{{old('preview_text')}}</textarea>
        </div>
    
        <div class="form-group">
            <label>Detail image</label>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
        <label>Dertail text</label>
            <textarea name="detail_text" class="form-control" cols="30" rows="6">{{old('detail_text')}}</textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="{{old('meta_description')}}">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2">{{old('meta_keywords')}}</textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>
@endsection