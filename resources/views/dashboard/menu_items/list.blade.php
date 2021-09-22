@extends('dashboard.layouts.main')

@section('content')

<div class="card">
<div class="card-header">
    <div class="row">
        <div class="col-md-3">
            <p class="h4">Menu items</p>
        </div>
        <div class="col-md-9 text-right">
            <p><a class="btn btn-success" href="/dashboard/menus/builder/{{$menu_id}}/additem">{{__('Add menu item')}}</a></p>
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
            Active
        </th>
        <th>
        Sort
        </th>
        <th>
        Text menu
        </th>
        <th>
        Code
        </th>
        <th>
            Url
        </th>
        <th>
        Icon
        </th>
        <th>
        Action
        </th>
    </tr>

    @if($result)
    @foreach ($result as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>
        @if($item->active==1)
            Да
        @else
            Нет
        @endif
        </td>
        <td>{{$item->sort}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->code}}</td>
        <td>{{$item->url}}</td>
        <td>{{$item->image}}</td>
        <td>
            <a href="{{route('menus.item_edit', $item->id)}}" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
            <form class="action-delete form-inline" action="{{route('menus.item_remove', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                <input type="hidden" name="menu_id" value="{{$item->menu_id}}">  
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
        </td>

    </tr>
    @endforeach
    @endif

</table>
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
                
            </div>
        </div>
    </div>

</div>
@endsection
