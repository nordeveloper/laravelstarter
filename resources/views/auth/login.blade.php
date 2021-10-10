@extends('layouts.main')
@section('content')  

@if ($errors->has('email'))
<span class="help-block text-danger">
    <strong>{{ $errors->first('email') }}</strong>
</span>
@endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="">{{__('Email')}}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="">{{__('Password')}}</label>
                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-success">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

@endsection                
