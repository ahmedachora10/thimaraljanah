<x-app-layout>
    <x-dashboard.cards.sample column="col-12">
        <dl class="sm:divide-y sm:divide-gray-200 row gap-8">
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    المعرف
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->id}}#
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    المدينة
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->country}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    المبلغ
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-bold">
                    {{$request->amount}}$
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    مصدر الاموال
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->source_of_funds}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    طريقة الدفع
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->payment_method}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    الغرض من المعاملة
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->transaction_purpose}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    معلومات الحساب
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->account_info}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    صورة الإيصال
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{asset($request->thumbnail('attachment'))}}" target="_blank"><i class="bx bx-image text-blue-500 text-lg"></i></a>
                </dd>
            </div>
        </dl>
    </x-dashboard.cards.sample>
</x-app-layout>
