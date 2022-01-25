@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/residential.css') }}">
@endpush
<!-- banner -->


    <!--residential property search-->
    <section id="residential-property-search" style="padding-top:120px;">


          <!-- top search bar -->
    <div class="container-fluid">
        <div class="row">
        <div class="top-search-bar">
            <!-- first row -->

            <form action="{{route('frontend.search_result_function')}}" method="post" class="filter-form">
            {{csrf_field()}}
                <div class="row top-search-bar-first-row">
                    <!-- anything -->
                    <input type="text" name="search_keyword" id="autocompleteProperty" class="search-anything" placeholder="Search any property here.." />
                    <div class="top-search-middle-wrapper">
                        <!-- property types -->
                        <select class="me-2" name="category_type" id="category_type" style="border-color: #dcdfe6 !important; font-size: 0.9rem; padding: 10px;">
                            <option value="">Select Category</option>
                            <option value="residential" {{$category_type == 'residential' ? "selected" : "" }}>Residential</option>
                            <option value="commercial" {{$category_type == 'commercial' ? "selected" : "" }}>Commercial</option>
                            <option value="tp_developer" {{$category_type == 'tp_developer' ? "selected" : "" }}>TP Developer</option>
                            <option value="investments" {{$category_type == 'investments' ? "selected" : "" }}>Investments</option>
                        </select>
                        <!-- for sale and rent -->
                        <div class="switch-field">
                            @if($transaction_type == 'sale')
                                <input type="radio" id="radio-one" name="transaction_type" value="sale" checked />
                            @else
                                <input type="radio" id="radio-one" name="transaction_type" value="sale" />
                            @endif
                            <label for="radio-one">For Sale</label>
                            @if($transaction_type == 'rent')
                                <input type="radio" id="radio-two" name="transaction_type" value="rent" checked/>
                            @else
                                <input type="radio" id="radio-two" name="transaction_type" value="rent" />
                            @endif
                            <label for="radio-two">For Rent</label>
                        </div>

                    </div>



                    <!-- top right panel -->
                    <div class="top-right-filter-panel">
                        <div class="mobile-fix-row-wrapper">
                            <button type="button" class="filter-btn ">Active</button>
                            <!-- daus all-->
                            <select name="days-all" id="days-all">
                                <option value="1-days">Last 1 Days</option>
                                <option value="3-days">Last 3 Days</option>
                                <option value="7-days">Last 7 Days</option>
                                <option value="30-days">Last 30 Days</option>
                                <option value="90-days">Last 90 Days</option>
                                <option value="all-days">Listing data - All</option>
                            </select>
                        </div>
                        <div class="mobile-fix-row-wrapper">
                            <button type="button" class="filter-btn ">Leased</button>
                            <!-- daus leased-->
                            <select name="days-leased" id="days-leased">
                                <option value="1-days">Last 1 Days</option>
                                <option value="3-days">Last 3 Days</option>
                                <option value="7-days">Last 7 Days</option>
                                <option value="30-days">Last 30 Days</option>
                                <option value="90-days">Last 90 Days</option>
                                <option value="all-days">Listing data - All</option>
                            </select>
                        </div>


                        <div class="mobile-fix-row-wrapper">
                            <!-- De-listed -->
                            <button type="button" class="filter-btn ">De-listed</button>
                            <!-- daus de-listed-->
                            <select name="days-delisted" id="days-delisted">
                                <option value="1-days">Last 1 Days</option>
                                <option value="3-days">Last 3 Days</option>
                                <option value="7-days">Last 7 Days</option>
                                <option value="30-days">Last 30 Days</option>
                                <option value="90-days">Last 90 Days</option>
                                <option value="all-days">Listing data - All</option>
                            </select>
                        </div>

                        <button class="btn btn-success ms-2" type="submit"><i class="fa fa-search"></i></button>


                    </div>



                </div>

                <!-- second row -->
                <div class="row top-search-filter-bar-second-row">

                    <!-- min max -->
                    <div class="min-max-wrapper bottom-button-area">

                        <div class="popover popover-price">
                            <button type="button" class="popover__trigger filter-btn">$0-$950000</button>
                            <div class="popover__menu">
                                <div class="min-max-slider" data-legendnum="2">
                                    <label for="min">Minimum price</label>
                                    <input id="min" class="min" name="min_price" type="range" step="1" min="0" max="950000" />
                                    <label for="max">Maximum price</label>
                                    <input id="max" class="max" name="max_price" type="range" step="1" min="0" max="950000" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- more filters -->
                    <div class="more-filters-wrapper">
                        <!-- <div class="popover-more">
                                <button class="popover_more__trigger">$0-$9500</button>
                                <div class="popover__menu2">
                                more filter contents here
                                </div>
                            </div> -->
                        <button type="button" onclick="moreFilters()" class="more-filters-btn filter-btn">More Filters</button>

                        <script>
                            function moreFilters() {
                                if (document.querySelector(".map-side-over-content-wrapper").style.opacity == "1") {
                                    document.querySelector(".map-side-over-content-wrapper").style.opacity = "0";
                                } else {
                                    document.querySelector(".map-side-over-content-wrapper").style.opacity = "1";
                                }
                            }
                        </script>
                    </div>

                    <!-- 
                        <script>
                            var popovers2 = document.querySelectorAll('.popover-more');
                            var popoverTriggers2 = document.querySelectorAll('.popover_more__trigger');

                            for (var i = 0; i < popoverTriggers2.length; i++) {
                                popoverTriggers2[i].addEventListener('click', function(event) {
                                    closeAllOthers(this.parentElement);
                                    this.parentElement.classList.toggle('popover--active');
                                });
                            }

                            function closeAllOthers(ignore) {
                                for (var i = 0; i < popovers2.length; i++) {
                                    if ( popovers2[i] !== ignore) {
                                        popovers2[i].classList.remove('popover--active');	
                                    }
                                }
                            }


                        </script> -->


                    <!-- watched areas -->
                    <button type="button" class="bottom-button-area filter-btn">Watched Areas</button>
                </div>
            </form>

        </div>
        </div>
        
    </div>





        <div class="container-fluid" style="margin-top:2rem">
            <!-- <h3 class="fw-bolder text-center">Interactive Property Search</h3> -->

            <div class="row mt-4 mobile-reverse">
                @if(count($filteredProperty) > 0)
                    <div class="col-3 full-size-width tab-left-side" style="background-color: #F3F3F3">
                        <h5>Results: {{ count($filteredProperty) }} Listings</h5>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <!-- <p class="mb-0 text">Sort By</p> -->
                            </div>
                            <div class="col-7">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Newest
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                    <!-- <li><a class="dropdown-item" href="#">Oldest</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="properties">
                            @foreach($filteredProperty as $property)
                                <div class="row border align-items-center p-1">
                                    <div class="col-6">
                                        <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{url('image_assest', $property->feature_image_id)}}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                    </div>
                                    <div class="col-6">
                                         <a href="{{ route('frontend.individual-property', $property->id) }}" style="text-decoration:none;">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-8">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">{{ $property->created_at->toDateString() }}</p>
                                            </div>
                                                @auth
                                                    @if(is_favorite($property->id, auth()->user()->id))
                                                        <div class="col-4 small-heart">
                                                            <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                                {{csrf_field()}}
                                                                    <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                    <input type="hidden" class="favourite" name='favourite' value="non-favourite">
                                                                    <button class="bi bi-heart-fill border-0" type="submit" style="font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        
                                                        <div class="col-4 small-heart">
                                                            <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                                {{csrf_field()}}
                                                                    <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                    <input type="hidden" class="favourite" name='favourite' value="favourite">
                                                                    <button class="bi bi-heart border-0" type="submit" style="font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @else       
                                                    @if(is_favorite_cookie($property->id)) 
                                                        <div class="col-4 small-heart">
                                                            <a href="{{url('favourite_cookie_properties/remove',$property->id)}}" class="bi bi-heart-fill border-0" style="text-decoration:none; font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></a>
                                                        </div>    
                                                    @else
                                                        <div class="col-4 small-heart">
                                                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                                <input type="hidden" name="cookie_property_id" value="{{ $property->id }}" />
                                                                <button class="bi bi-heart border-0" type="submit" style="font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                            </form>                                                        
                                                        </div>
                                                        
                                                    @endif
                                                    
                                                    
                                                @endauth
                                        </div>
                                        
                                        <p class="fw-bold mb-0">{{ $property->name }}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${{ $property->transaction_type }}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Country: {{ $property->country }}</p>

                                        @if(get_country_cookie(request()))
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), get_country_cookie(request())->country_id, $property->price) }}</p>
                                        @else
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), 1, $property->price) }}</p>
                                        @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-3 full-size-width tab-left-side">
                        <div class="">
                            <div class="no-result border py-2 px-3">
                                <h4 class="text-center">No Results</h4>
                                <p class="ns mb-1">Please refine your search criteria.</p>
                                <p class="ns">Suggestions:</p>

                                <ul>
                                    <li class="no-result-list">Modify your search criteria</li>
                                    <li class="no-result-list">Update your search location</li>
                                    <li class="no-result-list">Broaden your map area</li>
                                    <li class="no-result-list">Modify your keywords</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-9 p-0 full-size-width tab-right-side map-wrapper">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                    <!-- more filters -->

                    <form action="{{route('frontend.search_result_function')}}" method="post" class="filter-form">
                    {{csrf_field()}}
                        <div class="map-side-over-content-wrapper">
                            <p style="margin-top:0;">Description Contains Keywords</p>
                            <input type="text" name="description_key_name" class="des-txt-input" placeholder="Waterfront, Pool, Fireplace" />
                            <p>Bedroom</p>
                            <div class="switch-field">
                                @if($beds == 'all')
                                    <input type="radio" id="radio-bed-all" name="beds" value="all" checked/>
                                @else
                                    <input type="radio" id="radio-bed-all" name="beds" value="all"/>
                                @endif
                                <label for="radio-bed-all">All</label>
                            
                                @if($beds == 0)
                                    <input type="radio" id="radio-bed-zero" name="beds" value="0" checked/>
                                @else
                                    <input type="radio" id="radio-bed-zero" name="beds" value="0" />
                                @endif                                
                                <label for="radio-bed-zero">0</label>

                                @if($beds == 1)
                                    <input type="radio" id="radio-bed-one" name="beds" value="1" checked/>
                                @else
                                    <input type="radio" id="radio-bed-one" name="beds" value="1" />
                                @endif                                
                                <label for="radio-bed-one">1</label>

                                @if($beds == 2)
                                    <input type="radio" id="radio-bed-two" name="beds" value="2" checked/>
                                @else
                                    <input type="radio" id="radio-bed-two" name="beds" value="2" />
                                @endif                                   
                                <label for="radio-bed-two">2</label>

                                @if($beds == 3)
                                    <input type="radio" id="radio-bed-three" name="beds" value="3" checked/>
                                @else
                                    <input type="radio" id="radio-bed-three" name="beds" value="3" />
                                @endif                                     
                                <label for="radio-bed-three">3</label>

                                @if($beds == 4)
                                    <input type="radio" id="radio-bed-four" name="beds" value="4" checked/>
                                @else
                                    <input type="radio" id="radio-bed-four" name="beds" value="4" />
                                @endif                            
                                <label for="radio-bed-four">4</label>

                                @if($beds == 'greater-than-5')
                                    <input type="radio" id="radio-bed-fiveplus" name="beds" value="greater-than-5" checked/>
                                @else
                                    <input type="radio" id="radio-bed-fiveplus" name="beds" value="greater-than-5" />
                                @endif                                       
                                <label for="radio-bed-fiveplus">5+</label>
                            </div>

                            <p>Bathroom</p>
                            <div class="switch-field">
                                @if($baths == 'all')
                                    <input type="radio" id="radio-bathroom-all" name="baths" value="all" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-all" name="baths" value="all" />
                                @endif  
                                <label for="radio-bathroom-all">All</label>

                                @if($baths == 0)
                                    <input type="radio" id="radio-bathroom-zero" name="baths" value="0" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-zero" name="baths" value="0" />
                                @endif  
                                <label for="radio-bathroom-zero">0</label>

                                @if($baths == 1)
                                    <input type="radio" id="radio-bathroom-one" name="baths" value="1" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-one" name="baths" value="1" />
                                @endif  
                                <label for="radio-bathroom-one">1</label>

                                @if($baths == 2)
                                    <input type="radio" id="radio-bathroom-two" name="baths" value="2" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-two" name="baths" value="2" />
                                @endif  
                                <label for="radio-bathroom-two">2</label>

                                @if($baths == 3)
                                    <input type="radio" id="radio-bathroom-three" name="baths" value="3" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-three" name="baths" value="3" />
                                @endif  
                                <label for="radio-bathroom-three">3</label>

                                @if($baths == 4)
                                    <input type="radio" id="radio-bathroom-four" name="baths" value="4" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-four" name="baths" value="4" />
                                @endif  
                                <label for="radio-bathroom-four">4</label>

                                @if($baths == 'greater-than-5')
                                    <input type="radio" id="radio-bathroom-fiveplus" name="baths" value="greater-than-5" checked/>
                                @else
                                    <input type="radio" id="radio-bathroom-fiveplus" name="baths" value="greater-than-5" />
                                @endif  
                                <label for="radio-bathroom-fiveplus">5+</label>

                            </div>
                            <p>Garage/Parking</p>
                            <div class="switch-field">
                                <input type="radio" id="radio-garage-all" name="switch-four" value="all" checked />
                                <label for="radio-garage-all">All</label>

                                <input type="radio" id="radio-garage-zero" name="switch-four" value="zero" />
                                <label for="radio-garage-zero">0</label>
                                <input type="radio" id="radio-garage-one" name="switch-four" value="one" />
                                <label for="radio-garage-one">1</label>
                                <input type="radio" id="radio-garage-two" name="switch-four" value="two" />
                                <label for="radio-garage-two">2</label>
                                <input type="radio" id="radio-garage-three" name="switch-four" value="three" />
                                <label for="radio-garage-three">3</label>
                                <input type="radio" id="radio-garage-four" name="switch-four" value="four" />
                                <label for="radio-garage-four">4</label>
                                <input type="radio" id="radio-garage-fiveplus" name="switch-four" value="fiveplus" />
                                <label for="radio-garage-fiveplus">5+</label>
                            </div>

                            <p>Open House</p>
                            <div class="switch-field">
                                <input type="radio" id="radio-open-house-unspecified" name="switch-five" value="all" checked />
                                <label for="radio-open-house-unspecified">Unspecified</label>

                                <input type="radio" id="radio-open-house-today" name="switch-five" value="today" />
                                <label for="radio-open-house-today">Today</label>

                                <input type="radio" id="radio-open-house-tomorrow" name="switch-five" value="tomorrow" />
                                <label for="radio-open-house-tomorrow">Tomorrow</label>

                                <input type="radio" id="radio-open-house-7days" name="switch-five" value="7days" />
                                <label for="radio-open-house-7days">7 Days</label>

                            </div>
                            <!-- open house last -all open houses- -->
                            <div class="all-open-house-wrapper switch-field">
                                <input type="radio" id="radio-open-house-all-open-houses" name="switch-five"
                                    value="all-open-houses" />
                                <label for="radio-open-house-all-open-houses">All Open Houses</label>
                            </div>

                            <p>Basement</p>
                            <div class="switch-field">
                                <input type="radio" id="radio-basement-finished" name="switch-five" value="basement-finished" />
                                <label for="radio-basement-finished">Finished</label>
                                <input type="radio" id="radio-basement-seperate" name="switch-five" value="basement-seperate" />
                                <label for="radio-basement-seperate">Seperate Entrance</label>
                                <input type="radio" id="radio-basement-walkout" name="switch-five" value="basement-walkout" />
                                <label for="radio-basement-walkout">Walk-out</label>
                            </div>

                            <p>Max Maintenance Fee</p>
                            <input type="text" placeholder="0">

                            <p>Lot Front (feet)</p>

                            <div class="more-filter-min-max" data-legendnum="3">
                                <label for="min">Minimum price</label>
                                <input id="min" class="min" name="min" type="range" step="1" min="0" max="100" />
                                <label for="max">Maximum price</label>
                                <input id="max" class="max" name="max" type="range" step="1" min="0" max="100" />
                            </div>


                            <p>Square Footage</p>

                            <div class="more-filter-min-max" data-legendnum="3">
                                <label for="min">Minimum price</label>
                                <input id="min" class="min" name="min" type="range" step="1" min="0" max="4000" />
                                <label for="max">Maximum price</label>
                                <input id="max" class="max" name="max" type="range" step="1" min="0" max="4000" />
                            </div>

                            <p>Nearby Sold</p>
                            <div class="tick-wrapper">
                                <input type="checkbox" id="tick">
                                <label for="tick">I want to show NEARBY SOLD listings for comparison</label>

                            </div>

                            <button type="reset" class="more-filter-bottom-btn">Clear</button>
                            <button type="submit" class="more-filter-bottom-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!--search-->
