@extends('dashboard.layouts.main')
@section('content')

    <h4>Permissions</h4>
    <div class="card">
        <div class="catd-header">
            <p class="card-title"><a class="btn btn-success" href="/dashboard/permission/create">{{__('Add')}}</a></p>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Actions</th>
                </tr>
                @if(!empty($result))
                @foreach ($result as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->add}}</td>
                        <td>{{$item->edit}}</td>
                        <td>{{$item->delete}}</td>
                        <td>
                            <a href="permissions/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                            <form class="action-delete" action="{{ route('permissions.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif

            </table>
        </div>
    </div>

    @if(!empty($result))
    {{$result->links()}}
    @endif
@endsection
