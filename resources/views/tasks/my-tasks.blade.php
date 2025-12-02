<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            Tugas Saya
                        </h2>
                        <p class="text-gray-200 mt-1">Kelola dan pantau semua tugas yang ditugaskan kepada Anda</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-4 py-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-white font-semibold">{{ $tasks->count() }} Tugas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            @forelse ($tasks as $task)
                <div class="mb-6 bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    
                    <!-- Task Header with Status Badge -->
                    <div class="relative bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                                    @if($task->status == 'pending')
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @elseif($task->status == 'in_progress')
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @else
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">{{ $task->nama }}</h3>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                        <span class="text-gray-200">Proyek:</span>
                                        <span class="text-white font-semibold">{{ $task->project->nama }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Status Badge -->
                            <div class="flex flex-col items-end space-y-2">
                                @if($task->status == 'pending')
                                    <span class="px-4 py-2 rounded-xl text-sm font-bold bg-gray-100 text-gray-800 flex items-center space-x-2 shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Pending</span>
                                    </span>
                                @elseif($task->status == 'in_progress')
                                    <span class="px-4 py-2 rounded-xl text-sm font-bold bg-gradient-to-r from-yellow-400 to-orange-400 text-white flex items-center space-x-2 shadow-lg animate-pulse">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span>In Progress</span>
                                    </span>
                                @else
                                    <span class="px-4 py-2 rounded-xl text-sm font-bold bg-gradient-to-r from-green-400 to-emerald-500 text-white flex items-center space-x-2 shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Completed</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Task Body -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            
                            <!-- Description Section (2 columns on large screens) -->
                            <div class="lg:col-span-2 space-y-4">
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                        Deskripsi Tugas
                                    </h4>
                                    <div class="bg-gradient-to-r from-gray-50 to-white p-4 rounded-xl border-l-4 border-[#7965C1]">
                                        <p class="text-gray-700 leading-relaxed">
                                            {{ $task->deskripsi ?? 'Tidak ada deskripsi untuk tugas ini.' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- File Section -->
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        File Lampiran
                                    </h4>
                                    @if($task->file)
                                        <a href="{{ Storage::url($task->file) }}" 
                                           target="_blank"
                                           class="flex items-center space-x-3 bg-gradient-to-r from-[#483AA0] to-[#7965C1] p-4 rounded-xl hover:shadow-lg transition-all duration-200 group">
                                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-white font-semibold">File tersedia</p>
                                                <p class="text-white text-opacity-80 text-sm">Klik untuk mengunduh</p>
                                            </div>
                                            <svg class="w-5 h-5 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    @else
                                        <div class="flex items-center space-x-3 bg-gray-100 p-4 rounded-xl border-2 border-dashed border-gray-300">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-gray-700 font-medium">Belum ada file</p>
                                                <p class="text-gray-500 text-sm">File belum diunggah untuk tugas ini</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Section (1 column on large screens) -->
                            <div class="space-y-4">
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        Aksi
                                    </h4>
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-6 py-3.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span>Update Tugas</span>
                                    </a>
                                </div>

                                <!-- Task Info Card -->
                                <div class="bg-gradient-to-br from-gray-50 to-white p-4 rounded-xl border border-gray-200">
                                    <h5 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Informasi Tugas
                                    </h5>
                                    <div class="space-y-2 text-sm">
                                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                            <span class="text-gray-600">Status:</span>
                                            <span class="font-semibold text-[#483AA0]">
                                                {{ ucfirst(str_replace('_',' ',$task->status)) }}
                                            </span>
                                        </div>
                                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                            <span class="text-gray-600">Proyek:</span>
                                            <span class="font-semibold text-[#483AA0]">{{ Str::limit($task->project->nama, 20) }}</span>
                                        </div>
                                        <div class="flex items-center justify-between py-2">
                                            <span class="text-gray-600">File:</span>
                                            <span class="font-semibold {{ $task->file ? 'text-green-600' : 'text-gray-400' }}">
                                                {{ $task->file ? 'Tersedia' : 'Belum ada' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <!-- Empty State -->
                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl p-12 text-center border border-gray-100">
                    <div class="w-24 h-24 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0E2148] mb-3">Tidak Ada Tugas</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Saat ini tidak ada tugas yang ditugaskan kepada Anda. Hubungi project leader untuk mendapatkan tugas baru.
                    </p>
                    <div class="flex items-center justify-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm">Periksa kembali nanti untuk tugas baru</span>
                    </div>
                </div>
            @endforelse
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>

        </div>
    </div>

    <style>
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .8;
            }
        }
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</x-app-layout>