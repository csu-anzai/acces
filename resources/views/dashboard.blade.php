@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Proposals')])
@section('content')
<?php 
$first_stage_ids = [1, 2, 3, 4, 5];
$first_stage_status = ['Draft', 'Returned', 'Pending'];
$coord_status = ['Draft', 'Returned', 'Pending', 'Review', 'Recommendation'];

$chair_id = 6;
$coord_id = 7;
$dean_id = 8;
$director_id = 9;
$vpaa_id = 10;

$designation_id = Auth::user()->designation_id;
?>

<title>ACCES - Home</title>
<div class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-lg-12 col-md-12">
      <div class="card">
         <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
               <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" data-tabs="tabs">
                  <!-- Co, Extra Curricular, Faculty, CES Representative AND CES Coordinator-->
                  @if(in_array($designation_id, $first_stage_ids) || $designation_id == $coord_id)
                     <li class="nav-item">
                        <a class="nav-link active" href="#draft" data-toggle="tab">
                           <i class="material-icons">library_books</i> Drafts
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#returned" data-toggle="tab">
                           <i class="material-icons">assignment_return</i> Returned
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#pending" data-toggle="tab">
                           <i class="material-icons">assignment_turned_in</i> Submitted
                           <div class="ripple-container"></div>
                        </a>
                     </li>

                     <!-- CES Coordinator -->
                     @if($designation_id == $coord_id)
                     <li class="nav-item">
                        <a class="nav-link" href="#review" data-toggle="tab">
                           <i class="material-icons">assignment_late</i> For Review
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#recommendation" data-toggle="tab">
                           <i class="material-icons">assignment_ind</i> Recommendation
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                     @endif

                  <!-- Department Chair -->
                  @elseif($designation_id == $chair_id)
                     <li class="nav-item">
                        <a class="nav-link active" href="#to-be-noted" data-toggle="tab">
                           <i class="material-icons">assignment_ind</i> To be Noted
                           <div class="ripple-container"></div>
                        </a>
                     </li>                  
                  <!-- Dean -->
                  @elseif($designation_id == $dean_id)
                     <li class="nav-item">
                        <a class="nav-link active" href="#for-dean-endorsement" data-toggle="tab">
                           <i class="material-icons">assignment_ind</i> For Endorsement
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                  <!-- CES Director -->
                  @elseif($designation_id == $director_id)
                     <li class="nav-item">

                        <a class="nav-link active" href="#for-assignment-committee" data-toggle="tab">
                           <i class="material-icons">supervisor_account</i> For Assignment of Committee Review

                           <div class="ripple-container"></div>
                        </a>
                     </li>
                     <li class="nav-item">

                        <a class="nav-link" href="#for-pending-endorsement" data-toggle="tab">
                           <i class="material-icons">assignment_late</i> Pending / For Endorsement

                           <div class="ripple-container"></div>
                        </a>
                     </li>
                  <!-- VPAA -->
                  @elseif($designation_id == $vpaa_id)
                     <li class="nav-item">
                        <a class="nav-link active" href="#for-approval" data-toggle="tab">
                           <i class="material-icons">assignment_ind</i> For Approval
                           <div class="ripple-container"></div>
                        </a>
                     </li>
                  @endif
                  </ul>
               </div>
            </div>
         </div>
         <div class="card-body">
         
         <div class="tab-content">

         <!-- For Co, Extra curricular, Faculty, CES Representative AND CES Coordinator-->
         @if(in_array($designation_id, $first_stage_ids) || $designation_id == $coord_id)
            <button class="btn btn-success btn-round btn-lg btn-fab" style="position: fixed; bottom: 10%; right: 4%;"  data-toggle="modal" data-target="#formModal" rel="tooltip" data-placement="left" title="Create New Proposal">
            <i class="material-icons" style="font-size: 35px">add</i>
            </button>
            @if($designation_id == $coord_id)
            <?php $first_stage_status = $coord_status;?>
            @endif

            @foreach($first_stage_status as $status)
            <div class="tab-pane {{ $status == $first_stage_status[0] ? ' active' : '' }}" id="{{strToLower($status)}}">
            <?php
               $user = \App\User::find(Auth::user()->id);

               if($designation_id == $coord_id && ($status == $coord_status[3] || $status == $coord_status[4])){

                  //If For Approval
                  if($status == $coord_status[4]){
                     $proposals = \App\Proposal::getProposalBy(true, $user->department->school->id, 'For CES Coordinator Endorsement');
                  }else{
                     //If Review
                     $proposals = \App\Proposal::getProposalAsReviewer(Auth::user()->id);
                  }

               }else{
                  $proposals = $user->proposals->where('status', $status);
               }
            ?>
            @if(!$proposals->isEmpty())
               <table class="table">

               <!-- Table Content for CES Coordinator -->
               @if($designation_id == $coord_id && ($status == $coord_status[3] || $status == $coord_status[4]))
               <!-- If For approval -->
               @if($status == $coord_status[4])
                  <thead>
                     <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                     <th><strong>Submitted By</strong></th>
                     <th><strong>Date Submitted</strong></th>
                     <th></th>
                  </thead>
                  <tbody>
                     @foreach($proposals as $proposal)
                     <?php 
                        $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                     ?>
                     <tr>
                        <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                        <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                        <td>{{$proposal->process->getLatestSubmittedAt()}}</td>
                        <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" data-status="For School Dean Endorsement" class="forward-btn text-success btn-link"><i class="material-icons" style="font-size:400%;">check_box</i></a></td>
                     </tr>
                     @endforeach
                  </tbody>
               <!-- If For Review -->
               @else
                  <thead>
                     <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                     <th><strong>Created By</strong></th>
                     <th><strong>Date Submitted</strong></th>
                     <th><strong>Review Committee Pair</strong></th>
                     <th><strong>View Scores</strong></th>
                  </thead>
                  <tbody>
                     @foreach($proposals as $proposal)
                     <?php 
                        $creator = \App\User::find($proposal->creator->id);
                        
                        $pair_id = ($proposal->reviewer_one->id == Auth::user()->id)? $proposal->reviewer_two->id : $proposal->reviewer_one->id;
                        $pair = \App\User::find($pair_id);
                     ?>
                     <tr>
                        <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                        <td data-id="{{$creator->id}}">{{$creator->getFullName()}}</td>
                        <td>{{$proposal->process->getLatestSubmittedAt()}}</td>
                        <td data-id="{{$pair->id}}">{{$pair->getFullName()}}</td>
                        <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" class="text-success btn-link"><i class="material-icons" style="font-size:250%;">visibility</i></a></td>
                     </tr>
                     @endforeach
                  </tbody>
               @endif

               <!-- Table Content for Co, Extra Curricular, Faculty, CES Representative -->
               @else
                  <thead>
                     <th><strong>#</strong></th>
                     <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                     <th><strong>Date Created</strong></th>
                     @if($status == 'Pending')
                     <th><strong>Status</strong></th>
                     @endif
                  </thead>
                  <tbody>
                     @foreach($proposals as $proposal)
                     <tr>
                        <td>{{$proposal->id}}</td>
                        <td><a href="javascript:void(0);" data-status="{{$proposal->status}}" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                        <td>{{\Carbon\Carbon::parse($proposal->created_at)->diffForHumans()}}</td>
                        @if($status == 'Pending')
                        <td>{{$proposal->process->status}}</td>
                        @endif
                     </tr>
                     @endforeach
                  </tbody>
               @endif
               </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>
            @endforeach
         
         <!-- For Department Chair -->
         @elseif($designation_id == $chair_id)
            <div class="tab-pane active" id="to-be-noted">

            <?php 
               $proposals = \App\Proposal::getProposalBy(false, Auth::user()->department_id, 'For Department Chair Endorsement');
            ?>

            @if(!$proposals->isEmpty())                 
               <table class="table">
                  <thead>
                     <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                     <th><strong>Submitted By</strong></th>
                     <th><strong>Date Created</strong></th>
                     <th></th>
                  </thead>
                  <tbody>
                     @foreach($proposals as $proposal)
                     <?php 
                        $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                     ?>
                     <tr>
                     <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                        <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                        <td>{{\Carbon\Carbon::parse($proposal->updated_at)->diffForHumans()}}</td>
                        <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" data-status="For CES Coordinator Endorsement" class="forward-btn text-success btn-link"><i class="material-icons" style="font-size:400%;">check_box</i></a></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>

         <!-- For Dean -->
         @elseif($designation_id == $dean_id)
            <div class="tab-pane active" id="for-dean-endorsement">

            <?php 
               $user = \App\User::find(Auth::user()->id);
               $proposals = \App\Proposal::getProposalBy(true, $user->department->school->id, 'For School Dean Endorsement');
            ?>

            @if(!$proposals->isEmpty())                 
            <table class="table">
               <thead>
                  <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                  <th><strong>Submitted By</strong></th>
                  <th><strong>Date Submitted</strong></th>
                  <th></th>
               </thead>
               <tbody>
                  @foreach($proposals as $proposal)
                  <?php 
                     $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                  ?>
                  <tr>
                     <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                     <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                     <td>{{$proposal->process->getLatestSubmittedAt()}}</td>
                     <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" data-status="For Review Committee Assignment" class="forward-btn text-success btn-link"><i class="material-icons" style="font-size:400%;">check_box</i></a></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>
         <!-- For CES Director -->
         @elseif($designation_id == $director_id)
            <!-- Table for assigning review committee -->
            <div class="tab-pane active" id="for-assignment-committee">

            <?php 
               $proposals = \App\Proposal::getProposalByStatus('For Review Committee Assignment');
            ?>

            @if(!$proposals->isEmpty())                 
            <table class="table">
               <thead>
                  <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                  <th><strong>Submitted By</strong></th>
                  <th><strong>Date Submitted</strong></th>
                  <th></th>
               </thead>
               <tbody>
                  @foreach($proposals as $proposal)
                  <?php 
                     $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                  ?>
                  <tr>
                     <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                     <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                     <td>{{$proposal->process->getLatestSubmittedAt()}}</td>
                     <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" class="btn-assign-committee text-success btn-link"><i class="material-icons" style="font-size:400%;">supervised_user_circle</i></a></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>
            
            <!-- Assign Review Committee Modal -->
            <div class="modal fade" id="assign-committee-modal">
               <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                     <form class="border border-light p-5">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons" style="font-size: 35px">clear</i>
                        </button>
                        <div class="container">
                           <div class="row">
                              <div class="col-md-8">
                                 <h3 style='font-weight: 900;'><strong id="review-proposal-title">Title</strong></h3>
                                 <h4 id="review-proposal-school">School</h4>
                                 <h4 style="margin-top:3%" id="review-proposal-department">Departments</h4>
                                 <h4 id="review-proposal-date">Date</h4>
                              </div>
                              <div class="card" style="margin-top:10%">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>Choose Review Committee</strong></h5>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label for="input-reviewer-one">Reviewer1:</label>
                                          <select id="input-reviewer-one" class="dropbox-reviewer browser-default custom-select no-include" required>
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                          <label for="input-reviewer-two">Reviewer1:</label>
                                          <select id="input-reviewer-two" class="dropbox-reviewer browser-default custom-select no-include" required>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="modal-footer">
                        <button class='btn btn-success' id="btn-committe-submit">
                           <strong> Submit </strong>
                           <span class="material-icons" style="font-size:25px;">chevron_right</span>
                        </button>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Table for Pending or Approval -->
            <div class="tab-pane" id="for-pending-approval">
            
            <?php 
               $proposals = collect();
            ?>

            @if(!$proposals->isEmpty())                 
            <table class="table">
               <thead>
                  <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                  <th><strong>Submitted By</strong></th>
                  <th><strong>Date Submitted</strong></th>
                  <th><strong>Review Committee</strong></th>
                  <th><strong>Date Submitted</strong></th>
                  <th></th>
               </thead>
               <tbody>
                  @foreach($proposals as $proposal)
                  <?php 
                     $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                  ?>
                  <tr>
                     <td><a href="javascript:void(0);" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                     <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                     <td>{{$proposal->process->getLatestSubmittedAt()}}</td>
                     <td><a href="javascript:void(0);" data-id="{{$proposal->id}}" data-status="For CES Director Endorsement" class="forward-btn text-success btn-link"><i class="material-icons" style="font-size:400%;">check_box</i></a></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>
         <!-- For VPAA -->
         @elseif($designation_id == $vpaa_id)
            <div class="tab-pane active" id="for-approval">

            <?php 
            $department = \App\Department::find(Auth::user()->department_id);

            $proposals = \App\Proposal::
                  join('processes', 'processes.proposal_id', '=', 'proposals.id')
                  ->where([
                     ['proposals.status', 'Pending'],
                     ['processes.status', 'For VPAA Approval']
                  ])
                  ->select('proposals.title as title', 'proposals.updated_at as updated_at')
                  ->get();
            ?>

            @if(!$proposals->isEmpty())                 
               <table class="table">
                  <thead>
                     <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                     <th><strong>Submitted By</strong></th>
                     <th><strong>Date Submitted</strong></th>
                  </thead>
                  <tbody>
                     @foreach($proposals as $proposal)
                     <?php 
                        $user = \App\User::find($proposal->process->getLatestSubmittedBy());
                     ?>
                     <tr>
                        <td>{{$proposal->title}}</td>
                        <td><a href="javascript:void(0);" class="btn-routing-modal" data-id="{{$proposal->process->id}}" style="color:forestgreen">{{$user->getFullName()}}</a></td>
                        <td>{{\Carbon\Carbon::parse($proposal->updated_at)->diffForHumans()}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            @else
               <h1 class="text-center mt-5"><i class="material-icons text-muted" style="font-size:200%">error</i></h1>
               <h3 class="text-center text-muted mb-5">No records found.</h3>
            @endif
            </div>
         @endif

            </div>
         </div>
      </div>
   </div>
   <!-- Modal Area -->
   <div class="modal fade" id="formModal">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <form class="border border-light p-5">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i class="material-icons" style="font-size: 35px">clear</i>
               </button>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12 text-center mb-4">
                        <h3 style='font-weight: 900; margin-top: -3%'><strong>Create Proposal</strong></h3>
                        <h4>Types of CES Program/Project/Activity Proposals</h4>
                     </div>
                  </div>
                  <div class="row bg-light">
                     <div class="col-md-8 mt-4 mb-4">
                        <h4>1. Course-based CES Program/Project/Activity</h4>
                        <small>a. Deadline for 1st Semester: last Friday of June</small>
                        <br>
                        <small>b. Deadline for 2nd Semester: last Friday of September</small>
                     </div>
                     <div class="col-md-4 mt-4">
                        <a class="btn btn-success btn-lg" href="{{ route('form1') }}">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></a>
                     </div>
                  </div>
                  <div class="row bg-light mt-2">
                     <div class="col-md-8 mt-4 mb-2">
                        <h4>2. CES Proposals from Department/School and Student Organizations (co-curricular and extra-curricular)</h4>
                        <small>a. <strong>Medium and Long term proposals planned by 1st quarter of the year</strong> (first Friday of February)</small>
                        <br>
                     </div>
                     <div class="col-md-4 mt-4">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                  </div>
                  <div class="row bg-light">
                     <div class="col-md-8 mt-2">
                        <small>
                           b. <strong>Submitted Within the Academic Year</strong>: 
                           <div class="text-danger">Deadlines only apply to items I, II, III and not for Special Projects</div>
                        </small>
                     </div>
                  </div>
                  <div class="row bg-light">
                     <div class="col-md-8 mb-5 mt-4">              
                        <small><strong>I</strong>. Medium and Long Term proposal and planned within the academic year</small>
                     </div>
                     <div class="col-md-4 mt-1">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                     <div class="col-md-8 mb-4 mt-4">              
                        <small><strong>II</strong>. Short term proposals (one time activity; or to be implemented in one semester) with cash out requirement</small>
                     </div>
                     <div class="col-md-4 mt-1">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                     <div class="col-md-8 mb-4 mt-4">              
                        <small><strong>III</strong>. Short term proposals (one time activity; or to be implemented in one semester) without cash out requirement</small>
                     </div>
                     <div class="col-md-4 mt-1">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                     <div class="col-md-8 mb-4 mt-4">              
                        <small><strong>IV</strong>. Special Projects (those requested by partners from within and outside USC) with cash out requirement</small>
                     </div>
                     <div class="col-md-4 mt-1">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                     <div class="col-md-8 mb-4 mt-4">              
                        <small><strong>V</strong>. Special Projects (those requested by partners from within and outside USC) without cash out requirement</small>
                     </div>
                     <div class="col-md-4 mt-1">
                        <button class="btn btn-success btn-lg">Proceed <i class="material-icons" style="font-size: 35px">keyboard_arrow_right</i></button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- View Proposal Modal -->
   <div class="modal fade" id="proposal-modal">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <form class="border border-light p-5">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i class="material-icons" style="font-size: 35px">clear</i>
               </button>
               <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <h3 style='font-weight: 900;'><strong id="proposal-modal-title"></strong></h3>
                        <h4 id="proposal-modal-cestype"></h4>
                        <h4 style="margin-top:3%" id="proposal-modal-venue"></h4>
                        <h4 id="proposal-modal-date"></h4>
                     </div>
                     <div class="col-md-4 mt-5" id="continue_editing">
                        <button class="btn btn-success btn-lg btn-fab ml-4" rel="tooltip" data-placement="bottom" title="Continue Editing">
                        <i class="material-icons" style="font-size: 30px">edit</i>
                        </button>
                     </div>
                     <div class="col-md-4 mt-5" id="comment_pdf">
                        <button class="btn btn-default btn-lg btn-fab ml-2" rel="tooltip" data-placement="bottom" title="Add Comment">
                        <i class="material-icons" style="font-size: 30px">add_comment</i>
                        </button>
                        <button class="btn btn-success  btn-lg btn-fab ml-3" rel="tooltip" data-placement="bottom" title="Generate PDF">
                        <i class="material-icons" style="font-size: 30px">picture_as_pdf</i>
                        </button>
                     </div>
                     <div class="card" style="margin-top:10%">
                        <div class="card-header card-header-text card-header-success">
                           <div class="card-text">
                              <h5 class="card-title"><strong>I. Rationale and Contextualization</strong></h5>
                           </div>
                        </div>
                        <div class="card-body" id="proposal-modal-rationale">
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header card-header-text card-header-success">
                           <div class="card-text">
                              <h5 class="card-title"><strong>II. Goal, Objectives, and Outcomes</strong></h5>
                           </div>
                        </div>
                        <div class="card-body" id="proposal-modal-goals">
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header card-header-text card-header-success">
                           <div class="card-text">
                              <h5 class="card-title"><strong>III. Participants, Partners and Beneficiaries</strong></h5>
                           </div>
                        </div>
                        <div class="card-body" id="proposal-modal-participants">
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header card-header-text card-header-success">
                           <div class="card-text">
                              <h4 class="card-title">IV. Outline of Activities</h4>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <th>
                                       Tentative date
                                    </th>
                                    <th>
                                       Activities
                                    </th>
                                    <th>
                                       Participants needed
                                    </th>
                                    <th>
                                       Person/s In-charge
                                    </th>
                                 </thead>
                                 <tbody id="proposal-modal-outline">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header card-header-text card-header-success">
                           <div class="card-text">
                              <h4 class="card-title">V. Budgetary Requirements</h4>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead class=" text-primary" style='color:black !important;'>
                                    <th>
                                       Particulars
                                    </th>
                                    <th>
                                       Frequency
                                    </th>
                                    <th>
                                       Quantity
                                    </th>
                                    <th>
                                       Amount 
                                    </th>
                                    <th>
                                       Subtotal
                                    </th>
                                 </thead>
                                 <thead class="text-primary" style='color:black !important;'>
                                    <th>
                                       A. Meals / Snacks 
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                 </thead>
                                 <tbody id="proposal-modal-meals">
                                 </tbody>
                                 <thead class=" text-primary" style='color:black !important;'>
                                    <th>
                                       B. Transportations
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                 </thead>
                                 <tbody id="proposal-modal-transportations">
                                 </tbody>
                                 <thead class=" text-primary" style='color:black !important;'>
                                    <th>
                                       C. Materials
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                 </thead>
                                 <tbody id="proposal-modal-materials">
                                 </tbody>
                                 <thead class=" text-primary" style='color:black !important;'>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    </th>
                                    <th><strong> Grand Total: </strong>
                                    </th>
                                    <th id="proposal-modal-grand-total">
                                    </th>
                                    <th></th>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
            </form>
            </div>
            </div>
         </div>
      </div>
   </div>
   <!--View Routing Modal-->
   <div class="modal fade" id="routing-modal">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <form class="border border-light p-5">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i class="material-icons" style="font-size: 35px">clear</i>
               </button>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12 text-center">
                        <h3 style='font-weight: 900;'><strong>History</strong></h3>
                     </div>
                  </div>
                  <div class="row">
                     <table class="table">
                        <thead>
                           <th>Date Submitted</th>
                           <th>Submitted By</th>
                           <th>Designation</th>
                           <th>School</th>
                        </thead>
                        <tbody id="routing-modal-content">
                        </tbody>
                     </table>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
   <script>
      $(".forward-btn").click(function(){
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/updateProcess",
          type: "POST",
          data: { 
             proposal_id: $(this).data('id'), 
             submitted_by: {{Auth::user()->id}},
             status: $(this).data('status')
         },
          success: function(result){
            Swal.fire(
            'Proposal Forwarded!',
            'Click OK to continue.',
            'success'
            ).then(function() {
               location.reload(); 
            });
          },
          error: function(xhr, resp, text){
              Swal.fire({
               type: 'error',
               title: 'Oops...',
               text: 'Something went wrong!',
               })
          }
        });
      });

      $(".btn-assign-committee").click(function(){
         var proposal_id = $(this).data('id');

         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/getProposalDataForReview",
          type: "POST",
          data: { id: proposal_id},
          success: function(result){
               var startDate = new Date(result.start_date);
               var endDate = new Date(result.end_date);
            
               var dateString = "";
            
               dateString += getFormattedDate(startDate);
               dateString += " to ";
               dateString += getFormattedDate(endDate);

               $('#review-proposal-title').html(result.title);
               $('#review-proposal-school').html(result.school);
               $('#review-proposal-department').html(result.department);
               $('#review-proposal-date').html(dateString);
               $('#assign-committee-modal').modal(focus);
               $('#btn-committe-submit').data('id', proposal_id);

              console.log(result);

              $.ajax({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "/getReviewCommittee",
               type: "POST",
               success: function(result){
                  console.log(result);
                  var options = '<option disabled selected value="">Review Committee</option>';
                  $.each(result, function(key, value) {
                     options += '<option value="' + value.id + '">' + value.firstname + ' ' + value.lastname + ' [' + value.school_name + ' ' + value.school_id + ']' + '</option>';
                  });

                  $(".dropbox-reviewer").html(options);
               },
               error: function(xhr, resp, text){
                  console.log(xhr, resp, text);
               }
              });

          },
          error: function(xhr, resp, text){
              console.log(xhr, resp, text);
          }
        });
      });

      $('.btn-routing-modal').click(function(){
         $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getHistory",
            type: "POST",
            data: {
               process_id: $(this).data('id')
            },
            success: function(result){
               var length = result['submitted_at'].length;
               var content = "";

               for(var x=length-1; x >= 0; x--){
                  content += "<tr>"
                           + "<td>" + result['submitted_at'][x] + "</td>"
                           + "<td>" + result['submitted_by'][x] + "</td>"
                           + "<td>" + result['designation'][x] + "</td>"
                           + "<td>" + result['school'][x] + "</td>"
                           +"</tr>"
               }

               $('#routing-modal-content').html(content);
               $('#routing-modal').modal(focus);
            },
            error: function(xhr, resp, text){
               console.log(xhr, resp, text);
            }
         });
      });

      $('#btn-committe-submit').click(function(){

         console.log($(this).data('id'), $('#input-reviewer-one').val(), $('#input-reviewer-two').val());
         $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/assignReviewCommittee",
            type: "POST",
            data: {
               proposal_id: $(this).data('id'),
               reviewer_one_id: $('#input-reviewer-one').val(),
               reviewer_two_id: $('#input-reviewer-two').val(),
               submitted_by: {{Auth::user()->id}}
            },
            success: function(result){
               console.log(result);
            },
            error: function(xhr, resp, text){
               console.log(xhr, resp, text);
            }
         });
      });
      
      $(".proposal-titles").click(function(){

         //Action Buttons
         if($(this).data('status') == 'Draft'){
            $("#comment_pdf").hide();
            $("#continue_editing").show();
         }else{
            $("#continue_editing").hide();
            $("#comment_pdf").show();
         }

        var proposal_id = $(this).attr('value');
      
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/getProposal",
          type: "POST",
          data: { id: proposal_id},
          success: function(result){
              clearModal();
              reviewProposal(result);
              $('#proposal-modal').modal(focus);
              console.log(result);
          },
          error: function(xhr, resp, text){
              console.log(xhr, resp, text);
          }
        });

      });
      
      function makeArray(data){
          var temp;
      
          temp = data;
          data = [];
          data.push(temp);
      
          return data;
        }
      
        function checkAndMakeArray(data){
          return (Array.isArray(data) === false)? makeArray(data) : data;
        }
      
        function checkAndMakeAllRelatedArray(json, string, type){
          if(type === "Budgetary"){
              if(Array.isArray(json['a-' + string + '-particular']) === false){
                json['a-' + string + '-particular'] = makeArray (json['a-' + string + '-particular']);
                json['a-' + string + '-frequency'] = makeArray (json['a-' + string + '-frequency']);
                json['a-' + string + '-quantity'] = makeArray (json['a-' + string + '-quantity']);
                json['a-' + string + '-amount'] = makeArray (json['a-' + string + '-amount']);
                json['a-' + string + '-subtotal'] = makeArray (json['a-' + string + '-subtotal']);
              }
          }else{
              if(Array.isArray(json['a-' + string + '-date']) === false){
                json['a-' + string + '-date'] = makeArray (json['a-' + string + '-date']);
                json['a-' + string + '-activity'] = makeArray (json['a-' + string + '-activity']);
                json['a-' + string + '-participants'] = makeArray (json['a-' + string + '-participants']);
                json['a-' + string + '-charge'] = makeArray (json['a-' + string + '-charge']);
              }
          }
      
          return json;
        }
      
        function addRowInTable(json, string, type, index){
          if(type === "Budgetary"){
              $('#proposal-modal-' + string).append(
                "<tr><td>" + json['a-' + string + '-particular'][index] + "</td>" +
                "<td>" + json['a-' + string + '-frequency'][index] + "</td>" +
                "<td>" + json['a-' + string + '-quantity'][index] + "</td>" +
                "<td><div class='input-group-text'>₱" + json['a-' + string + '-amount'][index] + "</div></td>" +
                "<td><div class='input-group-text'>₱" + json['a-' + string + '-subtotal'][index] + "</div></td></tr>" 
              );
          }else{
              $('#proposal-modal-' + string).append(
                "<tr><td>" + json['a-' + string + '-date'][index] + "</td>" +
                "<td>" + json['a-' + string + '-activity'][index] + "</td>" +
                "<td>" + json['a-' + string + '-participants'][index] + "</td>" +
                "<td>" + json['a-' + string + '-charge'][index] + "</td></tr>" 
              );
          }
        }
      
        function addAllDataInRow(json, string, type){
          var temp = (type === "Budgetary")? "-particular" : "-date" ;
          var length;
      
          if(json['a-' + string + temp] !== undefined){
              json = checkAndMakeAllRelatedArray(json, string, type);
              length = json['a-' + string + temp].length;
              console.log(string + ' ' + temp + ' ' +  length);
              
              for(var x=0; x < length; x++){
                addRowInTable(json, string, type, x);
              }
          }
      
          return json;
        }
      
        //Review Proposal
        function reviewProposal(proposal){
          var startDate = new Date(proposal.start_date);
          var endDate = new Date(proposal.end_date);
          var json = JSON.parse(proposal.proposal_json_A);
      
          var dateString = "";
          var cesType = (proposal.CES_type === "Program Based")? "Program - Based CES" : "Activity - Based CES";
      
          dateString += getFormattedDate(startDate);
          dateString += " to ";
          dateString += getFormattedDate(endDate);
      
          $('#proposal-modal-title').html(proposal.title);
          $('#proposal-modal-cestype').html(cesType);
          $('#proposal-modal-venue').html(proposal.venue);
          $('#proposal-modal-date').html(dateString);
          $('#proposal-modal-rationale').html(json['a-rationale']);
          $('#proposal-modal-goals').html(json['a-goals']);
          $('#proposal-modal-participants').html(json['a-participants']);
      
          addAllDataInRow(json, "outline", "Outline");
          addAllDataInRow(json, "meals", "Budgetary");
          addAllDataInRow(json, "transportations", "Budgetary");
          addAllDataInRow(json, "materials", "Budgetary");
      
          $('#proposal-modal-grand-total').html("₱ " + json['a-grand-total']);
        }
      
        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
      
        function getFormattedDate(d){
          var ret = "";
          var temp = "";
      
          switch(d.getDate() % 10){
              case 1 : temp = "st";break;
              case 2 : temp = "nd";break;
              case 3 : temp = "rd";break;
              default : temp = "th";
          }
          ret += monthNames[d.getMonth()];
          ret += " " + d.getDate() + temp;
          ret += ", " + d.getFullYear();
      
          return ret;
        }
      
        function clearModal(){
          $('#proposal-modal-outline').html("");
          $('#proposal-modal-meals').html("");
          $('#proposal-modal-transportations').html("");
          $('#proposal-modal-materials').html("");
        }     
   </script>
</div>
@endsection