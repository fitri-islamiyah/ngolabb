<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

            {{-- Statistik Ringkas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Proyek Card -->
                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Proyek</p>
                            <p class="text-4xl font-bold text-[#0E2148] mt-2">{{ $projectCount }}</p>
                            <p class="text-sm text-gray-500 mt-1">Proyek aktif</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Tugas Card -->
                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Tugas</p>
                            <p class="text-4xl font-bold text-[#0E2148] mt-2">{{ $taskCount }}</p>
                            <p class="text-sm text-gray-500 mt-1">Tugas terdaftar</p>
                            <p class="text-4xl font-bold text-[#0E2148] mt-2">{{ $myTasks }}</p>
                            <p class="text-sm text-gray-500 mt-1">Tugas saya</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-[#7965C1] to-[#E3D095] rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                    </div>
                </div>

                
                <!-- Total Anggota Card -->
                <div class="bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-2xl shadow-xl p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-white text-opacity-90 uppercase tracking-wider">Total Anggota</p>
                            <p class="text-4xl font-bold mt-2">{{ $userCount }}</p>
                            <p class="text-sm text-white text-opacity-80 mt-1">Member aktif</p>
                        </div>
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Manajemen Proyek & Tugas --}}
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-100">
                <div class="px-8 py-6 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-[#0E2148] flex items-center">
                        <svg class="w-7 h-7 mr-3 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Manajemen Proyek & Tugas
                    </h3>
                </div>

                <div class="p-8">
                    @if($projects->count())
                        <div class="space-y-6">
                            @foreach($projects as $project)
                                <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-6 border-2 border-gray-100 hover:border-[#7965C1] transition-all duration-300 shadow-sm hover:shadow-lg">
                                    <!-- Project Header -->
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-start space-x-4">
                                            <div class="w-14 h-14 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-xl font-bold text-[#0E2148]">{{ $project->nama }}</h4>
                                                <div class="flex items-center space-x-4 mt-2">
                                                    <span class="flex items-center text-sm text-gray-600">
                                                        <svg class="w-4 h-4 mr-1.5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                        Leader: <span class="font-semibold ml-1">{{ $project->leader->name }}</span>
                                                    </span>
                                                    <span class="flex items-center text-sm text-gray-600">
                                                        <svg class="w-4 h-4 mr-1.5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        Deadline: <span class="font-semibold ml-1">{{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d M Y') : 'Tidak ada' }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @if(auth()->user()->role === 'admin' || auth()->user()->pivotRole($project->id) === 'leader')
                                        <div class="flex items-center space-x-2">

                                            <!-- Tombol Tugas -->
                                            <a href="{{ route('tasks.index', $project) }}" 
                                            class="bg-[#7965C1] hover:bg-[#483AA0] text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 text-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                                </svg>
                                                <span>Tugas</span>
                                            </a>

                                            <!-- Tombol Edit (hanya leader) -->
                                            @if(auth()->user()->pivotRole($project->id) === 'leader')
                                                <a href="{{ route('projects.edit', $project) }}" 
                                                class="bg-[#E3D095] hover:bg-opacity-90 text-[#0E2148] px-4 py-2 rounded-lg font-medium flex items-center space-x-2 text-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    <span>Edit</span>
                                                </a>
                                            @endif

                                            <!-- Tombol Hapus (admin & leader) -->
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus proyek ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium flex items-center space-x-2 text-sm">
                                                    <svg class="w-4 mt-2 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>

                                        </div>
                                    @endif

                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="mt-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-sm font-semibold text-gray-700">Progress Proyek</span>
                                            <span class="text-sm font-bold text-[#7965C1]">{{ $project->progress }}%</span>
                                        </div>
                                        <div class="relative w-full h-8 bg-gray-200 rounded-xl overflow-hidden shadow-inner">
                                            <div class="absolute inset-0 bg-gradient-to-r from-[#483AA0] via-[#7965C1] to-[#E3D095] transition-all duration-500 ease-out flex items-center justify-center"
                                                 style="width: {{ $project->progress }}%;">
                                                @if($project->progress > 0)
                                                    <span class="text-white text-sm font-bold drop-shadow-lg">{{ $project->progress }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-6">
                                {{ $projects->links() }}
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#0E2148] mb-3">Belum Ada Proyek</h3>
                            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                                Mulai perjalanan Anda dengan membuat proyek pertama. Kelola tim dan tugas dengan lebih efisien.
                            </p>
                            <a href="{{ route('projects.create') }}" 
                               class="inline-flex items-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Buat Proyek Pertama</span>
                            </a>
                        </div>
                    @endif
                    <div class="flex items-center space-x-3 mt-6">
                        <a href="{{ route('projects.create') }}" 
                           class="bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Buat Proyek</span>
                        </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>