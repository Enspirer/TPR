@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')



    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
        </div>
    </section>


    <!--search-->
    <section id="index-search" class="container-fluid search" style="background: rgba(255, 255, 255, .5)">
        @include('frontend.includes.search_bar')
    </section>


    

    @if(get_country_cookie(request()))

        @if(App\Models\HomePageAdvertisement::where('country',get_country_cookie(request())->country_name)->where('status','=','Enable')->where('category','!=',null)->where('admin_approval','=','Approved')->where('country_manager_approval','=','Approved')->first() == null)

        @else
            <!--recent projects-->
            <section id="index-recent-projects">
                
                    <div class="container-fluid p-3 text-center text-white" style="background-color: #156073">
                        <h3 class="fw-bolder" data-aos="fade-up" data-aos-duration="500">Property Market in {{ get_country_cookie(request())->country_name }}</h3>
                    </div>

                <div class="container text-center p-0 mt-3" data-aos="fade-up" data-aos-duration="500">
                    <ul class="nav mb-3 justify-content-center" id="projects-tab" role="tablist">
                        <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
                            <a class="nav-link active tabs" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">All</a>
                        </li>   
                        
                        @foreach($ad_category as $key => $ad_cat)

                            @if(get_country_cookie(request())->country_name == $ad_cat->country)                            
                                
                                @if(App\Models\HomePageAdvertisement::where('category',$ad_cat->id)->where('admin_approval','=','Approved')->where('country_manager_approval','=','Approved')->where('status','=','Enable')->first() == null)

                                @else
                                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                                    <a class="nav-link tabs" id="tab-id{{ $ad_cat->id }}" data-bs-toggle="tab" data-bs-target="#tab{{ $ad_cat->id }}" type="button" role="tab" aria-controls="tab-{{ $ad_cat->id }}" aria-selected="false">{{ $ad_cat->name }}</a>
                                </li>   

                                @endif                              
                                
                            @endif                       

                        @endforeach

                    </ul>

                    <div class="tab-content mt-md-5 py-0" id="tabs-tabContent">

                        <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
                            
                            <div class="swiper container mySwiper">
                                <div class="swiper-wrapper"> 

                                        @foreach($homepage_ad as $key => $home_ad)

                                            @if(get_country_cookie(request())->country_name == $home_ad->country)
                                            
                                            <div class="swiper-slide">
                                                <img src="{{url('files/homepage_advertisement',$home_ad->image)}}" class="img-fluid" alt="" style="object-fit:cover; height: 210px;" data-bs-toggle="modal" data-bs-target="#ad-modal">
                                                <input type="hidden" value="{{$home_ad->link}}" class="ad-link">
                                                <input type="hidden" value="{{$home_ad->description}}" class="ad-description">
                                            </div> 
                                           
                                            @endif

                                        @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                        </div>

                        @foreach($ad_category as $key => $ad_cat)
                            <div class="tab-pane fade" id="tab{{ $ad_cat->id }}" role="tabpanel" aria-labelledby="tab-id{{ $ad_cat->id }}">
                                <div class="swiper container mySwiper2">
                                    <div class="swiper-wrapper">                                     
                                    
                                        @foreach(App\Models\HomePageAdvertisement::where('category',$ad_cat->id)->where('status','=','Enable')->where('admin_approval','=','Approved')->where('country_manager_approval','=','Approved')->orderBy('order','ASC')->get() as $data)

                                            <div class="swiper-slide">
                                                <img src="{{url('files/homepage_advertisement',$data->image)}}" class="img-fluid" alt="" style="object-fit:cover; height: 210px;" data-bs-toggle="modal" data-bs-target="#ad-modal">
                                                <input type="hidden" value="{{$data->link}}" class="ad-link">
                                                <input type="hidden" value="{{$data->description}}" class="ad-description">
                                            </div>  

                                        @endforeach                                                                        
                                        
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        @endif

    @else

    <h1 align="center">Select a Country</h1>

    @endif



    <!-- Ad Modal -->
    <div class="modal fade" id="ad-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img src="" alt="" id="modal-ad-img" class="img-fluid w-100" style="object-fit: cover; height: 20rem">
                        <!-- <input name="description" id="modal-ad-description" class="form-control mt-3"></input> -->
                        <p class="mt-3" id="modal-ad-description" style="text-align: justify;"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-primary" id="modal-ad-link" target="_blank">More Details</a>
            </div>
            </div>
        </div>
    </div>


    


    <!--property search-->
    <section id="index-property-search">
        <div class="container-fluid" style="margin-top:4rem">
            <h3 class="fw-bolder text-center" data-aos="fade-up" data-aos-duration="500">Interactive Property Search</h3>

            <div class="row mt-4">
            @if(count($promo) > 0)
                <div class="col-12 col-md-3 mb-4 mb-md-0" style="background-color: #F3F3F3">
                    <h6 data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">Results: {{ count($promo) }} Listings</h6>
                    <div class="row align-items-center" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
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
                        @foreach($promo as $property)
                            <div class="row border align-items-center p-1">
                                <div class="col-6">
                                    <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{url('image_assest', $property->feature_image_id)}}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <p class="mb-0 small-num" style="font-size: 0.7rem;">{{ $property->created_at->toDateString() }}</p>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-0">{{ $property->name }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: {{ $property->transaction_type }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Country: {{ $property->country }}</p>
                                                                       
                                    @if(get_country_cookie(request()))
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(get_country_cookie(request())->country_id, $property->price) }}</p>
                                    @else
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(1, $property->price) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-12 col-md-3 mb-4 mb-md-0">
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
                <div class="col-12 col-md-9 p-md-0">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>

    <!--cards-->
    <section id="index-cards">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <div class="card p-4 custom-shadow border-0">
                        <img src="{{url('tpr_templete/images/card_1.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center mb-4">Map Search</h4>
                            <!-- <h5 class="text-info">Draw your map Options</h5> -->
                            <p class="card-text">Broaden your view on different localities using the unique Map Search option available on our site. Access to your preferred locations and properties is just a click away.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <div class="card p-4 custom-shadow border-0">
                        <img src="{{url('tpr_templete/images/card_2.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center mb-4">Properties Near Me</h4>
                            <!-- <h5 class="text-info">SubTopic</h5> -->
                            <p class="card-text">Got your eye on a preferred location? Use our site to look for properties near your vicinity that will appeal to your budget and preference.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                    <div class="card p-4 custom-shadow border-0">
                        <img src="{{url('tpr_templete/images/card_3.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center mb-4">Property Alerts Live</h4>
                            <!-- <h5 class="text-info">SubTopic</h5> -->
                            <p class="card-text">Register with us and get regular updates and insights about the properties and real estate market in your preferred locations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--featured projects-->
    <section id="index-featured-projects">
        <div class="container " style="margin-top:7rem">
            @if(count($latest) != 0)

                <h3 class="text-center fw-bolder" data-aos="fade-up" data-aos-duration="500">Featured Properties</h3>

                <div class="mt-4 mt-md-5">
                    <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Fresh in the Market</h4>

                    <div class="row mt-4">

                    @foreach($latest as $lat)

                        <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                            <div class="card p-4 custom-shadow border-0" style="height:24.5rem">
                                <a href="{{ route('frontend.individual-property', $lat->id) }}"><img src="{{url('image_assest',$lat->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                <div class="card-body">

                                    <h5 class="card-title">{{ $lat->name }}</h5>

                                    @if($lat->beds != null)
                                        <p class="card-text mt-3 mb-1">{{$lat->beds}} Beds Semidetached house</p>
                                    @endif

                                    <p class="card-text">{{ $lat->city }}, {{ $lat->country }}</p>

                                    @if(get_country_cookie(request()))
                                        <p class="mt-1 text-info">{{ current_price(get_country_cookie(request())->country_id, $lat->price) }}</p>
                                    
                                    @else
                                    <p class="mt-1 text-info">{{ current_price(1, $lat->price) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            @else

            @endif
                
        

            @if(json_decode($country->features_manager) != null)
                @if(json_decode($country->features_manager)[0]->properties != null)
                    
                        <div class="home-featured" style="margin-top: 6rem">

                            <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">{{ json_decode($country->features_manager)[0]->title }}</h4>

                            <div class="row mt-4">
                                @foreach(json_decode($country->features_manager)[0]->properties as $prop)
                                <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                    <div class="card p-4 custom-shadow border-0">
                                        <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                        <div class="card-body mt-4">
                                            <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->name }}</h5>
                                            <p class="card-text mt-3 mb-1">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                            <p class="card-text">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>

                                            @if(get_country_cookie(request()))
                                                <p class="mt-1 text-info">{{ current_price(get_country_cookie(request())->country_id, App\Models\Properties::where('id', $prop)->first()->price) }}</p>

                                            @else
                                                <p class="mt-1 text-info">{{ current_price(1, App\Models\Properties::where('id', $prop)->first()->price) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                @endif



                @if(json_decode($country->features_manager)[1]->properties != null)
                    <div class="home-featured" style="margin-top: 6rem">
                        <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">{{ json_decode($country->features_manager)[1]->title }}</h4>

                        
                        <div class="row mt-4">
                            @foreach(json_decode($country->features_manager)[1]->properties as $prop)
                            <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                <div class="card p-4 custom-shadow border-0">

                                    <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                    <div class="card-body mt-4">
                                        <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->name }}</h5>
                                        <p class="card-text mt-3 mb-1">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                        <p class="card-text">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>

                                        @if(get_country_cookie(request()))
                                            <p class="mt-1 text-info">{{ current_price(get_country_cookie(request())->country_id, App\Models\Properties::where('id', $prop)->first()->price) }}</p>

                                        @else
                                            <p class="mt-1 text-info">{{ current_price(1, App\Models\Properties::where('id', $prop)->first()->price) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </section>



    <!--Properties Recently Sold-->
    @if(get_country_cookie(request()))

        @if(App\Models\Properties::where('country',get_country_cookie(request())->country_name)->where('sold_request','Sold')->where('admin_approval','Approved')->where('country_manager_approval','=','Approved')->first() == null)

        @else
            <!--recent projects-->
            <section id="index-recent-projects" class="mt-5">  

                <h3 class="text-center fw-bolder" data-aos="fade-up" data-aos-duration="500">Properties Recently Sold</h3>

                <div class="container text-center p-0 mt-3">
                    

                    <div class="tab-content mt-md-5 py-0" id="tabs-tabContent">

                        <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
                            
                            <div class="swiper container mySwiper" data-aos="fade-up" data-aos-duration="500">
                                <div class="swiper-wrapper"> 

                                        @foreach($sold_prop as $key => $sold)

                                            @if(get_country_cookie(request())->country_name == $sold->country)
                                            
                                            <div class="swiper-slide">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('frontend.individual-property', $sold->id) }}" style="text-decoration:none">
                                                            <img src="{{url('image_assest',$sold->feature_image_id)}}"  class="img-fluid" alt="" style="object-fit:cover; height: 210px;">
                                                            <h4 class="mt-3">{{$sold->name}}</h4>
                                                            <p class="mt-2" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$sold->description}}</p>
                                                            <div class="ribbon ribbon-top-right"><span>Sold</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> 
                                           
                                            @endif

                                        @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>                        

                    </div>
                </div>
            </section>

        @endif

    @else

    <h1 align="center">Select a Country</h1>

    @endif

    


    <!--bottom banner-->
    <section id="index-bottom-banner">
        <div class="container-fluid bottom-banner" style="margin-top:5rem">
            <div class="container">
                <div class="row justify-content-end text" style="padding-top: 7rem">
                    <div class="col-12 col-md-4">
                        <div class="p-3 text-white rounded" style="background: rgba(0, 0, 0, .7)">
                            <h5 data-aos="fade-up" data-aos-duration="500">"I'm so pleased I chose <br> <span class="fw-bolder">Tropical Property!</span> <br> My property was a great valuation <br> and sold quickly, the perfect outcome"</h5>
                            <div class="stars mt-1">
                                <i class="bi bi-star-fill me-2 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="200"></i>
                                <i class="bi bi-star-fill me-2 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="300"></i>
                                <i class="bi bi-star-fill me-2 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="400"></i>
                                <i class="bi bi-star-fill me-2 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="500"></i>
                                <i class="bi bi-star-fill me-2 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Filter Modal -->
    @include('frontend.includes.search_filter_modal')


