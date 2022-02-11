@extends('frontend.layouts.landing_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}"> -->
@endpush


    <section id="privacy-policy">
        <div class="container" style="margin-top:8rem">

            <div class="row d-flex justify-content-center" style="text-align:center;">
                    <h1 class="fw-bolder" style="font-family: 'Petit Formal Script';">Coming Soon!</h1>
                    <h3 class="fw-bolder mt-3 mb-5" style="font-family: 'Petit Formal Script';">We are Still Working on it.</h3>

                    
                    <img src="{{url('img/coming_soon.png')}}" style="width:55%" class="mt-2" alt="">

                    @if(get_country_cookie(request()))
                        <a href="{{route('frontend.home_page',get_country_cookie(request())->country_id)}}" style="text-decoration:none"><h3 style="font-family: 'Petit Formal Script'; margin-top:80px">Go Back</h3></a>		
                    @else
                        <a href="{{route('frontend.landing')}}" style="text-decoration:none"><h4 style="font-family: 'Petit Formal Script'; margin-top:80px">Go Back</h4></a>		
                    @endif

            </div>
        </div>
    </section>




@endsection

