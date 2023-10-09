@extends('dashboard.layouts.main')

@section('title', __('Создание пользователя'))

@section('content')

    <x-dashboard.form action="{{route('dashboard.users.store')}}" method="post">

        <x-dashboard.form.input
            label="{{__('Имя')}}"
            placeholder="{{__('Введите имя')}}"
            name="first_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.input
            label="{{__('Фамилия')}}"
            placeholder="{{__('Введите фамилию')}}"
            name="last_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.input
            label="{{__('Электронная почта')}}"
            placeholder="{{__('Введите электронную почту')}}"
            name="email"
            icon="fas fa-at"
            type="email"
        />

        <x-dashboard.form.input
            label="{{__('Пароль')}}"
            placeholder="{{__('Введите пароль')}}"
            name="password"
            icon="fas fa-unlock-alt"
            type="password"
        />

        <x-dashboard.form.input
            label="{{__('Подтверждение пароля')}}"
            placeholder="{{__('Подтвердите пароль')}}"
            name="password_confirmation"
            icon="fas fa-unlock-alt"
            type="password"
        />

        <x-dashboard.form.button
            text="{{__('Создать')}}"
        />

    </x-dashboard.form>

@endsection
