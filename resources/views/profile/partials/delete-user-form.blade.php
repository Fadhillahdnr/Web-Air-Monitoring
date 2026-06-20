<section>

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-red-400 mb-2">
            ⚠️ Danger Zone
        </h2>

        <p class="text-red-200">
            Permanently delete your account and all monitoring data.
        </p>

    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500 hover:bg-red-600 transition px-6 py-3 rounded-xl text-white font-semibold shadow-lg"
    >
        Delete Account
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-slate-900 rounded-2xl">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-white mb-3">
                Delete Account?
            </h2>

            <p class="text-slate-300 mb-6">
                This action cannot be undone. Please enter your password to continue.
            </p>

            <input
                id="password"
                name="password"
                type="password"
                placeholder="Enter your password"
                class="modern-input"
            >

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400" />

            <div class="mt-8 flex justify-end gap-4">

                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-white transition"
                >
                    Cancel
                </button>

                <button class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white transition">
                    Delete Permanently
                </button>

            </div>

        </form>

    </x-modal>

</section>