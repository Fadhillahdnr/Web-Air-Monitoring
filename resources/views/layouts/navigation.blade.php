<nav
    x-data="{ open: false }"
    class="navbar-custom"
>

    <div class="navbar-container">

        <!-- LEFT -->
        <div class="navbar-left">

            <a
                href="{{ route('dashboard') }}"
                class="logo-wrapper"
            >

                <div class="logo-icon">

                    🌍

                </div>

                <div class="logo-text">

                    <h1 class="logo-title">

                        Air Monitoring

                    </h1>

                    <p class="logo-subtitle">

                        Smart Environment System

                    </p>

                </div>

            </a>

            <!-- MENU -->
            <div class="desktop-menu">

                <a
                    href="{{ route('dashboard') }}"
                    class="nav-item {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="nav-icon"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-6H3v6zm10-10h8V3h-8v8z"
                        />
                    </svg>

                    Dashboard

                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="navbar-right">

            <!-- LIVE -->
            <div class="live-indicator">

                <span class="live-dot"></span>

                <span>

                    Realtime Active

                </span>

            </div>

            <!-- NOTIFICATION -->
            <button class="notification-btn">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 17h5l-1.4-1.4A2 2 0 0118 14.17V11a6 6 0 10-12 0v3.17a2 2 0 01-.6 1.43L4 17h5m6 0a3 3 0 11-6 0m6 0H9"
                    />
                </svg>

            </button>

            <!-- USER -->
            <div class="hidden md:block">

                <x-dropdown
                    align="right"
                    width="64"
                >

                    <x-slot name="trigger">

                        <button class="user-button">

                            <div class="user-avatar">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                            <div class="user-info">

                                <p class="user-name">

                                    {{ Auth::user()->name }}

                                </p>

                                <p class="user-role">

                                    Administrator

                                </p>

                            </div>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="user-arrow"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link
                            :href="route('profile.edit')"
                        >

                            👤 Profile

                        </x-dropdown-link>

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                            >

                                🚪 Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- MOBILE -->
            <button
                @click="open = ! open"
                class="mobile-menu-btn md:hidden"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

            </button>

        </div>

    </div>

    <!-- MOBILE MENU -->

    <div
        x-show="open"
        x-transition
        class="mobile-menu"
    >

        <a
            href="{{ route('dashboard') }}"
            class="mobile-nav-link"
        >

            Dashboard

        </a>

        <a
            href="{{ route('profile.edit') }}"
            class="mobile-nav-link"
        >

            Profile

        </a>

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="mobile-nav-link logout-btn"
            >

                Logout

            </button>

        </form>

    </div>

</nav>
