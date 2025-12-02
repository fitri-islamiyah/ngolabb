<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Buat Proyek Baru
                        </h2>
                        <p class="text-gray-200 mt-1">Mulai proyek baru dan kelola tim Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 bg-red-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-red-400 animate-slideIn">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold mb-2">Terdapat kesalahan pada form:</h3>
                            <ul class="space-y-1">
                                @foreach($errors->all() as $error)
                                    <li class="flex items-start">
                                        <span class="mr-2">•</span>
                                        <span>{{ $error }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Informasi Proyek</h3>
                            <p class="text-white text-opacity-90">Lengkapi detail proyek Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('projects.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf

                    <!-- Nama Proyek -->
                    <div>
                        <label for="nama" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Nama Proyek
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#7965C1] group-focus-within:text-[#483AA0] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <input type="text" 
                                   id="nama"
                                   name="nama" 
                                   value="{{ old('nama') }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white"
                                   placeholder="Masukkan nama proyek Anda"
                                   required>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Berikan nama yang deskriptif untuk proyek Anda</p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Deskripsi Proyek
                        </label>
                        <div class="relative group">
                            <div class="absolute top-4 left-4 pointer-events-none">
                                <svg class="h-5 w-5 text-[#7965C1] group-focus-within:text-[#483AA0] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <textarea id="deskripsi"
                                      name="deskripsi" 
                                      rows="5"
                                      class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white resize-none"
                                      placeholder="Jelaskan tujuan dan detail proyek Anda...">{{ old('deskripsi') }}</textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Opsional - Tambahkan deskripsi untuk memberikan konteks lebih pada proyek</p>
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Deadline Proyek
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#7965C1] group-focus-within:text-[#483AA0] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="date" 
                                   id="deadline"
                                   name="deadline" 
                                   value="{{ old('deadline') }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white">
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Opsional - Tentukan batas waktu penyelesaian proyek</p>
                    </div>

                    <!-- Divider -->
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-4 text-sm text-gray-500">Konfirmasi</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between space-x-4">
                        <a href="{{ route('projects.index') }}" 
                           class="flex-1 flex items-center justify-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-semibold transition-all duration-200 border-2 border-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span>Batal</span>
                        </a>
                        
                        <button type="submit" 
                                class="flex-1 flex items-center justify-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Buat Proyek</span>
                        </button>
                    </div>

                    <!-- Info Box -->
                    <div class="mt-6 bg-gradient-to-r from-blue-50 to-purple-50 border-l-4 border-[#7965C1] p-4 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-[#7965C1] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="font-semibold text-[#0E2148] mb-1">Informasi</h4>
                                <p class="text-sm text-gray-700">
                                    Setelah proyek dibuat, Anda akan otomatis menjadi leader proyek dan dapat menambahkan anggota tim serta mengelola tugas.
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Help Section -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl border border-white border-opacity-20">
                    <div class="flex items-center space-x-3 text-white">
                        <svg class="w-8 h-8 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="font-semibold">Nama Jelas</p>
                            <p class="text-sm text-gray-200">Gunakan nama yang mudah diingat</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl border border-white border-opacity-20">
                    <div class="flex items-center space-x-3 text-white">
                        <svg class="w-8 h-8 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <div>
                            <p class="font-semibold">Detail Lengkap</p>
                            <p class="text-sm text-gray-200">Tambahkan deskripsi yang jelas</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl border border-white border-opacity-20">
                    <div class="flex items-center space-x-3 text-white">
                        <svg class="w-8 h-8 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <p class="font-semibold">Set Deadline</p>
                            <p class="text-sm text-gray-200">Tentukan target waktu selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-slideIn {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</x-app-layout>