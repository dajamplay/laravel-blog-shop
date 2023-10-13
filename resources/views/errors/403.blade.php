@extends('errors::minimal')

@section('title', __('Запрещенный ресурс'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Запрещенный ресурс'))
