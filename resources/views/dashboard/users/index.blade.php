@extends('dashboard.layouts.main')

@section('title', __('Пользователи'))

@section('content')

    <x-dashboard.ui.button
        value="{{__('Создать пользователя')}}"
        link="{{ route('dashboard.users.create') }}"
    />

    <table>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
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

    <div class="mt-2">
        {{ $users->links() }}
    </div>

@endsection
