<x-app-layout>

    <x-dashboard.cards.sample column="col-12">
        <h5 class="font-semibold text-gray-800 leading-tight">
            طلبات ارسال الأموال الى العراق
        </h5>
        <x-dashboard.tables.table1
            :columns="['العملة', 'المبلغ', 'اسم المستلم', 'اسم المرسل', 'جهة التحويل', 'IP']">
            @foreach ($requests as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->currency }}</td>
                <td class="font-bold px-6 py-2">${{ $item->amount }}</td>
                <td>{{ $item->recipient_name }}</td>
                <td>{{ $item->sender_name }}</td>
                <td>{{ $item->location }}</td>
                <td class="fw-bold text-danger">{{ $item->ip }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-show :route="route('send-money-to-iraq.show', $item)" />
                        <x-dashboard.actions.delete :route="route('send-money-to-iraq.destroy', $item)" />
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
