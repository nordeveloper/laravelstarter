@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
        <p class="h4">{{__('Add Blog')}}</p>
        <p><a class="btn btn-info btn-xs" href="{{ route('blog.index') }}">Back to list</a></p>
    </div>
</div>

<form class="row" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-8">
        <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>
                <input type="checkbox" name="active" value="1"> Active
                </label>
            </div>

            <div class="form-group">
                <label>Sort</label>
                <input type="text" class="form-control" name="sort" value="500">
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="">
            </div>

            <div class="form-group">
                <label>Alias(slug)</label>
                <input type="text" class="form-control" name="alias" value="">
            </div>

            <div class="form-group">
                <label>Anonce text</label>
                <textarea name="preview_text" class="form-control textarea" cols="30" rows="6"></textarea>
            </div>

            <div class="form-group">
                <label>Dertail text</label>
                <textarea name="detail_text" class="form-control textarea" cols="30" rows="6"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Save">
            </div>

        </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <div class="form-group">
                <label>Preview image</label><br>
                <input type="file" name="preview_image">
            </div>
            
            <div class="form-group">
                <label>Detail image</label><br>
                <input type="file" name="preview_image">
            </div>

            <div class="form-group">
                <label>Мета title</label>
                <input type="text" class="form-control" name="meta_title" value="">
            </div>

            <div class="form-group">
                <label>Мета description</label>
                <input type="text" class="form-control" name="meta_description" value="">
            </div>

            <div class="form-group">
                <label>Мета keywords</label>
                <textarea name="meta_keywords" class="form-control" cols="30" rows="2"></textarea>
            </div>

            </div>
        </div>
    </div>

</form>
@endsection
