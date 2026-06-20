<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="login-wrapper">

            <!-- LEFT -->
            <div class="login-left">

                <div class="login-brand">

                    <div class="brand-icon">
                        🔒
                    </div>

                    <h1>
                        Secure Access
                    </h1>

                    <p>
                        Confirm your password to continue
                        accessing protected features
                    </p>

                </div>

                <div class="login-info">

                    <div class="info-card">

                        <span>🛡️</span>

                        <div>

                            <h3>
                                Security Verification
                            </h3>

                            <p>
                                Konfirmasi password untuk
                                menjaga keamanan akun Anda
                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <span>🔑</span>

                        <div>

                            <h3>
                                Protected Access
                            </h3>

                            <p>
                                Sistem keamanan modern berbasis
                                Laravel Authentication
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
                                Air Monitoring Dashboard dengan
                                keamanan realtime
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="login-right">

                <div class="login-card">

                    <div class="login-header">

                        <h2>
                            Confirm Password
                        </h2>

                        <p>
                            Masukkan password akun Anda untuk melanjutkan
                        </p>

                    </div>

                    <div class="mb-6 text-sm text-slate-500 leading-6">

                        Ini adalah area aman dari aplikasi.
                        Silakan konfirmasi password Anda sebelum melanjutkan.

                    </div>

                    <form method="POST"
                        action="{{ route('password.confirm') }}"
                        class="login-form">

                        @csrf

                        <!-- PASSWORD -->
                        <div class="input-group">

                            <label>
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="modern-input"
                                placeholder="Enter your password"
                            >

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="login-btn mt-6"
                        >
                            Confirm Access
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>