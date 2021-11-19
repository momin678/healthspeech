<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="https://www.healthspeech.com/">
                <i class="zmdi zmdi-home m-r-5"></i>HS
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label-alt"></i><span>Common Condition</span> </a>
                        <ul class="ml-menu">
                            
                            @foreach(\App\Models\HealthTopic::all() as $topic)
                            <li><a href="{{route('blog-list-by-topic', $topic->slug)}}">{{$topic->health_topic_name}}</a></li>
                            @endforeach
                            <li><a href="{{route('all-health-topics')}}">All</a></li>
                        </ul>
                    </li>
                    
                    <!--<li><a href="{{url('more-view-question')}}"><i class="zmdi zmdi-home"></i><span>Q & A</span></a></li>-->
                    <li><a href="#"><img src="https://healthspeech.com/public/images/userPicture/healthspeech-min.jpg" alt="health speech"></a></li>
                    <li class="header">PAGES</li>
                        <div class="pager-menu float-left col-md-12">
                            <ul style="">
                                <!--<li><a href="{{url('abotu-us')}}">About Us</a></li>-->
                                <!--<li><a href="{{url('advisment')}}">Advertisement</a></li>-->
                                <li><a href="{{url('write-us')}}">write-us</a></li>
                                <li><a href="{{url('privacy-policy')}}">privacy-policy</a></li>
                                <li><a href="{{url('terms-condition')}}">terms-condition</a></li>
                                <li><a href="{{url('contact-us')}}">contact-us</a></li>
                                <li>
                                    @auth
                                    @if(Auth::user()->user_type == "user")
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    <li style="margin-top:100px;font-size: 11px;font-weight:100;padding:8px 12px;position:relative;color:#222;">Copyright 2014-2021 by Health Speech. All Rights Reserved</li>
                </ul>
                
            </div>
        </div>

    </div>
</aside>