@extends('dashboard.layouts.main')
@section('content')

    <h4>Permissions</h4>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h3>{{__('Roles')}}</h3>
                </div>
                <div class="col-md-9 text-right">
                    <p><a class="btn btn-success" href="/dashboard/permission/create">{{__('Add')}}</a></p>
                </div>
            </div>
        </div>

        <div class="card-body">
        
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Read</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Actions</th>
                </tr>
                @if(!empty($result))
                @foreach ($result as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->read}}</td>
                        <td>{{$item->add}}</td>
                        <td>{{$item->edit}}</td>
                        <td>{{$item->delete}}</td>
                        <td>
                            <a href="permission/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                            <form class="action-delete" action="{{ route('permission.destroy', $item->id)}}" method="post">
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
    {{-- {{$result->links()}} --}}
    @endif
@endsection
