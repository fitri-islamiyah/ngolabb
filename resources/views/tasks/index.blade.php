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
                            Tugas Proyek
                        </h2>
                        <p class="text-gray-200 mt-1">{{ $project->nama }}</p>
                    </div>
                    @if(auth()->user()->pivotRole($project->id) === 'leader')
                        <a href="{{ route('tasks.create', $project) }}" 
                           class="bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Tugas</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-500 bg-opacity-95 backdrop-blur-xl text-white p-5 rounded-2xl shadow-xl border border-green-400 animate-slideIn flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tasks Table Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Daftar Tugas</h3>
                                <p class="text-white text-opacity-90 text-sm">Total {{ $tasks->total() }} tugas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">
                                    Nama Tugas
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">
                                    Deskripsi
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">
                                    Assigned To
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">
                                    Status
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">
                                    File
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-[#0E2148] uppercase tracking-wider border-b-2 border-[#7965C1]">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($tasks as $task)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-lg flex items-center justify-center flex-shrink-0 mr-3">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-[#0E2148]">{{ $task->nama }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-700 max-w-xs truncate">
                                            {{ $task->deskripsi ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold text-xs mr-2">
                                                {{ strtoupper(substr($task->assignedUser->name, 0, 1)) }}
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $task->assignedUser->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($task->status == 'pending')
                                            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-200 text-gray-800 flex items-center space-x-1 inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Pending</span>
                                            </span>
                                        @elseif($task->status == 'in_progress')
                                            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-yellow-400 to-orange-400 text-white flex items-center space-x-1 inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                                <span>In Progress</span>
                                            </span>
                                        @else
                                            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-green-400 to-emerald-500 text-white flex items-center space-x-1 inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Completed</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if($task->file)
                                            <a href="{{ $task->file }}" 
                                               target="_blank"
                                               class="inline-flex items-center space-x-1 bg-gradient-to-r from-[#7965C1] to-[#483AA0] text-white px-3 py-1.5 rounded-lg font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 text-xs">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <span>Download</span>
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-sm">-</span>
                                        @endif
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{-- Tombol Update --}}
                                            <a href="{{ route('tasks.edit', $task) }}" 
                                            class="inline-flex items-center space-x-1 bg-gradient-to-r from-[#E3D095] to-[#7965C1] text-[#0E2148] px-4 py-2 rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 text-xs">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Update</span>
                                            </a>

                                            {{-- Tombol Hapus (Admin & Leader) --}}
                                            @if(auth()->user()->role === 'admin' || auth()->user()->pivotRole($project->id) === 'leader')
                                                <form action="{{ route('tasks.destroy', $task->id) }}" 
                                                    method="POST" 
                                                    class="inline-block ml-2"
                                                    onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="inline-flex items-center space-x-1 bg-red-600 text-white px-3 py-1.5 rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 text-xs">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        <span>Hapus</span>
                                                    </button>
                                                </form>
                                            @endif


                                        {{-- Button ACC untuk leader --}}
                                        @if($task->status == 'approved')
                                            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-blue-500 to-indigo-600 text-white flex items-center space-x-1 inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Approved</span>
                                            </span>
                                        @endif

                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-500 font-medium text-lg mb-2">Belum ada tugas</p>
                                            <p class="text-gray-400 text-sm">Tambahkan tugas pertama untuk proyek ini</p>
                                            @if(auth()->user()->pivotRole($project->id) === 'leader')
                                                <a href="{{ route('tasks.create', $project) }}"
                                                   class="mt-4 inline-flex items-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                    <span>Buat Tugas Pertama</span>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($tasks->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $tasks->links() }}
                    </div>
                @endif
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