<nav x-data="{ open: false, notifOpen: false }" class="bg-gradient-to-r from-[#0E2148] via-[#483AA0] to-[#7965C1] border-b border-white border-opacity-20 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white hidden sm:block">Ngolabb</span>
                    </a>
                </div>
                
                <!-- Navigation Links - Desktop -->
                <div class="hidden lg:flex space-x-2 sm:-my-px sm:ms-10 sm:items-center">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 
                              {{ request()->routeIs('dashboard') 
                                  ? 'bg-white bg-opacity-20 text-white shadow-lg' 
                                  : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 
                              {{ request()->routeIs('projects.index') 
                                  ? 'bg-white bg-opacity-20 text-white shadow-lg' 
                                  : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Proyek</span>
                    </a>

                    <a href="{{ route('tasks.mine') }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 
                              {{ request()->routeIs('tasks.mine') 
                                  ? 'bg-white bg-opacity-20 text-white shadow-lg' 
                                  : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <span>Tugas</span>
                    </a>

                    @if(auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('admin.users') }}" 
                           class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200
                                  {{ request()->routeIs('admin.users') 
                                      ? 'bg-white bg-opacity-20 text-white shadow-lg' 
                                      : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            <span>Users</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Right Side Items - Desktop -->
            <div class="hidden sm:flex sm:items-center sm:space-x-3">
                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET">
                    <div class="relative">
                        <input type="text" 
                               name="q"
                               placeholder="Cari..."
                               class="px-3 py-2 pl-10 rounded-lg bg-white bg-opacity-20 text-white placeholder-gray-200 
                                      focus:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50
                                      w-40 xl:w-48 transition-all duration-200 text-sm"/>
                        <svg class="w-4 h-4 text-white absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7 7 0 1110.65 5.65a7 7 0 016 11.0z" />
                        </svg>
                    </div>
                </form>

                <!-- Notifications -->
                @php
                    $notifCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
                @endphp
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="relative p-2 rounded-lg bg-white bg-opacity-10 hover:bg-opacity-20 transition-all duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405C18.822 14.823 18 13.473 18 12V8a6 6 0 10-12 0v4c0 1.473-.822 2.823-1.595 3.595L3 17h5m7 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @if($notifCount > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-xs text-white w-5 h-5 rounded-full flex items-center justify-center font-bold">
                                {{ $notifCount }}
                            </span>
                        @endif
                    </button>

                    <!-- Notifications Dropdown -->
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition
                         class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-100 z-50">
                        <div class="bg-gradient-to-r from-[#483AA0] to-[#7965C1] px-4 py-3">
                            <h3 class="text-white font-bold">Notifikasi</h3>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            @php
                                $notifs = \App\Models\Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->limit(10)->get();
                            @endphp
                            @forelse($notifs as $notif)
                                <a href="{{ route('notifications.read', $notif->id) }}"
                                class="block p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors {{ !$notif->is_read ? 'bg-blue-50' : '' }}">
                                    <p class="font-semibold text-gray-900 text-sm">{{ $notif->title }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $notif->message }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>

                                </a>
                            @empty

                                <div class="p-8 text-center">
                                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405C18.822 14.823 18 13.473 18 12V8a6 6 0 10-12 0v4c0 1.473-.822 2.823-1.595 3.595L3 17h5m7 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    <p class="text-gray-500 text-sm">Tidak ada notifikasi</p>
                                </div>
                            @endforelse
                        </div>
                        <a href="{{ route('notifications.all') }}" class="block text-center py-3 bg-gray-50 text-[#7965C1] font-semibold text-sm hover:bg-gray-100 transition-colors">
                            Lihat Semua
                        </a>
                    </div>
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center space-x-3 px-4 py-2 bg-white bg-opacity-10 hover:bg-opacity-20 backdrop-blur-sm rounded-lg text-white font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden xl:block">{{ Str::limit(Auth::user()->name, 15) }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-100">
                            <div class="px-4 py-3 bg-gradient-to-r from-[#483AA0] to-[#7965C1]">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#483AA0] font-bold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-white font-semibold truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-white text-opacity-80 text-xs truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2">
                                <a href="{{ route('profile.show') }}" 
                                   class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-[#483AA0] hover:to-[#7965C1] hover:text-white transition-all duration-200 group">
                                    <svg class="w-5 h-5 text-[#7965C1] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-medium">Profile</span>
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 text-red-600 hover:bg-red-50 transition-all duration-200 group">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="font-medium">Log Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0E2148] bg-opacity-50 backdrop-blur-lg">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="{{ route('dashboard') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-semibold transition-all duration-200
                      {{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20 text-white shadow-lg' : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('projects.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-semibold transition-all duration-200
                      {{ request()->routeIs('projects.index') ? 'bg-white bg-opacity-20 text-white shadow-lg' : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <span>Proyek</span>
            </a>

            <a href="{{ route('tasks.mine') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-semibold transition-all duration-200
                      {{ request()->routeIs('tasks.mine') ? 'bg-white bg-opacity-20 text-white shadow-lg' : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                <span>Tugas</span>
            </a>

            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.users') }}"
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-semibold transition-all duration-200
                          {{ request()->routeIs('admin.users') ? 'bg-white bg-opacity-20 text-white shadow-lg' : 'text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                    <span>Manajemen User</span>
                </a>
            @endif

            <!-- Search Mobile -->
            <form action="{{ route('search') }}" method="GET" class="px-2 pt-2">
                <input type="text" name="q" placeholder="Cari..." class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-gray-200 focus:bg-opacity-30 focus:outline-none"/>
            </form>
        </div>

        <!-- User Info Mobile -->
        <div class="border-t border-white border-opacity-20">
            <div class="px-4 py-3 bg-white bg-opacity-5">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-full flex items-center justify-center text-[#0E2148] font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-300 truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-2 space-y-1 px-2 pb-3">
                <a href="{{ route('profile.show') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-medium text-gray-200 hover:bg-white hover:bg-opacity-10 hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profile</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-base font-medium text-red-300 hover:bg-red-500 hover:bg-opacity-20 hover:text-red-200 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>