<section id="index-search" class="container-fluid filter-search" style="margin-top: 5rem;">
        @include('frontend.includes.search_bar')
    </section>
    


    <!--residential properties-->

    @if(count($filteredProperty) > 0)
        <section id="residential-properties">
            <div class="container" style="margin-top: 4rem; margin-bottom: 5rem;">

                <div class="row">
                    <div class="col-9 full-size-width">
                        @if(get_country_cookie(request()))
                            <h3 class="text-center fw-bolder">
                                {{ ucfirst($category_type) }} Properties in {{ get_country_cookie(request())->country_name }}
                            </h3>
                        @endif
                    </div>
                    <div class="col-3 max-btn">
                        
                        @auth
                            @if(App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first() == null)
                                <form action="{{route('frontend.save_search')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn" style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px;">
                                        <div class="row justify-content-center">
                                            <div class="col-4 mobile-icon-p-fix" style="padding-left:50px">
                                                <i class="far fa-heart"></i>
                                            </div>
                                            <div class="col-7 p-0 text-start">
                                                Save this Search
                                            </div>
                                        </div>
                                    </button>
                                    <input type="hidden" name="save_url" value="{{ url()->current() }}" />
                                </form>
                            @else
                                <form action="{{route('frontend.save_search_Delete',App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn" style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px; background-color:#F33A6A;">
                                        <div class="row justify-content-center text-light">
                                            <div class="col-3 mobile-icon-p-fix" style="padding-left:40px">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="col-7 p-0 text-start">
                                                Unsave this Search
                                            </div>
                                        </div>
                                    </button>
                                    <input type="hidden" name="prop_hidden_id" value="{{ App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id }}" />
                                </form>
                            @endif
                        @else
                            
                            <a href="{{route('frontend.auth.login')}}" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn" style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px;">
                                <div class="row justify-content-center">
                                    <div class="col-4 mobile-icon-p-fix" style="padding-left:50px">
                                        <i class="far fa-heart"></i>
                                    </div>
                                    <div class="col-7 p-0 text-start">
                                        Save this Search
                                    </div>
                                </div>
                            </a>
                        @endauth

                    </div>
                </div>
                


                

                <div class="row mt-5">
                    <div class="col-8 full-size-width">
                        
                            @foreach($filteredProperty as $property)
                                <div class="property mb-5 p-3 custom-shadow">
                                    <div class="row">
                                        <div class="col-6 full-size-width">
                                            <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{ route('frontend.image_assets', $property->feature_image_id) }}" alt="" class="img-fluid w-100" style="object-fit:cover; height:240px;"></a>
                                        </div>
                                        <div class="col-6 ps-4 full-size-width mobile-top-p">
                                        <a class="heart-fix-a" href="{{ route('frontend.individual-property', $property->id) }}" style="text-decoration:none;">
                                            <div class="row justify-content-between">
                                                <div class="col-9">
                                                    <h5 class="property-price mb-0">{{ $property->name }}</h5>
                                                    <h5 class="property-location">{{ get_currency(request() ,$property->price)}}</h5>
                                                </div>
                                        
                                                @auth
                                                    @if(is_favorite($property->id, auth()->user()->id))
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="favourite">
                                                                <button class="bi bi-heart-fill border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @else
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="non-favourite">
                                                                <button class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                @else         
                                                    @if(is_favorite_cookie($property->id))
                                                        <div class="col-3 small-heart">
                                                            <a href="{{url('favourite_cookie_properties/remove',$property->id)}}" class="bi bi-heart-fill border-0" style="text-decoration:none; font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></a>
                                                        </div>
                                                    @else                                
                                                        <div class="col-3 small-heart">
                                                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                                <input type="hidden" name="cookie_property_id" value="{{ $property->id }}" />
                                                                <button class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                            </form>                                                        
                                                        </div>
                                                    @endif
                                                @endauth
                                            </div>
                                            
                                            <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                            <p class="text-secondary mt-1">{{ $property->country }}</p>
                                            <div class="project-list">
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Transaction Type : {{ $property->transaction_type }}</p>
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            </div>

                                            @if($property->baths != null && $property->beds != null)
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> {{ $property->baths }} <i class="fas fa-bed ms-4 me-2"></i>{{ $property->beds }}</p>
                                            @else
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i>Not available<i class="fas fa-bed ms-4 me-2"></i>Not available</p>
                                            @endif
                                        </a>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6 mobile-max-width">
                                            <h6 class="text-secondary mb-0">Listed on {{ $property->created_at->toDateString() }}</h6>
                                        </div>
                                        <div class="col-6 mobile-max-width mobile-m-top">
                                            <div class="row">
                                                <div class="residential-phone">
                                                    <p class="mb-0"><i class="bi bi-telephone me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                                <div class="residential-email" >
                                                    <p class="mb-0" id="ppp"><i class="bi bi-envelope me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>

                    <div class="col-4">
                        @if(count($side_ads) > 0)
                            @foreach($side_ads as $side_ad)
                                <div class="row custom-shadow mb-4">
                                    <div class="col-12">
                                        <a href="{{ $side_ad->link }}"><img src="{{url('files/sidebar_ad', $side_ad->image)}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="col-12 mt-3" style="text-align: justify;">
                                        <p class="ns" style="height:140px; overflow:hidden !important; text-overflow: ellipsis;">{{ $side_ad->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

    @else
        <section id="residential-properties">
            <div class="container text-center" style="margin-top: 10rem">
                <p class="display-3 text-secondary">RESULTS NOT FOUND!</p>
            </div>
        </section>
    @endif


    <!-- Filter Modal -->
    @include('frontend.includes.search_filter_modal')


    <!--get app-->
    <!-- <section id="index-get-app">
        <div class="container-fluid p-0 get-app" style="margin-top: 10rem;">
            <div class="container">
                <div class="row py-5 align-items-center justify-content-center">
                    <div class="col-6 text-center">
                        <h2 class="text-white fw-bolder">Get The App Now!</h2>
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('tpr_templete/images/appstore.svg') }}" alt="" height="50rem" class="me-3">
                        <img src="{{ asset('tpr_templete/images/playstore.svg') }}" alt="" height="50rem">
                    </div>
                </div>
            </div>
        </div>
    </section> -->


