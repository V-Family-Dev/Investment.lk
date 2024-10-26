<div class="container">
    <h2>{{ ucfirst($category_name) }} Ad Details</h2>
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="adDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $adDetails->title ?? 'Ad Details' }}</h5>
                    <a href="{{ url()->previous() }}" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p><strong>Location:</strong> {{ $adDetails->location ?? 'N/A' }}</p>
                    @if(isset($adDetails->rent_price))
                        <p><strong>Rent Price:</strong> {{ $adDetails->rent_price }}</p>
                    @endif
                    <p><strong>Size:</strong> {{ $adDetails->size ?? 'N/A' }}</p>
                    <p><strong>Features:</strong> {{ $adDetails->features ?? 'N/A' }}</p>
                    <p><strong>Description:</strong> {{ $adDetails->description ?? 'N/A' }}</p>
                    <p><strong>Contact Details:</strong> {{ $adDetails->contact_details ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> {{ $adDetails->status ?? 'N/A' }}</p>

                    @if(isset($adDetails->image_path))
                                        <div>
                                            <strong>Images:</strong>
                                            @php
                                                // Split the image paths by comma to handle multiple images
                                                $imagePaths = explode(',', $adDetails->image_path);
                                            @endphp

                                            @foreach($imagePaths as $imagePath)
                                                <img src="{{ asset('storage/' . trim($imagePath)) }}" alt="Ad Image"
                                                    style="width:300px; max-height:300px; object-fit:cover; margin-bottom: 10px;">
                                            @endforeach
                                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>