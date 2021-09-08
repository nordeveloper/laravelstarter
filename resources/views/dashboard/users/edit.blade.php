@extends('dashboard.layouts.main')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/users">Users</a></li>
    <li class="breadcrumb-item active">User edit</li>
</ol>
@endsection 

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('users.index') }}">Back to list</a></p>
    <div class="card">
        <div class="card-header">
            <p class="h4">Edit user: {{$result->name}} {{$result->last_name}}</p>
        </div>
    </div>

    <form class="row form-box" action="{{ route('users.update', $result->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        @method('PATCH')
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Активность
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Sort</label>
                        <input type="text" class="form-control" name="sort" value="{{$result->sort}}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$result->name}}">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$result->last_name}}">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$result->phone}}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$result->email}}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete=off>
                    </div>
                    <div class="form-group">
                        <label>Password comfirmation</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete=off>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit" value="Сохранить">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <div class="form-group image-wrapp">
                         <label>Avtar</label>
                        <div class="item-image">
                            @if($result->image)
                                <img class="img-responsive" src="{{asset('/storage/'. $result->image) }}" alt="{{$result->first_name}}">
                            @endif
                        </div>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select multiple name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach ($roles as $role)
                                {{$selected = ''}}
                                
                                <option  @if( in_array( $role->id, $user_roles ) ) selected @endif  value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>

    </form>


@endsection
