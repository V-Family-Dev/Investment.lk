<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        body {
            background-image: url('https://s3-alpha-sig.figma.com/img/c6a9/8988/69ea407511b0acd5a8f97fa435a017a6?Expires=1721001600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fQ0eV4cPVpmW2ACaMGtYfvGK~9YhCcowZ2LzD6W1YKP9ahGFVKrEWmXhoYs9tTUcR2jikzZK-BBPSnnevqUoaxsGPjD6zOqthdcZHdIpNJRg836S-XP-xaFgQ5N4h7~clCzjw7EVgfIfghsLi27K0KCi9LBafafym7SLWae9KDfgHenxybkezXYryT9qew-8vLl8Nqd2I~jW8nClESMbRCDDMpQVjbRvwV8ji-WhKMUf6sisl9qVDUyUwhb7S4-Ablz8lgxs7Nxa0RM45HL0qtcuZDNxfkMb14yNlyyrjSP9~uzqSh~bqpD5f-dN5PbTcDq2oCui6Ahp-CnUD6ikug__');
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>Property Listing</title>
</head>
<body>
    <x-headerbar />
    <x-title-area title="Property Listing" subtitle="Home - Property Listing" image="https://www.figma.com/file/xveSGNDTJ4mvvJNpZX1sky/image/9d7c1ce912cd1cf65458486e3504befe5b99f45c" />

    <!-- Property grid container -->
    <div class="grid grid-cols-4 gap-x-8 gap-y-8 p-4">
        <!-- Assuming x-property generates multiple property items here -->
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
        <x-property />
    </div>
</body>
</html>
