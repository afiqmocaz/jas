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
            <li {{{ (Request::is('home') || Request::is('index/create') ? 'class=active' : '') }}}><a href="{{ asset('index/create') }}"><i class="fa fa-dashboard"></i> <span>HOME</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
           
            <li class="treeview {{ (Request::is('announce/show') || Request::is('announce/create') || Request::is('announce/*/edit') || Request::is('announce/*') ? 'active' : '') }}">
                <a href="{{ url('announce/show') }}">
                  <i class="fa fa-file"></i>
                  <span>ANNOUNCEMENT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
              <!--     <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="{{ asset('staf') }}"><i class="fa fa-file"></i> Pengurusan Akaun Pengguna</a></li>

            
                </ul> -->
            </li>
              <li class="treeview {{ (Request::is('applicant/create') || Request::is('appinfo/*/edit') || Request::is('paymentview/apcs') || Request::is('payinfo/*/edit') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>APPLICANT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('applicant/create') || Request::is('appinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('applicant/create') }}"><i class="fa fa-file"></i> Registration</a></li>
                     <li {{{ (Request::is('paymentview/apcs') || Request::is('payinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('paymentview/apcs') }}"><i class="fa fa-file"></i> Payment</a></li>
            
                </ul>
            </li>
                  <li class="treeview {{ (Request::is('syllabus/show') || Request::is('syllabus/*') || Request::is('syllabus/*/edit') || Request::is('refference/show') || Request::is('refference/*/edit') || Request::is('refference/*') || Request::is('schedule/apcs') || Request::is('schedule_attendant/*') || Request::is('schedule_show/apcs/available') || Request::is('schedule_show/apcs/ended') || Request::is('quizModul/view/exam/apcs') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') || Request::is('assignment/show') || Request::is('assignment/*/edit') || Request::is('assignment/*') || Request::is('secretariat_assign_app/apcs') || Request::is('secretariat_assigment/apcs') || Request::is('rubric_view/*') || Request::is('interview/apcs') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>MANAGE</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('syllabus/show') || Request::is('syllabus/*/edit') || Request::is('syllabus/*') ? 'class=active' : '') }}}><a href="{{ url('syllabus/show') }}"><i class="fa fa-file"></i> Syllabus</a></li>
                     <li {{{ (Request::is('refference/show') || Request::is('refference/*') || Request::is('refference/*/edit') ? 'class=active' : '') }}}><a href="{{ url('refference/show') }}"><i class="fa fa-file"></i> Reference</a></li>
                     
               
                <li class="treeview {{ (Request::is('schedule/apcs') || Request::is('schedule_attendant/*') || Request::is('schedule_show/apcs/available') || Request::is('schedule_show/apcs/ended') || Request::is('quizModul/view/exam/apcs') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Comprehensive Examination
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('schedule/apcs') || Request::is('schedule_attendant/*') || Request::is('schedule_show/apcs/available') || Request::is('schedule_show/apcs/ended') ? 'class=active' : '') }}}><a href="{{ url('schedule/apcs') }}"><i class="fa fa-tasks"></i> Schedule</a></li>
                    <li {{{ (Request::is('quizModul/view/exam/apcs') || Request::is('eiaqs/*') || Request::is('eiaqs/*/edit') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'class=active' : '') }}}><a href="{{ url('quizModul/view/exam/apcs') }}"><i class="fa fa-tasks"></i> Generating Question</a></li>
                  </ul>
                </li>
               <li class="treeview {{ (Request::is('assignment/show') || Request::is('secretariat_assigment/apcs') || Request::is('assignment/*/edit') || Request::is('assignment/*') || Request::is('secretariat_assign_app/apcs') || Request::is('rubric_view/*') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Assignment
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('assignment/show') || Request::is('assignment/*/edit') || Request::is('assignment/*') ? 'class=active' : '') }}}><a href="{{ url('assignment/show') }}"><i class="fa fa-tasks"></i> PCER Format</a></li>
                    <li {{{ (Request::is('secretariat_assigment/apcs') || Request::is('secretariat_assign_app/apcs') || Request::is('rubric_view/*') ? 'class=active' : '') }}}><a href="{{ url('secretariat_assigment/apcs') }}"><i class="fa fa-tasks"></i> Applicant Assignment</a></li>
                  </ul>
                </li>
                <li class="treeview {{ (Request::is('interview/apcs') ? 'active' : '') }}">
                  <a href="{{ url('interview/apcs') }}"><i class="fa fa-file"></i> Professional Interview
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                </li>     
                </ul>
                <li class="treeview {{ (Request::is('cert/apcs') || Request::is('cert_renewal/apcs/applied') || Request::is('cert_renewal/apcs/payment_submitted') ? 'active' : '') }}">
                <a href="">
                  <i class="fa fa-folder-open"></i>
                  <span>REPORT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('cert/apcs') || Request::is('cert_renewal/apcs/applied') || Request::is('cert_renewal/apcs/payment_submitted') ? 'class=active' : '') }}}><a href="{{ url('cert/apcs') }}"><i class="fa fa-file"></i> Certificate</a></li>

            
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