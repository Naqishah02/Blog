<x-layout>
    <x-slot:title>
        Edit
    </x-slot:title>

    <div class="flex justify-center mt-8">
        <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-8 text-gray-900">Edit: {{ $post->title }}</h1>
            <form class="space-y-6" method="post" action="{{ route('post.update', $post->id) }}">
                @csrf
                @method('PATCH')
                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input id="title"
                           name="title"
                           type="text"
                           value="{{ $post->title }}"
                           placeholder="Enter your post title"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                           required>
                </div>

                <div>
                    <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                    <textarea id="editor"
                              name="content"
                              placeholder="Write your post content here..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                              rows="10"
                              required>
                        {{ $post->content }}
                    </textarea>
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
