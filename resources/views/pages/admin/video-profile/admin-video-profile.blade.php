<x-dashboard-layout>

    @section('title', 'Video Profile | Ponpes Al-Mazaya')

    <div class="w-full mt-12">
        @if(session('success'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-3 text-sm text-green-800 bg-green-100 border border-green-300 rounded-md shadow-lg top-24 right-5"
            role="alert">
            <!-- Icon -->
            <svg class="w-5 h-5 text-green-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            <!-- Message -->
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <p class="flex items-center text-xl mb-4">
            Al-Mazaya Video Profile
        </p>

        <a href="{{route('video.create')}}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah URL</a>

        <div class="overflow-auto bg-white mt-4">
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">URL</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($video)
                        <tr class="border-b">
                            <td class="px-4 py-3 text-center">1</td>
                            <td class="px-4 py-3">
                                <a href="{{ $video->url }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $video->url }}
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('video.edit', $video->id) }}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full p-2 mb-2 text-center text-white bg-red-600 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" class="py-10 text-center">No records found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if(session('error'))
            <div x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-3 text-sm text-green-800 bg-green-100 border border-green-300 rounded-md shadow-lg top-24 right-5"
                role="alert">
                <!-- Icon -->
                <svg class="w-5 h-5 text-green-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                </svg>
                <!-- Message -->
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

</x-dashboard-layout>
