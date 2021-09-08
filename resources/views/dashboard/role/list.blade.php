@extends('dashboard.layouts.main')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/roles">Roles</a></li>
    <li class="breadcrumb-item active">Roles</li>
</ol>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h3>{{__('Roles')}}</h3>
                </div>
                <div class="col-md-9 text-right">
                    <p><a class="btn btn-success" href="/dashboard/roles/create">{{__('Add')}}</a></p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>

                @foreach ($result as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="roles/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <form class="action-delete" action="{{ route('roles.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>

        <div class="card-footer">
            {{$result->links()}}
        </div>
    </div>

@endsection
