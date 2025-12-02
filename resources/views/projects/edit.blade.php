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
                            Edit Proyek
                        </h2>
                        <p class="text-gray-200 mt-1">Perbarui informasi proyek dan kelola anggota tim</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-green-400 animate-slideIn flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Edit Project Form Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Informasi Proyek</h3>
                            <p class="text-white text-opacity-90">Update detail proyek Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('projects.update', $project) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

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
                                   value="{{ old('nama', $project->nama) }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white"
                                   placeholder="Masukkan nama proyek"
                                   required>
                        </div>
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
                                      placeholder="Jelaskan tujuan dan detail proyek...">{{ old('deskripsi', $project->deskripsi) }}</textarea>
                        </div>
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
                                   value="{{ old('deadline', $project->deadline) }}"
                                   class="block w-full pl-12 pr-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 flex gap-3">
                        <button type="submit" 
                                class="flex-1 flex items-center justify-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Update Proyek</span>
                        </button>
                        
                        <a href="{{ route('projects.show', $project) }}" 
                           class="flex-1 flex items-center justify-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-semibold transition-all duration-200 border-2 border-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Add Member Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#7965C1] to-[#E3D095] px-6 py-4">
                    <h3 class="text-xl font-bold text-[#0E2148] flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Tambah Anggota Baru
                    </h3>
                </div>

                <form action="{{ route('projects.addMember', $project) }}" method="POST" class="p-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Anggota</label>
                            <select name="user_id" 
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white">
                                @foreach(\App\Models\User::all() as $user)
                                    @if(!$project->users->contains($user->id))
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" 
                                class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-[#7965C1] to-[#E3D095] text-[#0E2148] px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Anggota</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Members List Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Daftar Anggota Tim
                        <span class="ml-2 px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                            {{ $project->users->count() }}
                        </span>
                    </h3>
                </div>

                <div class="p-6">
                    <div class="space-y-3">
                        @foreach ($project->users as $member)
                            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-xl hover:bg-gray-100 transition-colors border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $member->name }}</p>
                                        <p class="text-xs text-gray-600">{{ $member->email }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <!-- Leader Badge -->
                                    @if($member->id === $project->leader_id)
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                            <span>Leader</span>
                                        </span>
                                    @endif

                                    <!-- Remove Button (only for non-leader members) -->
                                    @if($role === 'leader' && $member->id !== $project->leader_id)
                                        <form action="{{ route('projects.removeMember', [$project->id, $member->id]) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus {{ $member->name }} dari proyek?')"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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