<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    .notification {
    background-color: red;
    color: white;
    text-decoration: none;
    position: relative;
    display: inline-block;
    border-radius: 2px;
    }

    .notification:hover {
    background: red;
    }

    .notification .badge {
    position: absolute;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
    }
</style>


<div class="sidebar" style="width:220px">
    <nav class="sidebar-nav" style="width:220px">
        <ul class="nav" style="width:220px">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>



            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-flag"></i> 
                    Countries
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/country'))}}" href="{{ route('admin.country.index') }}">
                            Countries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/fpur'))}}" href="{{ route('admin.fpur.index') }}">
                            Feature Update Request <span class="notification badge">{{App\Models\FeaturePropertyUpdateRequest::where('admin_approval','Pending')->get()->count()}}</span>
                        </a>
                    </li>                        
                </ul>
            </li>  


            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-building"></i>
                    Properties
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property'))}}" href="{{ route('admin.property.index') }}">
                            Property Request <span class="notification badge">{{App\Models\Properties::where('admin_approval','Pending')->get()->count()}}</span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_type'))}}" href="{{ route('admin.property_type.index') }}">
                            Property Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_parameter'))}}" href="{{ route('admin.property_parameter.index') }}">
                            Property Type Parmeter <span class="notification badge">{{App\Models\PropertyTypeParameter::where('status','Pending')->get()->count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/sold_properties'))}}" href="{{ route('admin.sold_properties.index') }}">
                            Sold Properties Request <span class="notification badge">{{App\Models\Properties::where('country_manager_approval','=','Approved')->where('admin_approval','=','Approved')->where('sold_request','Pending')->get()->count()}}</span>
                        </a>
                    </li>
                        
                </ul>
            </li>            

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/agent'))}}" href="{{ route('admin.agent.index') }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    Agent Request <span class="notification badge">{{App\Models\AgentRequest::where('status','Pending')->get()->count()}}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/file_manager'))}}" href="{{ route('admin.file_manager.index') }}">
                    <i class="nav-icon fas fa-folder-open"></i>
                    File Manager
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-scroll"></i>
                    Advertisements
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/global_ad_categories'))}}" href="{{ route('admin.global_ad_categories.index') }}">
                            Global Ad Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/global_advertisement'))}}" href="{{ route('admin.global_advertisement.index') }}">
                            Global Advertisement
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/ad_category'))}}" href="{{ route('admin.ad_category.index') }}">
                            Ad Category - Home Page <span class="notification badge">{{App\Models\AdCategory::where('admin_approval','Pending')->get()->count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/homepage_advertisement'))}}" href="{{ route('admin.homepage_advertisement.index') }}">
                            Home Page Advertisement <span class="notification badge">{{App\Models\HomePageAdvertisement::where('admin_approval','Pending')->get()->count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/sidebar_advertisement'))}}" href="{{ route('admin.sidebar_advertisement.index') }}">
                            Sidebar Advertisement <span class="notification badge">{{App\Models\SidebarAd::where('admin_approval','Pending')->get()->count()}}</span>
                        </a>
                    </li>
                        
                </ul>
            </li>            


            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us <span class="notification badge">{{App\Models\ContactUs::where('status','Pending')->get()->count()}}</span>
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-paste"></i>
                        Blog
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/blog_category'))}}" href="{{ route('admin.blog_category.index') }}">
                            Blog Category
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/blog_post'))}}" href="{{ route('admin.blog_post.index') }}">
                            Blog Post
                        </a>
                    </li>   
                        
                </ul>
            </li>  

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-book-open"></i>
                    Pages
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/about_us'))}}" href="{{ route('admin.about_us') }}">
                            About Us
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/privacy_policy'))}}" href="{{ route('admin.privacy_policy') }}">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/cookie_policy'))}}" href="{{ route('admin.cookie_policy') }}">
                            Cookie Policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/terms_of_use'))}}" href="{{ route('admin.terms_of_use') }}">
                            Terms of Use
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/tips_for_buyers'))}}" href="{{ route('admin.tips_for_buyers') }}">
                            Tips for buyers
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/tips_for_sellers'))}}" href="{{ route('admin.tips_for_sellers') }}">
                            Tips for sellers
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/commercial_resources'))}}" href="{{ route('admin.commercial_resources') }}">
                            Commercial Resources
                        </a>
                    </li> -->
                        
                </ul>
            </li> 



            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown ">
                    <a class="nav-link nav-dropdown-toggle " href="#">
                        <i class="nav-icon fas fa-cog"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/settings'))}}" href="{{ route('admin.settings.index') }}">                        
                                Settings
                            </a>   
                        </li>                                         
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/landing_page'))}}" href="{{ route('admin.landing_page') }}">
                                Landing Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/pro_cal'))}}" href="{{ route('admin.pro_cal.index') }}">
                                Property Calculator
                            </a>
                        </li>
                                                
                    </ul>
                </li>


                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Route::is('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
