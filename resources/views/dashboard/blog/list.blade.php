@extends('dashboard.layouts.main')

@section('content')

<div class="card">

<div class="card-header">
    <div class="row">
        <div class="col-md-3">
            <h3>{{__('Blog')}}</h3>
        </div>
        <div class="col-md-9 text-right">
            <p><a class="btn btn-success" href="/dashboard/blog/create">{{__('Add')}}</a></p>
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
               Date created
            </th>
            <th>
                Created by
            </th>
            <th>
                Title
            </th>
            <th>
                Image
            </th>
            <th>
                Actions
            </th>
        </tr>

        @foreach ($result as $item)
        <tr>
            <td>
                {{$item->id}}
            </td>
            <td>
                @if($item->active==1) Yes @else no @endif
            </td>
            <td>
                {{$item->sort}}
            </td>
            <td>{{date('d.m.Y', strtotime($item->created_at))}}</td>
            <td>
                @if($item->createdby)
                    {{$item->createdby->name}}
                @endif
            </td>
            <td>
                {{$item->title}}
            </td>
            <td>
               @isset($item->preview_image)
               <div class="item-image">
                <img class="img-responsive" src="{{ asset('/storage/'. $item->preview_image )}}" alt="{{$item->title}}">               
               </div>
               @endisset
            </td>

            <td>
                <a href="blog/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                <form class="action-delete" action="{{ route('blog.destroy', $item->id)}}" method="post">
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
        <div class="row">
            <div class="col-md-1">
                Page size:
            </div>
            <div class="col-md-1">
                <form method="get">
                    <select class="form-control" id="pageSize" name="pageSize">
                        <option value="20" <? if($pageSize==20):?>selected<?endif?>>20</option>
                        <option value="30" <? if($pageSize==30):?>selected<?endif?>>30</option>
                        <option value="50" <? if($pageSize==50):?>selected<?endif?>>50</option>
                        <option value="100" <? if($pageSize==100):?>selected<?endif?>>100</option>
                        <option value="200" <? if($pageSize==200):?>selected<?endif?>>200</option>
                        <option value="500" <? if($pageSize==500):?>selected<?endif?>>500</option>
                    </select>
                </form>
            </div>
            <div class="col-md-7">
                {{$result->links()}}
            </div>
            <div class="col-md-2">
                Count: {{$count}}
            </div>
        </div>
    </div>

</div>
@endsection
