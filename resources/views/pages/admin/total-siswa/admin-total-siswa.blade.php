<x-dashboard-layout>
    <div class="w-full mt-12">
        <a href="{{ route('total-siswa.create') }}">
            <button class="p-3 text-white bg-green-600 rounded">
                Tambah total siswa
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
            Al-Mazaya Total Siswa
        </p>
        <div class="overflow-auto bg-white">
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tingkatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Tahun</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Date</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($navLinks as $key => $navLink)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $navLink->id }}</td>
                        <td class="px-4 py-3">{{ $navLink->tingkatan }}</td>
                        <td class="px-4 py-3">{{ $navLink->tahun }}</td>
                        <td class="px-4 py-3">{{ $navLink->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('total-siswa.edit', $navLink->id) }}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                Edit
                            </a>
                            <form action="{{ route('total-siswa.delete', $navLink->id) }}" method="post">
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
                    {{ $navLinks->links('pagination::tailwind') }}
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

    <!-- Modal for Showing nav_link Details -->
    <div id="navLinkDetailModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-900 bg-opacity-60">
        <div class="relative max-w-4xl mx-auto bg-white rounded-lg shadow-xl top-20">
            <!-- Close Button -->
            <div class="flex justify-end p-4">
                <button onclick="closeModal()" class="inline-flex items-center p-2 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- nav_link Detail Content -->
            <div id="navLinkDetailContent" class="p-8 mb-12 text-center">
                <!-- nav_link Details will be inserted here dynamically -->
            </div>
        </div>
    </div>


    <script>
        function openModal($navLinkId) {
            fetch(`/nav_link/detail/${$navLinkId}`)
                .then(response => response.json())
                .then(data => {
                    const modalContent = document.getElementById('navLinkDetailContent');
                    modalContent.innerHTML = `
                        <h2 class="text-2xl font-bold">${data.name}</h2>
                        <p class="text-justify" ><strong>Content:</strong> ${data.content}</p>
                        <p><strong>Created at:</strong> ${data.created_at}</p>
                    `;
                    document.getElementById('navLinkDetailModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error("Error fetching nav_link details:", error);
                });
        }

        function closeModal() {
            document.getElementById('navLinkDetailModal').classList.add('hidden');
        }
    </script>
</x-dashboard-layout>