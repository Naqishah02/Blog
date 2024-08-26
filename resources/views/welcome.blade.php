<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    @guest
        <section class="px-4 py-32 mx-auto max-w-7xl">
            <div class="w-full mx-auto lg:w-8/12 xl:w-5/12">
                <p class="mb-2 text-xs font-semibold tracking-wide text-gray-400 uppercase">For Developers</p>
                <h1 class="mb-3 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">Focus on your apps</h1>
                <p class="mb-5 text-base text-gray-500 md:text-lg">
                    Today every company needs apps to engage their customers and run their businesses. Step up your ability to build, manage, and deploy great apps at scale with us.
                </p>
                <a href="{{ route('register.index') }}" class="w-full mb-2 btn btn-primary btn-lg sm:w-auto sm:mb-0">Sign up for free</a>
            </div>
        </section>
    @endguest
    @auth

        <x-session />

        <section class="w-full px-4 mx-auto max-w-7xl md:w-3/4 lg:w-2/4">
            <div class="flex justify-end py-10">
                <a href="{{ route('post.create') }}" class="rounded-full btn btn-success">Create</a>
            </div>
            <div class="mb-12 text-left md:text-center">
                <h2 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900">Blog</h2>
                <p class="text-lg text-gray-500">Everything comes directly from the desk of the respective engineers, creators and managers at Blog.</p>
            </div>
            <div class="flex flex-col space-y-12 divide-y divide-gray-200">
                @foreach($posts as $post)
                    <div>
                        <p class="pt-12 mb-3 text-sm font-normal text-gray-500">
                            <span class="mr-1 font-medium">{{ $post->user->name }} -</span>
                            {{ $post->created_at->format('M-d-Y') }}
                        </p>
                        <h2 class="mb-2 text-xl font-extrabold leading-snug tracking-tight text-gray-800 md:text-3xl">
                            <a href="{{ route('post.show', $post->id) }}" class="text-gray-900 hover:text-purple-700">{{ $post->title }}</a>
                        </h2>
                        <p class="mb-4 text-base font-normal text-gray-600">
                            {!! Str::substr($post->content,0,150) . ' .....' !!}
                        </p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-light btn-sm">Continue Reading</a>
                    </div>
                @endforeach
                <div class="p-16">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>

    @endauth
</x-layout>
