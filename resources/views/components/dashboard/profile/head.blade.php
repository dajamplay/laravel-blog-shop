@props([
    'fullName' => 'не указано',
    'email' => 'не указано',
])

<div class="card card-primary card-outline">

    <div class="card-body box-profile">

        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/img/avatars/avatar4.png') }}" alt="{{__('Аватар пользователя')}}">
        </div>

        <h3 class="profile-username text-center">{{ $fullName }}</h3>

        <p class="text-muted text-center">{{ $email }}</p>


    </div>

</div>
