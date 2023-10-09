@props([
    'items'
])

<div {{ $attributes->merge(['class' => 'mt-2']) }}>
    {{ $items->links() }}
</div>
