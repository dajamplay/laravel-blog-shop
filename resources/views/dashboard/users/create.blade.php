@extends('dashboard.layouts.main')

@section('title', __('Создание пользователя'))

@section('content')

    <x-dashboard.form
        action=" {{ route('dashboard.users.store') }} "
        method="post"
    >

        <x-dashboard.form.input
            placeholder="{{__('Введите имя')}}"
            name="first_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.input
            placeholder="{{__('Введите фамилию')}}"
            name="last_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.input
            placeholder="{{__('Введите электронную почту')}}"
            name="email"
            icon="fas fa-email"
            type="email"
        />

        <x-dashboard.form.input
            placeholder="{{__('Введите пароль')}}"
            name="password"
            icon="fas fa-password"
            type="password"
        />

        <x-dashboard.form.input
            placeholder="{{__('Подтвердите пароль')}}"
            name="password_confirmation"
            icon="fas fa-password"
            type="password"
        />

        <x-dashboard.form.button
            value="{{__('Сохранить изменения')}}"
        />

    </x-dashboard.form>

@endsection