@push('before-scripts')
    @if(isset(get_country_cookie(request())->country_id))
        @if(get_country_cookie(request())->country_id)

            <script>
                @if($search_long == 'long')
                    let lng = parseInt( <?php echo json_encode(App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->longitude); ?>);
                @else
                    let lng = {{$search_long}};
                @endif
                @if($search_lat == 'lat')
                    let lat = parseInt ( <?php echo json_encode(App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->latitude); ?>);
                @else
                    let lat = {{$search_lat}};
                @endif
                function initMap() {
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 7,
                        center: { lat: lat, lng: lng },
                    });
                    @if(count($area_coords) == 0)
                    @else
                        var rectangle = new google.maps.Rectangle({
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillOpacity: 0,
                            map: map,
                            bounds: new google.maps.LatLngBounds(
                                new google.maps.LatLng({{$area_coords['southwest_lat']}} , {{$area_coords['southwest_lng']}}),
                                new google.maps.LatLng({{$area_coords['northeast_lat']}}, {{$area_coords['northeast_lng']}}))
                        });
                    @endif
                    // Create an array of alphabetical characters used to label the markers.
                    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    // Add some markers to the map.
                    // Note: The code uses the JavaScript Array.prototype.map() method to
                    // create an array of markers based on a given "locations" array.
                    // The map() method here has nothing to do with the Google Maps API.
                    const infoWindow = new google.maps.InfoWindow();
                    const markers = locations.map((location, i) => {
                        const marker =  new google.maps.Marker({
                            position: location,
                            label: labels[i % labels.length]
                        });
                        marker.addListener("click", () => {
                        var nameList = [
                            
                            @foreach($filteredProperty  as $crom)
                            { 
                                id: {{$crom->id}}, 
                                name: "{{$crom->name}}",
                                price: "{{$crom->price}}",
                                city: "{{$crom->city}}",
                                country: "{{$crom->country}}",
                                transaction_type: "{{$crom->transaction_type}}",
                                imgUrl: "{{url('/')}}/image_assest/{{$crom->feature_image_id}}",
                            },
                            @endforeach
                        ];
                        const details = `  <div class="info-card">
                            <div class="img-wrapper">
                                <img src="${nameList[i].imgUrl}" alt="info-img">
                            </div>
                            <div class="info-txt-wrapper">
                                <h3>${nameList[i].name}</h3>
                                <p>Transaction Type: ${nameList[i].transaction_type}</p>
                                <p>Country: ${nameList[i].country}</p>
                                <p>City: ${nameList[i].city}</p>
                                <span class="price-tag">${nameList[i].price}</span>
                                <span class="price-tag link-tag">
                                    <a class="link-anchor" href="{{ url('/') }}/individual-property/${nameList[i].id} ">View Property</a>
                                </span>
                            </div>
                        </div>`;
                            infoWindow.open(map, markers[i]);
                            infoWindow.setContent(details);
                        });
                        return marker;
                    });
                    // Add a marker clusterer to manage the markers.
                    var markerCluster = new MarkerClusterer(map, markers, {
                        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                    });
                    google.maps.event.addListener(markerCluster, 'click', function(c) {
                        // console.log('Number of managed markers in cluster: ' + c.getSize());
                        var markers = c.getMarkers();
                        // console.log('Number of managed markers in cluster: ' + c.getSize());
                        var newArray = [];
                        @if(get_country_cookie(request()))
                            let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                        @else
                            let country_id = 1;
                        @endif
                        for (marker in markers) {
                            const cars = [];
                            cars['lat']= markers[marker].getPosition().lat();
                            cars['long']= markers[marker].getPosition().lng();
                            newArray.push(JSON.stringify(Object.assign({}, cars)));
                        }
                        myArray = JSON.stringify(Object.assign({}, newArray));
                        $.post("{{url('/')}}/api/country_request",
                            {
                                coordinate_data: myArray,
                                country_id : country_id
                            },
                            function(data, status){
                                var obj = JSON.parse(data);
                                let template = '';
                                let info = [];
                                for(let i = 0; i < obj.length; i++) {
                                    info[i] = [obj[i]['country'], obj[i]['long'], obj[i]['lat']];;
                                }
                                // var infowindow = new google.maps.InfoWindow();
                                // for(let i = 0; i < obj.length; i++) {
                                //     let details;
                                //     markers[i].addListener('click', function() {
                                //         if(info[i][1] == markers[i].getPosition().lng() && info[i][2] == markers[i].getPosition().lat()) {
                                //             details = `  <div class="row align-items-center p-1" style="width: 500px;">
                                //                             <div class="col-6">
                                //                                 <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                //                             </div>
                                //                             <div class="col-6">
                                //                                 <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                //                                 <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                //                                 <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                //                                 <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>
                                //                                 <div class="text-end mt-2">
                                //                                     <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                //                                 </div>
                                //                             </div>
                                //                         </div>`;
                                            
                                //             infowindow.setContent(details);           
                                //             infowindow.open(map, markers[i]);
                                //         }
                                //     });
                                // }
                                
                                
                                
                                for(let i = 0; i < obj.length; i++) {
                                    let date = obj[i]['created_at'].split(' ')[0];
                                    if(obj[i]['is_favourite'] == true){
                                    template += '<div class="row border align-items-center p-1">' + 
                                                '<div class="col-6">' +
                                                    '<a href="{{url('/')}}/individual-property/'+ obj[i]['id'] +'"><img src="{{url('/')}}/image_assest/'+ obj[i]['feature_image_id'] +'" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>' +
                                                '</div>' +
                                                '<div class="col-6">' +
                                                    '<div class="row justify-content-between align-items-center">' +
                                                        '<div class="col-8">' +
                                                            '<p class="mb-0 small-num" style="font-size: 0.7rem;">'+ date +'</p>' +
                                                        '</div>' +
                                                        '<div class="col-4 small-heart">' +
                                                            '<form action="{{url('/')}}/favourite_cookie/store" method="post" enctype="multipart/form-data">' +
                                                            '{{csrf_field()}}' +
                                                                '<input type="hidden" name="cookie_property_id" value="'+ obj[i]['id'] +'" />' +
                                                                '<button class="bi bi-heart border-0" type="submit" style="font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></button>' +
                                                            '</form>' +                                                        
                                                        '</div>' +
                                                    '</div>' +                                        
                                                    '<p class="fw-bold mb-0">'+ obj[i]['name'] +'</p>' +
                                                    '<p class="mb-0" style="font-size: 0.8rem;">Transaction Type: '+ obj[i]['transaction_type'] +'</p>' +
                                                    '<p class="mb-0" style="font-size: 0.8rem;">Country: '+ obj[i]['country'] +'</p>' +
                                                    '<p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">'+ obj[i]['price_currency'] +'</p>' +
                                                '</div>' +
                                            '</div>'
                                    }else{
                                    template += '<div class="row border align-items-center p-1">' + 
                                                '<div class="col-6">' +
                                                    '<a href="{{url('/')}}/individual-property/'+ obj[i]['id'] +'"><img src="{{url('/')}}/image_assest/'+ obj[i]['feature_image_id'] +'" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>' +
                                                '</div>' +
                                                '<div class="col-6">' +
                                                    '<div class="row justify-content-between align-items-center">' +
                                                        '<div class="col-8">' +
                                                            '<p class="mb-0 small-num" style="font-size: 0.7rem;">'+ date +'</p>' +
                                                        '</div>' +
                                                        '<div class="col-4 small-heart">' +
                                                            '<form action="{{url('/')}}/favourite_cookie/store" method="post" enctype="multipart/form-data">' +
                                                            '{{csrf_field()}}' +
                                                                '<input type="hidden" name="cookie_property_id" value="'+ obj[i]['id'] +'" />' +
                                                                '<button class="bi bi-heart border-0" type="submit" style="font-size: 1rem; display: block; color: #E88DAF; background-color: transparent;"></button>' +
                                                            '</form>' +                                                        
                                                        '</div>' +
                                                    '</div>' +                                       
                                                    '<p class="fw-bold mb-0">'+ obj[i]['name'] +'</p>' +
                                                    '<p class="mb-0" style="font-size: 0.8rem;">Transaction Type: '+ obj[i]['transaction_type'] +'</p>' +
                                                    '<p class="mb-0" style="font-size: 0.8rem;">Country: '+ obj[i]['country'] +'</p>' +
                                                    '<p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">'+ obj[i]['price_currency'] +'</p>' +
                                                '</div>' +
                                            '</div>'
                                    }
                                    // info[i] = [obj[i]['long'], obj[i]['lat']];
                                    
                                };
                                // console.log(obj);
                                $(".properties").html(template);
                                // var infoWindow = new google.maps.InfoWindow({
                                //     content:'<h1>dfdf</h1>'
                                // });
                                // for (marker in markers) {
                                //     const cars = [];
                                //     cars['lat']= markers[marker].getPosition().lat();
                                //     cars['long']= markers[marker].getPosition().lng();
                                // }
                                });
                            });
                        }
                        const locations = [
                            @foreach($filteredProperty as $property)
                                { lat: {{$property->lat}}, lng: {{$property->long}} },
                            @endforeach
                        ];
            
            </script>
        @else

        @endif
    @else
        <script>
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 3,
                    center: { lat: -28.024, lng: 140.887 },
                });
                // Create an array of alphabetical characters used to label the markers.
                const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                // Add some markers to the map.
                // Note: The code uses the JavaScript Array.prototype.map() method to
                // create an array of markers based on a given "locations" array.
                // The map() method here has nothing to do with the Google Maps API.
                const infoWindow = new google.maps.InfoWindow();
                const markers = locations.map((location, i) => {
                    const marker =  new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });
                    
                    marker.addListener("click", () => {
                        var nameList = [
                            
                            @foreach($filteredProperty as $crom)
                            { 
                                id: {{$crom->id}}, 
                                name: "{{$crom->name}}",
                                price: "{{$crom->price}}",
                                city: "{{$crom->city}}",
                                country: "{{$crom->country}}",
                                transaction_type: "{{$crom->transaction_type}}",
                                imgUrl: "{{url('/')}}/image_assest/{{$crom->feature_image_id}}",
                            },
                            @endforeach
                        ];
                        const details = `  <div class="info-card">
                            <div class="img-wrapper">
                                <img src="${nameList[i].imgUrl}" alt="info-img">
                            </div>
                            <div class="info-txt-wrapper">
                                <h3>${nameList[i].name}</h3>
                                <p>Transaction Type: ${nameList[i].transaction_type}</p>
                                <p>Country: ${nameList[i].country}</p>
                                <p>City: ${nameList[i].city}</p>
                                <span class="price-tag">${nameList[i].price}</span>
                            </div>
                        </div>`;
                            infoWindow.open(map, markers[i]);
                            infoWindow.setContent(details);
                        });
                        return marker;
                        
                });
                // Add a marker clusterer to manage the markers.
                var markerCluster = new MarkerClusterer(map, markers, {
                    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                });
                google.maps.event.addListener(markerCluster, 'click', function(c) {
                    // console.log('Number of managed markers in cluster: ' + c.getSize());
                    var markers = c.getMarkers();
                    // console.log('Number of managed markers in cluster: ' + c.getSize());
                    var newArray = [];
                    @if(get_country_cookie(request()))
                        let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                    @else
                        let country_id = 1;
                    @endif
                    for (marker in markers) {
                        const cars = [];
                        cars['lat']= markers[marker].getPosition().lat();
                        cars['long']= markers[marker].getPosition().lng();
                        newArray.push(JSON.stringify(Object.assign({}, cars)));
                    }
                    myArray = JSON.stringify(Object.assign({}, newArray));
                    $.post("{{url('/')}}/api/country_request",
                        {
                            coordinate_data: myArray,
                            country_id : country_id
                        },
                        function(data, status){
                            var obj = JSON.parse(data);
                            let template = '';
                            let info = [];
                            for(let i = 0; i < obj.length; i++) {
                                info[i] = [obj[i]['country'], obj[i]['long'], obj[i]['lat']];;
                            }
                            // var infowindow = new google.maps.InfoWindow();
                            // for(let i = 0; i < obj.length; i++) {
                            //     let details;
                            //     markers[i].addListener('click', function() {
                            //         if(info[i][1] == markers[i].getPosition().lng() && info[i][2] == markers[i].getPosition().lat()) {
                            //             details = `  <div class="row align-items-center p-1" style="width: 500px;">
                            //                             <div class="col-6">
                            //                                 <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                            //                             </div>
                            //                             <div class="col-6">
                            //                                 <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                            //                                 <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                            //                                 <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                            //                                 <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>
                            //                                 <div class="text-end mt-2">
                            //                                     <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                            //                                 </div>
                            //                             </div>
                            //                         </div>`;
                                        
                            //             infowindow.setContent(details);           
                            //             infowindow.open(map, markers[i]);
                            //         }
                            //     });
                            // }
                            
                            
                            
                            for(let i = 0; i < obj.length; i++) {
                                let date = obj[i]['created_at'].split(' ')[0];
                                template += `
                                    <div class="row border align-items-center p-1">
                                        <div class="col-6">
                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}"><img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                        </div>
                                        <div class="col-6">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-9">
                                                    <p class="mb-0 small-num" style="font-size: 0.7rem;">${date}</p>
                                                </div>
                                            </div>
                                            
                                            <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                            <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                            <p class="mb-0" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">${obj[i]['price_currency']}</p>
                                        </div>
                                    </div>
                                `
                                // info[i] = [obj[i]['long'], obj[i]['lat']];
                                
                            };
                            // console.log(obj);
                            $(".properties").html(template);
                            // var infoWindow = new google.maps.InfoWindow({
                            //     content:'<h1>dfdf</h1>'
                            // });
                            // for (marker in markers) {
                            //     const cars = [];
                            //     cars['lat']= markers[marker].getPosition().lat();
                            //     cars['long']= markers[marker].getPosition().lng();
                            // }
                            });
                        });
                    }
                    const locations = [
                    @foreach($filteredProperty as $property)
                        { lat: {{$property->lat}}, lng: {{$property->long}} },
                    @endforeach
                ];
        </script>
    @endif
