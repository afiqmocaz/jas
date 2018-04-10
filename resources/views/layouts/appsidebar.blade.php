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
            <li {{{ (Request::is('home')||Request::is('ietsindex/create') ?  : '') }}}><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> <span>HOME</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>--></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
             @if($category === 'eia')        
                            <li>
                                <a href="/take_quiz/{{$payment->id}}">
                                    <strong>SELF-LEARNING</strong>
                                </a>  
                            </li>
                            @else
            <li class="{{ Request::is($category.'_syllabus/'.$payment->id) ? "active alert-success" : "" }}">
                <a href="/{{$category}}_syllabus/{{$payment->id}}">
                  <i class="fa fa-folder-open"></i>
                  <span>SYLLABUS</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
              <!--     <ul class="treeview-menu">
                   
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="{{ asset('staf') }}"><i class="fa fa-file"></i> Pengurusan Akaun Pengguna</a></li>

            
                </ul> -->
            </li>
              <li class="{{ Request::is($category.'_reference/'.$payment->id) ? "active alert-success" : "" }}" >
                                        <a href="/{{$category}}_reference/{{$payment->id}}">
                  <i class="fa fa-folder-open"></i>
                  <span>REFERENCE</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
              @endif 
            </li>
                  <li class="{{ Request::is('examschedules/'.$payment->id) ? "active alert-success" : "" }}"><a href="/examschedules/{{$payment->id}}">
                  <i class="fa fa-folder-open"></i>
                  <span>COMPREHENSIVE EXAM</span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
               @if(!empty($examCandidate))
                 <li class="{{ Request::is('applicant_assigment/'.$examCandidate->id) ? "active alert-success" : "" }}"><a href="/applicant_assigment/{{$examCandidate->id}}"><i class="fa fa-folder-open"></i><span>COURSE ASSIGNMENT</span></a></li>
                  <li class="{{ Request::is('interview_applicant/'.$examCandidate->id) ? "active alert-success" : "" }}"><a href="/interview_applicant/{{$examCandidate->id}}"><i class="fa fa-folder-open"></i><span>PROFESSIONAL INTERVIEW</span></a></li>
               @else
                   <li disable class="disable-links"><a href="#"><i class="fa fa-folder-open"></i><span>COURSE ASSIGNMENT</span></a></li>
                   <li disable class="disable-links"><a href="#" ><i class="fa fa-folder-open"></i><span>PROFESSIONAL INTERVIEW</span></a></li>
                 @endif 
              
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