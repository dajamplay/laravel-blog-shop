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

@endsection
