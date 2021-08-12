@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
<form action="{{route('admin.property.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="carousel">
                                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                        @if($images != NULL)
                                            @foreach($images as $index => $image)
                                                
                                                @if($index == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{url('images', App\Models\FileManager::where('id', $image)->first()->file_name)}}" class="d-block w-100" alt="...">
                                                    </div>
                                                @else
                                                    <div class="carousel-item">
                                                        <img src="{{url('images', App\Models\FileManager::where('id', $image)->first()->file_name)}}" class="d-block w-100" alt="...">
                                                    </div>
                                                @endif

                                            @endforeach
                                        @endif
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4 class="mb-0">{{ $property->name}}</h4>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $property->property_type}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 pe-0 align-items-center">
                                <div class="col-6">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Location</td>
                                                <td>Colombo, {{ $property->country}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Price</td>
                                                <td>{{ $property->price}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Category</td>
                                                <td>{{ $property->main_category}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Meta Description</td>
                                                <td>{{ $property->meta_description}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Slug</td>
                                                <td>{{ $property->slug}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-6 pe-0">
                                    <div id="map" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>

                            <div class="row mt-5 pe-0 align-items-center">
                                <div class="col-6">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Transaction Type</td>
                                                <td>{{ $property->transaction_type}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Zoning Type</td>
                                                <td>{{ $property->zoning_type}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Building Type</td>
                                                <td>{{ $property->building_type}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Building Size</td>
                                                <td>{{ $property->building_size}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Farm Type</td>
                                                <td>{{ $property->farm_type}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-6 pe-0">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="card">
                                                <div class="text-center mt-2">
                                                    <img src="{{ url('files/agent_request', App\Models\AgentRequest::where('user_id', $property->user_id)->first()->photo) }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 8rem; width: 40%">
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->name }}</h5>
                                                    <p class="card-text mb-0">Email : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                    <p class="card-text mb-0">Phone : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Admin Approval</label>
                                <select class="form-control" name="admin_approval" required>
                                    <option value="Approved" {{ $property->admin_approval == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Rejected" {{ $property->admin_approval == 'Rejected' ? "selected" : "" }}>Reject</option> 
                                    <option value="Pending" {{ $property->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                                <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('after-scripts')

<script>
    function initMap() {
  const myLatLng = { lat: 6.932821354043672, lng: 79.84476998314739 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: myLatLng,
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });

//   console.log(myLatLng)
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

@endpush
