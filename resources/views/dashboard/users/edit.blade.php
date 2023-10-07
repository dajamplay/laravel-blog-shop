@extends('dashboard.layouts.main')

@section('title', __('Редактирование пользователя'))

@section('content')

    <form action=" {{ route('dashboard.users.update', $user) }} " method="post">
        @csrf
        @method('put')
{{--        <div class="input-group mb-3">--}}
{{--            <input name="email" type="email" class="form-control @error("email") border-danger @enderror"--}}
{{--                   placeholder="{{ __('Электронная почта') }}" value="{{old('email') ?? $user->email}}">--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text @error("email") border-danger @enderror">--}}
{{--                    <span class="fas fa-envelope"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @error("email")--}}
{{--        <p class="text-danger">{{ $message }}</p>--}}
{{--        @enderror--}}
        <div class="input-group mb-3">
            <input name="first_name" type="text"
                   class="form-control @error("first_name") border-danger @enderror"
                   placeholder="{{ __('Имя') }}" value="{{old('first_name') ?? $user->first_name}}">
            <div class="input-group-append">
                <div class="input-group-text @error("first_name") border-danger @enderror">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        @error("first_name")
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="input-group mb-3">
            <input name="last_name" type="text"
                   class="form-control @error("last_name") border-danger @enderror"
                   placeholder="{{ __('Фамилия') }}" value="{{old('last_name') ?? $user->last_name}}">
            <div class="input-group-append">
                <div class="input-group-text @error("last_name") border-danger @enderror">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        @error("last_name")
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="row">
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Сохранить изменения') }}</button>
            </div>
        </div>
    </form>

@endsection
