@extends('dashboard.layouts.main')

@section('content')

    <p><a class="btn btn-info btn-xs" href="{{ route('users.index') }}">Назад к списоку </a></p>

    <div class="card">
        <div class="card-header">
            <p class="h4">Добавление пользователя</p>
        </div>
    </div>

    <form class="row form-box" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="active" value="1"> Активность
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Sort</label>
                        <input type="text" class="form-control" name="sort" value="500">
                    </div>
                    <div class="form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label>{{__('Last Name')}}</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>

                    <div class="form-group">
                        <label>Email *</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                    </div>

                    <div class="form-group">
                        <label>Пароль *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    </div>

                    <div class="form-group">
                        <label>Павторить пароль *</label>
                        <input type="password" class="form-control @error('comfirm_password') is-invalid @enderror" name="comfirm_password">
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
                    <div class="form-group">
                        <label>Role *</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value=""></option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>

@endsection
