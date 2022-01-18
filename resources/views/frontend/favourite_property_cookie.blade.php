@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}"> -->
@endpush


    <!--Tips for Buyers-->
    <section id="privacy-policy">
        <div class="container about-container">
            <h3 class="fw-bolder">Property Favourite Cookies</h3>

            <div class="row mt-4 mb-5" style="text-align:justify;">
                <div class="col-12">

                {{dd($favorite_item)}}
                    
                @if(count($favorite_item) != 0)
                                @foreach($favorite_item as $prop)
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

                </div>
            </div>
        </div>
    </section>


  

