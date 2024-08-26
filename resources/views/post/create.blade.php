<x-layout>
    <x-slot:title>
        Create a Post
    </x-slot:title>
    <div class="flex justify-center mt-1">
        <div class="w-full max-w-5xl p-6 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Create a New Post</h1>
            <form class="space-y-6" method="post" action="{{ route('post.store') }}">
                @csrf
                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input id="title"
                           name="title"
                           type="text"
                           placeholder="Enter your post title"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                </div>

                <div>
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea id="editor" name="content"></textarea>
                </div>

                <div>
                    <button class="btn btn-github w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
