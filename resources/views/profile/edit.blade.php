<x-app-layout>
    <x-slot name="header">

        <div class="relative overflow-hidden rounded-3xl header-glow">

            <!-- BACKGROUND -->
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-700"></div>

            <!-- GLOW -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-cyan-300 opacity-20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-300 opacity-20 rounded-full blur-3xl"></div>

            <!-- CONTENT -->
            <div class="relative z-10 px-8 py-8 flex flex-col md:flex-row md:items-center md:justify-between">

                <!-- LEFT -->
                <div class="flex items-center gap-5">

                    <!-- ICON -->
                    <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-lg">

                        <span class="text-3xl">
                            ⚙️
                        </span>

                    </div>

                    <!-- TEXT -->
                    <div>

                        <h2 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
                            Profile Settings
                        </h2>

                        <p class="text-cyan-100 mt-2 text-sm md:text-base">
                            Manage your account information, password, and security settings.
                        </p>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="mt-6 md:mt-0">

                    <div class="bg-white/10 backdrop-blur-md border border-white/20 px-5 py-3 rounded-2xl shadow-lg">

                        <p class="text-cyan-100 text-sm">
                            Logged in as
                        </p>

                        <h3 class="text-white font-semibold text-lg">
                            {{ Auth::user()->name }}
                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-10 px-4">

        <div class="max-w-5xl mx-auto space-y-8">

            <!-- PROFILE INFO -->
            <div class="glass-card rounded-3xl p-8 shadow-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- PASSWORD -->
            <div class="glass-card rounded-3xl p-8 shadow-2xl">
                @include('profile.partials.update-password-form')
            </div>

            <!-- DELETE -->
            <div class="bg-red-500/10 border border-red-500/20 rounded-3xl p-8 shadow-2xl">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>
</x-app-layout>