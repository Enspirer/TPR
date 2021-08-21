<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
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


            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/country'))}}" href="{{ route('admin.country.index') }}">
                    <i class="nav-icon fas fa-flag"></i>     
                    Countries
                </a>
            </li>

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-building"></i>
                    Properties
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property'))}}" href="{{ route('admin.property.index') }}">
                            Property Request
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/property_type'))}}" href="{{ route('admin.property_type.index') }}">
                            Property Type
                        </a>
                    </li>
                        
                </ul>
            </li>            

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/agent'))}}" href="{{ route('admin.agent.index') }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    Agent Request
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
                    <i class="nav-icon fas fa-ad"></i>
                    Advertisements
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/global_advertisement'))}}" href="{{ route('admin.global_advertisement.index') }}">
                            Global Advertisement
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/ad_category'))}}" href="{{ route('admin.ad_category.index') }}">
                            Ad Category - Home Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/homepage_advertisement'))}}" href="{{ route('admin.homepage_advertisement.index') }}">
                            Home Page Advertisemnet
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/sidebar_advertisement'))}}" href="{{ route('admin.sidebar_advertisement.index') }}">
                            Sidebar Advertisemnet
                        </a>
                    </li>
                        
                </ul>
            </li>            


            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us
                </a>
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
                        <a class="nav-link {{active_class(Route::is('admin/terms_of_use'))}}" href="{{ route('admin.terms_of_use') }}">
                            Terms of Use
                        </a>
                    </li>
                        
                </ul>
            </li> 



            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>


                <li class="nav-item">
                    <a class="nav-link {{active_class(Route::is('admin/settings'))}}" href="{{ route('admin.settings.index') }}">
                        <i class="nav-icon fas fa-cog"></i>
                        Settings
                    </a>
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
