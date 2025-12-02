<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profil
                        </h2>
                        <p class="text-gray-200 mt-1">Perbarui informasi akun Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-green-400 animate-slideIn flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Edit Profile Form Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold text-xl">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Informasi Akun</h3>
                            <p class="text-white text-opacity-90">Update data profil Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('profile.update') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Info Display -->
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-5 rounded-xl border-l-4 border-[#7965C1]">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-[#7965C1] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="font-semibold text-[#0E2148] mb-1">Informasi Penting</h4>
                                <p class="text-sm text-gray-700">
                                    Pastikan informasi yang Anda masukkan akurat. Email akan digunakan untuk notifikasi dan komunikasi sistem.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Nama Lengkap
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#7965C1] group-focus-within:text-[#483AA0] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" 
                                   id="name"
                                   name="name" 
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white"
                                   placeholder="Masukkan nama lengkap Anda"
                                   required>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Nama akan ditampilkan di seluruh sistem</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email Address
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#7965C1] group-focus-within:text-[#483AA0] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" 
                                   id="email"
                                   name="email" 
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white"
                                   placeholder="email@example.com"
                                   required>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Gunakan email yang valid dan aktif</p>
                    </div>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-gray-200"></div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('profile.show') }}" 
                           class="inline-flex items-center space-x-2 text-gray-600 hover:text-gray-800 font-semibold transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Batal</span>
                        </a>

                        <button type="submit" 
                                class="inline-flex items-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>

                    <!-- Security Notice -->
                    <div class="mt-6 bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 p-4 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="font-semibold text-yellow-800 mb-1">⚠️ Perhatian</h4>
                                <p class="text-sm text-yellow-700">
                                    Jika Anda mengubah email, pastikan email tersebut dapat diakses untuk verifikasi akun. Untuk mengubah password, gunakan menu "Ganti Password".
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 border border-white border-opacity-20">
                    <div class="flex items-center space-x-3 text-white">
                        <svg class="w-10 h-10 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-lg">Data Aman</p>
                            <p class="text-sm text-gray-200">Informasi terenkripsi dengan baik</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 border border-white border-opacity-20">
                    <div class="flex items-center space-x-3 text-white">
                        <svg class="w-10 h-10 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-lg">Update Cepat</p>
                            <p class="text-sm text-gray-200">Perubahan langsung tersimpan</p>
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