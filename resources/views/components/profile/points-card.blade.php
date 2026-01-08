<div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div class="w-full">
            <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">User Stats (Points)</h4>

            {{-- Total Points --}}
            <div
                class="mb-8 p-6 bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl text-white shadow-lg shadow-blue-200 dark:shadow-none">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Total Points</p>
                        <h3 class="text-4xl font-bold">{{ optional(Auth::user()->points)->total_point ?? 0 }}</h3>
                    </div>
                    <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Detail Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Strength --}}
                <div class="p-4 rounded-xl bg-gray-50 border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-red-100 text-red-600 rounded-lg dark:bg-red-500/20 dark:text-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Strength</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ optional(Auth::user()->points)->strength ?? 0 }}</p>
                </div>

                {{-- Endurance --}}
                <div class="p-4 rounded-xl bg-gray-50 border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-2">
                        <div
                            class="p-2 bg-green-100 text-green-600 rounded-lg dark:bg-green-500/20 dark:text-green-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Endurance</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ optional(Auth::user()->points)->endurance ?? 0 }}</p>
                </div>

                {{-- Agility --}}
                <div class="p-4 rounded-xl bg-gray-50 border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-2">
                        <div
                            class="p-2 bg-yellow-100 text-yellow-600 rounded-lg dark:bg-yellow-500/20 dark:text-yellow-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Agility</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ optional(Auth::user()->points)->agility ?? 0 }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>