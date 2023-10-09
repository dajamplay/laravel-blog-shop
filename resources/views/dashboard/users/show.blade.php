@extends('dashboard.layouts.main')

@section('title', __('Данные пользователя'))

@section('content')

    <table>
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
        </tr>
    </table>

    @php
        $titlesFields = [
            'ID' => 'id',
            'Имя' => 'first_name',
            'Фамилия' => 'last_name',
            'Электронная почта' => 'email',
        ];
    @endphp

    <x-dashboard.table-list
        :titleFields="$titlesFields"
        :items="[$user]"
        :pagination="false"
        :extraButtons="false"
    />

@endsection
