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
        

         <li class="treeview {{ (Request::is('eiaSectionA/create') || Request::is('eiaSectionA/*/edit') || Request::is('eiaSectionA/*') || Request::is('eiaSectionB/create') || Request::is('eiaSectionB/*/edit') || Request::is('eiaSectionB/*') || Request::is('eiaSectionC/create') || Request::is('eiaSectionC/*/edit') || Request::is('eiaSectionC/*') || Request::is('eiaSectionD/create') || Request::is('eiaSectionD/*/edit') || Request::is('eiaSectionD/*') || Request::is('eiaSectionE/create') || Request::is('eiaSectionE/*/edit') || Request::is('eiaSectionE/*') || Request::is('eiaSectionF/create') || Request::is('eiaSectionF/*/edit') || Request::is('eiaSectionF/*') || Request::is('eiaSectionF') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>EIA </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
             
              
                    <li  {{{ (Request::is('eiaSectionA/create') || Request::is('eiaSectionA/*/edit') || Request::is('eiaSectionA/*') ? 'class=active' : '') }}}><a href="#" id="eiaSectionA"><i class="fa fa-circle-o text-red"></i> Section A</a></li>
                
                    <li  {{{ (Request::is('eiaSectionB/create') || Request::is('eiaSectionB/*/edit') || Request::is('eiaSectionB/*') ? 'class=active' : '') }}}><a href="#" id="eiaSectionB"><i class="fa fa-circle-o text-red"></i> Section B</a></li>

                    <li  {{{ (Request::is('eiaSectionC/create') || Request::is('eiaSectionC/*/edit') || Request::is('eiaSectionC/*') ? 'class=active' : '') }}}><a href="#" id="eiaSectionC"><i class="fa fa-circle-o text-red"></i> Section C</a></li>

                    <li  {{{ (Request::is('eiaSectionD/create') || Request::is('eiaSectionD/*/edit') || Request::is('eiaSectionD/*') ? 'class=active' : '') }}}><a href="#" id="eiaSectionD"><i class="fa fa-circle-o text-red"></i> Section D</a></li>

                    <li  {{{ (Request::is('eiaSectionE/create') || Request::is('eiaSectionE/*/edit') || Request::is('eiaSectionE/*') ? 'class=active' : '') }}}><a href="#" id="eiaSectionE"><i class="fa fa-circle-o text-red"></i> Section E</a></li>

                    <li  {{{ (Request::is('eiaSectionF/create') || Request::is('eiaSectionF/*/edit') || Request::is('eiaSectionF/*') || Request::is('eiaSectionF') ? 'class=active' : '') }}}><a href="#" id="eiaSectionF"><i class="fa fa-circle-o text-red"></i> Section F</a></li>

                                       
              
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