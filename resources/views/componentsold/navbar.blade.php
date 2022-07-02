
<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    @php
                    $image = "";
                       if( Auth::User()->type==1){
                           $image = '../appImage/admins/'.Auth::User()->admin()->first()->image;
                       }
                    @endphp
                     <img class="avatar-img rounded-circle" src='{{ $image}}'>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)" onclick="logout();">{{ __('language.logout') }}</a>
            </div>
        </li>
    </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/admin">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="/admin">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">داشبۆرد </span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>{{ __('language.setMarks') }}</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#mark-administration" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text"> {{ __('language.setMarks') }}</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="mark-administration">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/showStudentResult"><span
                                class="ml-1 item-text">
                                {{ __('language.showExamResult') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/studentResult"><span
                                class="ml-1 item-text">
                                {{ __('language.studentSubjectSemesterExamandactivty') }}</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link pl-3" href="/subjectSemesterExamandactivty"><span class="ml-1 item-text">
                                {{ __('language.subjectSemesterExamandactivty') }}</span>
                        </a>
                    </li> --}}

                </ul>
            </li>

        </ul>
        {{-- <p class="text-muted nav-heading mt-4 mb-1">
            <span>{{ __('language.reports') }}</span>
        </p> --}}

        <p class="text-muted nav-heading mt-4 mb-1">
            <span> {{ __('language.system_managment') }}</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#web-administration" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text"> {{ __('language.system_managment') }}</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="web-administration">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/semester"><span class="ml-1 item-text">
                                {{ __('language.semester') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/covermentRole"><span class="ml-1 item-text">
                                {{ __('language.covermentRole') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/subjects"><span class="ml-1 item-text">
                                {{ __('language.subjects') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/departments"><span class="ml-1 item-text">
                                {{ __('language.departments') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/stages"><span class="ml-1 item-text">
                                {{ __('language.stages') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/educationLevels"><span class="ml-1 item-text">
                                {{ __('language.educationLevels') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/studyTypes"><span class="ml-1 item-text">
                                {{ __('language.studyTypes') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/studyStatuss"><span class="ml-1 item-text">
                                {{ __('language.studyStatuss') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/educationTypes"><span class="ml-1 item-text">
                                {{ __('language.educationTypes') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/studyStatuss"><span class="ml-1 item-text">
                                {{ __('language.studyStatuss') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/years"><span
                                class="ml-1 item-text">{{ __('language.years') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/students"><span
                                class="ml-1 item-text">{{ __('language.students') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/setSubjects"><span
                                class="ml-1 item-text">{{ __('language.setSubjects') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/teachers"><span
                                class="ml-1 item-text">{{ __('language.teachers') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/admins"><span
                                class="ml-1 item-text">{{ __('language.admins') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/roles"><span
                                class="ml-1 item-text">{{ __('language.roles') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="/roleNames"><span
                                class="ml-1 item-text">{{ __('language.roleNames') }}</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

    </nav>
</aside>
