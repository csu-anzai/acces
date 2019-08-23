@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Proposals')])

@section('content')

<?php
  $proposals = DB::table('proposals')
    ->where('user_id', Auth::user()->id)
    ->get();
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
                  <li class="nav-item">
                    <a class="nav-link active" href="#profile" data-toggle="tab">
                      <i class="material-icons">assignment</i> My Proposals
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#messages" data-toggle="tab">
                      <i class="material-icons">assignment_late</i> For Review
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="tab">
                      <i class="material-icons">assignment_ind</i> Recommendation
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
                <table class="table" id="proposal_table">
                  <thead>
                    <th><strong>#</strong></th>
                    <th><strong>Title of Project/Program/Activity Proposal</strong></th>
                    <th><strong>Date Created</strong></th>
                    <th><strong>Remarks</strong></th>
                  </thead>
                  <tbody>
                  @foreach($proposals as $proposal)
                    <tr>
                      <td>{{$proposal->id}}</td>
                      <td><a href="#" value="{{$proposal->id}}" class="proposal-titles" style="color:forestgreen">{{$proposal->title}}</a></td>
                      <td>Date here</td>
                      <td>Approved?</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="messages">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                      </td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-success btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td>Sign contract for "What are conference organizers afraid of?"</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-success btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="settings">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-success btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                      </td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-success btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td>Sign contract for "What are conference organizers afraid of?"</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-success btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <button class="btn btn-success btn-round btn-lg btn-fab" style="position: fixed; bottom: 10%; right: 4%;"  data-toggle="modal" data-target="#formModal" rel="tooltip" data-placement="left" title="Create New Proposal">
                <i class="material-icons" style="font-size: 35px">add</i>
              </button>
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
                <h3 style='font-family: "Roboto Black"; margin-top: -3%'><strong>Create Proposal</strong></h3>
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
                <small>b. <strong>Submitted Within the Academic Year</strong>: <div class="text-danger">Deadlines only apply to items I, II, III and not for Special Projects</div></small>
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
              <div class="col-md-12">
                <h3 style='font-family: "Roboto Black";'><strong id="proposal-modal-title"></strong></h3>
                <h4 id="proposal-modal-cestype"></h4>
                <h4 style="margin-top:3%" id="proposal-modal-venue"></h4>
                <h4 id="proposal-modal-date"></h4>
              </div>
              <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                      <h5 class="card-title"><strong>I. Rationale and Contextualization</strong></h5>
                  </div>
                </div>
                <div class="card-body" style="margin-top:3%">
                  asdsadsadsadsadsadsad
                </div>
              </div>  
              <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                      <h5 class="card-title"><strong>II. Goal, Objectives, and Outcomes</strong></h5>
                  </div>
                </div>
                <div class="card-body" style="margin-top:3%">
                  asdsadsadsadsadsadsad
                </div>
              </div>   
              <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                      <h5 class="card-title"><strong>III. Participants, Partners and Beneficiaries</strong></h5>
                  </div>
                </div>
                <div class="card-body" style="margin-top:3%">
                  asdsadsadsadsadsadsad
                </div>
              </div>             
            </div>
  
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script>

$(".proposal-titles").click(function(){

  var proposal_id = $(this).attr('value')  

  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/getProposal",
    type: "POST",
    data: { id: proposal_id},
    success: function(result){
        reviewProposal(result);
        $('#proposal-modal').modal(focus);
        console.log(result);
    },
    error: function(xhr, resp, text){
        console.log(xhr, resp, text);
    }
  });

  //Review Proposal
  function reviewProposal(proposal){
    var startDate = new Date(proposal.start_date);
    var endDate = new Date(proposal.end_date);

    var dateString = "";
    var cesType = (proposal.CES_type === "Program Based")? "Program - Based CES" : "Activity - Based CES";

    dateString += "<strong>";
    dateString += getFormattedDate(startDate);
    dateString += "</strong> to <strong>";
    dateString += getFormattedDate(endDate);
    dateString += "</strong>";

    $('#proposal-modal-title').html(proposal.title);
    $('#proposal-modal-cestype').html(cesType);
    $('#proposal-modal-venue').html(proposal.venue);
    $('#proposal-modal-date').html(dateString);
    
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



});





// $(document).ready(function() {
//     $('#proposal_table').DataTable();
// } );
</script>

    <!-- End of Modal Area -->
    </div>
    @endsection

