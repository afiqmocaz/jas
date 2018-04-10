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
            <li {{{ (Request::is('home')||Request::is('ietsindex/create') ? 'class=active' : '') }}}><a href="{{ asset('ietsindex/create') }}"><i class="fa fa-dashboard"></i> <span>HOME</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
           
            <li class="treeview {{ (Request::is('ietsannounce/show') || Request::is('ietsannounce/create') || Request::is('ietsannounce/*') || Request::is('ietsannounce/*/edit') ? 'active' : '') }}">
                <a href="{{ url('ietsannounce/show') }}">
                  <i class="fa fa-file"></i>
                  <span>ANNOUNCEMENT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
              <!--     <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="{{ asset('staf') }}"><i class="fa fa-file"></i> Pengurusan Akaun Pengguna</a></li>

            
                </ul> -->
            </li>
              <li class="treeview {{ (Request::is('ietsapplicant/create') || Request::is('paymentview/iets') || Request::is('ietsappinfo/*/edit') || Request::is('payinfo/*/edit') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>APPLICANT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('ietsapplicant/create') || Request::is('ietsappinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('ietsapplicant/create') }}"><i class="fa fa-file"></i> Registration</a></li>
                     <li {{{ (Request::is('paymentview/iets') || Request::is('payinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('paymentview/iets') }}"><i class="fa fa-file"></i> Payment</a></li>
            
                </ul>
            </li>
                  <li class="treeview {{ (Request::is('ietssyllabus/show') || Request::is('ietssyllabus/*') || Request::is('ietssyllabus/*/edit') || Request::is('ietsrefference/show') || Request::is('ietsrefference/*/edit') || Request::is('ietsrefference/*') || Request::is('schedule/iets') || Request::is('schedule_attendant/*') || Request::is('schedule_show/iets/available') || Request::is('schedule_show/iets/ended') || Request::is('quizModul/view/exam/iets') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') || Request::is('ietsassignment/show') || Request::is('ietsassignment/*/edit') || Request::is('ietsassignment/*') || Request::is('secretariat_assign_app/iets') || Request::is('interview/iets') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>MANAGE</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('ietssyllabus/show') || Request::is('ietssyllabus/*') || Request::is('ietssyllabus/*/edit') ? 'class=active' : '') }}}><a href="{{ url('ietssyllabus/show') }}"><i class="fa fa-file"></i> Syllabus</a></li>
                     <li {{{ (Request::is('ietsrefference/show') || Request::is('ietsrefference/*/edit') || Request::is('ietsrefference/*') ? 'class=active' : '') }}}><a href="{{ url('ietsrefference/show') }}"><i class="fa fa-file"></i> Reference</a></li>
                     
               
                <li class="treeview {{ (Request::is('schedule/iets') || Request::is('schedule_attendant/*') || Request::is('schedule_show/iets/available') || Request::is('schedule_show/iets/ended') || Request::is('quizModul/view/exam/iets') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Comprehensive Examination
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('schedule/iets') || Request::is('schedule_attendant/*') || Request::is('schedule_attendant/*') || Request::is('schedule_show/iets/available') || Request::is('schedule_show/iets/ended') ? 'class=active' : '') }}}><a href="{{ url('schedule/iets') }}"><i class="fa fa-file"></i> Schedule</a></li>
                    <li {{{ (Request::is('quizModul/view/exam/iets') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'class=active' : '') }}}><a href="{{ url('quizModul/view/exam/iets') }}"><i class="fa fa-file"></i> Generating Question</a></li>
                  </ul>
                </li>
               <li class="treeview {{ (Request::is('ietsassignment/show') || Request::is('secretariat_assigment/iets') || Request::is('ietsassignment/*/edit') || Request::is('ietsassignment/*') || Request::is('secretariat_assign_app/iets') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Assignment
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('ietsassignment/show') || Request::is('ietsassignment/*/edit') || Request::is('ietsassignment/*') ? 'class=active' : '') }}}><a href="{{ url('ietsassignment/show') }}"><i class="fa fa-file"></i> PCER Format</a></li>
                    <li {{{ (Request::is('secretariat_assigment/iets') || Request::is('secretariat_assign_app/iets') ? 'class=active' : '') }}}><a href="{{ url('secretariat_assigment/iets') }}"><i class="fa fa-file"></i> Applicant Assignment</a></li>
                  </ul>
                </li>
                <li class="treeview {{ (Request::is('interview/iets') ? 'active' : '') }}">
                  <a href="{{ url('interview/iets') }}"><i class="fa fa-file"></i> Professional Interview
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                </li>     
                </ul>
                <li class="treeview {{ (Request::is('cert/iets') || Request::is('cert_renewal/iets/applied') || Request::is('cert_renewal/iets/payment_submitted') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>REPORT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('cert/iets') || Request::is('cert_renewal/iets/applied') || Request::is('cert_renewal/iets/payment_submitted') ? 'class=active' : '') }}}><a href="{{ url('cert/iets') }}"><i class="fa fa-file"></i> Certificate</a></li>

            
                </ul>
            </li>
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