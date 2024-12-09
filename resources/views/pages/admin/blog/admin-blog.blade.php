<x-dashboard-layout>
    <div class="w-full mt-12">
        <a href="{{ route('blog.create') }}">
            <button class="bg-green-600 text-white p-3 rounded">
                Tambah Blog
            </button>
        </a>

        <p class=" text-xl p-5 flex items-center">
            Al-Mazaya Blog
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full table-auto bg-white">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">ID</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Image</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Title</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Description</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Category</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Date</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                    <tr class="border-b cursor-pointer" onclick="openModal({{ $blog->id }})">
                        <td class="py-3 px-4">{{ $blog->id }}</td>
                        <td class="py-3 px-4">
                            <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image" class="w-16 h-16 object-cover">
                        </td>
                        <td class="py-3 px-4">{{ $blog->title }}</td>
                        <td class="py-3 px-4">{{ Str::limit($blog->description, 100) }}</td>
                        <td class="py-3 px-4">{{ ucfirst($blog->category) }}</td>
                        <td class="py-3 px-4">{{ $blog->created_at->format('d/m/Y') }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('blog.edit', $blog->id) }}" class="text-white w-full bg-blue-600 rounded p-2 mb-2 text-center block">
                                Edit
                            </a>
                            <form action="{{ route('blog.delete', $blog->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white w-full bg-red-600 rounded p-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center py-3">
                        <td colspan="7">No records found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Showing Blog Details -->
    <div id="blogDetailModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full hidden">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-4xl">
            <div class="flex justify-end p-2">
                <button onclick="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div id="blogDetailContent" class="p-6 pt-0 text-center">
                <!-- Blog Details will be inserted here dynamically -->
            </div>
        </div>
    </div>

    <script>
        function openModal(blogId) {
            fetch(`/blog/detail/${blogId}`)
                .then(response => response.json())
                .then(data => {
                    const modalContent = document.getElementById('blogDetailContent');
                    modalContent.innerHTML = `
                        <h2 class="text-2xl font-bold">${data.title}</h2>
                        <img src="${data.image_url}" alt="Blog Image" class="w-32 h-32 object-cover mt-4 mb-4">
                        <p><strong>Category:</strong> ${data.category}</p>
                        <p><strong>Description:</strong> ${data.description}</p>
                        <p><strong>Created at:</strong> ${data.created_at}</p>
                    `;
                    document.getElementById('blogDetailModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error("Error fetching blog details:", error);
                });
        }

        function closeModal() {
            document.getElementById('blogDetailModal').classList.add('hidden');
        }
    </script>
</x-dashboard-layout>