@endpush

    

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif


<!-- <script src="{{ asset('tpr_templete/scripts/map.js') }}"></script> -->

<script>
    // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();
            if(value == '') {
                
            } 
            else {
                let url = '{{url('/')}}/api/get_property_type_details/' + value;
                const res = await fetch(url);
                const data = await res.json();
                const fields = (data[0]['activated_fields']);
                let template = '';
                let first = '';
                let second = '';
                for(let i = 0; i < fields.length; i++) {
                    if(i == 0) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                first = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                            first = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    } 
                    else if(i == 1) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                second = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        second = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }
                    else {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                template += `<div class="col-3">
                                            <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                            <select class="form-select" name="${name}" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        template += `<div class="col-3">
                                                        <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                        else {
                            template += `<div class="col-3">
                                <div>
                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>
                            </div>`
                        }
                    }
                }
                $('.first-incoming-field').html(first);
                $('.second-incoming-field').html(second);
                $('#incoming_fields').html(template);
            }
        }
        // window.addEventListener('DOMContentLoaded', () => renderFields());
    $('.filter-button').on('click', function(){
            renderFields();
    })
    $('.filter-reset').click(function(){
        $('#filter-form')[0].reset();
    });
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&&libraries=places&callback=initMap"
type="text/javascript"></script>

