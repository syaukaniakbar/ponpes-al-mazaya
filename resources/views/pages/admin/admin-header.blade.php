<x-dashboard-layout>

    <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-plus mr-3"></i> Monthly Reports
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartOne" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-check mr-3"></i> Resolved Reports
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartTwo" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

</x-dashboard-layout>