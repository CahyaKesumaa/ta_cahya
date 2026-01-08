<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - DPM PM STIKOM</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app-simple.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex min-h-screen overflow-hidden">

        <!-- SIDEBAR (FULL KIRI) -->
        <aside
            class="w-64 bg-white dark:bg-gray-800 border-e border-gray-200 dark:border-gray-700 flex flex-col flex-shrink-0">
            <!-- Brand Logo -->
            <div class="h-16 flex items-center px-6 border-b border-gray-100 dark:border-gray-700">
                <span class="text-xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Admin Panel</span>
            </div>

            <!-- Menu Navigasi -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition {{ Request::is('admin/dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-blue-900' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.ecommerce') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition {{ Request::is('admin/ecommerce') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-blue-900' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    Statistik
                </a>

                <a href="{{ route('admin.calendar') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition {{ Request::is('admin/calendar') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-blue-900' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Calendar
                </a>



                <a href="{{ route('admin.form-elements') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition {{ Request::is('admin/form-elements') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-blue-900' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Form Elements
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition {{ Request::is('admin/users*') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-blue-900' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Daftar User
                </a>


            </nav>
        </aside>

        <!-- AREA KONTEN (TENAH) -->
        <main class="flex-1 flex flex-col overflow-hidden bg-gray-50 dark:bg-gray-900">
            <!-- Header Atas (Opsional) -->
            <header
                class="h-16 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 flex-shrink-0">
                <h1 class="text-lg font-semibold text-gray-700 dark:text-gray-200">@yield('page-title', 'Dashboard')
                </h1>

                <!-- Right Side Actions -->
                <div class="flex items-center gap-2">
                    <!-- Theme Toggler -->
                    <button type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
                        x-data="{
                            darkMode: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                            toggleTheme() {
                                this.darkMode = !this.darkMode;
                                if (this.darkMode) {
                                    document.documentElement.classList.add('dark');
                                    localStorage.setItem('color-theme', 'dark');
                                } else {
                                    document.documentElement.classList.remove('dark');
                                    localStorage.setItem('color-theme', 'light');
                                }
                            }
                        }" @click="toggleTheme()">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg x-show="darkMode" style="display: none;" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center gap-2 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300 font-bold overflow-hidden">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar"
                                        class="w-full h-full object-cover">
                                @else
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                @endif
                            </div>
                            <span
                                class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transition-transform"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 py-2 z-50 shadow-sm"
                            style="display: none;">

                            <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-700 mb-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate">
                                    {{ Auth::user()->name }}
                                </p>
                                @if(Auth::user()->email)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}
                                    </p>
                                @endif
                            </div>

                            <a href="{{ route('admin.profile') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 transition text-left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Isi Content yang akan diupdate bareng -->
            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>

            <!-- FOOTER -->
            <footer
                class="h-12 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex items-center justify-center px-8 flex-shrink-0">
                <p class="text-sm text-gray-500 dark:text-gray-400">© Sharefit 2026</p>
            </footer>
        </main>

    </div>

</body>

</html>