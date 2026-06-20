<x-guest-layout>

    <div class="auth-page">

        <div class="auth-container">

            <!-- LEFT -->
            <div class="auth-left">

                <div class="auth-brand">

                    <div class="auth-logo">
                        🔐
                    </div>

                    <h1>
                        Password Recovery
                    </h1>

                    <p>
                        Secure account recovery system
                    </p>

                </div>

                <div class="auth-showcase">

                    <span class="auth-badge">
                        Password Recovery
                    </span>

                    <h2>
                        Recover Your
                        <span>Account Access</span>
                    </h2>

                    <p>
                        Masukkan email Anda dan kami akan mengirimkan
                        link untuk membuat password baru.
                    </p>

                </div>

                <div class="feature-list">

                    <div class="feature-item">

                        <div class="feature-icon">📧</div>

                        <div>

                            <h3>Email Verification</h3>

                            <p>
                                Link reset dikirim langsung ke email.
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">🔒</div>

                        <div>

                            <h3>Secure Process</h3>

                            <p>
                                Reset password yang aman dan terpercaya.
                            </p>

                        </div>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">⚡</div>

                        <div>

                            <h3>Fast Recovery</h3>

                            <p>
                                Hanya beberapa langkah untuk kembali login.
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
                            Forgot Password?
                        </h2>

                        <p>
                            Masukkan email akun Anda
                        </p>

                    </div>

                    <x-auth-session-status
                        class="auth-alert"
                        :status="session('status')"
                    />

                    <form
                        method="POST"
                        action="{{ route('password.email') }}"
                        class="auth-form"
                    >

                        @csrf

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
                                class="form-input"
                                placeholder="Enter your email"
                            >

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Send Reset Link
                        </button>

                        <div class="auth-footer">

                            <a
                                href="{{ route('login') }}"
                                class="auth-link"
                            >
                                ← Back To Login
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
