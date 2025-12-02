
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-4xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            Update Tugas
                        </h2>
                        <p class="text-gray-200 mt-1">{{ $task->nama }}</p>
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
            {{-- MEMBER VIEW - Update Form --}}
            
            @if($role === 'member')

                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                    
                    {{-- 🔥 Jika tugas sudah approved, tampilkan tampilan khusus --}}
                    @if ($task->status === 'approved')
                        
                        <!-- Card Header - Approved State -->
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Tugas Telah Disetujui</h3>
                                    <p class="text-white text-opacity-90">Status: Approved by Leader ✅</p>
                                </div>
                            </div>
                        </div>

                        <!-- Approved Content Body -->
                        <div class="p-8 space-y-6">
                            
                            <!-- Success Message -->
                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-300 rounded-2xl p-6">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-lg font-bold text-green-800 mb-2">Selamat! Tugas Anda Telah Di-ACC</h4>
                                        <p class="text-green-700">
                                            Tugas ini telah disetujui oleh Leader. Anda tidak dapat mengubah status atau mengunggah file lagi.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Task Status Display -->
                            <div>
                                <label class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Status Akhir
                                </label>
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl font-semibold shadow-lg flex items-center justify-between">
                                    <span class="flex items-center space-x-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>✅ APPROVED - Disetujui Leader</span>
                                    </span>
                                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-lg text-sm">
                                        Final
                                    </span>
                                </div>
                            </div>

                            <!-- File Display -->
                            @if($task->file)
                                <div>
                                    <label class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        File Hasil Pekerjaan
                                    </label>
                                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-2 border-[#7965C1] rounded-2xl p-6">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="w-12 h-12 bg-[#7965C1] rounded-xl flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-semibold text-[#0E2148] mb-2">📎 File yang telah diupload:</p>
                                                <a href="{{ Storage::url($task->file) }}" 
                                                target="_blank"
                                                class="inline-flex items-center space-x-2 bg-[#7965C1] hover:bg-[#483AA0] text-white px-5 py-3 rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <span>Download File</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-6">
                                    <p class="text-gray-600 text-center italic">
                                        <svg class="w-6 h-6 inline-block mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Tidak ada file yang diupload
                                    </p>
                                </div>
                            @endif

                            <!-- Info Box -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500 rounded-xl p-5">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-blue-900 mb-1">Informasi</p>
                                        <p class="text-blue-800 text-sm">
                                            Tugas yang sudah approved bersifat final dan tidak dapat diubah. Jika ada perubahan yang diperlukan, silakan hubungi Leader Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @else
                        
                        <!-- Card Header - Normal State -->
                        <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Update Status & File</h3>
                                    <p class="text-white text-opacity-90">Perbarui progress tugas Anda</p>
                                </div>
                            </div>
                        </div>

                        <!-- Form Body -->
                        <form action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Status Tugas
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="status" 
                                        name="status" 
                                        class="block w-full px-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1] transition-all duration-200 bg-white"
                                        required>
                                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>⏳ Pending - Belum dikerjakan</option>
                                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>⚡ In Progress - Sedang dikerjakan</option>
                                    <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>✅ Done - Selesai dikerjakan</option>
                                </select>
                                <p class="mt-2 text-sm text-gray-600">Pilih status yang sesuai dengan progress tugas Anda</p>
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label for="file" class="block text-base font-semibold text-[#0E2148] mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-[#7965C1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Upload File / Laporan
                                </label>
                                
                                <!-- File Input -->
                                <div class="relative">
                                    <input type="file" 
                                        id="file"
                                        name="file" 
                                        class="block w-full px-4 py-4 text-base border-2 border-gray-200 rounded-xl text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#7965C1] file:text-white hover:file:bg-[#483AA0] transition-all duration-200 bg-white focus:outline-none focus:ring-2 focus:ring-[#7965C1] focus:border-[#7965C1]">
                                </div>
                                
                                <!-- Current File Info -->
                                @if($task->file)
                                    <div class="mt-4 bg-gradient-to-r from-blue-50 to-purple-50 border-l-4 border-[#7965C1] p-4 rounded-xl">
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-6 h-6 text-[#7965C1] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <div class="flex-1">
                                                <p class="font-semibold text-[#0E2148] mb-1">File saat ini:</p>
                                                <a href="{{ Storage::url($task->file) }}" 
                                                target="_blank"
                                                class="inline-flex items-center space-x-2 text-[#7965C1] hover:text-[#483AA0] font-medium transition-colors">
                                                    <span>Klik untuk download</span>
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                <p class="mt-2 text-sm text-gray-600">Upload file hasil pekerjaan atau laporan (PDF, Word, Excel, ZIP, dll)</p>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Update Tugas</span>
                                </button>
                            </div>
                        </form>

                    @endif
                
                </div>
            @endif
            @if(auth()->user()->role === 'admin')

            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

                <!-- Header -->
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Detail Tugas (Admin Mode)</h3>
                            <p class="text-white text-opacity-90">Admin hanya dapat melihat, bukan mengedit</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8 space-y-6">

                    <!-- Task Info -->
                    <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                        <h4 class="font-semibold text-[#0E2148] mb-3">Informasi Tugas</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nama Tugas:</span>
                                <span class="font-semibold text-[#0E2148]">{{ $task->nama }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Assigned To:</span>
                                <span class="font-semibold text-[#0E2148]">{{ $task->assignedUser->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-semibold text-[#7965C1]">
                                    {{ strtoupper(str_replace('_', ' ', $task->status)) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- File -->
                    @if($task->file)
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-l-4 border-blue-400 p-5 rounded-xl">
                            <p class="font-semibold text-[#0E2148] mb-2">📎 File Hasil Pekerjaan:</p>
                            <a href="{{ Storage::url($task->file) }}" 
                            target="_blank"
                            class="inline-flex items-center space-x-2 text-[#7965C1] hover:text-[#483AA0] font-medium transition-all">
                                <span>Klik untuk melihat file</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    @else
                        <p class="text-gray-500">Tidak ada file yang diupload.</p>
                    @endif

                    <p class="text-gray-600 italic">
                        Admin tidak dapat mengubah tugas apapun di halaman ini.
                    </p>

                </div>

            </div>

        @endif

            {{-- LEADER VIEW - Approval Section --}}
            @if($role === 'leader' )
                <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-6 py-5">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Review Tugas</h3>
                                <p class="text-white text-opacity-90">Tinjau hasil pekerjaan member</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 space-y-6">
                        <!-- Task Info -->
                        <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                            <h4 class="font-semibold text-[#0E2148] mb-3">Informasi Tugas</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Nama Tugas:</span>
                                    <span class="font-semibold text-[#0E2148]">{{ $task->nama }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Assigned To:</span>
                                    <span class="font-semibold text-[#0E2148]">{{ $task->assignedUser->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status Saat Ini:</span>
                                    <span class="font-semibold text-[#7965C1]">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- File from Member -->
                        @if($task->file)
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-5 rounded-xl border border-blue-200">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-[#7965C1] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="font-semibold text-[#0E2148] mb-2">📎 File dari Member:</p>
                                        <a href="{{ Storage::url($task->file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center space-x-2 bg-gradient-to-r from-[#7965C1] to-[#483AA0] text-white px-4 py-2.5 rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span>Download File</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-gray-50 p-5 rounded-xl border border-gray-200 text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500 font-medium">Belum ada file yang diupload</p>
                            </div>
                        @endif

                        <!-- Approval Section for DONE status -->
                        @if($task->status === 'done')
                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-300">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-green-800 text-lg">Tugas Selesai - Siap untuk ACC</h4>
                                        <p class="text-green-700 text-sm">Member telah menyelesaikan tugas ini</p>
                                    </div>
                                </div>

                                <form action="{{ route('tasks.approve', $task->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="approved_comment" class="block text-sm font-semibold text-gray-700 mb-2">
                                            💬 Komentar untuk Member (Opsional)
                                        </label>
                                        <textarea id="approved_comment"
                                                  name="approved_comment" 
                                                  rows="4"
                                                  class="w-full border-2 border-gray-200 rounded-xl p-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                                  placeholder="Berikan feedback atau komentar untuk member (contoh: Good job! Hasilnya memuaskan.)"></textarea>
                                    </div>

                                    <button type="submit"
                                            class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>ACC Tugas Ini</span>
                                    </button>
                                </form>
                            </div>

                        <!-- Already Approved -->
                        @elseif($task->status === 'approved')
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border-2 border-blue-300">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-blue-800 text-lg">✅ Tugas Telah Di-ACC</h4>
                                        <p class="text-blue-700 text-sm">Tugas ini sudah disetujui oleh Leader</p>
                                    </div>
                                </div>

                                @if($task->approved_comment)
                                    <div class="mt-4 bg-white p-4 rounded-xl border border-blue-200">
                                        <p class="font-semibold text-gray-700 mb-2">💬 Komentar Leader:</p>
                                        <p class="text-gray-800 italic">{{ $task->approved_comment }}</p>
                                    </div>
                                @endif
                            </div>

                        <!-- Not yet done -->
                        @else
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border-2 border-gray-300 text-center">
                                <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-gray-700 font-semibold text-lg mb-2">⏳ Tugas Belum Selesai</p>
                                <p class="text-gray-600 italic">Member masih dalam proses mengerjakan tugas ini.</p>
                                <p class="text-sm text-gray-500 mt-2">ACC akan tersedia setelah status berubah menjadi "Done"</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

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