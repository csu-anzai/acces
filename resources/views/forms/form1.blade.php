@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Proposals')])
@section('content')

<style>
  .number-width-limit{
    width:20%;  
  }
  .table-borderless td,
  .table-borderless th {
    border: 0;
   }
</style>

<div class="content">
   <div class="container-fluid">
      <div class="row" style="margin-top:-3%" id="topPage">
         <div class="card">
            <div class="card-header card-header-tabs card-header-success">
               <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                     <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                           <a class="nav-link active" id="forma" href="#form-a" data-toggle="tab">
                              <h3 class="card-title" style='font-family: "Roboto Black";'><i class="material-icons" style="font-size: 35px">looks_one</i> Form A</h3>
                              <p class="card-category"> {{ __('CES Program/Project/Activity Proposal (Concept Note)') }}</p>
                              <div class="ripple-container"></div>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="formb" href="#form-b" data-toggle="tab">
                              <h3 class="card-title" style='font-family: "Roboto Black";'><i class="material-icons" style="font-size: 35px">looks_two</i> Form B</h3>
                              <p class="card-category"> {{ __('CES Program/Project/Activity Proposal (Details)') }}</p>
                              <div class="ripple-container"></div>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="formreview" href="#form-review" data-toggle="tab" onclick="submitDetails();">
                              <h3 class="card-title" style='font-family: "Roboto Black";'><i class="material-icons" style="font-size: 35px">looks_3</i> Review</h3>
                              <p class="card-category"> {{ __('Review and submit the proposal') }}</p>
                              <div class="ripple-container"></div>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="tab-content">
                  <div class="tab-pane active" id="form-a">
                     <!-- START OF FORM A -->          
                     <form id="a-proposal-form" method="post">      
                     <!-- Basic Information -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>Basic Information</strong></h5>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" style="color:black">{{ __('Title:') }}</label>
                                 <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : ' has-success' }}">
                                       <input class="form-control no-include" name="a-title" id="input-title" type="text" placeholder="{{ __('Name of the Program/Project/Activity') }}" required="true" aria-required="true"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" style="color:black">{{ __('CES Type:') }}</label>
                                 <div class="col-sm-7">
                                    <div class="form-group">
                                       <select name="a-ces-type" id="input-ces-type" class="browser-default custom-select no-include" required>
                                          <option selected value="Program Based">Program Based</option>
                                          <option value="Activity Based">Activity Based</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-2"> 
                                    <label class="col-form-label" style="color:black">{{ __('Inclusive Date:') }}</label>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-group has-success">
                                       <input class="form-control no-include" id='input-start-date' type="date" name="a-start-date" required>
                                       <small>Start of Activity</small>
                                    </div>
                                 </div>
                                 <div class="col-sm-1 mt-3" style="margin-right: -3%">
                                    <p>to</p>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-group has-success">
                                       <input class="form-control no-include" id='input-end-date' type="date" name="a-end-date" required>
                                       <small>End of Activity</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" style="color:black">{{ __('Venue:') }}</label>
                                 <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('venue') ? ' has-danger' : ' has-success' }}">
                                       <input class="form-control no-include" name="a-venue" id="input-venue" type="text" placeholder="{{ __('Where will the activity take place?') }}" value="" required="true" aria-required="true"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Basic Information -->
                     <!-- Rationale and Contextualization -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>I. Rationale and Contextualization</strong></h5>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="form-group has-success">
                                 <textarea id="input-rationale" name="a-rationale" class="md-textarea form-control text-left" rows="9"
                                    placeholder="This portion will serve as the justification for your proposal.&#10;Please provide the following minimum information for the rationale and introduction of your program/project/activity: 
                                    &#10;1. Current condition of the community.&#10;2. Problem/need identified by the unit that you intend to address.&#10;3. Data source as well as the process underwent to generate the data.&#10;4. How will the unit respond to the condition?&#10;What expertise and competencies from the unit or in collaboration with others will be useful to address the identified condition?"
                                    ></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End of Rationale and Contextualization -->
                     <!-- Goals, Objectives, and Outcomes -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>II. Goals, Objectives, and Outcomes</strong></h5>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="form-group has-success">
                                 <textarea id="input-goals" name="a-goals" class="md-textarea form-control" rows="6"
                                    placeholder="This section must enumerate the following items: 
                                    &#10;1. Over-all goal of the proposed program/project/activity.&#10;2. The specific objectives that will be useful in achieving the goal (be sure they are SMART).&#10;3. What are the expected outcomes after implementing the program/project/activity?"
                                    ></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End of Goals, Objectives, and Outcomes -->
                     <!-- Participants, Partners, and Beneficiaries -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>III. Participants, Partners, and Beneficiaries</strong></h5>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="form-group has-success">
                                 <textarea id="input-participants" name="a-participants" class="md-textarea form-control" rows="6"
                                    placeholder="This part must explicitly provide the specific roles/responsibilities or deliverables as well as benefits of the following:&#10;&#10;1. Implementing team from USC/Unit.&#10;2. Internal and external partners.&#10;3. Beneficiaries and/or partner community/organization/institutions."
                                    ></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End of Participants, Partners, and Beneficiaries -->
                     <!-- Outline of Activites -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>IV. Outline of Activites</strong></h5>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table activities_table">
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
                                       <th>
                                          <button class='btn btn-success activities_add'> <span class="material-icons" style="font-size: 25px">add</span> Add Row </button>
                                       </th>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <div class="form-group has-success">
                                                <input id="input-outline-date" type='date' name="a-outline-date" class='form-control'>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="form-group has-success">
                                                <input id="input-outline-activity" type='text' name="a-outline-activity" class='form-control'>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="form-group has-success">
                                                <input id="input-outline-participants" type='number' name="a-outline-participants" min='1' class='form-control'>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="form-group has-success">
                                                <input id="input-outline-charge" type='text' name="a-outline-charge" class='form-control'>
                                             </div>
                                          </td>
                                          <td>                            
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End of Outline of Activities -->
                     <!-- Budgetary Requirements -->
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                 <h5 class="card-title"><strong>V. Budgetary Requirements</strong></h5>
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
                                       <th>
                                       </th>
                                    </thead>
                                    <thead class=" text-primary" style='color:black !important;'>
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
                                       <th> <button class='btn btn-success meals-add'>  <span class="material-icons" style="font-size: 25px">add</span>Add row </button> 
                                       </th>
                                    </thead>
                                    <tbody class="meals-row">
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
                                       <th> <button class='btn btn-success transportations-add'>  <span class="material-icons" style="font-size: 25px">add</span>Add row </button> 
                                       </th>
                                    </thead>
                                    <tbody class="transportations-row">
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
                                       <th> <button class='btn btn-success materials-add'>  <span class="material-icons" style="font-size: 25px">add</span>Add row </button> 
                                       </th>
                                    </thead>
                                    <tbody class="materials-row">
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
                                       <th id="grand-total">
                                       </th>
                                       <th></th>
                                    </thead>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input id="input-grand-total" name="a-grand-total" type="hidden" />
                     
                     <!-- End of Budgetary Requirements -->
                     <button class='btn btn-default float-middle' style="margin-left:40%"  onclick="goTop();">
                        <strong>BACK TO TOP</strong>
                     </button>

                     <button class='btn btn-success float-right' type="button" style="margin-right:2%" id="btnNext">
                        <strong>PROCEED TO FORM B </strong>
                        <span class="material-icons" style="font-size:25px;">chevron_right</span>
                     </button>

                     </form>
                     <!-- END OF FORM A -->
                  </div>
                  <div class="tab-pane" id="form-b">
                  <!-- START OF FORM B -->
                  <form id="b-proposal-form" method="post">
                  <!-- Program/Project/Activity Profile -->
                     <div class="col-md-12">
                     <div class="card">
                        <div class="card-header card-header-success">
                           <h5 class="card-title"><strong>Program/Project/Activity Profile</strong></h5>
                        </div>
                        <div class="card-body">
                           <!-- College/School/Department/Unit Responsible -->
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>A. College/School/Department/Unit Responsible</strong></h5>
                                       <p class="card-category"> {{ __('Please select all that apply.') }}</p>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <!-- dept check buttons table -->
                                    <table class="table">
                                       <tbody>
                                          <tr>
                                             <td style="height:120px;">
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="cesoffice">
                                                   <label class="custom-control-label" for="cesoffice" style="color:#484a49 !important; font:Roboto !important;">CES Office</label>
                                                </div>
                                             </td>
                                             <td>
                                                <!--look here-->
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="sas">
                                                   <label class="custom-control-label" for="sas" style="color:#484a49 !important; font:Roboto !important;">School of Arts and Sciences</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-sas-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 2)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="safad">
                                                   <label class="custom-control-label" for="safad" style="color:#484a49 !important; font:Roboto !important;">School of Architecture, Fine Arts and Design</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-safad-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 1)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td style="height:120px;">
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="sed">
                                                   <label class="custom-control-label" for="sed" style="color:#484a49 !important; font:Roboto !important;">School of Education</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-sed-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 3)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="soe">
                                                   <label class="custom-control-label" for="soe" style="color:#484a49 !important; font:Roboto !important;">School of Engineering</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-soe-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 7)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="sbe">
                                                   <label class="custom-control-label" for="sbe" style="color:#484a49 !important; font:Roboto !important;">School of Business and Economics</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-sbe-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 6)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td style="height:120px;">
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="shcp">
                                                   <label class="custom-control-label" for="shcp" style="color:#484a49 !important; font:Roboto !important;">School of Health Care Profession</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-shcp-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 6)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="slg">
                                                   <label class="custom-control-label" for="slg" style="color:#484a49 !important; font:Roboto !important;">School of Law and Governance</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-slg-department" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Department</option>
                                                      <?php $departments = DB::table('departments')->where('school_id', 5)->get();?>
                                                      @foreach($departments as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input selecttoggle" id="supp">
                                                   <label class="custom-control-label" for="supp" style="color:#484a49 !important; font:Roboto !important;">Support Unit</label>
                                                </div>
                                                <div class="form-group selectdiv">
                                                   <select name="b-supp-unit" class="browser-default custom-select">
                                                      <option disabled selected value="">Select Unit</option>
                                                      <option value="Athletics Office">Athletics Office</option>
                                                      <option value="Campus Ministry, Talamban">Campus Ministry, Talamban</option>
                                                      <option value="Guidance Center">Guidance Center</option>
                                                      <option value="Director of Library">Director of Library</option>
                                                      <option value="OSA Downtown">OSA Downtown</option>
                                                      <option value="OSA Talamban">OSA Talamban</option>
                                                      <option value="Club Mega">Club Mega</option>
                                                      <option value="Pathways">Pathways</option>
                                                      <option value="USC-Supreme Student Council">USC-Supreme Student Council</option>
                                                   </select>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- end of check buttons table -->  
                                 </div>
                              </div>
                           </div>
                           <!-- End of College/School/Department/Unit Responsible -->
                           <!-- Time Frame -->
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>B. Time Frame</strong></h5>
                                       <p class="card-category"> {{ __('Please select all that apply.') }}</p>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <table class="table table-borderless">
                                       <thead>                                          
                                          <tr>
                                             <th>Short Term</th>
                                             <th>Medium Term</th>
                                             <th>Long Term</th>
                                             <th>Others</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem1" name="timeframe">
                                                   <label class="custom-control-label" for="sem1" style="color:#484a49 !important; font:Roboto !important;">1 Semester</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem3" name="timeframe">
                                                   <label class="custom-control-label" for="sem3" style="color:#484a49 !important; font:Roboto !important;">3 Semesters</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem5" name="timeframe">
                                                   <label class="custom-control-label" for="sem5" style="color:#484a49 !important; font:Roboto !important;">5 Semesters</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="timeframe_others" name="timeframe">
                                                   <label class="custom-control-label" for="timeframe_others" style="color:#484a49 !important; font:Roboto !important;" id="countBySemester">Count by Semesters</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem2" name="timeframe">
                                                   <label class="custom-control-label" for="sem2" style="color:#484a49 !important; font:Roboto !important;">2 Semesters</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem4" name="timeframe">
                                                   <label class="custom-control-label" for="sem4" style="color:#484a49 !important; font:Roboto !important;">4 Semesters</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-radio">
                                                   <input type="radio" class="custom-control-input" id="sem6" name="timeframe">
                                                   <label class="custom-control-label" for="sem6" style="color:#484a49 !important; font:Roboto !important;">6 Semesters</label>
                                                </div>
                                             </td>
                                             <td>                                                
                                                <div class="form-group bmd-form-group has-success">
                                                   <input type="number" name="timeframe" class="form-control selectdiv" id="countSemester" placeholder="Value of 7 or above." style="width:60%" min="7">
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <!-- End of Time Frame -->
                           <!-- Locus and Leadership -->
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>C. Locus and Leadership</strong></h5>
                                       <p class="card-category"> {{ __('Please select all that apply.') }}</p>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <!--Locus and leadership table-->
                                    <table class="table">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="undergrad">
                                                   <label class="custom-control-label" for="undergrad" style="color:#484a49 !important; font:Roboto !important;">Course-based (undergraduate)</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="grad">
                                                   <label class="custom-control-label" for="grad" style="color:#484a49 !important; font:Roboto !important;">Course-based (graduate)</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="studorg">
                                                   <label class="custom-control-label" for="studorg" style="color:#484a49 !important; font:Roboto !important;">Student Organization-led</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="deptled">
                                                   <label class="custom-control-label" for="deptled" style="color:#484a49 !important; font:Roboto !important;">Department-led</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="schoolwide">
                                                   <label class="custom-control-label" for="schoolwide" style="color:#484a49 !important; font:Roboto !important;">School-wide</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="alumniled">
                                                   <label class="custom-control-label" for="alumniled" style="color:#484a49 !important; font:Roboto !important;">Alumni-led</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="suppled">
                                                   <label class="custom-control-label" for="suppled" style="color:#484a49 !important; font:Roboto !important;">Support-unit led</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="svdled">
                                                   <label class="custom-control-label" for="svdled" style="color:#484a49 !important; font:Roboto !important;">SVD-Led</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div>
                                                   <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="others">
                                                      <label class="custom-control-label" for="others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                   </div>
                                                   <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!--end of locus and leadership table-->
                                 </div>
                              </div>
                           </div>
                           <!-- End of Locus and Leadership -->
                           <!--D. Nature of the Program/Project/Activity-->
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>D. Nature of the Program/Project/Activity</strong></h5>
                                       <p class="card-category"> {{ __('Please select all that apply.') }}</p>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <!--nature of the program table-->
                                    <table class="table">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="trainingprog">
                                                   <label class="custom-control-label" for="trainingprog" style="color:#484a49 !important; font:Roboto !important;">Training Program (non-degree and non-credited courses offered to the community)</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="commout">
                                                   <label class="custom-control-label" for="commout" style="color:#484a49 !important; font:Roboto !important;">Community Outreach (community-based and charity driven social services)</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="techas">
                                                   <label class="custom-control-label" for="techas" style="color:#484a49 !important; font:Roboto !important;">Technical Assistance (for agencies, organization, civic groups)</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="techtrans">
                                                   <label class="custom-control-label" for="techtrans" style="color:#484a49 !important; font:Roboto !important;">Technology transfer and utilization (process of circulating, promoting and marketing or technologies to potential users)</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="advserv">
                                                   <label class="custom-control-label" for="advserv" style="color:#484a49 !important; font:Roboto !important;">Advisory Services (for agencies, organization, civic groups)</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="infoserv">
                                                   <label class="custom-control-label" for="infoserv" style="color:#484a49 !important; font:Roboto !important;">Information Services (dissemination of knowledge/information through various means)</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div>
                                                   <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="others">
                                                      <label class="custom-control-label" for="others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                   </div>
                                                   <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>
                                                <div>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!--end of nature of the program table-->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                       <h5 class="card-title"><strong>E. Program Area </strong></h5>
                                       <p class="card-category"> {{ __('Please check the appropriate item.') }}</p>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <!-- program area table-->
                                    <table class="table">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="productivity">
                                                   <label class="custom-control-label" for="productivity" style="color:#484a49 !important; font:Roboto !important;">Productivity-Oriented Initiatives</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="healthAdvocacy">
                                                   <label class="custom-control-label" for="healthAdvocacy" style="color:#484a49 !important; font:Roboto !important;">Health Advocacy and Wellness Promotion</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="literacyVal">
                                                   <label class="custom-control-label" for="literacyVal" style="color:#484a49 !important; font:Roboto !important;">Literacy, Values Formation and Life-long Learning</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="buildingChristianCom">
                                                   <label class="custom-control-label" for="buildingChristianCom" style="color:#484a49 !important; font:Roboto !important;">Building Christian Communities</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="socialWelfare">
                                                   <label class="custom-control-label" for="socialWelfare" style="color:#484a49 !important; font:Roboto !important;">Social Welfare Services</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="informationSharing">
                                                   <label class="custom-control-label" for="informationSharing" style="color:#484a49 !important; font:Roboto !important;">Information Sharing</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="environmental">
                                                   <label class="custom-control-label" for="environmental" style="color:#484a49 !important; font:Roboto !important;">Environmental Sustainability</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="heritageConservation">
                                                   <label class="custom-control-label" for="heritageConservation" style="color:#484a49 !important; font:Roboto !important;">Heritage Conservation</label>
                                                </div>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="issue">
                                                   <label class="custom-control-label" for="issue" style="color:#484a49 !important; font:Roboto !important;">Issue Advocacy and Rights Promotion</label>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="ruralandurbandevelopment">
                                                   <label class="custom-control-label" for="ruralandurbandevelopment" style="color:#484a49 !important; font:Roboto !important;">Rural and Urban Development</label>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!--end of nature of the program table-->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                     <!-- End of Program/Project/Activity Profile -->
                     
                  </form>
                  <!-- END OF FORM B -->
                  <button class='btn btn-success' id="btnPrev">
                     <span class="material-icons" style="font-size:25px;">chevron_left</span>
                     <strong> GO BACK TO FORM A</strong>
                  </button>

                  <button class='btn btn-default float-middle' style="margin-left:22%" onclick="goTop();">
                     <strong>BACK TO TOP</strong>
                  </button>

                  <button class='btn btn-success float-right' id="btnReview">
                     <strong>REVIEW DETAILS AND SUBMIT </strong>
                     <span class="material-icons" style="font-size:25px;">chevron_right</span>
                  </button>
               </div>
               <div class="tab-pane" id="form-review">
               <div class="col-md-12">
                     <div class="card">
                        <div class="card-header card-header-success">
                              <h4 class="card-title text-center"><strong>FORM A</strong></h4>
                        </div>
                        <div class="card-body">
                           <!-- Basic Information -->
                           <table class="table">
                              <tbody>
                                 <tr>
                                    <td>Title:</td>
                                    <td><h2><strong id="review-title"></strong></h2></td>
                                 </tr>
                                 <tr>
                                    <td>CES Type:</td>
                                    <td><h3><strong id="review-ces-type"></strong></h3></td>
                                 </tr>
                                 <tr>
                                    <td>Venue:</td>
                                    <td><h4><strong id="review-venue"></strong></h4></td>
                                 </tr>
                                 <tr>
                                    <td>Date:</td>
                                    <td><h4><strong id="review-date"></strong></h4></td>
                                 </tr>
                              </tbody>
                           </table>
                           <!-- Basic Information -->
                           <!-- Rationale and Contextualization -->
                           <div class="card">
                              <div class="card-header card-header-text card-header-success">
                                 <div class="card-text">
                                 <h4 class="card-title">I. Rationale and Contextualization</h4>
                                 </div>
                              </div>
                              <div id="review-rationale" class="card-body">
                              </div>
                           </div>
                           <!-- End of Rationale and Contextualization -->
                           <!-- Goals, Objectives, and Outcomes -->
                           <div class="card">
                              <div class="card-header card-header-text card-header-success">
                                 <div class="card-text">
                                 <h4 class="card-title">II. Goals, Objectives, and Outcomes</h4>
                                 </div>
                              </div>
                              <div id="review-goals" class="card-body">
                               
                              </div>
                           </div>
                           <!-- End of Goals, Objectives, and Outcomes -->
                           <!-- Participants, Partners, and Beneficiaries -->
                           <div class="card">
                              <div class="card-header card-header-text card-header-success">
                                 <div class="card-text">
                                 <h4 class="card-title">III. Participants, Partners and Beneficiaries</h4>
                                 </div>
                              </div>
                              <div id="review-participants" class="card-body">
                                 
                              </div>
                           </div>
                           <!-- End of Participants, Partners, and Beneficiaries -->
                           <!-- Outline of Activites -->
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
                                       <tbody id="review-outline">
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <!-- End of Outline of Activites -->
                           <!-- Budgetary Requirements -->
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
                                       <tbody id="review-meals">
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
                                       <tbody id="review-transportations">
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
                                       <tbody id="review-materials">
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
                                          <th id="review-grand-total">
                                          </th>
                                          <th></th>
                                       </thead>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <!-- End of Budgetary Requirements -->                           
                        </div>
                     </div>
                     <button class='btn btn-success' id="btnB">
                        <span class="material-icons" style="font-size:25px;">chevron_left</span>
                        <strong> GO BACK TO FORM B</strong>
                     </button>

                     <button class='btn btn-default float-middle' style="margin-left:22%" onclick="goTop();">
                        <strong>BACK TO TOP</strong>
                     </button>

                     <button class='btn btn-success float-right' id="btnReview">
                        <strong>SUBMIT PROPOSAL </strong>
                        <span class="material-icons">check</span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Floating Action Buttons -->

      <!--For Debug-->
      <button id="btn-debug" class="btn btn-danger btn-round btn-lg btn-fab" style="position: fixed; bottom: 20%; right: 4%;">
      <i class="material-icons" style="font-size: 35px">bug_report</i>
      </button>

      <button class="btn btn-default btn-round btn-lg btn-fab" style="position: fixed; bottom: 10%; right: 4%;" rel="tooltip" data-placement="left" title="Save as Draft">
      <i class="material-icons" style="font-size: 35px">archive</i>
      </button>
      <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
      <script>
         $('document').ready(function() {
            
            $(".selectdiv").hide();

            $(".selecttoggle").click(function(){
                $(this).parent().next().slideToggle();
            });

            $("input:radio").change(function () {
               if ($("#timeframe_others").is(":checked")) {
                  $("#countSemester").slideDown();
               }
               else {
                  $("#countSemester").slideUp();
               }
            });

          $('button').attr('type', 'button');
          
          
           //function to add new table row
           $('.activities_add').click(function() {
               //long string because having escape characters won't make it work
               $(".activities_table").append("<tr><td><div class='form-group has-success'><input type='date' name='a-outline-date' class='form-control'></div></td>" +
               "<td><div class='form-group has-success'><input type='text' name='a-outline-activity' class='form-control'></div></td>"+
               "<td><div class='form-group has-success'><input type='number' name='a-outline-participants' min='1' class='form-control'></div></td>"+
               "<td><div class='form-group has-success'><input type='text' name='a-outline-charge' class='form-control'></div></td>"+
               "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
           });
           //function to add Meals and Snacks row
           $('.meals-add').click(function() {
               //long string because having escape characters won't make it work
               $(".meals-row").append(
                 "<tr><td><div class='form-group has-success'><input type='text' name='a-meals-particular' class='form-control'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='text' name='a-meals-frequency' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='number' name='a-meals-quantity' min='1' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success input-group-prepend'><div class='input-group-text'>₱</div><input type='number' name='a-meals-amount' min='1' step='.01' class='form-control data-input'></div></td>" +
                 "<td class='data-total'><div class='form-group has-success input-group-prepend'><div class='input-group-text' style='margin-right:5%'>₱</div><input type='text' name='a-meals-subtotal' min='1' readonly class='data-total-input' value='0.00'></div></td>" +
                 "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
           });
         
           //function to add Transportations row
           $('.transportations-add').click(function() {
               //long string because having escape characters won't make it work
               $(".transportations-row").append(
                 "<tr><td><div class='form-group has-success'><input type='text' name='a-transportations-particular' class='form-control'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='text' name='a-transportations-frequency' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='number' name='a-transportations-quantity' min='1' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success input-group-prepend'><div class='input-group-text'>₱</div><input type='number' name='a-transportations-amount' min='1' step='.01' class='form-control data-input'></div></td>" +
                 "<td class='data-total'><div class='form-group has-success input-group-prepend'><div class='input-group-text' style='margin-right:5%'>₱</div><input type='text' name='a-transportations-subtotal' min='1' readonly class='data-total-input' value='0.00'></div></td>" +
                 "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
           });
         
           //function to add Transportations row
           $('.materials-add').click(function() {
               //long string because having escape characters won't make it work
               $(".materials-row").append(
                 "<tr><td><div class='form-group has-success'><input type='text' name='a-materials-particular' class='form-control'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='text' name='a-materials-frequency' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success'><input type='number' name='a-materials-quantity' min='1' class='form-control data-input'></div></td>" +
                 "<td class='data-table'><div class='form-group has-success input-group-prepend'><div class='input-group-text'>₱</div><input type='number' name='a-materials-amount' min='1' step='.01' class='form-control data-input'></div></td>" +
                 "<td class='data-total'><div class='form-group has-success input-group-prepend'><div class='input-group-text' style='margin-right:5%'>₱</div><input type='text' name='a-materials-subtotal' min='1' readonly class='data-total-input' value='0.00'></div></td>" +
                 "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
           });
         });
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];

           //function to submit form
           function submitDetails(){
            var form_A = $("#a-proposal-form [name]");
            var form_B = $("#b-proposal-form");

            var json_A = JSON.stringify(getFormData(form_A));
            var json_B = JSON.stringify(getFormData(form_B));
          
            form_A = $("#a-proposal-form");

            $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "/sendForm",
              type: "POST",
              data: {
                title: $('#input-title').val(), 
                CEStype: $('#input-ces-type').val(), 
                startDate: $('#input-start-date').val(), 
                endDate: $('#input-end-date').val(), 
                venue: $('#input-venue').val(), 
                status: "Draft",
                json_A: json_A,
                json_B: json_B,
                userId: {{ Auth::user()->id}}
              },
              success: function(result){
                 console.log(json_A, json_B);
                var proposal_id = result;
                //Get proposal data when success
                $.ajax({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "/getProposal",
                  type: "POST",
                  data: { id: proposal_id},
                  success: function(result){
                     reviewProposal(result);
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
           }

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
               $('#review-' + string).append(
                  "<tr><td>" + json['a-' + string + '-particular'][index] + "</td>" +
                  "<td>" + json['a-' + string + '-frequency'][index] + "</td>" +
                  "<td>" + json['a-' + string + '-quantity'][index] + "</td>" +
                  "<td><div class='input-group-text'>₱" + json['a-' + string + '-amount'][index] + "</div></td>" +
                  "<td><div class='input-group-text'>₱" + json['a-' + string + '-subtotal'][index] + "</div></td></tr>" 
               );
            }else{
               $('#review-' + string).append(
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

            $('#review-title').html(proposal.title);
            $('#review-ces-type').html(cesType);
            $('#review-venue').html(proposal.venue);
            $('#review-date').html(dateString);
            $('#review-rationale').html(json['a-rationale']);
            $('#review-goals').html(json['a-goals']);
            $('#review-participants').html(json['a-participants']);

            addAllDataInRow(json, "outline", "Outline");
            addAllDataInRow(json, "meals", "Budgetary");
            addAllDataInRow(json, "transportations", "Budgetary");
            addAllDataInRow(json, "materials", "Budgetary");

            $('#review-grand-total').html("₱ " + json['a-grand-total']);
         }

         //Create form data to array
         function getFormData($form){
            var unindexed_array = $form.not('.no-include').serializeArray();
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
               if(indexed_array[n['name']] !== undefined){
                  indexed_array[n['name']] = checkAndMakeArray(indexed_array[n['name']]);
                  indexed_array[n['name']].push(n['value']);
               }else{
                  temp = indexed_array[n['name']] = n['value'];
               }
            });

            return indexed_array;
          }

         function commaSeparateNumber(val){
           while (/(\d+)(\d{3})/.test(val.toString())){
             val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
           }
           return val;
         }
         
         function calcuGrandTotal(){
           var grand = 0;
           var grandString ="";
         
           $('.data-total-input').each(function(){
             grand += parseFloat($(this).val().replace(/\,/g, ''));
           });

           var splitString = grand.toString().split('.');
           var decimal = splitString[1];

           if(decimal === undefined){
            decimal = "00";
           }

           if(decimal.length <= 3){
            decimal = decimal.substring(0,2);
           }
           
           grandString = commaSeparateNumber(splitString[0]) + '.' + decimal;

           $("#input-grand-total").val(grandString);
           $('#grand-total').html('₱ ' + grandString);
         }
         
         //function to delete row containing selected button
         function DeleteRow(o)
         {
           var p = o.parentNode.parentNode;
           p.parentNode.removeChild(p);
           
           calcuGrandTotal();
         }
         
         $(document).on('change', 'input.data-input', function(){
           //Subtotal
           var siblings = $(this).parent().parent().siblings('.data-table');
           var total = $(this).val();
         
           siblings.each(function(){
             total *= $(this).children(':first').children('.data-input').val();
           });
         
           var splitString = total.toString().split('.');
         
           var decimal = splitString[1];
         
           if(decimal === undefined){
             decimal = "00"
           }
         
           $(this).parent().parent().
             siblings('.data-total:first').children(':first')
             .children('.data-total-input').val(commaSeparateNumber(splitString[0]) + '.' + decimal.substring(0,2));     
         
           calcuGrandTotal();
         });

         $('#btnNext').click(function(){
            $('#formb').trigger('click');        
            document.location.href = "#topPage";
         });

         $('#btnB').click(function(){
          submitDetails();
            $('#formb').trigger('click');        
            document.location.href = "#topPage";
         });

         $('#btnPrev').click(function(){
            $('#forma').trigger('click');        
            document.location.href = "#topPage";
         });

         $('#btnReview').click(function(){
            $('#formreview').trigger('click');    
            document.location.href = "#topPage";
         });

         $('#btn-debug').click(function(){
            $('#input-title').val("Planting Tree");
            $('#input-venue').val("University of San Carlos Talamban Campus");
            $('#input-start-date').val("2019-08-22");
            $('#input-end-date').val("2019-08-23");
            $('#input-end-date').val("2019-08-23");
            $('#input-rationale').val("The tutorial service provided to scholars of Umapad Dumpsite and Bankal Jansenville Village cover mathematics, physics and chemistry. This was initiated by SMED as part of their practice teaching program. The program has helped the students of these communities in their studies and wants the program to continue. JPIC-IDC community organizers have requested to have the tutorial service revive since the students specially in the K11 and K12 are having difficulty in the advance course of mathe and science.");
            $('#input-goals').val("To provide tutorial services to students of Umapad Dumpsite and Bankal Jansenville Village to cover mathematics, physics and chemistry.");
            $('#input-participants').val("a. Implementing team from USC/Unit - To provide student volunteers in implementing the tutorial services - To provide faculty volunteers in assisting students in implementing the program. b. Beneficiaries and/or partner community/organization/institution - To closely monitor students in their community are regularly attending the tutorial activities - To provide the venue for the tutorial classes -To cover the cost of providing snacks to their students");
            $('#input-outline-date').val("2019-08-22");
            $('#input-outline-activity').val("Plant Tree");
            $('#input-outline-participants').val(2);
            $('#input-outline-charge').val("Logan");
         });

         function goTop(){
            document.location.href = "#topPage";
         }

      </script>
   </div>
</div>
</div>
@endsection