@props(['label', 'items'])

<table class="min-w-full divide-y divide-gray-400">
    <thead>
        <tr>
            <th class="py-4 text-left">{{ $label }}</th>
            <th class="py-4 text-right">Count</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-300">
        @foreach($items as $item)
            <tr>
                <td class="py-4 text-sm text-left">{{ $item->value }}</td>
                <td class="py-4 text-sm font-semibold text-right">{{ $item->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
