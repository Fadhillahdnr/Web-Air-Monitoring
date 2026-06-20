<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="login-wrapper">

            <!-- LEFT -->
            <div class="login-left">

                <div class="login-brand">

                    <div class="brand-icon">
                        📧
                    </div>

                    <h1>
                        Verify Email
                    </h1>

                    <p>
                        Complete your account verification
                        to access the Air Monitoring Dashboard
                    </p>

                </div>

                <div class="login-info">

                    <div class="info-card">

                        <span>📩</span>

                        <div>

                            <h3>
                                Email Verification
                            </h3>

                            <p>
                                Verifikasi email untuk mengaktifkan akun Anda
                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <span>🔐</span>

                        <div>

                            <h3>
                                Secure Access
                            </h3>

                            <p>
                                Sistem keamanan modern untuk dashboard monitoring
                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <span>🌍</span>

                        <div>

                            <h3>
                                IoT Monitoring
                            </h3>

                            <p>
                                Monitoring kualitas udara realtime berbasis ESP32
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
                            Verify Your Email
                        </h2>

                        <p>
                            Aktivasi akun Anda sebelum melanjutkan
                        </p>

                    </div>

                    <div class="mb-6 text-sm text-slate-500 leading-6">

                        Terima kasih telah mendaftar!
                        Sebelum mulai menggunakan dashboard,
                        silakan verifikasi alamat email Anda
                        melalui link yang telah dikirimkan.

                    </div>

                    @if (session('status') == 'verification-link-sent')

                        <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 text-sm">

                            Link verifikasi baru berhasil dikirim
                            ke email Anda.

                        </div>

                    @endif

                    <div class="space-y-4">

                        <!-- RESEND -->
                        <form method="POST"
                            action="{{ route('verification.send') }}">

                            @csrf

                            <button
                                type="submit"
                                class="login-btn"
                            >
                                Resend Verification Email
                            </button>

                        </form>

                        <!-- LOGOUT -->
                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="w-full py-4 rounded-2xl border border-slate-300 text-slate-700 font-semibold hover:bg-slate-100 transition"
                            >
                                Logout
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>