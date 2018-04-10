<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->

    

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->

        <h4 class="navbar-text text-uppercase" style="font-family:arial; color:white"><b>CRS   @yield('header')</b></h4>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                

                <!-- Notifications Menu -->
             
                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                      <!-- The user image in the navbar-->
                        <!--<img src="{{ asset("/node_modules/admin-lte/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"/>-->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      
                                <a href="{{ url('/logout') }}"   style="color:white;" 
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><strong>Sign Out</strong>
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                  
                    <ul class="dropdown-menu" style="width: 50%">
                        <!-- The user image in the menu -->
                        
               
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           
                           
                            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>