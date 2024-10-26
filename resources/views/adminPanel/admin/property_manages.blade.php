
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

    <!-- Sign Up Form -->
    <div class="container">
    <h2>Property Management</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Property ID</th>
                <th>user name </th>
                <th>Status</th>
                <th>Ads Payment ID</th>
                <th>Ads Payment Status</th>
                <th>Active / Delete</th>
                <th>view property details </th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propertyManages as $propertyManage)
                <tr>
                    <td>{{ $propertyManage->id }}</td>
                    <td>{{ $propertyManage->category_name }}</td>
                    <td>{{ $propertyManage->property_id }}</td>
                    <td>{{ $propertyManage->user->firstname }} {{ $propertyManage->user->lastname }}</td>
                    <td>
                        @if($propertyManage->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @else
                        <span class="badge bg-success">Active</span>

                        @endif
                    </td>
                    <td>{{ $propertyManage->ads_payment_id }}</td>
                    <td>{{ $propertyManage->ads_payment_status }}</td>
                    <td>
                        @if($propertyManage->active_or_not)
                            <form action="{{ route('property_manages.destroy', $propertyManage->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @else
                            <span class="text-muted">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $propertyManage->created_at }}</td>
                    <td>{{ $propertyManage->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

    <!-- Footer -->
    <footer class="mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


</body>

</html>
