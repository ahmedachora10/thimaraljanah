@props(['columns' => []])
<table class="table-auto w-full border-collapse border border-gray-200 rounded-md shadow-sm">
    <thead class="bg-gray-100">
        <tr>
            @foreach ($columns as $col)
            <th class="px-6 py-3 text-start text-sm font-medium text-gray-600 border-b">{{ $col }}</th>

            @endforeach
            <th class="px-6 py-3 text-start text-sm font-medium text-gray-600 border-b">العمليات</th>
        </tr>
    </thead>
    <tbody class="text-start">
        {{$slot}}
    </tbody>
</table>
