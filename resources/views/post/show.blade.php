<x-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>

    <article class="px-4 py-24 mx-auto max-w-7xl">
        @if($post->user->id == $userId)
            <div class="flex justify-end items-center">
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="post" action="{{ route('post.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 btn btn-sm mx-2">Delete</button>
                </form>
            </div>
        @endif
        <div class="w-full mx-auto mb-12 text-center md:w-2/3">
            <p class="mb-3 text-xs font-semibold tracking-wider text-gray-500 uppercase">Development</p>
            <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl" itemprop="headline" title="{{ $post->title }}">
                {{ $post->title }}
            </h1>
            <p class="text-gray-700">
                Written by
        <a href="#" class="text-primary hover:text-primary-dark"><span>{{ $post->user->name }}</span></a>
                    {{ 'on ' . $post->created_at->format('M-d-Y') }}
            </p>
        </div>

        <div class="mx-auto prose">
            {!! $post->content !!}
        </div>
    </article>
    <div class="px-4 py-12 mx-auto">
        <!-- Comments Section Header -->
        <div class="mb-8">
            <h1 class="text-xl font-bold mx-32">Comment Section</h1>
        </div>
        <!-- Comment Form -->
        <div class="max-w-2xl mx-auto mt-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Leave a Comment</h2>
            <form action="{{ route('comment.store') }}" method="post" class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                @csrf
                <div class="mb-4">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea id="content"
                              name="content"
                              rows="3"
                              class="p-3 mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                              required></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                    Submit
                </button>
            </form>
        </div>

        <!-- Existing Comments -->
        <div class="max-w-2xl mx-auto">
            @foreach($post->comments as $comment)
                <div class="mb-6 p-4 border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex items-start mb-4">
                        @if($comment->user->picture)
                            <img src="{{ asset('storage/images/' . $comment->user->picture) }}" class="w-10 h-10 rounded-full mr-3">
                        @else
                            <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        @endif

                        <div>
                            <p class="font-semibold text-gray-800">{{ $comment->user->name }}</p>
                            <p class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Comment Content -->
                    <div class="comment-content" id="comment-content-{{ $comment->id }}">
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>

                    <!-- Edit Form -->
                    @if($comment->user->id == $userId)
                        <div class="edit-form hidden" id="edit-form-{{ $comment->id }}">
                            <form method="post" action="{{ route('comment.update', $comment->id) }}">
                                @csrf
                                @method('PATCH')
                                <textarea name="content" rows="4" class="w-full p-2 border border-gray-300 rounded">{{ $comment->content }}</textarea>
                                <div class="flex justify-end mt-2 mb-4">
                                    <button type="submit" class="btn btn-sm btn-light-primary">Save</button>
                                    <button type="button" class="btn btn-sm btn-light-secondary ml-2" onclick="toggleEditForm({{ $comment->id }})">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <!-- Buttons to Show Edit Form -->
                        <div class="flex justify-end">
                            <button type="button" class="btn btn-sm btn-light-primary" onclick="toggleEditForm({{ $comment->id }})">Edit</button>
                            <form method="post" action="{{ route('comment.destroy', $comment->id) }}" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-red-600">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- JavaScript to Toggle Edit Form -->
        <script>
            function toggleEditForm(commentId) {
                const contentDiv = document.getElementById(`comment-content-${commentId}`);
                const editForm = document.getElementById(`edit-form-${commentId}`);

                if (editForm.classList.contains('hidden')) {
                    contentDiv.classList.add('hidden');
                    editForm.classList.remove('hidden');
                } else {
                    contentDiv.classList.remove('hidden');
                    editForm.classList.add('hidden');
                }
            }
        </script>



    </div>



</x-layout>
