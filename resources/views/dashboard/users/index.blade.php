@extends('dashboard.layouts.main')

@section('title', __('Index'))

@section('content')

    <h1>Index</h1>
    <table>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
            </tr>
        @endforeach
    </table>
@endsection
