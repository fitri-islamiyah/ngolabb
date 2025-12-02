<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Profil Saya
                        </h2>
                        <p class="text-gray-200 mt-1">Kelola informasi akun Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Profile Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Card Header with Avatar -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-8">
                    <div class="flex items-center space-x-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold text-4xl shadow-2xl">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-white">{{ auth()->user()->name }}</h3>
                            <p class="text-white text-opacity-90 text-lg mt-1">{{ auth()->user()->email }}</p>
                            <div class="mt-3 flex items-center space-x-2">
                                @if(auth()->user()->role === 'admin')
                                    <span class="px-4 py-1.5 rounded-lg text-sm font-bold bg-gradient-to-r from-red-400 to-red-600 text-white flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        <span>Administrator</span>
                                    </span>
                                @else
                                    <span class="px-4 py-1.5 rounded-lg text-sm font-bold bg-white text-[#7965C1] flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>Regular User</span>
                                    </span>
                                @endif
                                <span class="px-3 py-1 rounded-lg text-xs font-bold bg-green-400 text-white flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Active</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-8">
                    <!-- Info Section -->
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-[#0E2148] mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Akun
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                                <div class="flex items-start space-x-3">
                                    <div class="w-10 h-10 bg-[#7965C1] bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1 font-semibold">Nama Lengkap</p>
                                        <p class="text-lg font-bold text-[#0E2148]">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                                <div class="flex items-start space-x-3">
                                    <div class="w-10 h-10 bg-[#7965C1] bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1 font-semibold">Email Address</p>
                                        <p class="text-lg font-bold text-[#0E2148] break-all">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                                <div class="flex items-start space-x-3">
                                    <div class="w-10 h-10 bg-[#7965C1] bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1 font-semibold">Role</p>
                                        @if(auth()->user()->role === 'admin')
                                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-gradient-to-r from-red-400 to-red-600 text-white">
                                                🛡️ Administrator
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-gradient-to-r from-[#7965C1] to-[#483AA0] text-white">
                                                👤 Regular User
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- User ID -->
                            <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                                <div class="flex items-start space-x-3">
                                    <div class="w-10 h-10 bg-[#7965C1] bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1 font-semibold">User ID</p>
                                        <p class="text-lg font-bold text-[#0E2148]">#{{ auth()->user()->id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <h4 class="text-xl font-bold text-[#0E2148] mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Pengaturan Akun
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Edit Profile Button -->
                            <a href="{{ route('profile.edit') }}"
                               class="flex items-center justify-between p-5 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 group">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg">Edit Profil</p>
                                        <p class="text-sm text-white text-opacity-90">Update informasi akun</p>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <!-- Change Password Button -->
                            <a href="{{ route('profile.password') }}"
                               class="flex items-center justify-between p-5 bg-gradient-to-r from-[#0E2148] to-[#483AA0] text-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 group">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg">Ganti Password</p>
                                        <p class="text-sm text-white text-opacity-90">Perbarui kata sandi</p>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Security Info -->
                    <div class="mt-6 bg-gradient-to-r from-blue-50 to-purple-50 border-l-4 border-[#7965C1] p-4 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-[#7965C1] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <div class="flex-1">
                                <h4 class="font-semibold text-[#0E2148] mb-1">🔒 Keamanan Akun</h4>
                                <p class="text-sm text-gray-700">
                                    Akun Anda dilindungi dengan enkripsi tingkat enterprise. Selalu jaga kerahasiaan password Anda dan jangan bagikan kepada siapapun.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>