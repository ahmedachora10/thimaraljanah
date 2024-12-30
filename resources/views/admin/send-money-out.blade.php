<x-app-layout>
    <x-dashboard.cards.sample column="col-12">
            <h5 class="font-semibold text-gray-800 leading-tight">
                طلبات ارسال الأموال الى خارج العراق
            </h5>
            <x-dashboard.tables.table1
                :columns="['المدينة', 'المبلغ', 'مصدر الاموال', 'طريقة الدفع']">
                @foreach ($requests as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->country }}</td>
                    <td class="font-bold px-6 py-2">${{ $item->amount }}</td>
                    <td>{{ $item->source_of_funds }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>
                        <x-dashboard.actions.container>
                            <x-show :route="route('send-money-out.show', $item)" />
                            <x-dashboard.actions.delete :route="route('send-money-out.destroy', $item)" />
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
