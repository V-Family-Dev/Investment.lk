<!DOCTYPE html>
<html lang="en">
<head>
<x-adminpanelcomponents.header-tags />
</head>
<body>
    <div class="vh-100 vw-100 bg-light d-flex overflow-hidden">
        <x-adminpanelcomponents.sidebar />
        <div class="overflow-x-hidden vh-100 flex-fill position-relative main-container d-flex flex-column">
            <x-adminpanelcomponents.header-bar path="User management / User list" />
            <div class="overflow-y-scroll overflow-x-hidden flex-fill py-5">
                <div class="bg-white p-5 rounded-4 shadow  main-content">
                    <div class="fs-6 text-secondary">Property manage</div>
                    <div class="fs-3 fw-semibold mb-5">Property list</div>

                    <div >
                        <div class="mb-3">
                            <table id="example" class="table table-striped"  >
                                <thead>
                                    <tr>
                                        <th class="min-width-100">ID</th>
                                        <th class="min-width-150">Property ID</th>
                                        <th class="min-width-180">Category Name</th>
                                        <th class="min-width-200">Added by</th>
                                        <th class="min-width-150">Payment ID</th>
                                        <th class="min-width-200">Payment status</th>
                                        <th class="min-width-100">Details</th>
                                        <th class="min-width-100">Status</th>
                                        <th class="min-width-100">Actions</th>
                                        <th class="min-width-250">Created at</th>
                                        <th class="min-width-250">Updated at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($propertyManages as $propertyManage)
                                    <tr>
                                        <td>{{ $propertyManage->id }}</td>
                                        <td>{{ $propertyManage->property_id }}</td>
                                        <td>{{ $propertyManage->category_name }}</td>
                                        <td>{{ $propertyManage->user->firstname ?? 'unknown' }} {{ $propertyManage->user->lastname ?? 'unknown' }}</td>
                                        <td>{{ $propertyManage->ads_payment_id }}</td>
                                        <td><span class="badge text-bg-{{ $propertyManage->status == 'pending' ? 'danger' : 'success' }}">{{ $propertyManage->status == 'pending' ? 'Pending' : 'Active' }}</span></td>
                                        <td>{{ $propertyManage->ads_payment_status }}</td>
                                        <td>{{ $propertyManage->active_or_not ? 'Active' : 'Inactive' }}</td>
                                        <!-- <td>
                                            <a href="{{ route('ad.details', ['property_id' => $propertyManage->property_id, 'category_name' => $propertyManage->category_name]) }}"
                                            class="btn btn-info">View Details</a>
                                        </td> -->
                                        <td>
                                            <button class="btn btn-info " data-id="{{ $propertyManage->property_id }}" data-category="{{ $propertyManage->category_name }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>

                                        <td>{{ $propertyManage->created_at->format('F j, Y, g:i a') }}</td>
                                        <td>{{ $propertyManage->updated_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>
</body>
</html>