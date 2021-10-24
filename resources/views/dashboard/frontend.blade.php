@extends('dashboard.layouts.main')
@section('content')
asdad
<div class="card-body">
    <div class="example-preview">
        <div class="d-flex mb-15">
            <div class="spinner spinner-primary mr-15"></div>
            <div class="spinner spinner-success mr-15"></div>
            <div class="spinner spinner-danger mr-15"></div>
            <div class="spinner spinner-warning mr-15"></div>
            <div class="spinner spinner-info mr-15"></div>
            <div class="spinner spinner-dark mr-15"></div>
        </div>
        <div class="d-flex">
            <div class="spinner spinner-track spinner-primary mr-15"></div>
            <div class="spinner spinner-track spinner-success mr-15"></div>
            <div class="spinner spinner-track spinner-danger mr-15"></div>
            <div class="spinner spinner-track spinner-warning mr-15"></div>
            <div class="spinner spinner-track spinner-info mr-15"></div>
            <div class="spinner spinner-track spinner-dark mr-15"></div>
        </div>
    </div>
</div>



<div class="card-body">
    <div class="example-preview">
        <button type="button" class="btn btn-primary spinner spinner-white spinner-right">
            Primary
        </button>
        <button type="button" class="btn btn-secondary spinner spinner-dark spinner-right">
            Secondary
        </button>
        <button type="button" class="btn btn-light-success spinner spinner-darker-success spinner-left mr-3">
            Success
        </button>
        <button type="button" class="btn btn-outline-danger spinner spinner-darker-danger spinner-left mr-3">
            Danger
        </button>
        
    </div>
</div>




@endsection