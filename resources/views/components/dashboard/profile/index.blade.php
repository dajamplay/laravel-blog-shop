@props([
    'model' => null,
    'titleFields' => []
])

<x-dashboard.profile.head
    fistName="{{ $model->first_name }}"
    lastName="{{ $model->last_name }}"
    email="{{ $model->email }}"
/>

<x-dashboard.profile.info
    :model="$model"
    :titleFields="$titleFields"
/>

