<nav class="navbar navbar-primary navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Badan Diklat Prov Sulteng
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar - Master Menu -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Master Data<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/lembaga')}}"><span class="glyphicon glyphicon-home"></span> Penyelenggara Diklat</a></li>
                        <li><a href="{{url('/matadiklat')}}"><span class="glyphicon glyphicon-tag"></span> Mata Diklat</a></li>
                        <li><a href="{{url('/widyaiswara')}}"><span class="glyphicon glyphicon-user"></span> Widyaiswara</a></li>
                        <li><a href="{{url('/angkatan')}}"><span class="glyphicon glyphicon-file"></span> Angkatan Diklat</a></li>
                        <li><a href="{{url('/mquesioner')}}"><span class="glyphicon glyphicon-book"></span> Quesioner Pasca Diklat</a></li>
                    </ul>
                </li>
                <!-- Menu Widyaiswara -->
                <li class="Dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Monev Widyaiswara<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/pengampu')}}"><span class="glyphicon glyphicon-list-alt"></span> Penilaian Widyaiswara</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Pra Diklat<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Coming Soon</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Pasca Diklat<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/mentor">Mentor</a></li>
                        <li><a href="/alumni">Alumni</a></li>
                        <li><a href="/mentoring">Mentoring</a></li>
                       <!--  <li><a href="/qalumni">Quesioner Alumni</a></li>
                        <li><a href="/qmentor">Quesioner Mentor</a></li> -->
                    </ul>
                </li>
                @role('user')
                    <!-- <li><a href="">tes</a></li> -->
                @endrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                
                    @role('admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Manage User<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/assignrole">Hak Akses User</a></li>
                            </ul>
                        </li>
                    @endrole
                    <!-- Authentication Links -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>
