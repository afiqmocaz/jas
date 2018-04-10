<!-- Left side column. contains the sidebar -->
<style type="text/css">

</style>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <center><a href="/" class="logo"><img src="{{ asset('logoJR.png') }}" style="width: 80%;height: 22%">&nbsp;<b></b></a></center><br><br>
        <!-- Sidebar user panel (optional) -->


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
            <li {{{ (Request::is('home')||Request::is('eiaindex/create') ?  : '') }}}><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> <span>HOME</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
            
              <li class="treeview {{ (Request::is($category.'profiles/create') || Request::is($category.'profiles/*/edit') || Request::is($category.'profiles/*') ? 'active' : '') }}"><a href="{{ url($category.'profiles/create') }}">
                  <i class="fa fa-folder-open"></i>
                  <span>PERSONAL-PROFILE</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
            </li>
                  <li class="treeview {{ Request::is('consultant_cert/'.$category) ? "active" : "" }}"><a href="{{ url('consultant_cert/'.$category) }}">
                  <i class="fa fa-folder-open"></i>
                  <span>CERTIFICATE RENEWAL</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  
                </ul>
       
            </li>
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<!--<script>
function activate(){
  console.log(this.attr('href'));
  localStorage
  }
</script>-->