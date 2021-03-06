@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6 ps-4">
                                <h4 class="fs-4 fw-bolder user-settings-head">Properties</h4>
                            </div>
                            <div class="col-6 text-end pb-3 pe-4">
                                <a class="btn create-property-btn text-light {{ Request::segment(1) == 'properties' ? 'active' : null }}" href="{{ route('frontend.user.create-property') }}" style="background-color: #4195E1">Create Property</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                            <!-- <div class="row align-items-center justify-content-between mb-4 border py-3">
                                <div class="col-6">
                                    <img src="{{url('tpr_templete/images/fp_fm_1.svg')}}" class="card-img-top" alt="...">
                                </div>
                                <div class="col-5">
                                    <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                    <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                    <p class="card-text">Lancaster, claited Kingdom</p>
                                    <p class="mt-1 text-info">$ 480,000</p>

                                    <div class="row justify-content-between">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-4">
                                                    <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">Edit</button>
                                                </div>
                                                <div class="col-4 ps-1">
                                                    <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                        @if(count($properties) <= 0)
                            @include('frontend.includes.not_found',[
                                'not_found_title' => 'Properties not found',
                                'not_found_description' => 'Please add properties',
                                'not_found_button_caption' => null
                            ])
                        @else


                            @foreach($properties as $property)

                                @if($property->admin_approval == 'Approved' && $property->country_manager_approval == 'Approved')
                                    <div class="row align-items-center justify-content-between mb-4 border py-3">
                                        <div class="col-6">
                                            
                                                <img src="{{url('image_assest', $property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                        </div>
                                        <div class="col-6">
                                            <h5 class="card-title">{{ $property->name }}</h5>
                                                @if($property->beds == null)
                                                @else
                                                    <p class="card-text mt-3 mb-1">{{ $property['beds'] }} Bed Semidetached house</p>
                                                @endif                                            
                                            <p class="card-text">Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            <!-- <p class="mt-1 text-info">$ {{ $property['price'] }}</p> -->
                                            @if(get_country_cookie(request()))
                                                <p class="mb-0 d-inline-block px-2 py-1 text-light mb-3" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), get_country_cookie(request())->country_id, $property->price) }}</p>
                                            @else
                                                <p class="mb-0 d-inline-block px-2 py-1 text-light mb-3" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), 1, $property->price) }}</p>
                                            @endif

                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <a href="{{ route('frontend.individual-property', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="{{ route('frontend.user.property-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col-3 ps-1">
                                                            <a href="{{ route('frontend.user.property-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                        @if($property->sold_request == 'Sold')
                                                            <div class="col-3 ps-1">
                                                                <button class="btn px-4 rounded-0 text-light py-1 btn-success">Sold</button>
                                                            </div>
                                                        @elseif($property->sold_request == 'Pending')
                                                            <div class="col-3 ps-1">
                                                                <a href="{{ route('frontend.user.pending_status', $property->id) }}" class="btn px-4 rounded-0 py-1 btn-warning pending_status" data-bs-toggle="modal" data-bs-target="#pending_status_Modal">Pending</a>
                                                            </div>
                                                        @else
                                                            <div class="col-3 ps-1">
                                                                <a href="{{ route('frontend.user.sold_status', $property->id) }}" class="btn px-4 rounded-0 py-1 text-light btn-secondary sold_status" data-bs-toggle="modal" data-bs-target="#sold_status_Modal">Sell</a>
                                                            </div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                

                                @elseif($property->admin_approval == 'Pending' && $property->country_manager_approval == 'Pending')
                                    <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                        <div class="col-6 pen-dis">
                                                <img src="{{url('image_assest', $property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                        </div>
                                        <div class="col-5">
                                            <div class="clearfix">
                                                <div class="float-start pen-dis">
                                                    <h5 class="card-title">{{ $property->name }}</h5>
                                                </div>
                                                <div class="float-end">
                                                    <button class="position-relative bg-warning border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Pending</button>
                                                </div>
                                            </div>
                                            <!-- <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached honse</p> -->
                                            @if($property->beds == null)
                                            @else
                                                <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                            @endif  
                                            <p class="card-text pen-dis">Property Type : {{App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                            <div class="row pen-dis">
                                                <div class="col-9">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                        </div> -->
                                                        <div class="col-4">
                                                            <a href="{{ route('frontend.user.property-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col-4 ps-1">
                                                            <a href="{{ route('frontend.user.property-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($property->admin_approval == 'Disapproved' || $property->country_manager_approval == 'Disapproved')
                                    <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                        <div class="col-6 pen-dis">
                                                <img src="{{url('image_assest', $property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                        </div>
                                        <div class="col-5">
                                            <div class="clearfix">
                                                <div class="float-start pen-dis">
                                                    <h5 class="card-title">{{ $property->name }}</h5>
                                                </div>
                                                <div class="float-end">
                                                    <button class="position-relative bg-danger border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Dispproved</button>
                                                </div>
                                            </div>
                                            <!-- <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached honse</p> -->
                                            @if($property->beds == null)
                                            @else
                                                <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                            @endif 
                                            <p class="card-text pen-dis">Property Type : {{App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                            <div class="row pen-dis">
                                                <div class="col-9">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                        </div> -->
                                                        <!-- <div class="col-4">
                                                            <a href="{{ route('frontend.user.property-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                        </div> -->
                                                        <div class="col-4 ps-1">
                                                            <a href="{{ route('frontend.user.property-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    

                                @else
                                    <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                        <div class="col-6 pen-dis">
                                            <img src="{{url('image_assest', $property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                        </div>
                                        <div class="col-5">
                                            <div class="clearfix">
                                                <div class="float-start pen-dis">
                                                    <h5 class="card-title">{{ $property->name }}</h5>
                                                </div>
                                                <div class="float-end">
                                                    <button class="position-relative bg-warning border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Pending</button>
                                                </div>
                                            </div>
                                            <!-- <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p> -->
                                            @if($property->beds == null)
                                            @else
                                                <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                            @endif 
                                            <p class="card-text pen-dis">Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                            <div class="row pen-dis">
                                                <div class="col-9">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                        </div> -->
                                                        <!-- <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">Edit</button>
                                                        </div> -->
                                                        <div class="col-4 ps-1">
                                                            <a href="{{ route('frontend.user.property-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this property?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="pending_status_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to cancel this property sold request?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="sold_status_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sold Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to send this property sold request to admin?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-success">Send</a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection


@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
    <script>
        $('.sold_status').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
    <script>
        $('.pending_status').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush
