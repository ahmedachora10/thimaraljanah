<x-app-layout>

    <div class="row">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.cards.user-info title="طلبات خارج العراق" :count="$outOfIraqCount" icon="bx bx-package" />
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.cards.user-info color="info" title="طلبات في العراق" :count="$toIraqCount"
                        icon="bx bx-package" />
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3">
                    <x-dashboard.cards.user-info color="danger" title="طلبات تحويل الدولار" :count="$reseveDollarCount"
                        icon="bx bx-dollar" />
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3">
                    <x-dashboard.cards.user-info color="warning" title="طلبات المعدلة" :count="$modifyRequests"
                        icon="bx bx-package" />
                </div>
        </div>
    </div>
</x-app-layout>
