<style>
.dropdown-btn {
  display: block;
  border: none;
  background: none;
  cursor: pointer;
  outline: none;
}
.dropdown-container {
  display: none;
  padding-left: 30px;
}

.numberround{
    color:red; 
    background: #fff; 
    border-radius:50%; 
    width:50%; 
    border: 1px solid #0d6efd; 
    text-align: center;
}

</style>

<div class="border">

    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

        

        @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
            <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3 " id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100 " style="background-color: #ff9900">Become an Agent</button> </a>
        @else
            <!-- <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3" id="nav-agent-tab" href="{{ route('frontend.user.agent.edit') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100" style="background-color: #ff9900">Edit Agent Request</button> </a> -->
        @endif

        

        <!-- <a class="nav-link bg-white border-0 border-bottom w-100 px-5 pb-3" id="nav-agent-tab" href="{{ route('frontend.user.agent') }}" type="button" role="tab" aria-controls="nav-agent" aria-selected="false"><button class="btn py-2 text-light w-100" style="background-color: #ff9900">Agent</button> </a> -->



        @if(is_agent(auth()->user()->id))
            <h5 class="px-3 mt-4 pb-2 mb-0">Agent</h5>



            <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'properties' ? 'active' : null }}" href="{{ route('frontend.user.properties') }}" type="button" role="tab" aria-controls="nav-properties" aria-selected="true">Properties</a>


            <!-- <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'booking' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.booking') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Booking Box</a> -->

            <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'agent-bookings' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.agent-bookings') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Agent Bookings</a>

            <!-- @if(is_company(auth()->user()->id))
                <a class="nav-link bg-white border-0 border-bottom ps-5 w-100 pb-3 {{ Request::segment(1) == 'company' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.company') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Company</a>
            @else -->           

            <!-- @endif -->

        @endif



        @if(is_country_manager(auth()->user()->id))

            <div class="row align-items-center w-100 ms-3 mt-4 mb-2">
                <div class="col-9 p-0">
                    <h5 class="mb-0">Country Management</h5>
                </div>
                <div class="col-3 p-0 text-left">
                    <img src="https://flagcdn.com/w40/{{strtolower(App\Models\Country::where('country_manager',auth()->user()->id)->first()->country_id)}}.png" alt="" title="{{ App\Models\Country::where('country_manager',auth()->user()->id)->first()->country_name }}" />
                </div>
            </div>
            

            <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'country-managment-dashboard' ? 'active' : null }}" href="{{ route('frontend.user.country-management') }}" type="button" role="tab" aria-controls="nav-properties" aria-selected="true">Dashboard</a>

            <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'home-page-feature' ? 'active' : null }}" href="{{ route('frontend.user.home_page_feature') }}" type="button" role="tab" aria-controls="nav-properties" aria-selected="true">Home Page Feature</a>


            <div class="row w-100">
                <div class="col-10 ">
                    <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'property-approval' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.property-approval') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Property Approval</a>
                </div>
                <div class="col-2 mt-2">
                        <b class="px-2 py-0 numberround">{{ count(App\Models\Properties::where('country_manager_approval','Pending')->get()) }}</b>
                </div>
            </div>

            <div class="row w-100">
                <div class="col-10 ">
                    <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'agent-approval' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.agent-approval') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Agent Approval</a>
                </div>
                <div class="col-2 mt-2">
                        <b class="px-2 py-0 numberround">{{ count(App\Models\AgentRequest::where('country_manager_approval','Pending')->get()) }}</b>
                </div>
            </div>

            <div class="row w-100">
                <div class="col-10 ">
                    <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'supports' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.supports') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Help & Supports</a>
                </div>
                <div class="col-2 mt-2">
                        <b class="px-2 py-0 numberround">{{ count(App\Models\Feedback::where('status','Pending')->get()) }}</b>
                </div>
            </div>


            <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'management_sold_properties' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.management_sold_properties') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Sold Properties</a>

            <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(2) == 'property_type_parameter' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.property_type_parameter') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Property Type Parameter</a>

            <a class="nav-link bg-white border-0 dropdown-btn border-bottom ps-5 w-100 pb-3 advertisement" style="color:#0d6efd;">
                Advertisement Management
                <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-container">
                
                <a class="nav-link bg-white border-0 ps-5 w-100 pb-3 {{ Request::segment(2) == 'ad-category' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.ad_category') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Home Page Ad Category</a>
                <a class="nav-link bg-white border-0 ps-5 w-100 pb-3 {{ Request::segment(2) == 'homepage-advertisement' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.homepage_AD') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Home Page Advertisement</a>
                <a class="nav-link bg-white border-0 border-bottom ps-5 w-100 pb-3 {{ Request::segment(2) == 'sidebar-ad' ? 'active' : null }}" id="nav-booking-tab" href="{{ route('frontend.user.sidebar_ad') }}" type="button" role="tab" aria-controls="nav-booking" aria-selected="false">Sidebar Advertisement</a>

            </div>



        @else

        @endif


        <h5 class="px-3 mt-4 pb-2 mb-0">My Account</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'dashboard' ? 'active' : null }}" id="nav-account-tab" href="{{ route('frontend.user.dashboard') }}" type="button" role="tab" aria-controls="nav-account" aria-selected="flase">Account Information</a>

        <!-- <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'communications' ? 'active' : null }}" id="nav-communications-tab" href="{{ route('frontend.user.communications') }}" type="button" role="tab" aria-controls="nav-communications" aria-selected="false">Communications</a> -->

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'account-dashboard' ? 'active' : null }}" id="nav-accountDashboard-tab" href="{{ route('frontend.user.account-dashboard') }}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">Account Dashboard</a>


        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favourites' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.favourites') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Favourite List</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'my-bookings' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.my-bookings') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">My Bookings</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'watch_listing' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.watch_listing') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Watch Listing</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'search_history' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.search_history') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Saved Search History</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'feedback' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.feedback') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Feedback</a>
        
        <div class="row w-100">
            <div class="col-10 ">
                <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user_notifications' ? 'active' : null }}" id="nav-favourite-tab" href="{{ route('frontend.user.user_notifications') }}" type="button" role="tab" aria-controls="nav-favourite" aria-selected="false">Notifications</a>
            </div>
            <div class="col-2 mt-2">
                    <b class="px-2 py-0 numberround">{{ count(App\Models\Notifications::where('status','Pending')->get()) }}</b>
            </div>
        </div>



        <!-- <h5 class="px-3 mt-4 pb-2 mb-0">My Settings</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100" id="nav-search-tab" href="{{ route('frontend.user.properties') }}" type="button" role="tab" aria-controls="nav-search" aria-selected="true">Search Criteria</a>

        <a class="nav-link border-0 bg-white ps-5 border-bottom w-100 pb-3 {{ Request::segment(1) == 'results' ? 'active' : null }}" id="nav-results-tab" href="{{ route('frontend.user.results') }}" type="button" role="tab" aria-controls="nav-results" aria-selected="false">Results View</a>


        <h4 class="px-3 mt-4 pb-2 mb-0">Notification Settings</h4>

        <a class="nav-link border-0 bg-white ps-5 w-100 pb-3 {{ Request::segment(1) == 'preferences' ? 'active' : null }}" id="nav-preferences-tab" href="{{ route('frontend.user.preferences') }}" type="button" role="tab" aria-controls="nav-preferences" aria-selected="true">Preferences</a> -->

    </div>
</div>


<!-- <script>

    $('.advertisement').click(function() {
        $('.home-page-ad').toggleClass('ad-hide');
        $('.sidebar-ad').toggleClass('ad-hide');
    });
    
</script> -->


<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>