<script>
    $('.small-heart').on('click', function(){
        let status = $(this).find('.favourite').val();
        if(status == 'non-favourite') {
            $(this).find('button').removeClass('bi-heart');
            $(this).find('button').addClass('bi-heart-fill');
            $(this).find('.favourite').val('favourite');
        }
        else {
            $(this).find('button').removeClass('bi-heart-fill');
            $(this).find('button').addClass('bi-heart');
            $(this).find('.favourite').val('non-favourite');
        }
    });
</script>


<script>
    const renderCity = async () => {
            
        @if(get_country_cookie(request()))
            let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
        @else
            let country_id = 1;
        @endif
        let countries = <?php echo json_encode($countries); ?>;
        let name;
        let countryName;
        let template;
        for(let i = 0; i < countries.length; i++) {
            if(countries[i]['country_id'] == country_id) {
                name = countries[i]['slug'];
            }
        }
        if(name.includes('-')){
            countryName = name.replace("-", " ");
        } else {
            countryName = name;
        }
        $.ajax({
            "type": "POST",
            "url": "https://countriesnow.space/api/v0.1/countries/cities",
            "data": {
                "country": countryName
            }
        }).done(function (d) {
            for(let i = 0; i < d['data'].length; i++) {
                template+= `
                    <option value="${d['data'][i]}">${d['data'][i]}</option>
                `
            }
            $(".areas").append(template);
        });
    }
        window.addEventListener('DOMContentLoaded', () => renderCity());
