@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}"> -->
@endpush


    <!--Tips for Buyers-->
    <section id="privacy-policy">
        <div class="container about-container">
            <h3 class="fw-bolder">Property Favourite</h3>

            <div class="row mt-4 mb-5" style="text-align:justify;">
                <div class="col-10">
                    
                    @if(count($favorite_item) != 0)
                        @foreach($favorite_item as $prop)  
                            <div class="row align-items-center justify-content-between mb-4 border py-1">
                                <div class="col-6">
                                    <a href="{{ route('frontend.individual-property', $prop->id) }}"><img src="{{url('image_assest', App\Models\Properties::where('id',$prop->id)->first()->feature_image_id)}}" style="width:350px; object-fit:cover;" height="160px" class="card-img-top" alt="..."></a>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title">{{ $prop->name }}</h5>
                                    <p class="mt-1 text-info">$ {{ $prop->price }}</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('frontend.individual-property', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach   
                        
                    @else
                        @include('frontend.includes.not_found',[
                            'not_found_title' => 'Favorite properties not found',
                            'not_found_description' => null,
                            'not_found_button_caption' => null
                        ])
                    @endif

                </div>
            </div>
        </div>
    </section>


  

