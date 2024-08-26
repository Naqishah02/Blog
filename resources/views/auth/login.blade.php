<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    <x-session />
    <section class="px-4 pb-24 mx-auto max-w-7xl mt-20">
        <div class="w-full py-6 mx-auto md:w-3/5 lg:w-2/5">
            <h1 class="mb-1 text-xl font-medium text-center text-gray-800 md:text-3xl">Log in to your account</h1>
            <form class="mt-8 space-y-4" method="post" action="{{ route('login.store') }}">
                @csrf
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    <input class="form-input"
                           type="email"
                           name="email"
                           id="email"
                           placeholder="Ex. james@bond.com"
                           inputmode="email"
                            />
                    <x-error name="email" />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Create a password</span>
                    <input class="form-input"
                           name="password"
                           id="password"
                           type="password"
                           placeholder="••••••••"
                            />
                    <x-error name="password" />
                </label>
                <button class="w-full btn btn-primary btn-lg">Login</button>
                <p class="mb-2 text-sm font-normal text-center text-gray-700 md:text-base">
                    Create an account.
                    <a href="{{ route('register.index') }}" class="text-purple-700 hover:text-purple-900">Sign Up</a>
                </p>
            </form>
        </div>
    </section>


</x-layout>
