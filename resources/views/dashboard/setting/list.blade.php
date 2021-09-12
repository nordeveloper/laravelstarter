@extends('dashboard.layout.main')
@section('content')

    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h3>{{__('Settings')}}</h3>
                </div>
                <div class="col-md-9 text-right">
                    <p><a class="btn btn-success" href="/dashboard/settings/create">{{__('Add')}}</a></p>
                </div>
            </div>
        </div>

        <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>

        @foreach ($result as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->value}}</td>
            <td>
                <a href="settings/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                <form class="action-delete" action="{{ route('settings.destroy', $item->id)}}" method="post">
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

    <div class="card-footer">
        <div class="row">
            <div class="col-md-2">
                Limit
            </div>
            <div class="col-md-2">
                <select class="form-control" name="sort_count">
                    <option>20</option>
                    <option>30</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                </select>
            </div>
            <div class="col-md-8">
                {{$result->links()}}
            </div>
        </div>
    </div>


@endsection
