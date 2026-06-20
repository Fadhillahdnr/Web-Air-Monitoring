<section>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-white mb-2">
            🔒 Update Password
        </h2>

        <p class="text-slate-300">
            Use a strong password to keep your account secure.
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="text-slate-200 text-sm font-medium">
                Current Password
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="modern-input"
            >

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <label class="text-slate-200 text-sm font-medium">
                New Password
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                class="modern-input"
            >

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <label class="text-slate-200 text-sm font-medium">
                Confirm Password
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="modern-input"
            >

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center gap-4">

            <button class="modern-btn">
                Update Password
            </button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-green-400 text-sm"
                >
                    ✅ Password updated
                </p>

            @endif

        </div>

    </form>

</section>