</script>

<script>
$('.filter-btn').click(function() {
    $(this).toggleClass("active");
});
</script>

<script>
var popovers = document.querySelectorAll('.popover');
var popoverTriggers = document.querySelectorAll('.popover__trigger');

for (var i = 0; i < popoverTriggers.length; i++) {
    popoverTriggers[i].addEventListener('click', function(event) {
        closeAllOthers(this.parentElement);
        this.parentElement.classList.toggle('popover--active');
    });
}

function closeAllOthers(ignore) {
    for (var i = 0; i < popovers.length; i++) {
        if (popovers[i] !== ignore) {
            popovers[i].classList.remove('popover--active');
        }
    }
}
</script>

<script>
var thumbsize = 14;

function draw(slider, splitvalue) {

    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var lower = slider.querySelector('.lower');
    var upper = slider.querySelector('.upper');
    var legend = slider.querySelector('.legend');
    var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
    var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
    var rangemin = parseInt(slider.getAttribute('data-rangemin'));
    var rangemax = parseInt(slider.getAttribute('data-rangemax'));

    /* set min and max attributes */
    min.setAttribute('max', splitvalue);
    max.setAttribute('min', splitvalue);

    /* set css */
    min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 *
        thumbsize))) + 'px';
    max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 *
        thumbsize))) + 'px';
    min.style.left = '0px';
    max.style.left = parseInt(min.style.width) + 'px';
    min.style.top = lower.offsetHeight + 'px';
    max.style.top = lower.offsetHeight + 'px';
    legend.style.marginTop = min.offsetHeight + 'px';
    slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';

    /* correct for 1 off at the end */
    if (max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);

    /* write value and labels */
    max.value = max.getAttribute('data-value');
    min.value = min.getAttribute('data-value');
    lower.innerHTML = min.getAttribute('data-value');
    upper.innerHTML = max.getAttribute('data-value');

}

