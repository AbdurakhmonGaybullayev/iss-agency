<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('main_header_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.main-headers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/main-headers") || request()->is("admin/main-headers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mainHeader.title') }}
                </a>
            </li>
        @endcan
        @can('country_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.country.title') }}
                </a>
            </li>
        @endcan
        @can('programm_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.programms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/programms") || request()->is("admin/programms/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.programm.title') }}
                </a>
            </li>
        @endcan
        @can('direction_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.directions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directions") || request()->is("admin/directions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.direction.title') }}
                </a>
            </li>
        @endcan
        @can('university_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.universities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/universities") || request()->is("admin/universities/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.university.title') }}
                </a>
            </li>
        @endcan
        @can('document_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.document.title') }}
                </a>
            </li>
        @endcan
        @can('application_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.applications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/applications") || request()->is("admin/applications/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.application.title') }}
                </a>
            </li>
        @endcan
        @can('cooperation_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.cooperations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cooperations") || request()->is("admin/cooperations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cooperation.title') }}
                </a>
            </li>
        @endcan
        @can('gallery_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.galleries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/galleries") || request()->is("admin/galleries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-images c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gallery.title') }}
                </a>
            </li>
        @endcan
        @can('news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.news.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/news") || request()->is("admin/news/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.news.title') }}
                </a>
            </li>
        @endcan
        @can('header_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.headers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/headers") || request()->is("admin/headers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-heading c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.header.title') }}
                </a>
            </li>
        @endcan
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.team.title') }}
                </a>
            </li>
        @endcan
        @can('testimonial_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.testimonials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-comment c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testimonial.title') }}
                </a>
            </li>
        @endcan
        @can('qand_a_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.qand-as.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/qand-as") || request()->is("admin/qand-as/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-question-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.qandA.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('branch_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.branches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/branches") || request()->is("admin/branches/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.branch.title') }}
                </a>
            </li>
        @endcan
        @can('about_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.abouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-info-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.about.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>