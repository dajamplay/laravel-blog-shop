@extends('dashboard.layouts.main')

@section('title', __('Пользователи'))

@section('content')

    <table>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td><a href="{{ route('dashboard.users.edit', $user) }}">{{ __('Редактировать') }}</a></td>
                <td><a href="{{ route('dashboard.users.show', $user) }}">{{ __('Подробнее') }}</a></td>
                <td>
                    <form action="{{ route('dashboard.users.destroy', $user) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">{{ __('Удалить') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
