<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 shadow-md h-screen flex flex-col bg-white">
        <div class="p-4">
            <h1 class="font-bold text-lg">Menu</h1>
        </div>
        <hr>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ url('/') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Arsip Surat</a>
            <a href="{{ url('/kategori') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Kategori Surat</a>
            <a href="{{ url('/about') }}" class="block px-4 py-2 rounded hover:bg-gray-200">About</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="main-content flex-1">
        <div class="judul-halaman p-6">
            <h1 class="text-xl font-bold">@yield('judul-halaman')</h1>
            <p class="text-gray-600">@yield('deskripsi-halaman')</p>
        </div>

        <div class="content mt-6">
            @yield('content-halaman')
        </div>

        <!-- Modal -->

        <!-- Modal Konfirmasi Hapus -->
        <div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
                <p class="mb-4">Apakah kamu yakin ingin menghapus data ini?</p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-2">
                        <button type="button"
                            onclick="closeDeleteModal()"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded">
                            Ya, Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
    </main>


    <script>
        function openDeleteModal(actionUrl) {
            const form = document.getElementById('deleteForm');
            form.action = actionUrl; // set URL sesuai tombol yang diklik
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

    <!-- Script untuk update nama file -->




</body>
</html>
