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
            <li {{{ (Request::is('home')||Request::is('eiaindex/create') ? 'class=active' : '') }}}><a href="{{ asset('eiaindex/create') }}"><i class="fa fa-dashboard"></i> <span>HOME (EIAINDEX)</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}

            
            <li class="treeview {{ (Request::is('eiaannounce/show') || Request::is('eiaannounce/create') || Request::is('eiaannounce/*') || Request::is('eiaannounce/*/edit') ? 'active' : '') }}">
                <a href="{{ url('eiaannounce/show') }}">
                  <i class="fa fa-file"></i>
                  <span>ANNOUNCEMENT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
              <!--     <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="{{ asset('staf') }}"><i class="fa fa-file"></i> Pengurusan Akaun Pengguna</a></li>

            
                </ul> -->
            </li>
              <li class="treeview {{ (Request::is('eiaapplicant/create') || Request::is('paymentview/eia') || Request::is('eiaappinfo/*/edit') || Request::is('payinfo/*/edit') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>APPLICANT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('eiaapplicant/create') || Request::is('eiaappinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('eiaapplicant/create') }}"><i class="fa fa-file"></i> Registration</a></li>
                     <li {{{ (Request::is('paymentview/eia') || Request::is('payinfo/*/edit') ? 'class=active' : '') }}}><a href="{{ url('paymentview/eia') }}"><i class="fa fa-file"></i> Payment</a></li>
            
                </ul>
            </li>
                  <li class="treeview {{ (Request::is('quizModul/view/quiz/eia') || Request::is('eiaqs/*') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') || Request::is('schedule/eia') || Request::is('schedule_show/eia/available') || Request::is('schedule_attendant/*') || Request::is('schedule_show/eia/ended') || Request::is('schedule/*/edit') || Request::is('quizModul/view/exam/eia') || Request::is('eiaassignment/show') || Request::is('eiaassignment/*/edit') || Request::is('eiaassignment/*') || Request::is('secretariat_assigment/eia') || Request::is('secretariat_assign_app/eia') || Request::is('rubric_view/*') || Request::is('interview/eia') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>MANAGE</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                        <li class="treeview {{ (Request::is('quizModul/view/quiz/eia') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Virtual Self-Learning
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('quizModul/view/quiz/eia') ? 'class=active' : '') }}}><a href="{{ url('quizModul/view/quiz/eia') }}"><i class="fa fa-file"></i> Module and Quiz</a></li>
                  </ul>
                   <ul class="treeview-menu">
                    <li {{{ (Request::is('UserQuiz') ? 'class=active' : '') }}}><a href="{{ url('UserQuiz') }}"><i class="fa fa-file"></i> Candidate quiz marks</a></li>
                  </ul>
                </li>
                    
                     
               
                <li class="treeview {{ (Request::is('schedule/eia') || Request::is('schedule_show/eia/available') || Request::is('schedule_show/eia/ended') || Request::is('schedule_attendant/*') || Request::is('schedule/*/edit') || Request::is('quizModul/view/exam/eia') || Request::is('eiaqs/*') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Comprehensive Examination
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('schedule/eia') || Request::is('schedule_show/eia/available') || Request::is('schedule_show/eia/ended') || Request::is('schedule_attendant/*') || Request::is('schedule/*/edit') ? 'class=active' : '') }}}><a href="{{ url('schedule/eia') }}"><i class="fa fa-file"></i> Schedule</a></li>
                    <li {{{ (Request::is('quizModul/view/exam/eia') || Request::is('eiaqs/*') || Request::is('quizModul/selflearning/*') || Request::is('selflearning/*/edit') ? 'class=active' : '') }}}><a href="{{ url('quizModul/view/exam/eia') }}"><i class="fa fa-file"></i> Generating Question</a></li>
                  </ul>
                </li>
               <li class="treeview {{ (Request::is('eiaassignment/show') || Request::is('eiaassignment/*/edit') || Request::is('eiaassignment/*') || Request::is('secretariat_assigment/eia') || Request::is('secretariat_assign_app/eia') || Request::is('rubric_view/*') ? 'active' : '') }}">
                  <a href="#"><i class="fa fa-folder-open"></i> Assignment
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('eiaassignment/show') || Request::is('eiaassignment/*/edit') || Request::is('eiaassignment/*') ? 'class=active' : '') }}}><a href="{{ url('eiaassignment/show') }}"><i class="fa fa-file"></i> PCER Format</a></li>
                    <li {{{ (Request::is('secretariat_assigment/eia') || Request::is('secretariat_assign_app/eia') || Request::is('rubric_view/*') ? 'class=active' : '') }}}><a href="{{ url('secretariat_assigment/eia') }}"><i class="fa fa-file"></i> Applicant Assignment</a></li>
                  </ul>
                </li>
                <li class="treeview {{ (Request::is('interview/eia') ? 'active' : '') }}">
                  <a href="{{ url('interview/eia') }}"><i class="fa fa-file"></i> Professional Interview
                    <span class="pull-right-container">
                    
                    </span>
                  </a>
                </li>     
                </ul>
                <li class="treeview {{ (Request::is('cert/eia') || Request::is('cert_renewal/eia/applied') || Request::is('cert_renewal/eia/payment_submitted') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>REPORT</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('cert/eia') || Request::is('cert_renewal/eia/applied') || Request::is('cert_renewal/eia/payment_submitted') ? 'class=active' : '') }}}><a href="{{ url('cert/eia') }}"><i class="fa fa-file"></i> Certificate</a></li>

            
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