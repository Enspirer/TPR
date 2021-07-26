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
                <h4 class="fs-4 fw-bolder user-settings-head">Company</h4>
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

            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-company-tab" data-bs-toggle="pill" data-bs-target="#pills-company" type="button" role="tab" aria-controls="pills-company" aria-selected="true">Company Settings</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-agent-tab" data-bs-toggle="pill" data-bs-target="#pills-agent" type="button" role="tab" aria-controls="pills-agent" aria-selected="false">Add Agent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Properties</button>
                                </li>
                            </ul>
                                    
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
                        
                                    <h4>About Company</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="companyName" class="form-label mb-0 required">Company Name</label>
                                                    <input type="text" class="form-control" id="companyName" aria-describedby="companyName">
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="country" class="form-label mb-0 required">Country</label>
                                                    <input type="text" class="form-control" id="country" aria-describedby="country">
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="agentType" class="form-label mb-0 mt-4 required">Agent Type</label>
                                                    <select class="form-select" aria-label="agentType" id="agentType">
                                                        <option selected>Company</option>
                                                        <option value="individual">Individual</option>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="companyRegNo" class="form-label mb-0 mt-4 required">Company Registration Number</label>
                                                    <input type="text" class="form-control" id="companyRegNo" aria-describedby="companyRegNo">
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                <div>
                                                    <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                                    <input type="email" class="form-control" id="email" aria-describedby="email">
                                                </div> 
                                                </div>  
                                            </div>
                                        </div>
                                    

                                        <h4 class="mt-5 mb-1">More About Company</h4>
                                        <h6 style="color: #5e6871">Tell us more about the company</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="request" class="form-label mb-0 required">Request</label>
                                                    <input type="text" class="form-control" id="request" aria-describedby="request">
                                                </div> 
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="photo" class="form-label mb-0 required">Logo</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="inputGroupFile02">
                                                        <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="id" class="form-label mb-0 mt-4 required">NIC/ Passport/ License</label>
                                                    <input type="text" class="form-control" id="id" aria-describedby="id">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="taxNo" class="form-label mb-0 mt-4 required">Tax Number - Nullable</label>
                                                    <input type="text" class="form-control" id="taxNo" aria-describedby="taxNo">
                                                </div>
                                            </div>
                                        </div>


                                        <h4 class="mt-5 mb-1">Contact Information</h4>
                                        <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="address" class="form-label mb-0 required">Address</label>
                                                    <input type="address" class="form-control" id="address" aria-describedby="address">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="telephone" class="form-label mb-0 required">Telephone</label>
                                                    <input type="telephone" class="form-control" id="telephone" aria-describedby="telephone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="description" class="form-label mb-0 mt-4 required">Description Message</label>
                                                <textarea class="form-control" rows="4" placeholder="Description Message" aria-label="description" aria-describedby="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <button type="submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-agent" role="tabpanel" aria-labelledby="pills-agent-tab">

                                    <form>
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <label for="agentType" class="form-label mb-0 required">Select Agent</label>

                                                <div class="row align-items-center">
                                                    <div class="col-9">
                                                        <select class="form-select js-example-basic-multiple" name="states[]" aria-label="agent" id="agent">
                                                            <option value="menavid">Menavid</option>
                                                            <option value="rentals">City Center</option>
                                                            <option value="commercial">Majestic</option>
                                                            <option value="property-land">Cine World</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-3 text-center">
                                                        <button class="btn px-4 text-light py-3" style="background-color: #5aa45a">Add Agent</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row mb-4 border p-1">
                                        <div class="col-3">
                                            <img src="{{url('tpr_templete/images/directory_menavid.svg')}}" class="card-img-top" alt="..." style="height=">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="clearfix">
                                                <div class="float-start mt-3">
                                                    <h5 class="card-title">Menavid</h5>
                                                    <p class="card-text mt-3 mb-1">Sri Lanka</p>
                                                </div>
                                                <div class="float-end">
                                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border p-1">
                                        <div class="col-3">
                                            <img src="{{url('tpr_templete/images/directory_menavid.svg')}}" class="card-img-top" alt="..." style="height=">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="clearfix">
                                                <div class="float-start mt-3">
                                                    <h5 class="card-title">Menavid</h5>
                                                    <p class="card-text mt-3 mb-1">Sri Lanka</p>
                                                </div>
                                                <div class="float-end">
                                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border p-1">
                                        <div class="col-3">
                                            <img src="{{url('tpr_templete/images/directory_menavid.svg')}}" class="card-img-top" alt="..." style="height=">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="clearfix">
                                                <div class="float-start mt-3">
                                                    <h5 class="card-title">Menavid</h5>
                                                    <p class="card-text mt-3 mb-1">Sri Lanka</p>
                                                </div>
                                                <div class="float-end">
                                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border p-1">
                                        <div class="col-3">
                                            <img src="{{url('tpr_templete/images/directory_menavid.svg')}}" class="card-img-top" alt="..." style="height=">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="clearfix">
                                                <div class="float-start mt-3">
                                                    <h5 class="card-title">Menavid</h5>
                                                    <p class="card-text mt-3 mb-1">Sri Lanka</p>
                                                </div>
                                                <div class="float-end">
                                                    <button type="button" class="btn-close" aria-label="Close"></button>
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
        </div>
    </div>

@endsection

@push('after-scripts')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush
