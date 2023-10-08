@extends('dashboard.layouts.main')

@section('title', __('Редактирование пользователя'))

@section('content')

    <x-dashboard.form
        action=" {{ route('dashboard.users.update', $user) }} "
        method="put"
    >

        <x-dashboard.form.input
            :value="old('first_name') ?? $user->first_name"
            :message="$message ?? null"
            placeholder="Введите имя"
            name="first_name"
        />

        <x-dashboard.form.input
            :value="old('last_name') ?? $user->last_name"
            :message="$message ?? null"
            placeholder="Фамилию"
            name="last_name"
        />

        <x-dashboard.form.button
            value="Сохранить изменения"
        />

    </x-dashboard.form>

@endsection