@endsection



@push('before-scripts')
    <script>
        let lat = <?php echo json_encode($country->latitude); ?>;
        let lng = <?php echo json_encode($country->longitude); ?>;

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: { lat: parseInt(lat), lng: parseInt(lng) },
            });

            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            const markers = locations.map((location, i) => {
                    return new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });

        });

            // let property = <?php echo json_encode($promo); ?>;

            

            // var infowindow = new google.maps.InfoWindow();

            // for(let i = 0; i < markers.length; i++) {
            //     for(let j = 0; j < property.length; j++) {
            //         let lat = markers[i].getPosition().lat();    
            //         let lng = markers[i].getPosition().lng();   

                    
            //         if(lat == property[j]['lat'] && lng == property[j]['long']) {
            //             let details = `<div class="row align-items-center p-1" style="width: 500px;">
            //                             <div class="col-6">
            //                                 <img src="{{url('/')}}/image_assest/${property[j]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
            //                             </div>
            //                             <div class="col-6">
            //                                 <h5 class="fw-bold mb-2">${property[j]['name']}</h5>
            //                                 <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${property[j]['transaction_type']}</p>
            //                                 <p class="mb-1" style="font-size: 0.8rem;">Country: ${property[j]['country']}</p>
            //                                 <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${property[j]['price']}</p>

            //                                 <div class="text-end">
            //                                     <a href="{{url('/')}}/individual-property/${property[j]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
            //                                 </div>
            //                             </div>
            //                         </div>`;

            //             markers[i].addListener('click', function() {
            //                 infowindow.setContent(details);           
            //                 infowindow.open(map, markers[i]);
            //             });
            //         }
                
            //     };
            // };



            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

            google.maps.event.addListener(markerCluster, 'click', function(c) {

                var markers = c.getMarkers();
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


                        var infowindow = new google.maps.InfoWindow();


                        for(let i = 0; i < obj.length; i++) {
                            let details;
                            markers[i].addListener('click', function() {
                                if(info[i][1] == markers[i].getPosition().lng() && info[i][2] == markers[i].getPosition().lat()) {
                                    details = `  <div class="row align-items-center p-1" style="width: 500px;">
                                                    <div class="col-6">
                                                        <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>

                                                        <div class="text-end mt-2">
                                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    
                                    infowindow.setContent(details);           
                                    infowindow.open(map, markers[i]);
                                }
                            });
                        }
                        

                        
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
                        };


                        $(".properties").html(template);
                        heart_toggle();

                });
            });


        }

        const locations = [
            @foreach($promo as $prom)
                { lat: {{$prom->lat}}, lng: {{$prom->long}} },
            @endforeach
        ];

        function heart_toggle() {
            $('.small-heart').on('click', function(){
                $(".small-heart bi-heart").hide();
                $(".small-heart bi-heart-fill").show();
                
                $("i", this).toggle();
            });
        }

    </script>
@endpush



@push('after-scripts')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap" type="text/javascript"></script>


    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });

        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });    
</script>


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
                                                <option value="5">5</option>
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
                                                <option value="5">5</option>
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
                                                <option value="5">5</option>
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


<!-- <script>
    $('.filter-btn').on('click', function() {
        let value = $(this).siblings('.category').val();

        $('#modal-id').val(value);
    });
</script> -->


<script>
    $('.swiper-slide img').on('click', function() {
        let img = $(this).attr('src');
        let link = $(this).next().val();
        let description = $(this).siblings('.ad-description').val();

        $('#modal-ad-img').attr('src', img);
        $('#modal-ad-link').attr('href', link);
        $('#modal-ad-description').text(description);

        
    });
</script>



@push('after-scripts')
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
    
    (function() {
        
        if( window.localStorage ){
            if( !localStorage.getItem('firstLoad') ){
                localStorage['firstLoad'] = true;
                window.location.reload();
            }  
            else {
                localStorage.removeItem('firstLoad');
            }
        }
        
    })();
</script>


@endpush

@endpush
