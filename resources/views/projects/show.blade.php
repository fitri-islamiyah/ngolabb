<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Detail Proyek
                        </h2>
                        <p class="text-gray-200 mt-1">{{ $project->nama }}</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        @if(auth()->user()->isAdmin() || auth()->user()->pivotRole($project->id) === 'leader')
                            <a href="{{ route('projects.pdf', $project->id) }}"
                               class="bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span>Cetak PDF</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
            
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="bg-green-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-green-400 animate-slideIn flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-red-400 animate-slideIn flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Project Info Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">{{ $project->nama }}</h3>
                                <p class="text-white text-opacity-90 text-sm mt-1">Informasi lengkap proyek</p>
                            </div>
                        </div>
                        
                        <!-- Role Badge -->
                        @isset($role)
                            @if($role === 'leader')
                                <span class="px-4 py-2 rounded-xl text-sm font-bold bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] flex items-center space-x-2 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <span>Leader</span>
                                </span>
                            @else
                                <span class="px-4 py-2 rounded-xl text-sm font-bold bg-white text-[#7965C1] flex items-center space-x-2 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Member</span>
                                </span>
                            @endif
                        @else
                            <span class="px-4 py-2 rounded-xl text-sm font-bold bg-gray-200 text-gray-700">
                                Tidak Terdaftar
                            </span>
                        @endisset
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 space-y-6">
                    <!-- Description -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Deskripsi
                        </h4>
                        <div class="bg-gradient-to-r from-gray-50 to-white p-4 rounded-xl border-l-4 border-[#7965C1]">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $project->deskripsi ?? 'Tidak ada deskripsi untuk proyek ini.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Project Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Leader Info -->
                        <div class="bg-gradient-to-br from-gray-50 to-white p-4 rounded-xl border border-gray-200">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                    {{ strtoupper(substr($project->leader->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Project Leader</p>
                                    <p class="font-semibold text-[#0E2148]">{{ $project->leader->name }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deadline Info -->
                        <div class="bg-gradient-to-br from-gray-50 to-white p-4 rounded-xl border border-gray-200">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Deadline</p>
                                    @if ($project->deadline)
                                        <p class="font-semibold text-[#0E2148]">{{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}</p>
                                    @else
                                        <p class="font-medium text-gray-400">Belum ditentukan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider flex items-center">
                                <svg class="w-4 h-4 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Progress Proyek
                            </h4>
                            <span class="text-lg font-bold text-[#7965C1]">{{ $progress }}%</span>
                        </div>
                        <div class="relative w-full h-8 bg-gray-200 rounded-xl overflow-hidden shadow-inner">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#483AA0] via-[#7965C1] to-[#E3D095] transition-all duration-500 ease-out flex items-center justify-center"
                                 style="width: {{ $progress }}%;">
                                @if($progress > 0)
                                    <span class="text-white text-sm font-bold drop-shadow-lg">{{ $progress }}%</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Leader Actions -->
                    @if ($role === 'leader')
                        <div class="pt-4 border-t border-gray-200 flex gap-3">
                            <a href="{{ route('projects.edit', $project) }}" 
                               class="flex-1 flex items-center justify-center space-x-2 bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-4 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Edit Proyek</span>
                            </a>

                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="flex-1"
                                  onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Hapus Proyek</span>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Team Members Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Anggota Proyek
                            <span class="ml-2 px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                                {{ $project->users->count() }}
                            </span>
                        </h3>
                        @if ($role === 'leader')
                            <a href="{{ route('projects.edit', $project) }}" 
                               class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Anggota</span>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($project->users as $user)
                            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-xl hover:bg-gray-100 transition-colors border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-600">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $user->pivot->role === 'leader' 
                                        ? 'bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148]' 
                                        : 'bg-gray-200 text-gray-700' }}">
                                    {{ ucfirst($user->pivot->role) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tasks List Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            Daftar Tugas
                            <span class="ml-2 px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                                {{ $project->tasks->count() }}
                            </span>
                        </h3>
                        @if ($role === 'leader')
                            <a href="{{ route('tasks.create', $project) }}"
                               class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Tugas</span>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    @forelse ($project->tasks as $task)
                        <div class="mb-4 last:mb-0 bg-gradient-to-r from-gray-50 to-white rounded-xl p-5 border-2 border-gray-100 hover:border-[#7965C1] transition-all duration-300">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <h4 class="text-lg font-bold text-[#0E2148] mb-2">{{ $task->nama }}</h4>
                                    <div class="flex items-center space-x-4 text-sm">
                                        <span class="flex items-center text-gray-600">
                                            <svg class="w-4 h-4 mr-1.5 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span class="font-semibold">{{ $task->assignedUser->name }}</span>
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Status Badge -->
                                @if($task->status == 'pending')
                                    <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-200 text-gray-800 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Pending</span>
                                    </span>
                                @elseif($task->status == 'in_progress')
                                    <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-yellow-400 to-orange-400 text-white flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span>In Progress</span>
                                    </span>
                                @else
                                    <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-green-400 to-emerald-500 text-white flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Completed</span>
                                    </span>
                                @endif
                            </div>

                            <a href="{{ route('tasks.edit', $task) }}"
                               class="inline-flex items-center space-x-2 bg-gradient-to-r from-[#7965C1] to-[#483AA0] text-white px-4 py-2 rounded-lg font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Update Tugas</span>
                            </a>
                            @if(auth()->user()->role === 'admin')
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
                            </form>
                            @endif

                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada tugas untuk proyek ini.</p>
                            @if ($role === 'leader')
                                <a href="{{ route('tasks.create', $project) }}"
                                   class="inline-flex items-center space-x-2 mt-4 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Buat Tugas Pertama</span>
                                </a>
                            @endif
                        </div>
                    @endforelse
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