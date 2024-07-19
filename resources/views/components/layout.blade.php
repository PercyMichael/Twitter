<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="bg-slate-50">

        <head>
            <nav class="flex justify-between p-4">
                <a href="/">Home</a>

                @guest
                <div>
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                </div>
                @endguest

                @auth
                <form action="/logout" method="post">
                    @csrf
                    <x-button href="/logout">Logout</x-button>
                </form>
                @endauth
            </nav>
        </head>
        {{$slot}}
    </div>
</body>

</html>