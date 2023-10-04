@extends('layouts.auth')

@section('title', __('Подтверждение почты'))

@section('content')

    <div class="login-box">
        <div class="login-logo"><b>{{ __('Подтверждение почты') }}</b></div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('Подтверждение почты') }}</p>
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p><i class="icon fas fa-check"></i>{{ session('status') }}</p>
                    </div>
                @endif
                <form action="{{ route('verification.send') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('отправить подтверждение почты') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
