<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold" style="color: #0E2148;">Notifikasi</h1>
            </div>
        </div>

        <!-- Notifications Container -->
        <div class="space-y-4">
            @forelse($notifications as $notif)
                <a href="{{ route('notifications.read', $notif->id) }}"
                    class="group block relative overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                    style="background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%); border: 2px solid transparent;"
                    onmouseover="this.style.borderColor='#E3D095'"
                    onmouseout="this.style.borderColor='transparent'">


                    
                    <div class="p-6 relative">

                        <!-- Content -->
                        <div class="ml-16">
                            <!-- Title with Status Badge -->
                            <div class="flex items-start justify-between mb-2 ml-8">
                                <h3 class="text-lg font-bold text-white pr-4">{{ $notif->title }}</h3>
                                
                                <!-- Status Badge -->
                                @if(!$notif->read_at)
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap" 
                                          style="background-color: #E3D095; color: #0E2148;">
                                        Baru
                                    </span>
                                @endif
                            </div>

                            <!-- Message -->
                            <p class="text-white text-opacity-90 mb-4 leading-relaxed">{{ $notif->message }}</p>

                            <!-- Metadata with Icons -->
                            <div class="flex items-center space-x-4 text-sm text-white text-opacity-75">
                                <!-- Time Icon -->
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $notif->created_at->diffForHumans() }}</span>
                                </div>

                                <!-- Date Icon -->
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $notif->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <!-- Hover Arrow Animation -->
                            <div class="absolute right-6 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:translate-x-2">
                                <svg class="w-6 h-6" style="color: #E3D095;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Gradient Overlay -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none" 
                         style="background: linear-gradient(135deg, #E3D095 0%, transparent 100%);"></div>
                </a>

            @empty
                <!-- Empty State -->
                <div class="rounded-xl shadow-lg p-12 text-center" 
                     style="background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);">
                    
                    <!-- Empty State Icon -->
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                         style="background: rgba(227, 208, 149, 0.2);">
                        <svg class="w-12 h-12" style="color: #E3D095;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-2">Tidak Ada Notifikasi</h3>
                    <p class="text-white text-opacity-75">Belum ada notifikasi untuk ditampilkan saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($notifications->hasPages())
            <div class="mt-8">
                <div class="flex justify-center">
                    {{ $notifications->links() }}
                </div>
            </div>
        @endif

    </div>

    <style>
        /* Custom styling for pagination to match color palette */
        .pagination {
            display: flex;
            gap: 0.5rem;
        }
        
        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s;
            color: #0E2148;
            border: 2px solid #483AA0;
        }
        
        .pagination a:hover {
            background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(72, 58, 160, 0.3);
        }
        
        .pagination .active span {
            background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);
            color: white;
            border-color: #E3D095;
        }
    </style>
</x-app-layout>