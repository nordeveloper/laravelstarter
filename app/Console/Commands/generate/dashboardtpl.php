<?php

namespace App\Console\Commands\generate;

use Illuminate\Console\Command;

class Dashboardtpl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:dashboardtpl {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Created add edit list dashboard template';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'Making views in resources/views/dashboard/'.$this->argument('name');
        $name = $this->argument('name');
        mkdir('resources/views/dashboard/'.$name);

        //list view
        $content = "@extends('dashboard.layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="h3">{{__(\''.$name.'\')}}</h3>
                    </div>
                    <div class="col-md-9 text-right">
                        <p><a class="btn btn-success" href="/dashboard/'.$name.'/create">{{__(\'Add\')}}</a></p>
                    </div>
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
                   Date created
                </th>
                <th>
                   Created by
                </th>
                <th>
                    Title
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @if($result)
            @foreach ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>@if($item->active==1) Yes @else no @endif</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->created_by}}</td>
                <td>{{$item->title}}</td>
                <td>
                    <a href="'.$name.'/{{$item->id}}/edit" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                    <form class="action-delete" action="{{ route(\''.$name.'.destroy\', $item->id)}}" method="post">
                          @csrf
                          @method(\'DELETE\')
                        <button type="submit" class="btn btn-danger btn-sm btn-remove"><i class="far fa-trash-alt"></i></button>
                    </form>                
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/dashboard/'.$name.'/list.blade.php', $content);


        //add
        $content = "@extends('dashboard.layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
        <div class="card-header">
            <p class="h4">{{__(\'Add '.$name.'\')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route(\''.$name.'.store\')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="500">
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="">
        </div>
    
        <div class="form-group">
            <label>Alias(slug)</label>
            <input type="text" class="form-control" name="slug" value="">
        </div>
    
        <div class="form-group">
            <label>Preview image</label><br>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
        <label>Anonce text</label>
            <textarea name="preview_text" class="form-control" cols="30" rows="6"></textarea>
        </div>
    
        <div class="form-group">
            <label>Detail image</label>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
        <label>Dertail text</label>
            <textarea name="detail_text" class="form-control" cols="30" rows="6"></textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title" value="">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2"></textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/dashboard/'.$name.'/add.blade.php', $content);


        //edit
        $content = "@extends('dashboard.layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
        <div class="card-header">
            <p class="h4">{{__(\'Edit\')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route(\''.$name.'.index\') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route(\''.$name.'.update\', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method(\'PATCH\')
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="{{$result->sort}}">
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$result->title}}">
        </div>
    
        <div class="form-group">
            <label>Alias (slug)</label>
            <input type="text" class="form-control" name="slug" value="{{$result->slug}}">
        </div>
    
        <div class="form-group">    
        @isset($result->preview_image)
            <img class="img-responsive" src="{{ asset(\'/storage/\'. $result->preview_image )}}" alt=""><br>
        @endisset
    
            <label>Preview image</label><br>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
            <label>Preview text</label>
            <textarea name="preview_text" class="form-control" cols="30" rows="6">{{$result->preview_text}}</textarea>
        </div>
    
        <div class="form-group">
    
        @isset($result->detail_image)
            <img class="img-responsive" src="{{ asset(\'/storage/\'. $result->detail_image )}}" alt=""><br>
        @endisset
    
            <label>Detail image</label>
            <input type="file" name="detail_image">
        </div>
    
        <div class="form-group">
        <label>Detail text</label>
            <textarea name="detail_text" class="form-control" cols="30" rows="6">{{$result->detail_text}}</textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$result->meta_title}}">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="{{$result->meta_description}}">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2">{{$result->meta_keywords}}</textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/dashboard/'.$name.'/edit.blade.php', $content);

    }
}
