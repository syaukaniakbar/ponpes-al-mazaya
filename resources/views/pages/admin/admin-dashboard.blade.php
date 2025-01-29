<x-dashboard-layout>

    <div class="flex flex-wrap mt-6">
        <div class="w-full pr-0 lg:w-1/2 lg:pr-2 h-[420px] max-h-[520px]">

            <p class="flex items-center justify-center pb-3 text-xl font-semibold">
                Total Siswa
            </p>
            <div class="p-6 bg-white min-h-80 xl:h-[455px] xl:max-h-[520px]">
                <canvas id="totalStudent2" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="w-full pl-0 mt-6 lg:w-1/2 lg:pl-2 lg:mt-0">
            <p class="flex items-center justify-center pb-3 text-xl font-semibold">
                Total Siswa
            </p>
            <div class="p-6 bg-white min-h-80">
                <div class="flex items-center">
                    <input
                        type="text"
                        id="yearInput"
                        placeholder="e.g., 2023"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md" />
                    <button
                        id="submitYearButton"
                        class="px-4 py-2 ml-3 text-white bg-green-600 rounded-md hover:bg-green-700">
                        Submit
                    </button>
                </div>
                <canvas id="totalStudent" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</x-dashboard-layout>