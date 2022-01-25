@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}"> -->
@endpush


    <!--Tips for Buyers-->
    <section id="privacy-policy">
        <div class="container about-container">
            <h3 class="fw-bolder mb-3">Favourite Property</h3>

            <div class="row mb-5">               

                @if(count($favorite_item) != 0)
                    @foreach($favorite_item as $prop)  

                        <div class="col-12 col-md-4 mb-5 mt-4 mb-md-0" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                            <div class="card p-4 custom-shadow border-0" style="height:24.5rem">
                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><img src="{{url('image_assest', App\Models\Properties::where('id',$prop->id)->first()->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-10">
                                            <h5 class="card-title">{{ $prop->name }}</h5>
                                        </div>
                                        <div class="col-2">
                                           <a href="{{url('favourite_cookie_properties/remove',$prop->id)}}" style="text-decoration:none"><i class="fas fa-heart ms-2" style="font-size: 1.8rem; display: block; color: red; background-color: transparent;"></i></a>
                                        </div>
                                    </div>

                                    @if(App\Models\Properties::where('id',$prop->id)->first()->beds != null)
                                        <p class="card-text mt-3 mb-1">{{App\Models\Properties::where('id',$prop->id)->first()->beds}} Beds Semidetached house</p>
                                    @endif

                                    <p class="card-text">{{ App\Models\Properties::where('id',$prop->id)->first()->city }}, {{ App\Models\Properties::where('id',$prop->id)->first()->country }}</p>

                                    @if(get_country_cookie(request()))
                                        <p class="mt-1 text-primary">{{ current_price(request(), get_country_cookie(request())->country_id, $prop->price) }}</p>
                                    @else
                                        <p class="mt-1 text-primary">{{ current_price(request(), 1, $prop->price) }}</p>
                                    @endif
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
    </section>


  

