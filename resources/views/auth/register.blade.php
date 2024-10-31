<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <title>Sign Up</title>

    <style>
        body {
            background-image: url('{{ asset('images/property/anju/propertyDetailBackgroundphoto.png') }}');
            background-size: cover;
            background-position: center;
        }

        @layer utilities {
            .bg-primary {
                background-color: #FFCC00;
            }

            .bg-secondary {
                background-color: #ECBD00;
            }

            .text-accent {
                color: #CC9900;
            }

            .bg-accent {
                background-color: #CC9900;
            }

            .hover-bg-darkaccent:hover {
                background-color: #B8860B;
            }

            .focus-border-darkaccent:focus {
                border-color: #B8860B;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area
            title="Sign Up"
            subtitle="Home - Sign Up"
            image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
        />
    </header>
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
    <!-- Sign Up Form -->
    <div class="flex-grow flex items-center justify-center py-16">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-center text-3xl font-bold text-black">Sign Up</h1>
            <p class="text-center text-sm text-gray-600 mt-2">Create your account by filling in the information below.</p>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="first-name" class="block text-sm font-medium text-black">First Name</label>
                        <input type="text" id="first-name" placeholder="Enter your first name" name="firstname" :value="old('firstname')"
                            class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                    </div>
                    <div class="w-1/2">
                        <label for="last-name" class="block text-sm font-medium text-black">Last Name</label>
                        <input type="text" id="last-name" placeholder="Enter your last name" name="lastname" :value="old('lastname')"
                            class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-black">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" name="email" :value="old('email')"
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <div>
                    <label for="id-number" class="block text-sm font-medium text-black">ID Number</label>
                    <input type="text" id="id-number" placeholder="Enter your ID number" name="idnumber" :value="old('idnumber')"
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-black">Address</label>
                    <input type="text" id="address" placeholder="Enter your address" name="address" :value="old('address')"
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-black">Phone Number</label>
                    <input type="text" id="phone" placeholder="Enter your phone number" name="phonenumber" :value="old('phonenumber')"
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="first-name" class="block text-sm font-medium text-black">Front Side of ID Card</label>
                        <div class="flex items-center file-select w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                            <input type="file" name="front_fide_if_card" id="nic_front" placeholder="" class="hidden">
                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                            <span class="ps-3 flex-fill text-slate-500 truncate clip">Select file</span>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="last-name" class="block text-sm font-medium text-black">Back Side of ID Card</label>
                        <div class="flex items-center file-select w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                            <input type="file" name="back_fide_if_card" id="nic_back" placeholder="" class="hidden">
                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                            <span class="ps-3 flex-fill text-slate-500 truncate clip">Select file</span>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-black">Password</label>
                    <input type="password" id="id-number" placeholder="Password" name="password"
                    required autocomplete="new-password" 
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-black">Confirm Password</label>
                    <input type="password" id="id-number" placeholder="Confirm password"  name="password_confirmation" required autocomplete="new-password" 
                        class="w-full p-3 rounded-lg border border-accent bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-accent focus-border-darkaccent">
                </div>
                <button type="submit"
                    class="w-full p-3 bg-accent text-white rounded-lg font-semibold hover-bg-darkaccent transition duration-300">Create
                    Account</button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}"
                    class="text-accent hover:underline">Sign in</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $('.file-select').on('click', function(){
            const input = this.querySelector('input[type=file]');
            input.click();
            $(input).on('change', function(){
                $(this).parent().find('span').text(this.files[0].name);
                console.log(this.files[0].name);
            });
        });
    </script>

</body>

</html>
