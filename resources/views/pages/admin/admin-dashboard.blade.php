<x-dashboard-layout>

    <div class="flex flex-wrap mt-6">
        <div class="w-full pr-0 lg:w-1/2 lg:pr-2">
            <p class="flex items-center pb-3 text-xl">
                <i class="mr-3"></i> Total Siswa
            </p>
            <div class="p-6 bg-white min-h-80">
                <label for="yearInput">Enter Year:</label>
                <input type="text" id="yearInput" placeholder="e.g., 2023" />
                <button id="submitYearButton" class="px-3 py-2 ml-3 text-white bg-green-600">Submit</button>
                <canvas id="totalStudent" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="w-full pl-0 mt-12 lg:w-1/2 lg:pl-2 lg:mt-0">
            <p class="flex items-center pb-3 text-xl">
                <i class="mr-3"></i> Total Siswa
            </p>
            <div class="p-6 bg-white min-h-80">
                <canvas id="totalStudent2" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

</x-dashboard-layout>