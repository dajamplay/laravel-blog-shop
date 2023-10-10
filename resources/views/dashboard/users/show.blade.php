@extends('dashboard.layouts.main')

@section('title', __('Профиль пользователя'))

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <x-dashboard.profile>

                    <x-dashboard.profile.head
                        fullName="{{ $user->full_name }}"
                        email="{{ $user->email }}"
                    />

                    <x-dashboard.profile.info
                        :model="$user"
                        :titleFields="[
                            'ID' => 'id',
                            'Имя' => 'first_name',
                            'Фамилия' => 'last_name',
                            'Электронная почта' => 'email',
                        ]"
                    />

                </x-dashboard.profile>

            </div>
        </div>
    </div>

@endsection
