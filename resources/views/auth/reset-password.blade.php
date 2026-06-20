<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="login-wrapper">

            <!-- LEFT SIDE -->
            <div class="login-left">

                <div class="login-brand">

                    <div class="brand-icon">
                        🔑
                    </div>

                    <h1>
                        Reset Password
                    </h1>

                    <p>
                        Create a new secure password for your
                        Air Monitoring Dashboard account
                    </p>

                </div>

                <div class="login-info">

                    <div class="info-card">

                        <span>🛡️</span>

                        <div>

                            <h3>
                                Secure Password
                            </h3>

                            <p>
                                Gunakan password yang kuat untuk
                                menjaga keamanan akun Anda
                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <span>⚡</span>

                        <div>

                            <h3>
                                Fast Recovery
                            </h3>

                            <p>
                                Reset password dengan cepat dan
                                aman melalui email verification
                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <span>🌍</span>

                        <div>

                            <h3>
                                Smart Monitoring
                            </h3>

                            <p>
                                Kembali mengakses dashboard
                                monitoring kualitas udara realtime
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="login-right">

                <div class="login-card">

                    <!-- HEADER -->
                    <div class="login-header">

                        <h2>
                            Create New Password
                        </h2>

                        <p>
                            Masukkan password baru untuk akun Anda
                        </p>

                    </div>

                    <!-- FORM -->
                    <form method="POST"
                        action="{{ route('password.store') }}"
                        class="login-form">

                        @csrf

                        <!-- TOKEN -->
                        <input
                            type="hidden"
                            name="token"
                            value="{{ $request->route('token') }}"
                        >

                        <!-- EMAIL -->
                        <div class="input-group">

                            <label>
                                Email Address
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                autofocus
                                autocomplete="username"
                                class="modern-input"
                                placeholder="Enter your email"
                            >

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>

                        <!-- PASSWORD -->
                        <div class="input-group mt-4">

                            <label>
                                New Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="modern-input"
                                placeholder="Enter new password"
                            >

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- CONFIRM -->
                        <div class="input-group mt-4">

                            <label>
                                Confirm Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="modern-input"
                                placeholder="Confirm new password"
                            >

                            <x-input-error
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2"
                            />

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="login-btn mt-6"
                        >
                            Reset Password
                        </button>

                        <!-- BACK LOGIN -->
                        <div class="text-center mt-6">

                            <a
                                href="{{ route('login') }}"
                                class="forgot-link"
                            >
                                ← Back to Login
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>