<x-layout>
    <x-slot:title>
        Settings
    </x-slot:title>
    <div class="space-y-2">
        <nav class="tab justify-center">
            <x-active-profile-tab href="{{ route('profile.index') }}"
                                  :active="request()->is('profile')"
            >
                Recent Posts
            </x-active-profile-tab>
            <x-active-profile-tab href="{{ route('comment.show') }}"
                                  
            >
                Comments
            </x-active-profile-tab>
            <x-active-profile-tab href="{{ route('profile.edit', $user->id) }}"
                                  :active="request()->is('profile/' . $user->id . '/edit')"
            >
                Settings
            </x-active-profile-tab>
        </nav>
    </div>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Profile Settings</h2>

        <form method="post" action="{{ route('profile.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ $user->name }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                <x-error name="name" />
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ $user->email }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                <x-error name="email" />
            </div>
            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                <x-error name="password" />
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button class="btn btn-sm btn-primary">Save</button>
                <button class="btn btn-sm btn-danger">Cancel</button>
            </div>
        </form>
        <form enctype="multipart/form-data" action="{{ route('profile.picture', $user->id) }}" method="post">
            @method('PATCH')
            @csrf
            <!-- Profile Picture -->
            <div class="mb-6 mt-10">
                <label class="block text-sm font-medium text-gray-700 mb-5">Profile Picture</label>
                <div class="flex items-center">
                    <img src="{{ asset('storage/images/' . $user->picture) }}" class="w-24 h-24 rounded-full border border-gray-300 mr-4">
                    <div>
                        <input type="file"
                               name="picture"
                               id="picture"
                               class="block text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                        <button class="btn btn-sm mt-2 btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>
