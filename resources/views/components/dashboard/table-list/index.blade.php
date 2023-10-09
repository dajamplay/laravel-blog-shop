@props([
    'titleFields' => [],
    'items',
    'pagination' => false,
    'extraButtons' => false
])

@if(empty($items))
    <h2>Нет данных</h2>
@else

    <table {{ $attributes->merge(['class' => 'table table-hover text-nowrap']) }}>

        <x-dashboard.table-list.thead :titles="array_keys($titleFields)" :extraButtons="$extraButtons"/>

        <x-dashboard.table-list.tbody>
            @foreach($items as $item)
                <x-dashboard.table-list.tr>
                    @foreach($titleFields as $field)
                        <x-dashboard.table-list.td>
                            {{ $item?->$field }}
                        </x-dashboard.table-list.td>
                    @endforeach
                        @if($extraButtons === true)
                            <x-dashboard.table-list.td>
                                <x-dashboard.table-list.extrabuttons
                                    :item="$item"
                                />
                            </x-dashboard.table-list.td>
                        @endif
                </x-dashboard.table-list.tr>
            @endforeach
        </x-dashboard.table-list.tbody>

    </table>

    @if($pagination === true)
        <x-dashboard.table-list.pagination
            :items="$items"
        />
    @endif

@endif


