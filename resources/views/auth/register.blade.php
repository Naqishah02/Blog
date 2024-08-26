<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <section class="px-4 pb-24 mx-auto max-w-7xl">
        <div class="w-full py-6 mx-auto md:w-3/5 lg:w-2/5">
            <h1 class="mb-1 text-xl font-medium text-center text-gray-800 md:text-3xl">Create your Free Account</h1>
            <p class="mb-2 text-sm font-normal text-center text-gray-700 md:text-base">
                Already have an account?
                <a href="{{ route('login') }}" class="text-purple-700 hover:text-purple-900">Sign in</a>
            </p>
            <form class="mt-8 space-y-4" method="post" action="{{ route('register.store') }}">
                @csrf
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Name</span>
                    <input class="form-input"
                           name="name"
                           id="name"
                           type="text"
                           placeholder="Your full name"
                           required />
                    <x-error name="name" />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    <input class="form-input"
                           id="email"
                           name="email"
                           type="email"
                           placeholder="Ex. james@bond.com"
                           inputmode="email"
                           required />
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
                <input type="submit" class="w-full btn btn-primary btn-lg" value="Sign Up" />
            </form>

            <p class="my-5 text-xs font-medium text-center text-gray-700">
                By clicking "Sign Up" you agree to our
                <a href="#" class="text-purple-700 hover:text-purple-900">Terms of Service</a>
                and
                <a href="#" class="text-purple-700 hover:text-purple-900">Privacy Policy</a>.
            </p>
        </div>
    </section>

</x-layout>
