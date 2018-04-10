<!-- Left side column. contains the sidebar -->
<script type="text/javascript"></script>
<aside class="main-sidebar"  >

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <center><a href="/" class="logo"><img src="{{ asset('logoJR.png') }}" style="width: 80%;height: 80%">&nbsp;<b></b></a></center><br><br>
        <!-- Sidebar user panel (optional) -->
     <!--    <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('pic/user.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              
            </div>
        </div> -->

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="/"><i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-left-container">
              
            </span></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
        

         <li class="treeview {{ (Request::is('apcsSectionA/create') || Request::is('apcsSectionA/*/edit') || Request::is('apcsSectionA/*') || Request::is('apcsSectionB/create') || Request::is('apcsSectionB/*/edit') || Request::is('apcsSectionB/*') || Request::is('apcsSectionC/create') || Request::is('apcsSectionC/*/edit') || Request::is('apcsSectionC/*') || Request::is('apcsSectionD/create') || Request::is('apcsSectionD/*/edit') || Request::is('apcsSectionD/*') || Request::is('apcsSectionE/create') || Request::is('apcsSectionE/*/edit') || Request::is('apcsSectionE/*') || Request::is('apcsSectionF/create') || Request::is('apcsSectionF/*/edit') || Request::is('apcsSectionF/*') || Request::is('apcsSectionF') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>APCS </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
             
              
                    <li  {{{ (Request::is('apcsSectionA/create') || Request::is('apcsSectionA/*/edit') || Request::is('apcsSectionA/*') ? 'class=active' : '') }}}><a href="#" id="apcsSectionA"><i class="fa fa-circle-o text-red"></i> Section A</a></li>
                
                    <li  {{{ (Request::is('apcsSectionB/create') || Request::is('apcsSectionB/*/edit') || Request::is('apcsSectionB/*') ? 'class=active' : '') }}}><a href="#" id="apcsSectionB"><i class="fa fa-circle-o text-red"></i> Section B</a></li>

                    <li  {{{ (Request::is('apcsSectionC/create') || Request::is('apcsSectionC/*/edit') || Request::is('apcsSectionC/*') ? 'class=active' : '') }}}><a href="#"  id="apcsSectionC"><i class="fa fa-circle-o text-red"></i> Section C</a></li>

                    <li  {{{ (Request::is('apcsSectionD/create') || Request::is('apcsSectionD/*/edit') || Request::is('apcsSectionD/*') ? 'class=active' : '') }}}><a href="#"  id="apcsSectionD"><i class="fa fa-circle-o text-red"></i> Section D</a></li>

                    <li  {{{ (Request::is('apcsSectionE/create') || Request::is('apcsSectionE/*/edit') || Request::is('apcsSectionE/*') ? 'class=active' : '') }}}><a href="#"  id="apcsSectionE"><i class="fa fa-circle-o text-red"></i> Section E</a></li>

                    <li  {{{ (Request::is('apcsSectionF/create') || Request::is('apcsSectionF/*/edit') || Request::is('apcsSectionF/*') || Request::is('apcsSectionF') ? 'class=active' : '') }}}><a href="#"  id="apcsSectionF"><i class="fa fa-circle-o text-red"></i> Section F</a></li>

        
                </ul>
            </li>







        </ul>
           
    </section>
    <!-- /.sidebar -->
</aside>

  
<!--<script>
function activate(){
    console.log(this.attr('href'));
    localStorage
    }
</script>-->