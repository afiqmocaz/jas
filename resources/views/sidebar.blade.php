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
            <li {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="/"><i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-left-container">
              
            </span></a></li>
            <!--<li><a href="#"><span>Another Link</span></a></li>-->
            {{-- Pentadbir --}}
            
            <li class="treeview {{ (Request::is('staf') || Request::is('persatuan') || Request::is('system_list/program/sukan') || Request::is('pusatsukan') || Request::is('atlet') || Request::is('log') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>EIA </span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                   
                      @if(count($eiaConsultant)>0)
                
              @if(empty($eiaConsultant[0]->endorse))
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-circle-o text-orange"></i>Waiting For Endorsement <span class="label label-warning">Pending</span></a></li>
               @elseif($eiaConsultant[0]->endorse === 'reject')
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-times text-red"></i>Waiting For Endorsement <span class="label label-warning">Rejected</span></a></li>
               @elseif($eiaConsultant[0]->endorse === 'approve')
                <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/consultant_profile/eia"><i class="fa fa-check text-blue"></i> EIA CONSULTANT</a></li>
               @endif
            
            @else
                 
                      @if(empty($eiaApplicant) || $eiaApplicant->status === 'In Process...')
                              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/eiaSectionA/create"><i class="fa fa-circle-o text-blue"></i> Apply Registration</a></li>
                      @elseif($eiaApplicant->status === 'Declined')
                            <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/eiaSectionA/create"><i class="fa fa-times text-red"></i> Apply Registration <span class="label label-danger">Declined</span></a></li>
                      @elseif($eiaApplicant->status === 'Approved')
            {{{ (Request::is('staf') ? 'class=active' : '') }}}><a >&nbsp&nbsp<i class="fa fa-check text-blue"></i> Apply Registration</a></li>
             @if($EiapayApprove>0)
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-check text-blue"></i> Make Payment</a></li>
             @elseif($EiapayPending>0)
              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href=""><i class="fa fa-circle-o text-orange"></i> Make Payment <span class="label label-warning">Pending</span></a></li>
                  @elseif($EiapayDeclined>0)
                <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/makePayment/eia"><i class="fa fa-times text-red"></i> Make Payment <span class="label label-danger">Declined</span></a></li>
                @else
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/makePayment/eia"><i class="fa fa-circle-o text-green"></i> Make Payment <span class="label label-warning"></span></a></li>
                
                @endif
                @if(!empty($paymentEia))
               
                    @foreach($paymentEia as $obj)
                  
                           
                          @if($obj->status === 'Approved')

                                @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) > $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                                    <!-- <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button> -->
                                                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/take_quiz/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                          @endif
                                    

                                @else
                                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/take_quiz/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                @endif
                                    
                            @else
                                <!-- <button type="button" class="btn btn-info form-control" disabled>Take Exam</button> -->
                            @endif
                           
                  
                  
                     @endforeach
                
               @else
               @endif
                
           @else
           @endif
           @endif
              
                </ul>
            </li>
             <li class="treeview {{ (Request::is('permohonan') || Request::is('perbelanjaan') || Request::is('senarai') || Request::is('jadual') || Request::is('laporan_program&2') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>IETS </span>
                  <span class="pull-right-container">
                   
                  </span>
              </a>
                 <ul class="treeview-menu">
                  @if(count($ietsConsultant)>0)
                
              @if(empty($ietsConsultant[0]->endorse))
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-circle-o text-orange"></i>Waiting For Endorsement <span class="label label-warning">Pending</span></a></li>
               @elseif($ietsConsultant[0]->endorse === 'reject')
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-times text-red"></i>Waiting For Endorsement <span class="label label-warning">Rejected</span></a></li>
               @elseif($ietsConsultant[0]->endorse === 'approve')
                <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/consultant_profile/iets"><i class="fa fa-check text-blue"></i> IETS CONSULTANT</a></li>
               @endif
            
            @else
                        @if(empty($ietsApplicant) || $ietsApplicant->status === 'In Process...'||$ietsApplicant->status==='ReRegister')
                              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/ietsSectionA/create"><i class="fa fa-circle-o text-blue"></i> Apply Registration</a></li>
                      @elseif($ietsApplicant->status === 'Declined')
                            <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/ietsSectionA/create"><i class="fa fa-times text-red"></i> Apply Registration <span class="label label-danger">Declined</span></a></li>
                      @elseif($ietsApplicant->status === 'Approved')
           <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-check text-blue"></i> Apply Registration</a></li>
             @if($IetspayApprove>0)
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-check text-blue"></i> Make Payment</a></li>
             @elseif($IetspayPending>0)
              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-circle-o text-blue"></i> Make Payment <span class="label label-warning">Pending</span></a></li>
                  @elseif($IetspayDeclined>0)
                <li ><a href="makePayment/iets"><i class="fa fa-times text-red"></i> Make Payment <span class="label label-danger">Declined</span></a></li>
                @else
                <li ><a href="/makePayment/iets"><i class="fa fa-circle-o text-orange"></i> Make Payment</a></li>
               <!--  <br>&nbsp; -->

                @endif
                @if(!empty($paymentIets))
               
                    @foreach($paymentIets as $obj)
                  
                           
                          @if($obj->status === 'Approved')

                                @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) > $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                                    <!-- <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button> -->
                                                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/examschedules/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                          @endif
                                    

                                @else
                                     <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/examschedules/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                @endif
                                    
                            @else
                                <!-- <button type="button" class="btn btn-info form-control" disabled>Take Exam</button> -->
                            @endif
                           
                  
                  
                     @endforeach
                
               @else
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/examschedules/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
               @endif
                
           @else
           @endif
              @endif  
        </ul>   <li class="treeview {{ (Request::is('staf') || Request::is('persatuan') || Request::is('system_list/program/sukan') || Request::is('pusatsukan') || Request::is('atlet') || Request::is('log') ? 'active' : '') }}">
                <a href="#">
                  <i class="fa fa-folder-open"></i>
                  <span>APCS</span>
                  <span class="pull-right-container">
                    <i ></i>
                  </span>
              </a>
                  <ul class="treeview-menu">
                 @if(count($apcsConsultant)>0)
                
              @if(empty($apcsConsultant[0]->endorse))
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-circle-o text-orange"></i>Waiting For Endorsement <span class="label label-warning">Pending</span></a></li>
               @elseif($apcsConsultant[0]->endorse === 'reject')
                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-times text-red"></i>Waiting For Endorsement <span class="label label-warning">Rejected</span></a></li>
               @elseif($apcsConsultant[0]->endorse === 'approve')
                <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/consultant_profile/apcs"><i class="fa fa-check text-blue"></i> APCS CONSULTANT</a></li>
               @endif
            
            @else
                        @if(empty($apcsApplicant) || $apcsApplicant->status === 'In Process...'||$apcsApplicant->status==='ReRegister')
                              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/apcsSectionA/create"><i class="fa fa-circle-o text-blue"></i> Apply Registration</a></li>
                      @elseif($apcsApplicant->status === 'Declined')
                            <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/apcsSectionA/create"><i class="fa fa-times text-red"></i> Apply Registration <span class="label label-danger">Declined</span></a></li>
                      @elseif($apcsApplicant->status === 'Approved')
           <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-check text-blue"></i> Apply Registration</a></li>
             @if($ApcspayApprove>0)
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-check text-blue"></i> Make Payment</a></li>
             @elseif($ApcspayPending>0)
              <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a ><i class="fa fa-circle-o text-blue"></i> Make Payment <span class="label label-warning">Pending</span></a></li>
                  @elseif($ApcspayDeclined>0)
                <li ><a href="/makePayment/apcs"><i class="fa fa-times text-red"></i> Make Payment <span class="label label-danger">Declined</span></a></li>
                @else
                <li ><a href="/makePayment/apcs"><i class="fa fa-circle-o text-orange"></i> Make Payment</a></li>
               <!--  <br>&nbsp; -->

                @endif
                @if(!empty($paymentApcs))
               
                    @foreach($paymentApcs as $obj)
                  
                           
                          @if($obj->status === 'Approved')

                                @if(!empty($obj->examCandidates) && count($obj->examCandidates)>0)
                                    
                                  <div class="hide">{{$currEc = $obj->examCandidates[(count($obj->examCandidates)-1)]}};</div>
                                          @if( (count($obj->examCandidates) > $retakeExam) && $currEc->status === 'failed')
                                                You have failed the exam
                                          @elseif($currEc->status_assigment === 'failed')
                                                You have failed the assigment
                                          @elseif($currEc->status_interview === 'failed')
                                                 You have failed the interview
                                          @else
                                                    <!-- <button type="button" class="btn btn-info form-control" onclick="window.location.href='/examschedules/{{$obj->id}}'">Take Exam</button> -->
                                                    <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/apcs_syllabus/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                          @endif
                                    

                                @else
                                     <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/apcs_syllabus/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
                                @endif
                                    
                            @else
                                <!-- <button type="button" class="btn btn-info form-control" disabled>Take Exam</button> -->
                            @endif
                           
                  
                  
                     @endforeach
                
               @else
               <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href="/apcs_syllabus/{{$obj->id}}"><i class="fa fa-circle-o text-green"></i> Enter Registration Scheme</a></li>
               @endif
                
           @else
           @endif
              @endif     <!--  <li {{{ (Request::is('staf') ? 'class=active' : '') }}}><a href=""><i class="fa fa-circle-o text-green"></i> Take Exam</a></li> -->
                </ul>
            </li><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<!--<script>
function activate(){
  console.log(this.attr('href'));
  localStorage
  }
</script>-->