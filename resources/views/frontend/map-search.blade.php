@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}">
@endpush


    <!--residential property search-->
    <section id="residential-property-search">
        <div class="container pe-0" style="margin-top:5rem">
            <h3 class="fw-bolder text-center">Interactive Property Search</h3>

            <div class="row mt-4">
                <div class="col-3">
                    <h5>Results: 159,728 Listings</h5>
                    <div class="row align-items-center">
                        <div class="col-5">
                            <p class="mb-0 text">Sort By</p>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Newest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">Newest</a></li>
                                  <li><a class="dropdown-item" href="#">Oldest</a></li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    <div class="properties">
                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_1.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>
    
                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_2.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>
    
                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_3.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>
    
                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_4.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_1.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_2.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_3.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <section id="index-get-app">
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
    </section>

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif


<script src="{{ asset('tpr_templete/scripts/map.js') }}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script>

<script>
    $('.small-heart').on('click', function(){
        $(".small-heart bi-heart").hide();
        $(".small-heart bi-heart-fill").show();
        
        $("i", this).toggle();
    });
</script>

@endpush