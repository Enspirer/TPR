@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Account Dashboard</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card">
                                        <div src="..." class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">25</p>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center" style="color: #0d6efd;">Search Result</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div src="..." class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">05</p>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center" style="color: #0d6efd;">Booking Property</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div src="..." class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">37</p>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center" style="color: #0d6efd;">Favourites</h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

@endsection

