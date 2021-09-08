@extends('dashboard.layouts.main')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Users</li>
</ol>
@endsection                    

@section('content')
<div class="card">

<div class="card-header">
    <div class="row">
        <div class="col-md-3">
            <h3>{{__('Users')}}</h3>
        </div>
        <div class="col-md-9 text-right">
            <p><a class="btn btn-success" href="/dashboard/users/create">Add user</a></p>
        </div>
    </div>
</div>

<div class="card-body">

<table class="table table-bordered table-hover">
    <tr>
        <th>ID</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Name</th>
        <th>Last name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    @foreach ($result as $item)
    <tr>
        <td>
            {{$item->id}}
        </td>

        <td>{{date('d.m.Y', strtotime($item->created_at))}}</td>
        
        <td>{{date('d.m.Y', strtotime($item->updated_at))}}</td>

        <td>
            {{$item->name}}
        </td>

        <td>
            {{$item->last_name}}
        </td>

        <td>
            {{$item->phone}}
        </td>

        <td>
            {{$item->email}}
        </td>

        <td>
        <a class="btn btn-sm btn-info" href="users/{{$item->id}}/edit"><i class="fa fa-edit"></i></a>
        <form class="action-delete" action="{{ route('users.destroy', $item->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
</div>

{{$result->links()}}
</div>
@endsection
