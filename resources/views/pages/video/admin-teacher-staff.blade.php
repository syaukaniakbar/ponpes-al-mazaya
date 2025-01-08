<x-dashboard-layout>

    @section('title', 'Dashboard Blog | Ponpes Al-Mazaya')


    <div class="w-full mt-12">
        <a href="{{ route('teacher-staff.create') }}">
            <button class="p-3 text-white bg-green-600 rounded">
                Tambah Guru/Staf
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
            Al-Mazaya Guru dan Staf
        </p>
        <div class="overflow-auto bg-white">
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="text-white bg-gray-800">
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Image</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teacherStaffs as $key => $teacherStaff)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $teacherStaffs->firstItem() + $key }}</td>
                        <td class="px-4 py-3">
                            @if ($teacherStaff->image_path)
                            <img src="{{ asset('storage/' . $teacherStaff->image_path) }}" alt="Teacher/Staff Image" class="object-cover w-16 h-16 rounded">
                            @else
                            <p class="text-gray-500">No Image</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $teacherStaff->name }}</td>
                        <td class="px-4 py-3">{{ $teacherStaff->phone ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('teacher-staff.edit', $teacherStaff->id) }}" class="block w-full p-2 mb-2 text-center text-white bg-blue-600 rounded">
                                Edit
                            </a>
                            <form action="{{ route('teacher-staff.delete', $teacherStaff->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full p-2 text-white bg-red-600 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center">No records found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="flex justify-center p-10 mt-6">
                <div class="flex items-center space-x-2">
                    {{ $teacherStaffs->links('pagination::tailwind') }}
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
            <span>{{ session('error') }}</span>
        </div>
        @endif
    </div>

    <!-- Modal for Showing Blog Details -->
    <div id="teacherStaffDetailModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-900 bg-opacity-60">
        <div class="relative max-w-4xl mx-auto bg-white rounded-lg shadow-xl top-20">
            <!-- Close Button -->
            <div class="flex justify-end p-4">
                <button onclick="closeModal()" class="inline-flex items-center p-2 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Blog Detail Content -->
            <div id="teacherStaffDetailContent" class="p-8 mb-12 text-center">
                <!-- Blog Details will be inserted here dynamically -->
            </div>
        </div>
    </div>


    <script>
        async function openModal(teacherStaffId) {
            try {
                // Fetch data dari server
                const response = await fetch(`/teacherStaff/detail/${teacherStaffId}`);
                const data = await response.json();

                // Menampilkan data di modal
                const modalContent = document.getElementById('teacherStaffDetailContent');
                modalContent.innerHTML = `
                    <div class="max-w-4xl mx-auto my-8 overflow-hidden bg-white rounded-lg shadow-lg">
                        <!-- Judul -->
                        <div class="p-6 border-b">
                            <h2 class="text-3xl font-bold text-gray-800">${data.title}</h2>
                        </div>

                        <!-- Gambar -->
                        <div class="flex justify-center">
                            <div class="w-full max-w-3xl overflow-hidden h-96">
                                <img 
                                    src="${data.image_url}" 
                                    alt="Blog Image" 
                                    class="object-cover w-full h-full border">
                            </div>
                        </div>

                        <!-- Informasi Blog -->
                        <div class="p-6 space-y-4">
                            <p class="text-sm text-gray-500">
                                <strong>Category:</strong> 
                                <span class="text-gray-700">${data.category}</span>
                            </p>
                            <p class="text-sm text-gray-500">
                                <strong>Created at:</strong> 
                                <span class="text-gray-700">${data.created_at}</span>
                            </p>

                            <div class="leading-relaxed text-justify text-gray-700">
                                <strong>Description:</strong>
                                <p>${data.description}</p>
                            </div>
                        </div>
                    </div>
                `;
                document.getElementById('teacherStaffDetailModal').classList.remove('hidden');
            } catch (error) {
                console.error("Error fetching teacherStaff details:", error);
            }
        }

        function closeModal() {
            document.getElementById('teacherStaffDetailModal').classList.add('hidden');
        }
    </script>
</x-dashboard-layout>