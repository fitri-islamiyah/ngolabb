<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Hasil Pencarian
                        </h2>
                        <p class="text-gray-200 mt-1">Menampilkan hasil untuk: <span class="font-bold text-[#E3D095]">"{{ $q }}"</span></p>
                    </div>
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-4 py-2">
                        <span class="text-white font-semibold">{{ $projects->count() + $tasks->count() }} Hasil</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
            
            <!-- Projects Section -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Section Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Proyek
                        <span class="ml-2 px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">
                            {{ $projects->count() }}
                        </span>
                    </h3>
                </div>

                <!-- Projects List -->
                <div class="p-6">
                    @forelse($projects as $p)
                        <a href="{{ route('projects.show', $p->id) }}" 
                           class="block mb-3 last:mb-0 bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl hover:shadow-lg transition-all duration-300 border-2 border-gray-100 hover:border-[#7965C1] group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 flex-1">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-lg font-bold text-[#0E2148] group-hover:text-[#7965C1] transition-colors">{{ $p->nama }}</h4>
                                        @if($p->deskripsi)
                                            <p class="text-sm text-gray-600 mt-1 truncate">{{ Str::limit($p->deskripsi, 100) }}</p>
                                        @endif
                                        <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Leader: {{ $p->leader->name }}
                                            </span>
                                            @if($p->deadline)
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($p->deadline)->format('d M Y') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-[#7965C1] transform group-hover:translate-x-1 transition-all flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    @empty
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak ada proyek ditemukan dengan kata kunci "{{ $q }}"</p>
                            <p class="text-gray-400 text-sm mt-1">Coba gunakan kata kunci yang berbeda</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Tasks Section -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Section Header -->
                <div class="bg-gradient-to-r from-[#7965C1] to-[#E3D095] px-6 py-4">
                    <h3 class="text-xl font-bold text-[#0E2148] flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        Tugas
                        <span class="ml-2 px-3 py-1 bg-[#0E2148] bg-opacity-20 rounded-full text-sm">
                            {{ $tasks->count() }}
                        </span>
                    </h3>
                </div>

                <!-- Tasks List -->
                <div class="p-6">
                    @forelse($tasks as $t)
                        <a href="{{ route('tasks.edit', $t->id) }}" 
                           class="block mb-3 last:mb-0 bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl hover:shadow-lg transition-all duration-300 border-2 border-gray-100 hover:border-[#E3D095] group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 flex-1">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-6 h-6 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-lg font-bold text-[#0E2148] group-hover:text-[#7965C1] transition-colors">{{ $t->nama }}</h4>
                                        @if($t->deskripsi)
                                            <p class="text-sm text-gray-600 mt-1 truncate">{{ Str::limit($t->deskripsi, 100) }}</p>
                                        @endif
                                        <div class="flex items-center space-x-4 mt-2 text-xs">
                                            <span class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $t->assignedUser->name }}
                                            </span>
                                            @if($t->status == 'pending')
                                                <span class="px-2 py-1 rounded-md text-xs font-bold bg-gray-200 text-gray-800">
                                                    Pending
                                                </span>
                                            @elseif($t->status == 'in_progress')
                                                <span class="px-2 py-1 rounded-md text-xs font-bold bg-yellow-200 text-yellow-800">
                                                    In Progress
                                                </span>
                                            @else
                                                <span class="px-2 py-1 rounded-md text-xs font-bold bg-green-200 text-green-800">
                                                    Completed
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-[#E3D095] transform group-hover:translate-x-1 transition-all flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    @empty
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">Tidak ada tugas ditemukan dengan kata kunci "{{ $q }}"</p>
                            <p class="text-gray-400 text-sm mt-1">Coba gunakan kata kunci yang berbeda</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- No Results Overall -->
            @if($projects->count() == 0 && $tasks->count() == 0)
                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl p-12 text-center border border-gray-100">
                    <div class="w-24 h-24 bg-gradient-to-br from-[#483AA0] to-[#7965C1] rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0E2148] mb-3">Tidak Ada Hasil Ditemukan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Pencarian untuk <span class="font-bold text-[#7965C1]">"{{ $q }}"</span> tidak menghasilkan proyek atau tugas yang cocok.
                    </p>
                    <div class="space-y-2 text-sm text-gray-600 max-w-md mx-auto">
                        <p class="font-semibold">💡 Tips Pencarian:</p>
                        <ul class="text-left space-y-1">
                            <li>• Periksa ejaan kata kunci</li>
                            <li>• Gunakan kata kunci yang lebih umum</li>
                            <li>• Coba variasi kata yang berbeda</li>
                            <li>• Kurangi jumlah kata kunci</li>
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Back Button -->
            <div class="flex justify-center mt-6">
                <a href="{{ url()->previous() }}" 
                   class="inline-flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 border border-white border-opacity-30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>