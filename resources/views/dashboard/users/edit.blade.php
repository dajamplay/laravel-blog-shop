@extends('dashboard.layouts.main')

@section('title', __('Редактирование пользователя'))

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">

            <x-dashboard.profile.head
                :model="$user"
                :editButton="false"
            />

            <x-dashboard.form action="{{route('dashboard.users.update', $user)}}" method="put" >

                <x-dashboard.form.input
                    label="{{__('Имя')}}"
                    placeholder="{{__('Введите имя')}}"
                    name="first_name"
                    icon="fas fa-user"
                    :model="$user"
                />

                <x-dashboard.form.input
                    label="{{__('Фамилия')}}"
                    placeholder="{{__('Введите фамилию')}}"
                    name="last_name"
                    icon="fas fa-user"
                    :model="$user"
                />

                <x-dashboard.form.button text="{{__('Сохранить изменения')}}" />

            </x-dashboard.form>

        </div>

    </div>
</div>

@endsection
