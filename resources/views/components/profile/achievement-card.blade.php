<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6"
    x-data="{
        openAddModal: false,
        openEditModal: false,
        openDeleteModal: false,
        editId: null,
        editName: '',
        editRank: '',
        editAction: '',
        deleteAction: '',
        
        editAchievement(id, name, rank) {
             this.editId = id;
             this.editName = name;
             this.editRank = rank;
             this.editAction = '{{ route('admin.achievements.update', ':id') }}'.replace(':id', id);
             this.openEditModal = true;
        },
        
        deleteAchievement(id) {
             this.deleteAction = '{{ route('admin.achievements.destroy', ':id') }}'.replace(':id', id);
             this.openDeleteModal = true;
        }
    }">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            Prestasi
        </h3>
        <button @click="openAddModal = true"
            class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New
        </button>
    </div>

    <!-- Achievements List -->
    <div class="flex flex-col gap-4">
        @if (Auth::user()->achievements->isEmpty())
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 py-4">
                No achievements added yet.
            </p>
        @else
            @foreach (Auth::user()->achievements as $achievement)
                <div
                    class="flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800 dark:text-white/90">
                                {{ $achievement->name }}
                            </h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Rank: {{ $achievement->rank }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ asset($achievement->file_path) }}" target="_blank"
                            class="p-2 text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </a>
                        
                        <button @click="editAchievement({{ $achievement->id }}, '{{ addslashes($achievement->name) }}', '{{ $achievement->rank }}')"
                            class="p-2 text-gray-500 hover:text-orange-600 dark:text-gray-400 dark:hover:text-orange-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>

                        <button @click="deleteAchievement({{ $achievement->id }})"
                            class="p-2 text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Add Achievement Modal -->
    <x-ui.modal x-show="openAddModal" :isOpen="false" class="max-w-[600px]">
        <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
            <div class="mb-6">
                <h4 class="text-xl font-semibold text-gray-800 dark:text-white/90">
                    Add New Achievement
                </h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Upload your certificate and details.
                </p>
            </div>

            <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-5">
                @csrf
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Achievement Name (Nama Sertifikat)
                    </label>
                    <input type="text" name="name" required
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:text-white/90"
                        placeholder="e.g. Lomba Web Design Nasional" />
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Rank (Juara Berapa)
                    </label>
                    <div class="relative">
                        <select name="rank" required
                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:text-white/90">
                            <option value="">Select Rank</option>
                            <option value="Juara 1">Juara 1</option>
                            <option value="Juara 2">Juara 2</option>
                            <option value="Juara 3">Juara 3</option>
                            <option value="Juara Harapan">Juara Harapan</option>
                        </select>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Certificate Document (Image/PDF)
                    </label>
                    <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png" required
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-800 dark:file:text-gray-200" />
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button @click="openAddModal = false" type="button"
                        class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
                        Add Achievement
                    </button>
                </div>
            </form>
        </div>
    </x-ui.modal>

    <!-- Edit Achievement Modal -->
    <x-ui.modal x-show="openEditModal" :isOpen="false" class="max-w-[600px]">
        <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
            <div class="mb-6">
                <h4 class="text-xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Achievement
                </h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Update your achievement details.
                </p>
            </div>

            <form :action="editAction" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Achievement Name (Nama Sertifikat)
                    </label>
                    <input type="text" name="name" x-model="editName" required
                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:text-white/90" />
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Rank (Juara Berapa)
                    </label>
                    <div class="relative">
                        <select name="rank" x-model="editRank" required
                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:text-white/90">
                            <option value="Juara 1">Juara 1</option>
                            <option value="Juara 2">Juara 2</option>
                            <option value="Juara 3">Juara 3</option>
                            <option value="Juara Harapan">Juara Harapan</option>
                        </select>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Update Document (Optional)
                    </label>
                    <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-800 dark:file:text-gray-200" />
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave empty to keep current file.</p>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button @click="openEditModal = false" type="button"
                        class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
                        Update Achievement
                    </button>
                </div>
            </form>
        </div>
    </x-ui.modal>

    <!-- Delete Confirmation Modal -->
    <x-ui.modal x-show="openDeleteModal" :isOpen="false" class="max-w-[400px]">
        <div class="relative w-full max-w-[400px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
            <div class="mb-6 text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-8 w-8 text-red-600 dark:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-semibold text-gray-800 dark:text-white/90">
                    Delete Achievement
                </h4>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Are you sure you want to delete this achievement? This action cannot be undone.
                </p>
            </div>

            <form :action="deleteAction" method="POST" class="flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button @click="openDeleteModal = false" type="button"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                    Cancel
                </button>
                <button type="submit"
                    class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-red-700">
                    Yes, Delete
                </button>
            </form>
        </div>
    </x-ui.modal>
</div>