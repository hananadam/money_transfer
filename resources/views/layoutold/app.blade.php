<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="shortcut icon" href="{{ asset('public/images/favicon.png') }}">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ __('global.university') }} - {{ __('global.site_title')  }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    
    <!-- Prage Page Load Javascript -->
    <script src="{{ asset('public/js/prePageLoad.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>


    <!-- Bootstrap -->
    <link href="{{ asset('public/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->

    <link href="{{ asset('public/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('public/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">


    <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('public/css/custom-ar.css') }}" rel="stylesheet">
    @endif
    @yield('header')
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{ url('/') }}" class="site_title">
                    <img src="{{ url('/public/images/helwanLogo.jpg') }}" class="stLogo">
                    <div class="facultyTitle">
                        {{ __('global.university') }}<br>{{ __('global.site_title')  }}
                    </div>
                </a>
            </div>


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ url('/public/images/noimg.png') }}" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{ __('global.welcome') }},</span>
                @if (Auth::guest())
                    <h2>{{ __('global.guest') }}</h2>
                @else 
                    <h2>{{ Auth::user()->name }}</h2>
                @endif
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                <div class="menu_section">
                  <h3>{{ __('global.general') }}</h3>
                  <ul class="nav side-menu">
                    
                    <li><a><i class="fa fa-table"></i> {{ __('global.basic_data') }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="{{ url('/faculty') }}">{{ __('website.Faculties') }}</a></li>
                        <li><a href="{{ url('/university') }}">{{__('website.Universities')}}</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{ __('global.common_data') }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/academicyear') }}">{{ __('website.academic_year') }}</a></li>
                        <li><a href="{{ url('/semester') }}">{{ __('website.semesters') }}</a></li>
                        <li><a href="{{ url('/department') }}">{{ __('website.Departments') }}</a></li>
                        <li><a href="{{ url('/major') }}">{{__('website.Majors')}}</a></li>
                        <li><a href="{{ url('/program') }}">{{__('website.Programs')}}</a></li>
                        <li><a href="{{ url('/specialization') }}">{{__('website.Specializations')}}</a></li>
                        <li><a href="{{ url('/study_level') }}">{{__('website.level')}}</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{ __('global.hr') }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">

                        
                        
                        <li><a href="{{route('student-applications.index')}}">{{ __('website.student_application') }}</a></li>
                        <li><a href="#">{{ __('website.payment') }}</a></li>
                        <li><a href="{{ url('/instructorBasicData') }}"> {{__('website.Instructor Basic Data')}}</a></li>
                        <li><a href="#">{{ __('website.student_file') }}</a></li>
                        <li><a href="{{ url('/jobTitle') }}">{{__('website.Job Titles')}}</a></li>
                        <li><a href="{{ url('/governorate') }}">{{__('website.Governorates')}}</a></li>
                        <li><a href="{{ url('/nationality') }}">{{__('website.Nationalities')}}</a></li>

                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{ __('website.Bylaw Definition') }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">

                        <li><a href="{{ url('/bylawBasicData') }}">{{__('website.Bylaw Basic Data')}}</a></li>
                        <li><a href="{{ url('/bylawGradingSchema') }}">{{__('website.Bylaw Grading Schema')}}</a></li>
                        <li><a href="{{ url('/bylawGpaGradingSchema') }}">{{__('website.Bylaw GPA Grading Schema')}}</a></li>
                        <li><a href="{{ url('/catalog') }}">{{__('website.Catalog')}}</a></li>
                        <li><a href="{{ url('/bylawCoursePrerequisite') }}">{{__('website.Bylaw Course Prerequisite')}}</a></li>
                        <li><a href="{{ url('/equivalence') }}">{{ __('website.Equivalent Courses') }}</a></li>
                        

                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{__('website.Majorsheet')}} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/majorsheetDefinition') }}">{{__('website.Majorsheet Definition')}}</a></li>
                        <li><a href="{{ url('/majorsheetRequirementDefinition') }}">{{__('website.Majorsheet Requirement Definition')}}</a></li>
                        <li><a href="{{ url('/majorsheetRequirementGroups') }}">{{__('website.Majorsheet Requirement Groups')}}</a></li>
                        <li><a href="{{ url('/majorsheetRequirementGroupsContent') }}">{{__('website.Majorsheet Requirement Group Content')}}</a>
                        </li>
                        <li><a href="{{ url('/certificate') }}">{{ __('website.Certificates') }}</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{ __('global.Scheduling') }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/classSchedule') }}">{{ __('website.Class Schedule') }}</a></li>
                        <li><a href="#">{{ __('website.Exam Schedule') }}</a></li>
                        <li><a href="#">{{ __('website.Class Attendance') }}</a></li>
                        <li><a href="#">{{ __('website.Exam Attendance') }}</a></li>
                        <li><a href="{{ url('/campus') }}">{{ __('website.Campus') }}</a></li>
                        <li><a href="{{ url('/building') }}">{{ __('website.Building') }}</a></li>
                        <li><a href="{{ url('/room') }}">{{ __('website.Rooms') }}</a></li>
                        <li><a href="{{ url('/period') }}">{{ __('website.Periods') }}</a></li>                    
                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{__('website.Advising')}} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/studentSchedule') }}">{{ __('website.Advising') }}</a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> {{__('website.Control')}} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/getGenerateSemesterSeatNumbers') }}">{{__('website.Generate Semester Seat Numbers')}}</a></li>
                        <li><a href="{{ url('/control') }}">{{__('website.Marks Entry')}}</a></li>
                        <li><a href="{{ url('/getAllMarks') }}">{{__('website.Course Marks Report')}}</a></li>
                        <li><a href="{{ url('/getClassworkAndLabMarks') }}">{{__('website.Classwork & Lab Marks Reports')}}</a></li>
                        <li><a href="{{ url('/getAllSubjectsStatistics') }}">{{__('website.All Subjects Statistics Report')}}</a></li>
                        <li><a href="{{ url('/getTopTenStudents') }}">{{__('website.Top Ten Students Report')}}</a></li>
                        <li><a href="{{ url('/getSubectsExtraMarks') }}">{{__('website.Subject Extra Marks Report')}}</a></li>
                        <li><a href="{{ url('/getControlSheet') }}">{{__('website.Control Sheet Report')}}</a></li>
                      </ul>
                    </li>


                  </ul>
                </div>

                

               
                <div class="menu_section">
                  <h3>{{__('website.Search')}}</h3>
                  <ul class="nav side-menu">
                    <li>
                      <form id="simpleForm" data-parsley-validate=""  method="POST" onsubmit="event.preventDefault();" enctype="multipart/form-data" novalidate="">
                        <input type="text" id="searchItem" name="searchItem" style="display:block;margin:0 auto;margin-top:10px;margin-bottom:10px">
                      </form>
                      <button class="btn btn_default" onclick="searchFor()" style="display:block;margin:0 auto;">{{__('website.Search')}}</button>
                      <a href="{{ url('advancedSearch') }}" style="text-align:center;display:block;color:#fff;margin-top:10px;">{{__('website.Advanced Search')}}</a>
                    </li>
                  </div>
                </div>
            
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <!--<img src="{{ url('/public/images/medicineLogo.png') }}" class="mainLogo">-->
              <ul class="nav navbar-nav navbar-{{app()->getLocale() == 'en'? 'right' : 'left'}}" style="margin-right: 40px;">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{{ __('global.login') }}</a></li>
                @else
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url('/public/images/noimg.png') }}" alt="">{{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Log Out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                      </ul>
                    </li>

                    <li class="">
                      <div style="float:left;margin-top:9px;">
                        <form id="simpleForm" data-parsley-validate=""  method="POST" onsubmit="event.preventDefault();" enctype="multipart/form-data" novalidate="">
                          <input type="text" id="searchItem" name="searchItem" style="">
                        </form>
                      </div>
                      <button onclick="window.location.href='{{ url('advancedSearch') }}';" class="btn btn_default" style="float:right;margin-top:6px">Advanced Search</button>
                      <button class="btn btn_default" onclick="searchFor()" style="float:right;margin-top:6px;margin-left:5px">Search</button>
                    </li>

                    @if(false)
                    <li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                      </a>
                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                          <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <div class="text-center">
                            <a>
                              <strong>See All Alerts</strong>
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>
                        </li>
                      </ul>
                    </li>
                    @endif
                    
                @endif
                    <li style="margin: 10px 10px 0 10px">
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ app()->getLocale() == 'en' ?  __('global.en')  :  __('global.ar') }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"  style="width: 120px;text-align: center;">
                                <li>
                                    <a class="" href="{{ route('locale', ['en', Route::currentRouteName()]) }}">{{ __('global.en') }}</a>
                                </li>
{{--                                <li role="separator" class="divider"></li>--}}
                                <li><a class="" href="{{ route('locale', ['ar', Route::currentRouteName()]) }}">{{ __('global.ar') }}</a></li>
                            </ul>
                        </div>

                    </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            @yield('content')  
        
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-{{app()->getLocale() == 'en'? 'right' : 'left'}}">
             {{ __('global.site_title')  }}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/js/main.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('public/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('public/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('public/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('public/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('public/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('public/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('public/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <link href="{{ asset('public/css/chosen.css') }}" rel="stylesheet">
    <script src="{{ asset('public/js/chosen.jquery.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('public/js/custom.js') }}"></script>

 </body>
</html>
