@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}">
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
                <!-- <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Hilton Hotel</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12 border">
                        <div class="row px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-5 text-center">
                                        <img src="{{ url('files/agent_request',$single_agent_request->photo) }}" class="img-fluid border border-2" style="object-fit:cover; width:180px;" height="130px" alt="...">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h4 class="mb-0">{{ $single_agent_request->name }}</h4>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #94ca60;">{{ $single_agent_request->country }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 pe-0">
                                    <div class="col-6">
                                        <table class="table table-hover table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Agent Type</td>
                                                    <td>{{ $single_agent_request->agent_type }}</td>
                                                </tr>
                                                    @if($single_agent_request->agent_type == 'Individual')
                                                    @else
                                                        <tr>
                                                            <td style="font-weight: 600;">Company Name</td>
                                                            <td>{{ $single_agent_request->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Company Reg Number</td>
                                                            <td>{{ $single_agent_request->company_registration_number }}</td>
                                                        </tr>
                                                    @endif                                                
                                                <tr>
                                                    <td style="font-weight: 600;">Email</td>
                                                    <td>{{ $single_agent_request->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Request</td>
                                                    <td>{{ $single_agent_request->request }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="col-6 pe-0">
                                        <table class="table table-hover table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Tax Number</td>
                                                    <td>{{ $single_agent_request->tax_number }}</td>
                                                </tr>
                                                @if($single_agent_request->validation_type == 'NIC' )
                                                    <tr>
                                                        <td style="font-weight: 600;">Validation</td>
                                                        <td>NIC</td>
                                                    </tr>
                                                @elseif($single_agent_request->validation_type == 'Passport')
                                                    <tr>
                                                        <td style="font-weight: 600;">Validation</td>
                                                        <td>Passport</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Validation</td>
                                                        <td>License</td>
                                                    </tr>
                                                @endif

                                                @if($single_agent_request->nic == null )
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">NIC No</td>
                                                        <td>{{ $single_agent_request->nic }}</td>
                                                    </tr>
                                                @endif    
                                                @if($single_agent_request->passport == null )
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Passport No</td>
                                                        <td>{{ $single_agent_request->passport }}</td>
                                                    </tr>
                                                @endif      
                                                @if($single_agent_request->license == null )
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">License No</td>
                                                        <td>{{ $single_agent_request->license }}</td>
                                                    </tr>
                                                @endif
                                                
                                                
                                                <tr>
                                                    <td style="font-weight: 600;">Telephone</td>
                                                    <td>{{ $single_agent_request->telephone }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Address</td>
                                                    <td>{{ $single_agent_request->city }}, {{ $single_agent_request->country }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="ns" style="font-weight: 600; padding: .5rem .5rem; color: #212529">Description</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="ns" style="padding: .5rem .5rem; color: #212529; text-align: justify;">{!! $single_agent_request->description_message !!}</p>
                                        </div>          
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 text-center">
                            <!-- <form action="" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" name="hidden_id" value="{{ $single_agent_request->id }}" />
                                <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #4195E1;" value="Approved">Approve</button>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #FF2C4B;" value="Disapproved">Disapprove</button>
                            </form>    -->


                            <form action="{{route('frontend.user.singleAgentApprovalUpdate')}}" method="POST">
                            {{csrf_field()}}

                                <div class="mt-2 text-center">
                                    <input type="hidden" class="form-control action_value" value="" name="action">
                                    <input type="hidden" class="form-control" value="{{ $single_agent_request->id }}" name="hidden_id">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 approve" style="background-color: #4195E1;">Approve</button>
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 disapprove" style="background-color: #FF2C4B;">Disapprove</button>
                                </div>
                            </form>
                                
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
    $('.approve').click(function() {
    $('.action_value').val('Approved');
    })

    $('.disapprove').click(function() {
    $('.action_value').val('Disapproved');
    })
</script>

<!-- <script>
    function initMap() {
  const myLatLng = { lat: 6.932821354043672, lng: 79.84476998314739 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: myLatLng,
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script> -->

@endpush


