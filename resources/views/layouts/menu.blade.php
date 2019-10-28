<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <div class="top">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12" align="right">
                    @if(auth()->user())
                    <a href="{{ url('/logout') }}">&nbsp; &nbsp; &nbsp;<i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    @else
    				<a href="{{ url('login') }}">&nbsp; &nbsp; &nbsp;<i class="fas fa-user"></i>&nbsp;Login to your Account</a>
                    <a href="{{ url('register-your-ticket') }}"><i class="fas fa-user-plus"></i>&nbsp;Register your Ticket</a>
                    @endif
    				</div>
    			</div>
    		</div>
    	</div>
    <header class="header-area">
    	
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="/"><img src="/img/devcon-new.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li  class="active"><a href="/">Home</a></li>
                                <li>
                                   <a href="/about/">About</a>
                                    <ul class="dropdown">
                                        <li><a href="/about/">About DevCon</a></li>
                                     <li><a href="/sponsors/">Sponsors</a></li>
                                       
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="/previous-years/">Previously</a>
                                    <ul class="dropdown">
                                        <li><a href="#" class="page-scroll">- 2012</a></li>
                                        <li><a href="#" class="page-scroll">- 2013</a></li>
                                        <li><a href="#" class="page-scroll">- 2014</a></li>
                                        
                                    </ul>
                                </li>
                            <li class="active"><a href="{{ url('/speakers') }}">Speakears</a></li>
                                <li class=""><a href="{{ url('schedule') }}">Schedule</a></li>

                               
                               <li class=""><a href="{{ url('call-for-proposals') }}">Call for Proposals</a></li>
                                <li class=""><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>

                            <!-- Get Tickets Button -->
                            <a href="{{url('/get-ticket')}}" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Get Ticket <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->