@extends('frontend.layouts.landing_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}"> -->
@endpush


    <!--terms of use-->
    <section id="terms-of-use">
        <div class="container pe-0" style="margin-top:10rem">
            <h3 class="fw-bolder">Terms of Use</h3>

            <div class="row" style="text-align:justify;">
                <div class="col-12">
                    {!! get_settings('terms_of_use_content') !!}
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <!-- <section id="get-app">
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

