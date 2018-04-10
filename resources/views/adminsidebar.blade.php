<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" >

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
        

         <li class="treeview {{ (Request::is('users') || Request::is('users/create') || Request::is('users/*/edit') || Request::is('users/*') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span>User Management </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
             
                    <li  {{{ (Request::is('users') || Request::is('users/create') || Request::is('users/*/edit') || Request::is('users/*') ? 'class=active' : '') }}}><a href="/users"><i class="fa fa-circle-o text-red"></i> Users List</a></li>
                
                 
                </ul></li>

                <li class="treeview {{ (Request::is('eiaguideline/show') || Request::is('eiaguideline/create') || Request::is('eiaguideline/*/edit') || Request::is('ietsguideline/show') || Request::is('ietsguideline/create') || Request::is('ietsguideline/*/edit') || Request::is('apcsguideline/show') || Request::is('apcsguideline/create') || Request::is('apcsguideline/*/edit') ? 'active' : '') }}">

                 <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>Guideline </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
                 </a>

                  <ul class="treeview-menu">
             
                    <li  {{{ (Request::is('eiaguideline/show') || Request::is('eiaguideline/create') || Request::is('eiaguideline/*/edit') ? 'class=active' : '') }}}><a href="/eiaguideline/show"><i class="fa fa-circle-o text-red"></i> EIA Guidelines</a></li>

                    <li  {{{ (Request::is('ietsguideline/show') || Request::is('ietsguideline/create') || Request::is('ietsguideline/*/edit') ? 'class=active' : '') }}}><a href="/ietsguideline/show"><i class="fa fa-circle-o text-red"></i> IETS Guidelines</a></li>

                    <li  {{{ (Request::is('apcsguideline/show') || Request::is('apcsguideline/create') || Request::is('apcsguideline/*/edit') ? 'class=active' : '') }}}><a href="/apcsguideline/show"><i class="fa fa-circle-o text-red"></i> APCS Guidelines</a></li>
                
                

                
                 
                </ul>


                 </li>
                 
            <li class="treeview {{ (Request::is('contactus/show') || Request::is('contactus/create') || Request::is('contactus/*/edit') ? 'active' : '') }}">
                   <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>Contact Us </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
                 </a>

                   <ul class="treeview-menu">
             
                    <li  {{{ (Request::is('contactus/show') || Request::is('contactus/create') || Request::is('contactus/*/edit') ? 'class=active' : '') }}}><a href="/contactus/show"><i class="fa fa-circle-o text-red"></i> Lists of Contact</a></li>
                
                 
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