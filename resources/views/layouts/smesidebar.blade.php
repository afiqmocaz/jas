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
            <li {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> <span>HOME</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->

            <li {{{ (Request::is('secretariat_assigment/'.$category) || Request::is('rubric_view/*') ? 'class=active' : '') }}}><a href="{{ asset('secretariat_assigment/'.$category) }}"><i class="fa fa-file"></i> <span>SME Assignment</span>
            
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>