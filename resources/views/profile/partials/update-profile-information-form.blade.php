<section>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-white mb-2">
            👤 Profile Information
        </h2>

        <p class="text-slate-300">
            Update your personal account information.
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- NAME -->
        <div>
            <label class="text-slate-200 text-sm font-medium">
                Full Name
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="modern-input"
            >

            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
        </div>

        <!-- EMAIL -->
        <div>
            <label class="text-slate-200 text-sm font-medium">
                Email Address
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="modern-input"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-4 p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-xl">

                    <p class="text-yellow-300 text-sm">
                        ⚠️ Your email address is not verified.
                    </p>

                    <button
                        form="send-verification"
                        class="mt-3 text-sm text-cyan-400 hover:text-cyan-300 transition"
                    >
                        Resend verification email
                    </button>

                </div>

            @endif
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4">

            <button class="modern-btn">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-green-400 text-sm"
                >
                    ✅ Profile updated successfully
                </p>

            @endif

        </div>

    </form>

</section>