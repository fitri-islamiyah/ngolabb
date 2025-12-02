<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-white flex items-center">
                            <svg class="w-8 h-8 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Daftar Proyek
                        </h2>
                        <p class="text-gray-200 mt-1">Kelola semua proyek Anda dalam satu tempat</p>
                    </div>
                    <a href="{{ route('projects.create') }}" 
                       class="bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Buat Proyek Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-gradient-to-r from-green-400 to-green-500 text-white p-4 rounded-xl shadow-lg flex items-center space-x-3 animate-slideIn">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Projects Cards Grid -->
            <div class="grid grid-cols-1 gap-6">
                @forelse($projects as $project)
                    <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-white">{{ $project->nama }}</h3>
                                        
                                        <p class="text-gray-200 text-sm mt-0.5">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Deadline: {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d M Y') : 'Tidak ada deadline' }}
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('projects.show', $project) }}" 
                                       class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>Detail</span>
                                    </a>
                                    <a href="{{ route('tasks.index', $project) }}"
                                    class="flex-1 flex items-center justify-center space-x-2 bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-4 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                        <span>Tugas</span>
                                    </a>
                                    
                                    @if(auth()->user()->pivotRole($project->id) === 'leader')
                                        <a href="{{ route('projects.edit', $project) }}" 
                                           class="bg-[#E3D095] hover:bg-opacity-90 text-[#0E2148] px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Yakin ingin menghapus proyek ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Leader Section -->
                                <div class="space-y-3">
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                        Project Leader
                                    </h4>
                                    <div class="flex items-center space-x-3 bg-gradient-to-r from-[#483AA0] to-[#7965C1] bg-opacity-10 p-4 rounded-xl">
                                        <div class="w-12 h-12 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-full flex items-center justify-center text-white font-bold text-lg">
                                            {{ strtoupper(substr($project->leader->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-[#0E2148] text-lg text-white">{{ $project->leader->name }}</p>
                                            <p class="text-sm text-gray-600 text-white">{{ $project->leader->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-gray-700 bg-opacity-10 p-4 rounded-xl font-semibold rounded-full ">
                                        <div>
                                             <p class="text-gray-700 text-opacity-90 text-sm">Deskripsi : {{ Str::limit($project->deskripsi ?? 'Tidak ada deskripsi.', 50) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Team Members Section -->
                                <div class="space-y-3">
                                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Team Members ({{ $project->users->count() }})
                                    </h4>
                                    <div class="space-y-2 max-h-32 overflow-y-auto custom-scrollbar">
                                        @forelse($project->users as $user)
                                            <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg hover:bg-gray-100 transition-colors">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-semibold">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                                        <p class="text-xs text-gray-600">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                                    {{ $user->pivot->role === 'leader' ? 'bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148]' : 'bg-gray-200 text-gray-700' }}">
                                                    {{ ucfirst($user->pivot->role) }}
                                                </span>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-center py-4">Belum ada anggota</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl p-12 text-center">
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
                @endforelse
                <div class="mt-4">
                    {{ $projects->links() }}
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
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #7965C1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #483AA0;
        }
    </style>
</x-app-layout>