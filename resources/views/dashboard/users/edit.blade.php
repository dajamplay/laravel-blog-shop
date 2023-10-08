@extends('dashboard.layouts.main')

@section('title', __('Редактирование пользователя'))

@section('content')

    <x-dashboard.form
        action=" {{ route('dashboard.users.update', $user) }} "
        method="put"
    >

        <x-dashboard.form.input
            :model="$user"
            placeholder="{{__('Введите имя')}}"
            name="first_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.input
            :model="$user"
            placeholder="{{__('Введите фамилию')}}"
            name="last_name"
            icon="fas fa-user"
        />

        <x-dashboard.form.button
            value="{{__('Сохранить изменения')}}"
        />

    </x-dashboard.form>

@endsection