function init(slider) {
    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var rangemin = parseInt(min.getAttribute('min'));
    var rangemax = parseInt(max.getAttribute('max'));
    var avgvalue = (rangemin + rangemax) / 2;
    var legendnum = slider.getAttribute('data-legendnum');

    /* set data-values */
    min.setAttribute('data-value', rangemin);
    max.setAttribute('data-value', rangemax);

    /* set data vars */
    slider.setAttribute('data-rangemin', rangemin);
    slider.setAttribute('data-rangemax', rangemax);
    slider.setAttribute('data-thumbsize', thumbsize);
    slider.setAttribute('data-rangewidth', slider.offsetWidth);

    /* write labels */
    var lower = document.createElement('span');
    var upper = document.createElement('span');
    lower.classList.add('lower', 'value');
    upper.classList.add('upper', 'value');
    lower.appendChild(document.createTextNode(rangemin));
    upper.appendChild(document.createTextNode(rangemax));
    slider.insertBefore(lower, min.previousElementSibling);
    slider.insertBefore(upper, min.previousElementSibling);

    /* write legend */
    var legend = document.createElement('div');
    legend.classList.add('legend');
    var legendvalues = [];
    for (var i = 0; i < legendnum; i++) {
        legendvalues[i] = document.createElement('div');
        var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
        legendvalues[i].appendChild(document.createTextNode(val));
        legend.appendChild(legendvalues[i]);

    }
    slider.appendChild(legend);

    /* draw */
    draw(slider, avgvalue);

    /* events */
    min.addEventListener("input", function() {
        update(min);
    });
    max.addEventListener("input", function() {
        update(max);
    });
}

