<x-guest-layout>

    <div class="auth-page">

        <div class="auth-container">

            <!-- LEFT SIDE -->
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
                        Realtime Monitoring Platform
                    </span>

                    <h2>
                        Monitor Air Quality
                        <span>Anywhere</span>
                    </h2>

                    <p>
                        Pantau PM2.5, Carbon Monoxide, Ozone,
                        Temperatur, dan status perangkat secara
                        realtime melalui dashboard modern berbasis IoT.
                    </p>

                </div>

                <div class="feature-list">

                    <div class="feature-item">

                        <div class="feature-icon">
                            📡
                        </div>

                        <div>

                            <h3>Realtime IoT</h3>

                            <p>
                                Data sensor langsung dari ESP32
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">
                            📊
                        </div>

                        <div>

                            <h3>Analytics Dashboard</h3>

                            <p>
                                Visualisasi data yang mudah dipahami
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">
                            🔒
                        </div>

                        <div>

                            <h3>Secure Access</h3>

                            <p>
                                Login aman dengan Laravel Authentication
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="auth-right">

                <div class="auth-card">

                    <div class="auth-header">

                        <h2>
                            Welcome Back 👋
                        </h2>

                        <p>
                            Login untuk mengakses dashboard monitoring
                        </p>

                    </div>

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')"
                    />

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="auth-form"
                    >

                        @csrf

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
                                autofocus
                                autocomplete="username"
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
                                autocomplete="current-password"
                                class="form-input"
                                placeholder="Enter your password"
                            >

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- OPTIONS -->
                        <div class="auth-options">

                            <label class="remember-me">

                                <input
                                    type="checkbox"
                                    name="remember"
                                >

                                <span>
                                    Remember me
                                </span>

                            </label>

                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="auth-link"
                                >
                                    Forgot Password?
                                </a>

                            @endif

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Sign In
                        </button>

                        <!-- REGISTER -->
                        <div class="auth-footer">

                            <p>

                                Belum punya akun?

                                <a
                                    href="{{ route('register') }}"
                                    class="auth-link"
                                >
                                    Register
                                </a>

                            </p>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
