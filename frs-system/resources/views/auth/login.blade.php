<<<<<<< HEAD
<!DOCTYPE html>
<html class="h-full bg-gray-900">
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Logo" class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-white">Selamat datang di MyFRS ITS</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if ($errors->any())
            <div class="mb-4 rounded bg-red-500 p-3 text-white">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-100">Email address</label>
                <div class="mt-2">
                    <input id="email" type="email" name="email" required autocomplete="email"
                           class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm" />
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm" />
                </div>
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div>
            <p style="color:red;">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
>>>>>>> ee6e01452fc50caf4e6b7d74cc922ea1d7b2cc8f
