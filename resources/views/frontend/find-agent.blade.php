@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/find-agent.css') }}">
@endpush


    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
            <div class="container">
                <div class="row justify-content-between" style="padding-top: 14rem;">
                    <div class="col-5" style="color: black;">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore laudantium impedit nobis ea praesentium. Laudantium?</h3>
                    </div>
                    <div class="col-5">
                        <form action="{{route('frontend.find-agent.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="mb-4">
                                <select class="form-select p-3 areas" aria-label="Default select example" name="area" required>
                                </select>
                            </div>
                            <div class="mb-4">
                                <select class="form-select p-3" aria-label="Default select example" name="agent_type" required>
                                    <option selected disabled value="">Agent Type</option>
                                    <option value="Company">Company</option>
                                    <option value="Individual">Individual</option>
                                  </select>
                            </div>
                            <div class="mb-4">
                            <input class="form-control p-3" name="agent_name" id="agent_name" placeholder="Agent Name" required></input>
                            </div>
                                <input type="submit" class="btn rounded-0 fw-bold fs-5 p-2" style="background-color: #77CEEC; width:100%; color:white;" value="Search" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--directory-->
    <section id="directory">
        <div class="container" style="margin-top: 6rem;">
            <h3 class="fw-bolder">Directory of Real Estate Agents / Brokers / Realtors in Sri Lanka</h3>

            @if(count($agents) <= 0)
                <section id="residential-properties">
                    <div class="container text-center" style="margin-top: 7rem">
                        <p class="display-3 text-secondary">AGENTS NOT FOUND!</p>
                    </div>
                </section>
            @else

                @foreach($agents as $agent)
                    @if($agent->status == 'Approved')
                        <div class="row shadow py-5 px-4 align-items-center" style="margin-top: 5rem;">
                            <div class="col-4">
                                <img src="{{ url('files/agent_request', $agent->photo) }}" alt="" class="img-fluid" style="object-fit:cover;">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <h5 class="fw-bolder">
                                            @if($agent->company_name == null)
                                                {{ $agent->name }}
                                            @else
                                                {{ $agent->company_name }}
                                            @endif
                                            </h5>
                                        </div>
                                        <!-- <div class="float-end">
                                            <i class="bi bi-star-fill me-3 stars"></i>
                                            <i class="bi bi-star-fill me-3 stars"></i>
                                            <i class="bi bi-star-fill me-3 stars"></i>
                                            <i class="bi bi-star-fill me-3 stars"></i>
                                            <i class="bi bi-star-fill me-3 stars"></i>
                                        </div> -->
                                    </div>
                                </div>
                                <h6>Area(s) covered: Island Wide.</h6>
                                <div class="row mt-3">
                                    <!-- <div class="col-2 p-1">
                                        <button class="btn w-100 text-white" style="background-color: #77CEEC; border-radius: 0.7rem;">Sales</button>
                                    </div> -->

                                
                                    <div class="col-2 p-1">
                                        <a href="{{ route('frontend.search_function', ['key_name', 'min_price', 'max_price', 'residential', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type'] )}}"><button class="btn w-100 text-white" style="background-color: #4195E1; border-radius: 0.7rem;">Residential</button></a>
                                    </div>
                                
                                    <div class="col-2 p-1">
                                        <a href="{{ route('frontend.search_function', ['key_name', 'min_price', 'max_price', 'commercial', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type'] )}}"><button class="btn w-100 text-white" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button></a>
                                    </div>
                                  
                                    
                                    
                                    <!-- <div class="col-2 p-1">
                                        <button class="btn w-100 text-white" style="background-color: #7DCAC4; border-radius: 0.7rem;">PropertyLand</button>
                                    </div> -->
                                </div>
                                <p class="mt-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 15; -webkit-box-orient: vertical;">{{ $agent->description_message }}</p>

                                <div class="row">
                                    <div class="clearfix">
                                        <div class="float-end">
                                            <a href="{{ route('frontend.individual-agent', $agent->id) }}"><button class="btn border-1 border-dark rounded-0 px-5 py-2">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-4">
                                        <a href="tel:{{ $agent->telephone }}" class="btn w-100 agent-contact"><i class="fas fa-mobile-alt me-2"></i>{{ $agent->telephone }}</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="mailto:{{ $agent->email }}" class="btn w-100 agent-contact" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><i class="fas fa-envelope me-2"></i>{{ $agent->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endif    

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



<script>
    const renderFields = async () => {
            
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

            $(".areas").html(template);
        });
    }

        window.addEventListener('DOMContentLoaded', () => renderFields());
</script>

@endpush