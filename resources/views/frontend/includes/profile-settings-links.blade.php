<div class="border">

    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

        <h5 class="px-3 mt-4 pb-2 mb-0">My Account</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'dashboard' ? 'active' : null }}" id="nav-account-tab" href="{{ route('frontend.user.dashboard') }}" type="button" role="tab" aria-controls="nav-account" aria-selected="flase">Account Information</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'communications' ? 'active' : null }}" id="nav-communications-tab" href="{{ route('frontend.user.communications') }}" type="button" role="tab" aria-controls="nav-communications" aria-selected="false">Communications</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'account-dashboard' ? 'active' : null }}" id="nav-accountDashboard-tab" href="{{ route('frontend.user.account-dashboard') }}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">Account Dashboard</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favourites' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.favourites') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Favourite List</a>

        @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
            <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3 " id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100 " style="background-color: #ff9900">Agent</button> </a>
        @else
            <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3" id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100" style="background-color: #ff9900">Update Agent Request</button> </a>
        @endif

        <!-- <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3" id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100" style="background-color: #ff9900">Agent</button> </a> -->



        @can('view properties')
            <h5 class="px-3 mt-4 pb-2 mb-0">Agent</h5>
        @endcan

      
            @can('view properties')

                <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'properties' ? 'active' : null }}" href="{{ route('frontend.user.properties') }}" type="button" role="tab" aria-controls="nav-properties" aria-selected="true">Properties</a>
            @endcan

            @can('view booking_box')
                <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'booking' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.booking') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Booking Box</a>
            @endcan

            @can('view company_settings')
                @if(is_company(auth()->user()->id))
                    <a class="nav-link bg-white border-0 border-bottom ps-5 w-100 pb-3 {{ Request::segment(1) == 'company' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.company') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Company</a>
                @else

                @endif
            @endcan











        <h5 class="px-3 mt-4 pb-2 mb-0">Country Managment</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'country-managment-dashboard' ? 'active' : null }}" href="{{ route('frontend.user.country-management') }}" type="button" role="tab" aria-controls="nav-properties" aria-selected="true">Dashboard</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'property-approval' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.property-approval') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Property Approval</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'supports' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.supports') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Help & Supports</a>

        <a class="nav-link bg-white border-0 border-bottom ps-5 w-100 pb-3 {{ Request::segment(2) == 'agent-approval' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.agent-approval') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Agent Approval</a>

        <h5 class="px-3 mt-4 pb-2 mb-0">My Settings</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100" id="nav-search-tab" href="{{ route('frontend.user.properties') }}" type="button" role="tab" aria-controls="nav-search" aria-selected="true">Search Criteria</a>

        <a class="nav-link border-0 bg-white ps-5 border-bottom w-100 pb-3 {{ Request::segment(1) == 'results' ? 'active' : null }}" id="nav-results-tab" href="{{ route('frontend.user.results') }}" type="button" role="tab" aria-controls="nav-results" aria-selected="false">Results View</a>


        <h4 class="px-3 mt-4 pb-2 mb-0">Notification Settings</h4>

        <a class="nav-link border-0 bg-white ps-5 w-100 pb-3 {{ Request::segment(1) == 'preferences' ? 'active' : null }}" id="nav-preferences-tab" href="{{ route('frontend.user.preferences') }}" type="button" role="tab" aria-controls="nav-preferences" aria-selected="true">Preferences</a>

    </div>
</div>