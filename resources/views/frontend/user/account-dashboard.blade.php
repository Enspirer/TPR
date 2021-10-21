@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between mt-5">
                    <div class="col-12">
                        <h4 class="fs-4 user-settings-head">Account Dashboard</h4>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card custom-shadow p-3">
                                        <div class="card-img-top text-center">
                                            <p class="display-1 mb-0 account-dashboard-cards">{{ sprintf("%02d",$bookings) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-center" style="color: #389ADB;">Property Bookings</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card custom-shadow p-3">
                                        <div class="card-img-top text-center">
                                            <p class="display-1 mb-0 account-dashboard-cards">{{ sprintf("%02d",$all_favourite) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-center" style="color: #389ADB;">Favourite Properties</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card custom-shadow p-3">
                                        <div class="card-img-top text-center">
                                            <p class="display-1 mb-0 account-dashboard-cards">{{ sprintf("%02d",$supports) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-center" style="color: #389ADB;">Support & Feedback</h5>
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

