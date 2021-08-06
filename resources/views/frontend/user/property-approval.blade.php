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
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Property Approval</h4>
                            </div>
                            <div class="col-6 text-end justify-content-end">
                                <input type="text" class="form-control w-75 ms-auto" placeholder="search" aria-label="search" aria-describedby="search">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <table class="table table-borderless table-responsive">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Property Name</th>
                                <th scope="col">Property Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">
                            <tr class="align-items-center">
                                <td>Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>2021-08-01</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href="{{ route('frontend.user.single-property-approval') }}"><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn text-light table-btn" style="background-color: #FF2C4B">Disapprove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>2021-07-31</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href="{{ route('frontend.user.single-property-approval') }}"><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn text-light table-btn" style="background-color: #FF2C4B">Disapprove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>2021-07-30</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href="{{ route('frontend.user.properties') }}"><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn text-light table-btn" style="background-color: #FF2C4B">Disapprove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
