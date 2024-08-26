<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>
    <div class="container mx-auto p-4">
        <div class="flex flex-col items-center">
            @if($user->picture)
                <img src="{{ asset('storage/images/' . $user->picture) }}" alt="Profile Picture" class="w-48 h-48 rounded-full mb-4">
            @else
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="w-48 h-48 rounded-full mb-4">
            @endif
            <h2 class="text-2xl font-bold mb-2">{{ $user->name }}</h2>
            <p class="text-gray-500 mb-4">{{ $user->email }}</p>
        </div>

        <div class="mt-8">
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
                                          :active="request()->is('profile/edit')"
                    >
                        Settings
                    </x-active-profile-tab>
                </nav>
            </div>
            {{-- Post --}}
            @if(count($user->posts) == 0)
                <section class="max-w-lg px-4 py-20 mx-auto space-y-1 text-center">
                    <h2 class="text-lg font-medium text-gray-800">You haven't created any posts yet.</h2>
                    <p class="text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod maxime maiores consectetur necessitatibus animi ea veniam optio eos! Id animi et excepturi earum aliquid deleniti.
                    </p>
                </section>
            @endif
            <section class="px-4 py-24 mx-auto max-w-7xl">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
                    @foreach($user->posts as $post)
                        <div>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900">
                                <a href="{{ route('post.show', $post->id) }}" class="text-gray-900 hover:text-purple-700">{{ $post->title }}</a>
                            </h2>
                            <p class="mb-3 text-sm font-normal text-gray-500">
                                {!! Str::substr($post->content,0,150) . ' .....' !!}
                            </p>
                            <p class="mb-3 text-sm font-normal text-gray-500">
                                <a href="#" class="font-medium text-gray-900 hover:text-purple-700">{{ $user->name }}</a>
                                • {{ $post->created_at->format('M-d-Y') }}
                            </p>
                            <div class="flex items-center">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form method="post" action="{{ route('post.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 btn btn-sm mx-2">Delete</button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </section>
            {{-- Comment --}}
            {{-- Settings --}}

        </div>
    </div>

</x-layout>
