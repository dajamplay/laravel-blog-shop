@extends('dashboard.layouts.main')

@section('title', __('Пользователи'))

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <x-dashboard.ui.button
                    text="{{__('Создать пользователя')}}"
                    href="{{ route('dashboard.users.create') }}"
                />

                <x-dashboard.table-list
                    :titleFields="[
                        'ID' => 'id',
                        'Имя' => 'first_name',
                        'Фамилия' => 'last_name',
                        'Электронная почта' => 'email',
                    ]"
                    :items="$users"
                    :pagination="true"
                    :extraButtons="true"
                />

            </div>
        </div>
    </div>

@endsection
