<!-- Left side column. contains the sidebar -->

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
        

         <li class="treeview {{ (Request::is('ietsSectionA/create') || Request::is('ietsSectionA/*/edit') || Request::is('ietsSectionA/*') || Request::is('ietsSectionB/create') || Request::is('ietsSectionB/*/edit') || Request::is('ietsSectionB/*') || Request::is('ietsSectionC/create') || Request::is('ietsSectionC/*/edit') || Request::is('ietsSectionC/*') || Request::is('ietsSectionD/create') || Request::is('ietsSectionD/*/edit') || Request::is('ietsSectionD/*') || Request::is('ietsSectionE/create') || Request::is('ietsSectionE/*/edit') || Request::is('ietsSectionE/*') || Request::is('ietsSectionE') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>IETS </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
             
              
                    <li  {{{ (Request::is('ietsSectionA/create') || Request::is('ietsSectionA/*/edit') || Request::is('ietsSectionA/*') ? 'class=active' : '') }}}><a href="#" id="ietsSectionA"><i class="fa fa-circle-o text-red"></i> Section A</a></li>
                
                    <li  {{{ (Request::is('ietsSectionB/create') || Request::is('ietsSectionB/*/edit') || Request::is('ietsSectionB/*') ? 'class=active' : '') }}}><a href="#" id="ietsSectionB"><i class="fa fa-circle-o text-red"></i> Section B</a></li>

                    <li  {{{ (Request::is('ietsSectionC/create') || Request::is('ietsSectionC/*/edit') || Request::is('ietsSectionC/*') ? 'class=active' : '') }}}><a href="#" id="ietsSectionC"><i class="fa fa-circle-o text-red"></i> Section C</a></li>

                    <li  {{{ (Request::is('ietsSectionD/create') || Request::is('ietsSectionD/*/edit') || Request::is('ietsSectionD/*') ? 'class=active' : '') }}}><a href="#" id="ietsSectionD"><i class="fa fa-circle-o text-red"></i> Section D</a></li>

                    <li  {{{ (Request::is('ietsSectionE/create') || Request::is('ietsSectionE/*/edit') || Request::is('ietsSectionE/*') || Request::is('ietsSectionE') ? 'class=active' : '') }}}><a href="#" id="ietsSectionE"><i class="fa fa-circle-o text-red"></i> Section E</a></li>

        
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