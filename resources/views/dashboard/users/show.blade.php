@extends('dashboard.layouts.main')

@section('title', __('Профиль пользователя'))

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">

                <x-dashboard.profile

                    :model="$user"

                    :titleFields="[
                        'ID' => 'id',
                        'Имя' => 'first_name',
                        'Фамилия' => 'last_name',
                        'Электронная почта' => 'email',
                    ]">

                </x-dashboard.profile>

            </div>

        </div>

    </div>

@endsection
