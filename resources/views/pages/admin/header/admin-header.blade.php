<x-dashboard-layout>

    @section('title', 'Dashboard Blog | Ponpes Al-Mazaya')


    <div class="w-full mt-12">
        <a href="{{ route('header.create') }}">
            <button class="p-3 text-white bg-green-600 rounded">
                Tambah Banner
            </button>
        </a>
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
        <p class="flex items-center p-5 text-xl ">
            Al-Mazaya Blog
        </p>
        <div class="overflow-auto bg-white">
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Image</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Title</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Description</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($headers as $key => $header)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $headers->firstItem() + $key }}</td>
                        @if ($header->image_url)
                        <td class="px-4 py-3">
                            <img src="{{ asset('storage/' . $header->image_url) }}" alt="Blog Image" class="object-cover w-16 h-16">
                        </td>
                        @endif
                        <td class="px-4 py-3">{{ $header->title }}</td>
                        <td>
                            <p class= "text-lg mt-1">
                                {{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($header->description)), 100) . '!!' }}
                            </p>    
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('blog.edit', $header->id) }}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                Edit
                            </a>
                            <form action="{{ route('blog.delete', $header->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="w-full p-2 text-white bg-red-600 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="items-center py-10 text-center">No records found!</td>
                    </tr>
                    @endforelse
                    <!-- Pagination -->
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="flex justify-center p-10 mt-6">
                <div class="flex items-center space-x-2">
                    {{ $headers->links('pagination::tailwind') }}
                </div>
            </div>
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
            <span>{{ session('success') }}</span>
        </div>

        @endif
    </div>

</x-dashboard-layout>