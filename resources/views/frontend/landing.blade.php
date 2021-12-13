@extends('frontend.layouts.landing_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
@push('after-styles')
    <style>
        .icon-link {
            width: 150px;
            height: 100px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            background: #eee;
            margin: 4px;
        }

        .icon-link:hover, .icon-link.active {
            background: #78cfed;
            box-shadow: 2px 4px 8px 0px rgba(46, 61, 73, 0.2)
        }

        .icon-link:hover .icon-txt, .icon-link.active .icon-txt {
            color: #fff;
        }

        .icon-img {
            width: 50%;
            height: 50%;
            object-fit: cover;
        }

        .icon-txt {
            display: block;
            color: #000;
            font-weight: bold;
            padding-top: 10px;
        }

        .all-img {
            position: relative;
            top: 10px;
        }
    </style>
@endpush

<!-- navbar -->
@include('frontend.includes.landing_nav')



<!-- map -->
<section id="map-section" class="map-banner">
    <div class="container" style="margin-top: 7rem;">
        <div class="row justify-content-between">
            
            <div class="col-12 col-md-3 position-relative regions-div">
                <div class="p-3" style="background: rgb(0,0,0, 0.6)">
                    <h5 class="fw-bold text-white mb-0">Tropical Regions</h5>
                </div>
                <div class="map-ban"></div>
                <div class="map-ban1"></div>
                <div class="countries position-absolute" style="top: 75px; left: 30px;">
                    
                    @foreach($countries_data as $countryq)
                        <h6>
                            <a href="country/{{$countryq->country_id}}">{{$countryq->country_name}} </a>
                        </h6>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-9 position-relative map-div">
                <div class="map-large-ban"></div>
                <div class="map-large-ban1"></div>
                <h5 class="text-center text-white" style="width: 100%; position: absolute; top: 15px;">Select your preferred Tropical Region to view Properties</h5>
                <div id="mapdiv" style="width: 97.3%; height: 394px; position: absolute; top: 55px;"></div>
            </div>
        </div>
    </div>
</section>



@if(count($global_advertisement) !== 0)

    <ul class="nav mb-3 justify-content-center mt-5" id="projects-tab" role="tablist">
        <!-- <li class="nav-item landing-item px-3" role="presentation" width="25%" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
            <img src="{{url('tpr_templete/images/airlines_icon.svg')}}" alt="" class="img-fluid" style="border-bottom:0 !important" width="70px" height="70px" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true" />
            <a class="nav-link active tabs" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">ALL</a>
        </li>  -->

        <li>
            <a class="icon-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">
                <img class="icon-img all-img" src="{{url('tpr_templete/images/airlines_icon.svg')}}" alt="">
                <span class="icon-txt">All</span>
            </a>
        </li>

        @foreach($global_categories as $key => $global_category)

            @if(App\Models\GlobalAdvertisement::where('global_category',$global_category->id)->first() == null)

            @else
                <!-- <li class="nav-item landing-item px-3" role="presentation" data-aos="fade-up" width="25%" data-aos-duration="500" data-aos-delay="300">
                    <img src="{{url('files/global_advertisement',$global_category->icon)}}" alt="" class="img-fluid" style="border-bottom:0 !important" width="70px" height="70px" data-bs-toggle="tab" data-bs-target="#tab{{ $global_category->id }}" type="button" role="tab" aria-controls="tab-{{ $global_category->id }}" aria-selected="false">
                    <a class="nav-link tabs text-uppercase" id="tab-id{{ $global_category->id }}" data-bs-toggle="tab" data-bs-target="#tab{{ $global_category->id }}" type="button" role="tab" aria-controls="tab-{{ $global_category->id }}" aria-selected="false">{{ $global_category->name }}</a>
                </li>    -->
                <li>
                    <a class="icon-link" id="tab-id{{ $global_category->id }}" data-bs-toggle="tab" data-bs-target="#tab{{ $global_category->id }}" type="button" role="tab" aria-controls="tab-{{ $global_category->id }}" aria-selected="false">
                        <img class="icon-img" src="{{url('files/global_advertisement',$global_category->icon)}}" alt="">
                        <span class="icon-txt">{{ $global_category->name }}</span>
                    </a>
                </li>
            @endif
                    
        @endforeach
        

    </ul>

    <div class="tab-content mt-2 py-4" id="tabs-tabContent">

        <div class="tab-pane fade show active position-relative" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
            <div class="swiper container mySwiper">
                <div class="swiper-wrapper">
                    @foreach($global_advertisement as $key => $advertisement)
                    
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 p-3 p-md-1 text-center">
                                @if($advertisement->image !== null)
                                    <img src="{{ uploaded_asset($advertisement->image) }}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:260px;">
                                    <input type="hidden" value="{{$advertisement->link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif
                                </div>
                                <div class="col-12 col-md-6 p-3 p-md-1">
                                @if($advertisement->large_right_image !== null)
                                    <img src="{{uploaded_asset($advertisement->large_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:260px;">
                                    <input type="hidden" value="{{$advertisement->large_right_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->large_right_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                </div> 
                                @endif
                                </div>                  
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 p-3 p-1">
                                @if($advertisement->small_left_image !== null)
                                    <img src="{{uploaded_asset($advertisement->small_left_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                    <input type="hidden" value="{{$advertisement->small_left_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_left_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>
                                <div class="col-12 col-md-4 p-3 p-1">
                                @if($advertisement->small_middle_image !== null)
                                    <img src="{{uploaded_asset($advertisement->small_middle_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                    <input type="hidden" value="{{$advertisement->small_middle_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_middle_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>  
                                <div class="col-12 col-md-4 p-3 p-1">
                                @if($advertisement->small_right_image !== null)
                                    <img src="{{uploaded_asset($advertisement->small_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                    <input type="hidden" value="{{$advertisement->small_right_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_right_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>                   
                            </div>
                        </div>
                        
                        <!-- <a href="{{ $advertisement->link }}" style="text-decoration:none" target="_blank" class="w-100">
                            <img src="{{url('files/global_advertisement/',$advertisement->image)}}" alt="...">
                        </a>  -->
                    </div>

                    @endforeach
                </div>
                
            </div>
            <div class="swiper-pagination sp-1" style="bottom: -30px;"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    
        

        @foreach($global_categories as $key => $global_category)
            <div class="tab-pane fade" id="tab{{ $global_category->id }}" role="tabpanel" aria-labelledby="tab-id{{ $global_category->id }}">
                <div class="swiper container mySwiper2">
                    <div class="swiper-wrapper">                                     
                    
                        @foreach(App\Models\GlobalAdvertisement::where('global_category', $global_category->id)->where('status','=','1')->orderBy('order','ASC')->get() as $data)

                            <div class="swiper-slide">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-6 p-3 p-md-1 text-center">
                                        @if($advertisement->image !== null)
                                            <img src="{{uploaded_asset($data->image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:260px;">
                                            <input type="hidden" value="{{$advertisement->link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif
                                        </div>
                                        <div class="col-12 col-md-6 p-3 p-md-1 ">
                                        @if($advertisement->large_right_image !== null)
                                            <img src="{{uploaded_asset($data->large_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:260px;">
                                            <input type="hidden" value="{{$advertisement->large_right_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->large_right_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div> 
                                        @endif
                                        </div>                  
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 p-3 p-1">
                                        @if($advertisement->small_left_image !== null)
                                            <img src="{{uploaded_asset($data->small_left_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                            <input type="hidden" value="{{$advertisement->small_left_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_left_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>
                                        <div class="col-12 col-md-4 p-3 p-1">
                                        @if($advertisement->small_middle_image !== null)
                                            <img src="{{uploaded_asset($data->small_middle_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                            <input type="hidden" value="{{$advertisement->small_middle_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_middle_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>  
                                        <div class="col-12 col-md-4 p-3 p-1">
                                        @if($advertisement->small_right_image !== null)
                                            <img src="{{uploaded_asset($data->small_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal" style="height:210px;">
                                            <input type="hidden" value="{{$advertisement->small_right_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_right_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>                   
                                    </div>
                                </div>
                            </div>  

                        @endforeach                                                                        
                        
                    </div>
                    <div class="swiper-pagination sp-2"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        @endforeach
    </div>
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




<!-- featured properties -->
<section id="featured-properties">
    <div class="container" style="margin-top: 6rem;">
        
        @if(($country_list1 && $country_list2) == null)
        @else
        <h3 class="fw-bolder text-center">
            Featured Properties Around the world
        </h3> 
        @endif
        
            @if($country_list1 != null)
                @if(json_decode($country_list1->features_manager)[0]->properties != null)
                    <div class="1strow mt-4">
                        <div class="row align-items-center">
                            <div class="col-1 pe-0">
                                <img src="https://flagcdn.com/w40/{{strtolower($country_list1->country_id)}}.png" alt="" style="height: 30px;">
                            </div>
                            <div class="col-2 ps-0">
                                <h5 class="mb-0">{{$country_list1->country_name}}</h5>
                            </div>
                        </div>                        

                        <div class="row mt-3">

                            @foreach(json_decode($country_list1->features_manager)[0]->properties as $key=> $prop)   
                                @if($key <= 2 )
                                    <div class="col-12 col-md-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                        <div class="card p-4 border-0 custom-shadow">
                                            <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top" alt="..." style="object-fit:cover; height: 210px;"></a>
                                            <div class="card-body mt-4">
                                                <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->city }}, {{ App\Models\Properties::where('id', $prop)->first()->country }}</h5>                                   
                                                <p class="mt-1 text-info">$ {{ App\Models\Properties::where('id', $prop)->first()->price }}</p>
                                            </div>
                                        </div>
                                    </div>                            
                                @else
                                @endif                                
                            @endforeach

                        </div>                        
                    </div>
                @endif  
            @endif               

            @if($country_list2 != null)
                @if(json_decode($country_list2->features_manager)[0]->properties != null)
                    <div class="1strow" style="margin-top: 6rem;">
                        <div class="row align-items-center">
                            <div class="col-1 pe-0">
                                <img src="https://flagcdn.com/w40/{{strtolower($country_list2->country_id)}}.png" alt="" style="height: 30px;">
                            </div>
                            <div class="col-2 ps-0">
                                <h5 class="mb-0">{{$country_list2->country_name}}</h5>
                            </div>
                        </div>                        

                        <div class="row mt-3">

                            @foreach(json_decode($country_list2->features_manager)[0]->properties as $key=> $prop)
                                @if($key <= 2 )
                                <div class="col-12 col-md-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                    <div class="card p-4 border-0 custom-shadow">
                                        <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top" alt="..." style="object-fit:cover; height: 210px;"></a>
                                        <div class="card-body mt-4">
                                            <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->city }}, {{ App\Models\Properties::where('id', $prop)->first()->country }}</h5>                                   
                                            <p class="mt-1 text-info">$ {{ App\Models\Properties::where('id', $prop)->first()->price }}</p>
                                        </div>
                                    </div>
                                </div> 
                                @else
                                @endif                             
                            @endforeach

                        </div>                        
                    </div>
                @endif
            @endif



    </div>
</section>






@endsection


@push('after-scripts')
<script>
    var map = AmCharts.makeChart("mapdiv",{
        type: "map",
        theme: "dark",
        projection: "mercator",
        panEventsEnabled : true,
        backgroundColor : "#ff000000",
        backgroundAlpha : 1,
        zoomControl: {
            zoomControlEnabled : true,
        },
        dataProvider : {
            map : "worldHigh",
            getAreasFromMap : true,
            areas :
                [
                    @foreach($countries_data as $countryq)
                    {
                        "id" : "{{$countryq->country_id}}",
                        "url" : "country/{{$countryq->country_id}}",
                        "title" : "{{$countryq->country_name}} - {{ App\Models\Properties::where('country', $countryq->country_name)->count()}} properties",
                        "color" : "#009933",
                        "rollOverColor" : "#75CFED"
                    },
                    @endforeach
                ]
        },
        areasSettings : {
            autoZoom : true,
            selectedColor : "#B4B4B7",
            color : "#FFFFFF",
            colorSolid : "#84ADE9",
            outlineColor : "#707070",
            rollOverColor : "#B4B4B7",
            rollOverOutlineColor : "#B4B4B7",
        },
        "mouseWheelZoomEnabled": true
    });
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        // loop: true,
        pagination: {
          el: ".sp-1",
          clickable: true,
        },
        allowTouchMove: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });
    </script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 30,
        // loop: true,
        pagination: {
          el: ".sp-2",
          clickable: true,
        },
        allowTouchMove: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });
    </script>



<script>
    $(document).ready(function() {
        setTimeout(function(){

            $('.amcharts-chart-div').find('a').addClass('hide-map-text');

        }, 2000);
        
    });
</script>





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

@endpush
