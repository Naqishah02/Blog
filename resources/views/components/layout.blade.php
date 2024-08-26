<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tiny.cloud/1/ysrpuw9exw5tbuf56q9r4a8m9t6myq78qdxwzoexb6eyubq7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/kutty.min.js"></script>
</head>
<body>
<section class=" bg-gray-50">
    <header class="sticky top-0 bg-white shadow">
        <div class="flex items-center justify-between p-4 mx-auto max-w-7xl">
            <a href="/">
                <img class="h-full w-10" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-light">Login</a>
            @endguest
            @auth
                <div class="flex gap-2">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-light">Logout</button>
                    </form>
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-primary">Profile</a>
                </div>
            @endauth
        </div>
    </header>
</section>

{{ $slot }}



<script>
    tinymce.init({
        selector: '#editor',
        height: 300
    });
</script>
</body>
</html>
