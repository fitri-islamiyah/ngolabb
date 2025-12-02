<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <!-- Folder Icon for Project -->
            <div class="w-10 h-10 rounded-lg flex items-center justify-center" 
                 style="background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-semibold text-xl" style="color: #0E2148;">Tambah Tugas</h2>
                <p class="text-sm opacity-75" style="color: #483AA0;">{{ $project->nama }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Form Card -->
        <div class="rounded-2xl shadow-2xl overflow-hidden" 
             style="background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);">
            
            <!-- Decorative Header -->
            <div class="h-2" style="background: linear-gradient(90deg, #E3D095 0%, #7965C1 100%);"></div>
            
            <div class="p-8 bg-white">
                
                <!-- Form Header with Icon -->
                <div class="flex items-center space-x-4 mb-8 pb-6 border-b-2" style="border-color: #E3D095;">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center shadow-lg" 
                         style="background: linear-gradient(135deg, #E3D095 0%, #7965C1 50%);">
                        <!-- Clipboard Icon for Task -->
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold" style="color: #0E2148;">Buat Tugas Baru</h3>
                        <p class="text-sm opacity-75" style="color: #483AA0;">Isi detail tugas yang akan dibuat</p>
                    </div>
                </div>

                <form action="{{ route('tasks.store', $project) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Nama Tugas -->
                    <div class="group">
                        <label class="flex items-center space-x-2 mb-3 font-semibold" style="color: #0E2148;">
                            <svg class="w-5 h-5" style="color: #483AA0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            <span>Nama Tugas</span>
                        </label>
                        <input 
                            type="text" 
                            name="nama" 
                            placeholder="Masukkan nama tugas..."
                            class="border-2 rounded-xl w-full p-4 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-opacity-30" 
                            style="border-color: #483AA0; color: #0E2148;"
                            onfocus="this.style.borderColor='#7965C1'; this.style.boxShadow='0 0 0 4px rgba(121, 101, 193, 0.1)'"
                            onblur="this.style.borderColor='#483AA0'; this.style.boxShadow='none'"
                            required
                        >
                    </div>

                    <!-- Deskripsi -->
                    <div class="group">
                        <label class="flex items-center space-x-2 mb-3 font-semibold" style="color: #0E2148;">
                            <svg class="w-5 h-5" style="color: #483AA0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            <span>Deskripsi</span>
                        </label>
                        <textarea 
                            name="deskripsi" 
                            rows="5"
                            placeholder="Jelaskan detail tugas..."
                            class="border-2 rounded-xl w-full p-4 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-opacity-30 resize-none" 
                            style="border-color: #483AA0; color: #0E2148;"
                            onfocus="this.style.borderColor='#7965C1'; this.style.boxShadow='0 0 0 4px rgba(121, 101, 193, 0.1)'"
                            onblur="this.style.borderColor='#483AA0'; this.style.boxShadow='none'"
                        ></textarea>
                    </div>

                    <!-- Assigned To -->
                    <div class="group">
                        <label class="flex items-center space-x-2 mb-3 font-semibold" style="color: #0E2148;">
                            <svg class="w-5 h-5" style="color: #483AA0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Ditugaskan Kepada</span>
                        </label>
                        <div class="relative">
                            <select 
                                name="assigned_to" 
                                class="border-2 rounded-xl w-full p-4 pr-12 appearance-none transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-opacity-30 cursor-pointer" 
                                style="border-color: #483AA0; color: #0E2148;"
                                onfocus="this.style.borderColor='#7965C1'; this.style.boxShadow='0 0 0 4px rgba(121, 101, 193, 0.1)'"
                                onblur="this.style.borderColor='#483AA0'; this.style.boxShadow='none'"
                            >
                                <option value="">Pilih anggota tim...</option>
                                @foreach($members as $member)
                                    @if($member->id !== $project->leader_id) 
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <!-- Custom Dropdown Arrow -->
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <svg class="w-5 h-5" style="color: #483AA0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Info Badge -->
                        <div class="mt-3 flex items-center space-x-2 text-sm" style="color: #483AA0;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Hanya anggota tim yang ditampilkan (bukan leader)</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-4 pt-6 border-t-2" style="border-color: #E3D095;">
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="group relative flex-1 px-6 py-4 rounded-xl font-bold text-white transition-all duration-300 overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-1"
                            style="background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);"
                        >
                            <div class="relative flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simpan Tugas</span>
                                
                                <!-- Arrow Animation -->
                                <svg class="w-5 h-5 transform transition-all duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                            
                            <!-- Hover Gradient Overlay -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" 
                                 style="background: linear-gradient(135deg, #E3D095 0%, #7965C1 100%);"></div>
                        </button>

                        <!-- Cancel Button -->
                        <a 
                            href="{{ route('projects.show', $project) }}" 
                            class="group px-6 py-4 rounded-xl font-semibold transition-all duration-300 border-2 hover:-translate-y-1 hover:shadow-lg"
                            style="color: #483AA0; border-color: #483AA0;"
                            onmouseover="this.style.backgroundColor='#483AA0'; this.style.color='white'; this.style.borderColor='#E3D095'"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#483AA0'; this.style.borderColor='#483AA0'"
                        >
                            Batal
                        </a>
                    </div>

                </form>
            </div>

            <!-- Decorative Footer -->
            <div class="h-2" style="background: linear-gradient(90deg, #7965C1 0%, #E3D095 100%);"></div>
        </div>

        <!-- Helper Info Card -->
        <div class="mt-6 p-4 rounded-xl border-2 flex items-start space-x-3" 
             style="border-color: #E3D095; background-color: rgba(227, 208, 149, 0.1);">
            <svg class="w-6 h-6 flex-shrink-0 mt-0.5" style="color: #483AA0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="font-bold mb-1" style="color: #0E2148;">Tips Membuat Tugas</h4>
                <p class="text-sm" style="color: #483AA0;">
                    Pastikan nama tugas jelas dan deskripsi menjelaskan detail yang diperlukan. 
                    Pilih anggota tim yang sesuai untuk menyelesaikan tugas ini.
                </p>
            </div>
        </div>

    </div>

    <style>
        /* Smooth transitions for all interactive elements */
        input, textarea, select, button, a {
            transition: all 0.3s ease;
        }
        
        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 8px;
        }
        
        textarea::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        textarea::-webkit-scrollbar-thumb {
            background: #7965C1;
            border-radius: 10px;
        }
        
        textarea::-webkit-scrollbar-thumb:hover {
            background: #483AA0;
        }

        /* Remove default select arrow in IE */
        select::-ms-expand {
            display: none;
        }
    </style>
</x-app-layout>