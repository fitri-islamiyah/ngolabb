<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1]">
        
        <!-- Header Section -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md border-b border-white border-opacity-20">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <h2 class="text-4xl font-bold text-white flex items-center">
                    <svg class="w-10 h-10 mr-3 text-[#E3D095]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Detail User
                </h2>
                <p class="text-gray-200 mt-1">Informasi, aktivitas, dan proyek yang sedang diikuti</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

            <!-- Profile Card -->
            <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold text-xl">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">{{ $user->name }}</h3>
                            <p class="text-white text-opacity-90">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 space-y-6">

                    <!-- Basic Info -->
                    <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-xl border-l-4 border-[#7965C1]">
                        <h4 class="font-semibold text-[#0E2148] mb-3">Informasi User</h4>

                        <p><strong>ID User:</strong> #{{ $user->id }}</p>

                        <p>
                            <strong>Role:</strong>
                            @if($user->role === 'admin')
                                <span class="px-2 py-1 rounded-md text-xs font-bold bg-red-100 text-red-800">Admin</span>
                            @else
                                <span class="px-2 py-1 rounded-md text-xs font-bold bg-purple-100 text-purple-800">User</span>
                            @endif
                        </p>

                        <p><strong>Status Akun:</strong> 
                            <span class="px-2 py-1 rounded-md text-xs font-bold bg-green-100 text-green-800">Aktif</span>
                        </p>

                        <p><strong>Tanggal Dibuat:</strong> {{ $user->created_at->format('d M Y') }}</p>

                        <p><strong>Terakhir Login:</strong> 
                            {{ $user->last_login_at ? $user->last_login_at->format('d M Y H:i') : 'Belum pernah login' }}
                        </p>
                    </div>



                    <!-- Project Summary -->
                    <div>
                        <h3 class="text-xl font-bold text-[#0E2148] mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#483AA0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-2-6v12m5-10h2a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2" />
                            </svg>
                            Daftar Proyek yang Diikuti
                        </h3>

                        @if($user->projects->count() === 0)
                            <p class="text-gray-600 italic">User tidak mengikuti proyek apa pun.</p>
                        @else
                            <div class="space-y-3">
                                @foreach($user->projects as $project)
                                    <div class="p-4 rounded-xl bg-white border shadow hover:shadow-md transition">
                                        <p class="font-bold text-[#0E2148]">{{ $project->nama }}</p>
                                        <p class="text-sm text-gray-600">
                                            Role di proyek:
                                            <span class="font-semibold text-[#7965C1]">
                                                {{ ucfirst($project->pivot->role) }}
                                            </span>
                                        </p>
                                        <a href="{{ route('projects.show', $project->id) }}"
                                           class="text-sm text-blue-600 underline mt-2 inline-block">
                                            Lihat Proyek →
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>




                    <!-- Activity Log -->
                    <div>
                        <h3 class="text-xl font-bold text-[#0E2148] mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#483AA0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Riwayat Aktivitas
                        </h3>

                        @php
                            $activities = \App\Models\Notification::where('user_id', $user->id)
                                ->orderBy('created_at', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp


                        @if($activities->count() === 0)
                            <p class="text-gray-600 italic">Belum ada aktivitas.</p>
                        @else
                            <div class="space-y-3">
                                @foreach($activities as $act)
                                    <div class="p-4 bg-white rounded-xl border shadow">
                                        <p class="font-semibold text-[#0E2148]">{{ $act->title }}</p>
                                        <p class="text-sm text-gray-600">{{ $act->message }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $act->created_at->diffForHumans() }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
