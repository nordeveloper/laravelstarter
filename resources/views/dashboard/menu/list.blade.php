@extends('dashboard.layouts.main')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-3">
                <h3>Menu Builder</h3>
            </div>
            <div class="col-md-9 text-right">
                <p><a class="btn btn-success" href="/dashboard/menus/create">{{__('Add')}}</a></p>
            </div>
        </div>
    </div>

<div class="card-body">
    <table class="table table-bordered table-hover">
        <tr>
            <th>
            ID
            </th>
            <th>
                Name
            </th>
            <th>
                Code
            </th>
            <th>
            Actions
            </th>
        </tr>

        @foreach ($result as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->code}}</td>
            <td>
                <a href="menus/builder/{{$item->id}}" class="btn btn-sm btn-success">
                    <i class="far fa-list-alt"></i>
                </a>
                <a href="menus/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                <form class="action-delete form-inline" action="{{ url('menus/destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
        @endforeach

    </table>
</div>

</div>
@endsection
