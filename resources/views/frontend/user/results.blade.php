@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <div class="col-8 p-0">
                <h4 class="fs-4 fw-bolder user-settings-head">Results View</h4>
                <h6 class="user-settings-sub" style="color: #5e6871">Customize how you see listings on TROPICAL.com</h6>
            </div>
        </div>

        <div class="row justify-content-between">

            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8 border">
                <div class="row">
                    <div class="col-12">
                        <div class="px-2 py-3" id="nav-results" role="tabpanel" aria-labelledby="nav-results-tab">
                            <form>
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <label for="language" class="form-label mb-1 required">Sort results by</label>
                                            <select class="form-select" aria-label="language" id="language">
                                                <option selected>Newest</option>
                                                <option value="oldest">Oldest</option>
                                                <option value="lowest">Lowest Price</option>
                                                <option value="highest">Higest price</option>
                                                </select>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-7">
                                        <div>
                                            <label for="language" class="form-label mb-1 required">View results on</label>
                                            <select class="form-select" aria-label="language" id="language">
                                                <option selected>Map</option>
                                                <option value="list">List</option>
                                                </select>
                                        </div> 
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button type="button" class="btn rounded-pill me-2 p-0 ps-3" style="border: 1px solid #CCCCCC; color: #23A1C0">Reset <i class="fas fa-undo ms-3"></i></button>
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

@endsection

