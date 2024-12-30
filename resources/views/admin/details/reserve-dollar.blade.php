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
                    الاسم
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->name}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    رقم الهاتف
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->phone_number}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    المحافظة
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->governorate}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    جهة السفر
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->destination}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    نوع السفر
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->travel_type}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    تاريخ السفر
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->travel_date}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    مكان استلام الدولار
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$request->receive_place}}
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    صورة جواز السفر
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{asset($request->thumbnail('passport_photo'))}}" target="_blank"><i
                            class="bx bx-image text-blue-500 text-lg"></i></a>
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    صورة تذكرة السفر
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{asset($request->thumbnail('ticket_photo'))}}" target="_blank"><i
                            class="bx bx-image text-blue-500 text-lg"></i></a>
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    صورة البطاقة الموحدة من الامام
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{asset($request->thumbnail('card_front_photo'))}}" target="_blank"><i
                            class="bx bx-image text-blue-500 text-lg"></i></a>
                </dd>
            </div>
            <div class="col-md-3 col-sm-4 col-6 py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    صورة بطاقة السكن من الامام
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{asset($request->thumbnail('residence_card_front_photo'))}}" target="_blank"><i
                            class="bx bx-image text-blue-500 text-lg"></i></a>
                </dd>
            </div>
        </dl>
    </x-dashboard.cards.sample>
</x-app-layout>
