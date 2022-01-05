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
                    <div class="col-8 p-0">
                        <div class="row align-items-center">
                            <div class="col-6 ps-4">
                                <h4 class="fs-4 fw-bolder user-settings-head">Watch Listing</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                        @if(count($watch_listing) == 0)

                            @include('frontend.includes.not_found',[
                            'not_found_title' => 'Watch Listings not found',
                            'not_found_description' => null,
                            'not_found_button_caption' => 'Explorer Property'
                            ])

                        @else
                            @if(count($property) != 0)
                                @foreach($property as $prop)
                                    @if(is_watch_listing($prop->id, auth()->user()->id))
                                        <div class="row align-items-center justify-content-between mb-4 border py-3">
                                            <div class="col-6">
                                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><img src="{{url('image_assest', $prop->feature_image_id)}}" style="width:350px; object-fit:cover;" height="210px" class="card-img-top" alt="..."></a>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="card-title mb-3">{{ $prop->name }}</h5>
                                                                       

                                                @if(App\Models\WatchListing::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first()->new_list != null )
                                                    <p class="mt-1 text-primary">New Listing</p>
                                                @endif
                                                @if(App\Models\WatchListing::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first()->sold_list != null )
                                                    <p class="mt-1 text-primary">Sold Listing</p>
                                                @endif
                                                @if(App\Models\WatchListing::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first()->de_list != null )
                                                    <p class="mt-1 text-primary">Delisted Listing</p>
                                                @endif

                                                <div class="row">
                                                    <div class="col-4">
                                                        <a href="{{ route('frontend.individual-property', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="hid_id" value="{{ $prop->id }}">
                                                        <a href="{{ route('frontend.user.watch_listingDelete', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></a>
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
                                        Do you want to delete this from watch list?
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
