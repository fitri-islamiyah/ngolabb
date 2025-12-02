<x-guest-layout>

<div class="fixed inset-0 bg-gradient-to-br from-[#0E2148] via-[#483AA0] to-[#7965C1] overflow-auto">   
    <div class="min-h-screen w-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative">

        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-[#E3D095] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-[#7965C1] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-[#483AA0] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>

        <!-- Main Container -->
        <div class="w-full max-w-6xl relative z-10">
            <div class="grid lg:grid-cols-2 gap-8 items-center">

                <!-- Left Side Branding (same as login) -->
                <div class="hidden lg:block text-white space-y-6">

                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-xl flex items-center justify-center shadow-2xl">
                            <svg class="w-8 h-8 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold">Ngolabb</h1>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-5xl font-bold leading-tight">
                            Create Your
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#E3D095] to-[#7965C1]">
                                Account
                            </span>
                        </h2>
                        <p class="text-xl text-gray-300">
                            Join us and start exploring your personalized dashboard.
                        </p>
                    </div>

                </div>

                <!-- Register Card -->
                <div class="w-full">
                    
                    <!-- Mobile Logo -->
                    <div class="lg:hidden mb-8 text-center">
                        <div class="inline-flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#E3D095] to-[#7965C1] rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#0E2148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h1 class="text-2xl font-bold text-white">YourApp</h1>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

                        <!-- Header -->
                        <div class="px-8 lg:px-10 pt-8 lg:pt-10 pb-6 lg:pb-8">
                            <h2 class="text-3xl lg:text-4xl font-bold text-[#0E2148]">Create Account</h2>
                            <p class="text-gray-600 mt-2 lg:mt-3 text-base lg:text-lg">
                                Fill in your details to get started
                            </p>
                        </div>

                        <!-- Form -->
                        <div class="px-8 lg:px-10 pb-8 lg:pb-10">
                            <form method="POST" action="{{ route('register') }}" class="space-y-5 lg:space-y-6">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <label class="block font-semibold text-[#0E2148] mb-2">Name</label>
                                    <input id="name" type="text" name="name"
                                        class="block w-full pl-4 pr-4 py-3.5 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-[#7965C1] focus:border-[#7965C1]"
                                        value="{{ old('name') }}" required autofocus>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block font-semibold text-[#0E2148] mb-2">Email</label>
                                    <input id="email" type="email" name="email"
                                        class="block w-full pl-4 pr-4 py-3.5 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-[#7965C1] focus:border-[#7965C1]"
                                        value="{{ old('email') }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <label class="block font-semibold text-[#0E2148] mb-2">Password</label>
                                    <input id="password" type="password" name="password"
                                        class="block w-full pl-4 pr-4 py-3.5 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-[#7965C1] focus:border-[#7965C1]"
                                        required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label class="block font-semibold text-[#0E2148] mb-2">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="block w-full pl-4 pr-4 py-3.5 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-[#7965C1] focus:border-[#7965C1]"
                                        required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- Submit -->
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-[#483AA0] to-[#7965C1] text-white py-3.5 px-6 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                                    Create Account
                                </button>

                                <!-- Login Link -->
                                <div class="text-center pt-2">
                                    <p class="text-gray-600">
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="font-semibold text-[#7965C1] hover:text-[#483AA0] underline decoration-2 decoration-[#E3D095] underline-offset-2">
                                            Sign In
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}
.animate-blob { animation: blob 7s infinite; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }
</style>

</x-guest-layout>
