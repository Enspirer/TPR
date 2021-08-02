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
                    <div class="col-8">
                        <h4 class="fs-4 fw-bolder user-settings-head">Property Approval</h4>
                    </div>
                </div>

                <div class="row mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Property Name</th>
                                <th scope="col">Property Type</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center align-middle">
                            <tr class="align-items-center">
                                <td class="m-auto">Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #4195E1">Approve</button>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #FF2C4B">Disapprove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #4195E1">Approve</button>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #FF2C4B">Disapprove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hilton Hotel</td>
                                <td>Restaurant</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #4195E1">Approve</button>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn text-light" style="background-color: #FF2C4B">Disapprove</button>
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
