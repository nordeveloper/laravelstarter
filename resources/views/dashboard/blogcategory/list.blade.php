@extends('dashboard.layouts.main')
 @section('content')
<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-3">
                <h3 class="h3">{{__('Blog Category')}}</h3>
            </div>
            <div class="col-md-9 text-right">
                <p><a class="btn btn-success" href="{{route('blogcategory.create')}}"><i class="fa fa-plus"></i> {{__('Add')}}</a></p>
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
                    Title
                </th>
                <th>
                    Slug
                </th>
                <th>
                    Date created
                 </th>
                 <th>
                    Created by
                 </th>
                <th>
                    Actions
                </th>
            </tr>
            @if(!empty($result))
            @foreach ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>@if($item->active==1) Yes @else no @endif</td>
                <td>{{$item->title}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->created_by}}</td>
                <td>
                    <a href="blogcategory/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                    <form class="action-delete" action="{{ route('blogcategory.destroy', $item->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-remove"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>

</div>
@endsection
