<x-guest-layout>
    <div class="max-w-md w-full space-y-8">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-1">
                <x-input-label for="name" :value="__('Full Name')" class="text-white/90 font-medium" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="John Doe"
                    class="block w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 backdrop-blur-md text-white placeholder-white/50 focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 shadow-lg" />
                <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
            </div>

            <!-- Email -->
            <div class="space-y-1">
                <x-input-label for="email" :value="__('Email Address')" class="text-white/90 font-medium" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="you@company.com"
                    class="block w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 backdrop-blur-md text-white placeholder-white/50 focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 shadow-lg" />
                <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
            </div>

            <!-- Password -->
            <div class="space-y-1">
                <x-input-label for="password" :value="__('Password')" class="text-white/90 font-medium" />
                <div class="relative">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="Password"
                        class="block w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 backdrop-blur-md text-white placeholder-white/50 pr-12 focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 shadow-lg" />
                    <button type="button" onclick="togglePass('password')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-white/60 hover:text-white transition">
                        <svg id="eye-open-pass" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-closed-pass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-white/60 mt-2">Use 8+ characters with a mix of letters, numbers & symbols</p>
                <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white/90 font-medium" />
                <div class="relative">
                    <x-text-input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="Comfirm Password"
                        class="block w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 backdrop-blur-md text-white placeholder-white/50 pr-12 focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 shadow-lg" />
                    <button type="button" onclick="togglePass('password_confirmation')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-white/60 hover:text-white transition">
                        <svg id="eye-open-confirm" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-closed-confirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
            </div>

            <!-- Submit Button -->
            <div>
                <x-primary-button class="w-full justify-center py-4 text-lg font-semibold rounded-xl bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 transform hover:-translate-y-0.5 transition-all duration-300 shadow-xl text-white text-shadow">
                    {{ __('Create Account') }}
                </x-primary-button>
            </div>

            <!-- Divider -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/20"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-transparent text-white/60">or continue with</span>
                </div>
            </div>

            <!-- Google Button -->
            <div>
                <button type="button" class="w-full flex items-center justify-center gap-3 py-3.5 px-4 border border-white/30 rounded-xl bg-white/5 backdrop-blur-md hover:bg-white/10 transition-all duration-300 group">
                    <svg class="w-6 h-6" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    <span class="text-white font-medium">Sign up with Google</span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-white/70 text-sm">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-violet-400 hover:text-violet-300 transition">
                        Log in
                    </a>
                </p>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function togglePass(id) {
            const field = document.getElementById(id);
            const open = document.getElementById('eye-open-' + id.split('_')[0]); // simplified
            const closed = document.getElementById('eye-closed-' + id.split('_')[0]);

            if (field.type === 'password') {
                field.type = 'text';
                document.getElementById('eye-open-pass').classList.remove('hidden');
                document.getElementById('eye-closed-pass').classList.add('hidden');
                document.getElementById('eye-open-confirm').classList.remove('hidden');
                document.getElementById('eye-closed-confirm').classList.add('hidden');
            } else {
                field.type = 'password';
                document.getElementById('eye-open-pass').classList.add('hidden');
                document.getElementById('eye-closed-pass').classList.remove('hidden');
                document.getElementById('eye-open-confirm').classList.add('hidden');
                document.getElementById('eye-closed-confirm').classList.remove('hidden');
            }
        }
    </script>
    @endpush
</x-guest-layout>