function update(el) {
    /* set function vars */
    var slider = el.parentElement;
    var min = slider.querySelector('#min');
    var max = slider.querySelector('#max');
    var minvalue = Math.floor(min.value);
    var maxvalue = Math.floor(max.value);

    /* set inactive values before draw */
    min.setAttribute('data-value', minvalue);
    max.setAttribute('data-value', maxvalue);

    var avgvalue = (minvalue + maxvalue) / 2;

    /* draw */
    draw(slider, avgvalue);
}

var sliders = document.querySelectorAll('.min-max-slider');
sliders.forEach(function(slider) {
    init(slider);
});
</script>



<script>
var thumbsize = 14;

function draw(slider, splitvalue) {

    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var lower = slider.querySelector('.lower');
    var upper = slider.querySelector('.upper');
    var legend = slider.querySelector('.legend');
    var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
    var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
    var rangemin = parseInt(slider.getAttribute('data-rangemin'));
    var rangemax = parseInt(slider.getAttribute('data-rangemax'));

    /* set min and max attributes */
    min.setAttribute('max', splitvalue);
    max.setAttribute('min', splitvalue);

    /* set css */
    min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 *
        thumbsize))) + 'px';
    max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 *
        thumbsize))) + 'px';
    min.style.left = '0px';
    max.style.left = parseInt(min.style.width) + 'px';
    min.style.top = lower.offsetHeight + 'px';
    max.style.top = lower.offsetHeight + 'px';
    legend.style.marginTop = min.offsetHeight + 'px';
    slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';

    /* correct for 1 off at the end */
    if (max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);

    /* write value and labels */
    max.value = max.getAttribute('data-value');
    min.value = min.getAttribute('data-value');
    lower.innerHTML = min.getAttribute('data-value');
    upper.innerHTML = max.getAttribute('data-value');

}

function init(slider) {
    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var rangemin = parseInt(min.getAttribute('min'));
    var rangemax = parseInt(max.getAttribute('max'));
    var avgvalue = (rangemin + rangemax) / 2;
    var legendnum = slider.getAttribute('data-legendnum');

    /* set data-values */
    min.setAttribute('data-value', rangemin);
    max.setAttribute('data-value', rangemax);

    /* set data vars */
    slider.setAttribute('data-rangemin', rangemin);
    slider.setAttribute('data-rangemax', rangemax);
    slider.setAttribute('data-thumbsize', thumbsize);
    slider.setAttribute('data-rangewidth', slider.offsetWidth);

    /* write labels */
    var lower = document.createElement('span');
    var upper = document.createElement('span');
    lower.classList.add('lower', 'value');
    upper.classList.add('upper', 'value');
    lower.appendChild(document.createTextNode(rangemin));
    upper.appendChild(document.createTextNode(rangemax));
    slider.insertBefore(lower, min.previousElementSibling);
    slider.insertBefore(upper, min.previousElementSibling);

    /* write legend */
    var legend = document.createElement('div');
    legend.classList.add('legend');
    var legendvalues = [];
    for (var i = 0; i < legendnum; i++) {
        legendvalues[i] = document.createElement('div');
        var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
        legendvalues[i].appendChild(document.createTextNode(val));
        legend.appendChild(legendvalues[i]);

    }
    slider.appendChild(legend);

    /* draw */
    draw(slider, avgvalue);

    /* events */
    min.addEventListener("input", function() {
        update(min);
    });
    max.addEventListener("input", function() {
        update(max);
    });
}

function update(el) {
    /* set function vars */
    var slider = el.parentElement;
    var min = slider.querySelector('#min');
    var max = slider.querySelector('#max');
    var minvalue = Math.floor(min.value);
    var maxvalue = Math.floor(max.value);

    /* set inactive values before draw */
    min.setAttribute('data-value', minvalue);
    max.setAttribute('data-value', maxvalue);

    var avgvalue = (minvalue + maxvalue) / 2;

    /* draw */
    draw(slider, avgvalue);
}

var sliders = document.querySelectorAll('.more-filter-min-max');
sliders.forEach(function(slider) {
    init(slider);
});
</script>
@endpush