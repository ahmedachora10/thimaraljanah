<x-app-layout>
    <x-dashboard.cards.sample column="col-12">
        <h5 class="font-semibold text-gray-800 leading-tight">
            طلبات ارسال الأموال الى العراق
        </h5>
        <x-dashboard.tables.table1 :columns="['الاسم', 'رقم الهاتف', 'نوع السفر', 'المحافظة', 'جهة السفر', 'تاريخ السفر']">
            @foreach ($requests as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td class="font-bold">{{ $item->phone_number }}</td>
                <td>{{ $item->travel_type }}</td>
                <td>{{ $item->governorate }}</td>
                <td>{{ $item->destination }}</td>
                <td class="font-bold px-6 py-2">{{ $item->travel_date }}</td>
                <td>

                    <x-dashboard.actions.container>
                        <x-show :route="route('reserve-dollar-request.show', $item)" />
                        <x-dashboard.actions.delete :route="route('reserve-dollar-request.destroy', $item)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
            @endforeach
        </x-dashboard.tables.table1>

        <div class="mt-4">
            {{$requests->links()}}
        </div>
    </x-dashboard.cards.sample>
</x-app-layout>
