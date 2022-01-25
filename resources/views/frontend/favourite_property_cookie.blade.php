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
                            <div class="card p-4 custom-shadow border-0" style="height:33rem">
                                <a href="{{url('favourite_cookie_properties/remove',$prop->id)}}" style="text-decoration:none"><i class="fas fa-heart mb-3 text-end" style="font-size: 1.8rem; display: block; color: red; background-color: transparent;"></i></a>

                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><img src="{{url('image_assest', App\Models\Properties::where('id',$prop->id)->first()->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                <div class="card-body mt-3">                            

                                    @if(get_country_cookie(request()))
                                        <h5 class="card-title">{{ current_price(request(), get_country_cookie(request())->country_id, $prop->price) }}</h5>
                                    @else
                                        <h5 class="card-title">{{ current_price(request(), 1, $prop->price) }}</h5>
                                    @endif

                                    <p class="card-text mt-3 mb-1">{{ $prop->name }}, {{ App\Models\Properties::where('id',$prop->id)->first()->city }}, {{ App\Models\Properties::where('id',$prop->id)->first()->country }}</p>

                                    <p class="text-secondary mt-3">
                                        @if(App\Models\Properties::where('id',$prop->id)->first()->baths == null)
                                        @else
                                            <i class="fas fa-bath me-1" style="font-size:1.3rem"></i>{{ App\Models\Properties::where('id',$prop->id)->first()->baths }} bathrooms
                                        @endif

                                        @if(App\Models\Properties::where('id',$prop->id)->first()->beds == null)
                                        @else
                                            <i class="fas fa-bed ms-3 me-1" style="font-size:1.3rem"></i>{{ App\Models\Properties::where('id',$prop->id)->first()->beds }} bedrooms
                                        @endif
                                    </p>    
                                    
                                    @if(App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->company_name == null)
                                        <a href="{{ url('individual-agent',App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->id ) }}" style="text-decoration:none"><p class="card-text mt-3 text-center" style="font-size:11px">{{ App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->name }}</p></a>
                                    @else
                                        <a href="{{ url('individual-agent',App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->id ) }}" style="text-decoration:none"><p class="card-text mt-3 text-center" style="font-size:11px">{{ App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->company_name }}</p></a>
                                    @endif                                
                                </div>
                                
                                <div class="card-footer" style="background-color:transparent">
                                    <a href="{{ url('individual-agent',App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->id ) }}" style="text-decoration:none"><img src="{{ url('files/agent_request',App\Models\AgentRequest::where('user_id', App\Models\Properties::where('id',$prop->id)->first()->user_id)->first()->photo ) }}" class="card-img-top" alt="..." style="width:18%; object-fit:cover; height:50px;"></a>
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


  

