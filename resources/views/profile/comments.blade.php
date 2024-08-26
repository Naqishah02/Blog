<x-layout>
    <x-slot:title>
        Comments
    </x-slot:title>
    <div class="space-y-2">
        <nav class="tab justify-center">
            <x-active-profile-tab href="{{ route('profile.index') }}"
                                  :active="request()->is('profile')"
            >
                Recent Posts
            </x-active-profile-tab>
            <x-active-profile-tab href="{{ route('comment.show') }}"
                                  :active="request()->is('comment')"
            >
                Comments
            </x-active-profile-tab>
            <x-active-profile-tab href="{{ route('profile.edit', $userId) }}"
                                  :active="request()->is('profile/edit')"
            >
                Settings
            </x-active-profile-tab>
        </nav>
    </div>
    <div>
        @if(count($comments) == 0)
            No comments found.
        @endif
        <div class="m-3 grid grid-cols-1 gap-3 md:grid-cols-3">
            @foreach($comments as $comment)
                <a class="card border-1 border-blue-400" href="{{ route('post.show', $comment->post->id) }}">
                    <h1 class="text-center">{{ $comment->post->title }}</h1>
                    <hr>
                    <div class="card-body">
                        <p class="text-center">
                            {{ $comment->content }}
                            <span class="text-xs"> - {{ $comment->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    <div class="flex justify-center absolute bottom-2 left-0 right-0">
        {{ $comments->links() }}
    </div>
    </div>
</x-layout>
