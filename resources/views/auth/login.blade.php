
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>Login</title>
</head>

<body>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
    <x-headerbar />
    <x-title-area title="Login" subtitle="Home - Login" image="images/building/build1.jpg" />

    <div class="flex items-center justify-center min-h-screen bg-secondary py-16">
        <div class="bg-primary p-8 rounded-lg shadow-xl w-full max-w-md">
            <h3 class="text-center text-accent text-sm font-bold">WELCOME HOME</h3>
            <h1 class="text-center text-2xl font-bold mt-2">Sign In to Your Account.</h1>
            <p class="text-center text-gray-600 mt-2">Donec in lacus ante. Etiam non elementum eros, in veatis nulla.
                Maecenas vitae commodo nunc, tempus suscipit.</p>

            <form class="mt-6" method="POST" action="{{ route('login') }}"enctype="multipart/form-data">
            @csrf
                <div class="mb-4">
                    <input type="email" placeholder="Your Mail here" name="email" :value="old('email')"  autofocus autocomplete="username"
                        class="w-full bg-secondary px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                        required>
                </div>
                <div class="mb-4 relative">
                    <input type="password" id="password" placeholder="Password" name="password"
                    required autocomplete="current-password" 
                        class="w-full bg-secondary px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                        required>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-accent">
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-accent">Forgot Password ?</a>
                </div>
                <button type="submit"
                    class="w-full bg-accent text-darkblue py-2 rounded-lg hover:bg-yellow-400 transition duration-200">Login</button>
            </form>

            <div class="mt-6 text-center text-gray-500">Or login with</div>
            <div class="mt-4 flex justify-center space-x-4">
                <button
                    class="bg-gray-200 py-2 px-4 rounded-lg flex items-center space-x-2 hover:bg-gray-300 transition duration-200 border-[1px]">
                    <i class="fa fa-apple" aria-hidden="true"></i><span class="text-xs">Apple</span>
                </button>
                <button
                    class="bg-gray-200 py-2 px-4 rounded-lg flex items-center space-x-2 hover:bg-gray-300 transition duration-200 border-[1px]">
                    <img src="{{ asset('images/icons/google-color-icon.svg') }}" class="h-4 w-4"><span
                        class="text-xs">Google</span>
                </button>
                <button
                    class="bg-gray-200 py-2 px-4 rounded-lg flex items-center space-x-2 hover:bg-gray-300 transition duration-200 border-[1px]">
                    <img src="{{ asset('images/icons/facebook-round-color-icon.svg') }}" class="h-4 w-4"><span
                        class="text-xs">Facebook</span>
                </button>
            </div>

            <p class="mt-6 text-center text-gray-600">Don’t have an account ? <a href="#"
                    class="text-accent">Create an account</a></p>
        </div>
    </div>

    <x-footer bgimage='images/building/build8.png' />

</body>

</html>
