@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
        <div class="row justify-content-between">
            <div class="col-4 full-size-width">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8 full-size-width">

                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <div class="row align-items-center">
                            <div class="col-6 ps-4">
                                <h4 class="fs-4 fw-bolder user-settings-head">Favourite Properties</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                        @if(count($favourite) == 0)

                                @include('frontend.includes.not_found',[
                           'not_found_title' => 'Favorite item not found',
                           'not_found_description' => 'Favorite item not found.please add Favorite ',
                           'not_found_button_caption' => 'Explorer Property'
                            ])

                        @else
                            @if(count($property) != 0)
                                @foreach($property as $prop)
                                    @if(is_favorite($prop->id, auth()->user()->id))
                                        <div class="row align-items-center justify-content-between mb-4 border py-3">
                                            <div class="col-6">
                                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><img src="{{url('image_assest', $prop->feature_image_id)}}" style="width:350px; object-fit:cover;" height="210px" class="card-img-top" alt="..."></a>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="card-title">{{ $prop->name }}</h5>
                                                <h6 class="card-title mt-3">{{ $prop->city }}, {{ $prop->country }}</h6>

                                                @if($prop->beds == null)
                                                @else
                                                    <p class="card-text mt-3 mb-1">
                                                        {{ $prop->beds }} Bed Semidetached house
                                                    </p>
                                                @endif

                                                <!-- <p class="card-text">Lancaster, claited Kingdom</p> -->
                                                <p class="mt-1 text-info">$ {{ $prop->price }}</p>

                                                <div class="row">
                                                    <div class="col-4">
                                                        <a href="{{ route('frontend.individual-property', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="hid_id" value="{{ $prop->id }}">
                                                        <a href="{{ route('frontend.user.favourites-delete', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach                        
                            @endif
                        @endif



                        <div class="modal fade" id="deleteFavorite" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this from favourite properties?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="" class="btn btn-primary">Delete</a>
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
@endsection



@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush
