<x-guest-layout>

    <div class="auth-page">

        <div class="auth-container">

            <!-- LEFT -->
            <div class="auth-left">

                <div class="auth-brand">

                    <div class="auth-logo">
                        🌍
                    </div>

                    <h1>
                        Air Monitoring
                    </h1>

                    <p>
                        Smart Environment Monitoring System
                    </p>

                </div>

                <div class="auth-showcase">

                    <span class="auth-badge">
                        Create Your Account
                    </span>

                    <h2>
                        Join The Future
                        <span>Of Air Monitoring</span>
                    </h2>

                    <p>
                        Mulai pantau kualitas udara secara realtime
                        menggunakan teknologi IoT dan dashboard modern.
                    </p>

                </div>

                <div class="feature-list">

                    <div class="feature-item">

                        <div class="feature-icon">🌫️</div>

                        <div>

                            <h3>Realtime Air Quality</h3>

                            <p>
                                Pantau kualitas udara setiap saat.
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">📊</div>

                        <div>

                            <h3>Interactive Dashboard</h3>

                            <p>
                                Visualisasi data sensor yang modern.
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">🔒</div>

                        <div>

                            <h3>Secure Authentication</h3>

                            <p>
                                Sistem keamanan berbasis Laravel.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="auth-right">

                <div class="auth-card">

                    <div class="auth-header">

                        <h2>
                            Create Account 🚀
                        </h2>

                        <p>
                            Buat akun baru untuk mulai menggunakan dashboard
                        </p>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="auth-form"
                    >

                        @csrf

                        <!-- NAME -->
                        <div class="form-group">

                            <label>
                                Full Name
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                class="form-input"
                                placeholder="Enter your full name"
                            >

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />

                        </div>

                        <!-- EMAIL -->
                        <div class="form-group">

                            <label>
                                Email Address
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="form-input"
                                placeholder="Enter your email"
                            >

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label>
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="form-input"
                                placeholder="Create password"
                            >

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- CONFIRM -->
                        <div class="form-group">

                            <label>
                                Confirm Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                class="form-input"
                                placeholder="Confirm password"
                            >

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Create Account
                        </button>

                        <div class="auth-footer">

                            <p>

                                Sudah punya akun?

                                <a
                                    href="{{ route('login') }}"
                                    class="auth-link"
                                >
                                    Login
                                </a>

                            </p>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
