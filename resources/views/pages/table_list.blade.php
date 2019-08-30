@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row" style="margin-top:-3%">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h3 class="card-title" style='font-weight: 900'>Form A</h3>
            <p class="card-category"> {{ __('CES Program/Project/Activity Proposal') }}</p>
          </div>
        <div class="card-body mt-4">
          <div class="row">
            <label class="col-sm-2 col-form-label" style="color:black">{{ __('Title:') }}</label>
            <div class="col-sm-7">
              <div class="form-group{{ $errors->has('title') ? ' has-danger' : ' has-success' }}">
                <input class="form-control" name="title" id="input-title" type="text" placeholder="{{ __('Name of the Program/Project/Activity') }}" required="true" aria-required="true"/>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label" style="color:black">{{ __('CES Type:') }}</label>
            <div class="col-sm-7">
              <div class="form-group">
                <select name="cestype" class="browser-default custom-select" required>
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
                <input class="form-control" type="date" required>
                <small>Start of Activity</small>
              </div>                         
            </div>
            <div class="col-sm-1 mt-3" style="margin-right: -3%">          
              <p>to</p>                      
            </div>
            <div class="col-sm-2">          
              <div class="form-group has-success">
                <input class="form-control" type="date" required>
                <small>End of Activity</small>
              </div>                         
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label" style="color:black">{{ __('Venue:') }}</label>
            <div class="col-sm-7">
              <div class="form-group{{ $errors->has('venue') ? ' has-danger' : ' has-success' }}">
                <input class="form-control" name="venue" id="input-title" type="text" placeholder="{{ __('Where will the activity take place?') }}" value="" required="true" aria-required="true"/>
              </div>
            </div>
          </div>
          
          <!-- Rationale and Contextualization -->
          <div class="col-md-12">
            <div class="card" style="margin-top: 7%">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                    <h5 class="card-title"><strong>Rationale and Contextualization</strong></h5>
                  </div>
                </div>
                <div class="card-body">
                 <div class="form-group has-success">
                  <textarea id="form1" class="md-textarea form-control text-left" rows="9"
                  placeholder="This portion will serve as the justification for your proposal. Please provide the following minimum information for the rationale and introduction of your program/project/activity: 
                  
                  1. Current condition of the community.
                  2. Problem/need identified by the unit that you intend to address.
                  3. Data source as well as the process underwent to generate the data.
                  4. How will the unit respond to the condition?
                      What expertise and competencies from the unit or in collaboration with others will be useful to address the identified condition?                  
                  "
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
                    <h5 class="card-title"><strong>Goals, Objectives, and Outcomes</strong></h5>
                  </div>
                </div>
                <div class="card-body">
                 <div class="form-group has-success">
                  <textarea id="form1" class="md-textarea form-control" rows="6"
                  placeholder="This section must enumerate the following items: 
                  
                  1. Over-all goal of the proposed program/project/activity.
                  2. The specific objectives that will be useful in achieving the goal (be sure they are SMART).
                  3. What are the expected outcomes after implementing the program/project/activity?
                  "
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
                    <h5 class="card-title"><strong>Participants, Partners, and Beneficiaries</strong></h5>
                  </div>
                </div>
                <div class="card-body">
                 <div class="form-group has-success">
                  <textarea id="form1" class="md-textarea form-control" rows="6"
                  placeholder="This part must explicitly provide the specific roles/responsibilities or deliverables as well as benefits of the following:
                  
                  1. Implementing team from USC/Unit.
                  2. Internal and external partners.
                  3. Beneficiaries and/or partner community/organization/institutions.
                  "
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
                    <h5 class="card-title"><strong>Outline of Activites</strong></h5>
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
                              <input type='text' class='form-control'>
                            </div>
                          </td>
                          <td>
                            <div class="form-group has-success">
                              <input type='text' class='form-control'>
                            </div>
                          </td>
                          <td>
                            <div class="form-group has-success">
                              <input type='text' class='form-control'>
                            </div>
                          </td>
                          <td>
                            <div class="form-group has-success">
                              <input type='text' class='form-control'>
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
                    <h5 class="card-title"><strong>Budgetary Requirements</strong></h5>
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
                    <tbody>
                      <tr>
                        <td> A. Meals and Snacks </td>
                        <td> </td> 
                        <td> </td> 
                        <td> </td>
                        <td> <button class='btn btn-success'>  <span class="material-icons" style="font-size: 25px">add</span>Add row </button> </td>
                      </tr>
                      <tr>
                        <td> B. Transportation </td>
                        <td> </td> 
                        <td> </td> 
                        <td> </td>
                        <td> <button class='btn btn-success'> <span class="material-icons" style="font-size: 25px">add</span> Add row </button> </td>
                      </tr>
                      <tr>
                        <td> C. Materials </td>
                        <td> </td> 
                        <td> </td> 
                        <td> </td>
                        <td> <button class='btn btn-success' > <span class="material-icons" style="font-size: 25px">add</span> Add row </button> </td>
                      </tr>
                      <tr>
                        <td> </td>
                        <td> </td> 
                        <td> </td> 
                        <td> <strong> Grand Total: </strong> </td>
                        <td> </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Budgetary Requirements -->
          
          
          <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
          <script>
            $('document').ready(function() {
              //function to add new table row
              $('.activities_add').click(function() {
                  //long string because having escape characters won't make it work
                  $(".activities_table").append("<tr><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
              });
            })
            
            //function to delete row containing selected button
            function DeleteRow(o) {
            var p = o.parentNode.parentNode;
                p.parentNode.removeChild(p);                
            }
          </script>

          <!-- Floating Action Buttons -->
          <button class="btn btn-round btn-fab btn-danger" style="position: fixed; bottom: 26%; right: 4%;">
            <i class="material-icons" style="font-size: 20px">clear</i>
          </button>
          <button class="btn btn-round btn-fab" style="position: fixed; bottom: 18%; right: 4%; background-color: grey;">
            <i class="material-icons" style="font-size: 20px">archive</i>
          </button>
          <button class="btn btn-round btn-fab btn-success" style="position: fixed; bottom: 10%; right: 4%;">
            <i class="material-icons" style="font-size: 20px">check</i>
          </button>


        </div>

          </div>
          
        </div>     
      </div>
      <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title " style="font-size:40px;">{{ __('Form B') }}</h4>
                  <p class="card-category"> {{ __('Filling Out Form B CES Program/Project/Activity Proposal (Details)') }}</p>
                </div>
        <div class="card-body">
          @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                    <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
          @endif
          
          <!-- start of textareas and other things--> 
          <!-- first navbar -->
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Program/Project/Activity Profile</span> 
              </nav>
                <!-- mini navbar A -->
                <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                    <span class="navbar-brand mb-0 h1">A. College/School/Department/Unit Responsible (please check/tick the appropiate item)</span> 
                  </nav>
                  <!-- dept check buttons table -->
                  <table class="table">                   
                    <tbody>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
                                        <input type="checkbox" class="custom-control-input" id="cesoffice">
                                        <label class="custom-control-label" for="cesoffice" style="color:#484a49 !important; font:Roboto !important;">CES Office</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sas">
                                        <label class="custom-control-label" for="sas" style="color:#484a49 !important; font:Roboto !important;">School of Arts and Sciences</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="safad">
                                        <label class="custom-control-label" for="safad" style="color:#484a49 !important; font:Roboto !important;">School of Architecture, Fine Arts and Design</label>
                                    </div>
                                  </td>      
                                </tr>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
                                        <input type="checkbox" class="custom-control-input" id="sed">
                                        <label class="custom-control-label" for="sed" style="color:#484a49 !important; font:Roboto !important;">School of Education</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="soe">
                                        <label class="custom-control-label" for="soe" style="color:#484a49 !important; font:Roboto !important;">School of Engineering</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sbe">
                                        <label class="custom-control-label" for="safad" style="color:#484a49 !important; font:Roboto !important;">School of Business and Economics</label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
                                        <input type="checkbox" class="custom-control-input" id="sed">
                                        <label class="custom-control-label" for="sed" style="color:#484a49 !important; font:Roboto !important;">School of Education</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="shcp">
                                        <label class="custom-control-label" for="shcp" style="color:#484a49 !important; font:Roboto !important;">School of Health Care Profession</label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="slg">
                                        <label class="custom-control-label" for="slg" style="color:#484a49 !important; font:Roboto !important;">School of Law and Governance</label>
                                    </div>
                                  </td>                                
                                </tr> 
                                <tr>
                                <td>
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
                                        <input type="checkbox" class="custom-control-input" id="supp">
                                        <label class="custom-control-label" for="supp" style="color:#484a49 !important; font:Roboto !important;">Support Unit</label>
                                    </div>
                                  </td>
                                </tr>                            
                              </tbody>
                  </table> 
                  <!-- end of check buttons table -->          
                </div> 
                <!-- end of mini navbar A --> 
                <!-- mini navbar B-->
                <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                  <span class="navbar-brand mb-0 h1">B. Time Frame (please check/tick the appropriate item)</span> 
                  </nav>
                  <!-- timeframe radio buttons table -->
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-radio" style="margin:10px;">
                            <input type="radio" class="custom-control-input" id="shortterm" name="defaultExampleRadios">
                            <label class="custom-control-label" for="shortterm" style="color:black !important;">Short Term</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="medterm" name="defaultExampleRadios">
                            <label class="custom-control-label" for="medterm" style="color:black !important;">Medium Term</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="longterm" name="defaultExampleRadios">
                            <label class="custom-control-label" for="longterm" style="color:black !important;">Long Term</label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- end of timeframe radio buttons table -->  
                </div>
                <!-- end of mini navbar B --> 
                <!-- mini navbar C-->
                <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                  <span class="navbar-brand mb-0 h1">C. Locus and Leadership (please check/tick the appropriate item)</span>
                  </nav>
                  <!-- leadership buttons table goes here-->
                  <table class="table">                   
                    <tbody>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
                                        <input type="checkbox" class="custom-control-input" id="undergrad">
                                        <label class="custom-control-label" for="grad" style="color:#484a49 !important; font:Roboto !important;">Course-based (undergraduate)</label>
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
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
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
                                    <div class="custom-control custom-checkbox" style="margin:10px;">
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
                                    <div style="padding: 3px 0;">
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
                  <!-- end of leadership buttons table-->  
                </div>
                <!-- end of mini navbar C -->
                <!-- mini navbar D--> 
                <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                  <span class="navbar-brand mb-0 h1">D. Nature of the Program/Project/Activity (please check/tick the appropriate item) </span>
                  </nav>
                  <!--nature of program table-->
                  <table class="table">                   
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                            <input type="checkbox" class="custom-control-input" id="trainingprog">
                              <label class="custom-control-label" for="trainingprog" style="color:#484a49 !important; font:Roboto !important;">Training Program (non-degree and non-credited courses offered to the community)</label>
                          </div>
                        </td>
                        <td>   
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                              <input type="checkbox" class="custom-control-input" id="commout">
                              <label class="custom-control-label" for="commout" style="color:#484a49 !important; font:Roboto !important;">Community Outreach (community-based and charity driven social services)</label>
                          </div>
                        </td>
                      </tr>
                      <tr>  
                        <td>
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                            <input type="checkbox" class="custom-control-input" id="techas">
                              <label class="custom-control-label" for="techas" style="color:#484a49 !important; font:Roboto !important;">Technical Assistance (for agencies, organization, civic groups)</label>
                          </div>
                        </td>
                        <td>   
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                              <input type="checkbox" class="custom-control-input" id="techtrans">
                              <label class="custom-control-label" for="techtrans" style="color:#484a49 !important; font:Roboto !important;">Technology transfer and utilization (process of circulating, promoting and marketing or technologies to potential users)</label>
                          </div>
                        </td>
                      </tr>
                      <tr>  
                        <td>
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                            <input type="checkbox" class="custom-control-input" id="advserv">
                              <label class="custom-control-label" for="advserv" style="color:#484a49 !important; font:Roboto !important;">Advisory Services (for agencies, organization, civic groups)</label>
                          </div>
                        </td>
                        <td>   
                          <div class="custom-control custom-checkbox" style="margin:10px;">
                              <input type="checkbox" class="custom-control-input" id="infoserv">
                              <label class="custom-control-label" for="infoserv" style="color:#484a49 !important; font:Roboto !important;">Information Services (dissemination of knowledge/information through various means)</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div style="padding: 3px 0; margin:10px;">
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
                  <!-- nature of program table-->  
                </div>  
                <!-- end of mini navbar D -->
                <!-- mini navbar E-->
                <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                  <span class="navbar-brand mb-0 h1">E. Program Area (please check/tick the appropriate item) </span>
                  </nav>               
                <!--program area table-->
                  <table class="table">                   
                      <tbody>
                        <tr>
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="prodor">
                                  <label class="custom-control-label" for="prodor" style="color:#484a49 !important; font:Roboto !important;">Productivity-Oriented Initiatives</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="health">
                                  <label class="custom-control-label" for="healthadv" style="color:#484a49 !important; font:Roboto !important;">Health Advocacy and Wellness Promotion</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="litval">
                                  <label class="custom-control-label" for="litval" style="color:#484a49 !important; font:Roboto !important;">Literacy, Values Formation and Life-long Learning</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="buildchrist">
                                  <label class="custom-control-label" for="buildchrist" style="color:#484a49 !important; font:Roboto !important;">Building Christian Communities</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="socialwelf">
                                  <label class="custom-control-label" for="socialwelf" style="color:#484a49 !important; font:Roboto !important;">Social Welfare Services</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="infoshare">
                                  <label class="custom-control-label" for="infoshare" style="color:#484a49 !important; font:Roboto !important;">Information Sharing</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="envsus">
                                  <label class="custom-control-label" for="envsus" style="color:#484a49 !important; font:Roboto !important;">Environmental Sustainability</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="heritage">
                                  <label class="custom-control-label" for="heritage" style="color:#484a49 !important; font:Roboto !important;">Heritage Conservation</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="issueadv">
                                  <label class="custom-control-label" for="issueadv" style="color:#484a49 !important; font:Roboto !important;">Issue Advocacy and Rights Promotion</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="rudev">
                                  <label class="custom-control-label" for="rudev" style="color:#484a49 !important; font:Roboto !important;">Rural and Urban Development</label>
                              </div>
                            </td>
                          </tr>
                      </tbody>
                  </table>
                  <!--end of program area table-->  
                </div>
                <!-- end of mini navbar E -->
                </div>
            </div><!--untouchable div-->         
          <!-- end of first navbar -->
          <!-- start of second navbar -->
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Significance/Relevance Matrix</span>
              </nav>
              <!-- mini navbar A (add dropdown here later) -->
              <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                    <span class="navbar-brand mb-0 h1">A. Contextual Dimension: establish responsive is the P/P/A to the local context</span> 
                  </nav>
                  <!--contextual dimension table-->
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-radio" style="margin:10px;">
                            <input type="radio" class="custom-control-input" id="doneassess" name="defaultExampleRadios">
                            <label class="custom-control-label" for="doneassess" style="color:black !important;">unit has done preliminary needs assessment </label>                           
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="notdoneassess" name="defaultExampleRadios">
                            <label class="custom-control-label" for="notdoneassess" style="color:black !important;">unit has not done preliminary needs assessment</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-radio" style="margin:10px;">
                            <input type="radio" class="custom-control-input" id="withdata" name="defaultExampleRadios">
                            <label class="custom-control-label" for="withdata" style="color:black !important;">with existing verifiable data from the field</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="withoutdata" name="defaultExampleRadios">
                            <label class="custom-control-label" for="withoutdata" style="color:black !important;">without data from the field</label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--contextual dimension table-->
              </div> 
              <!-- end of mini navbar A (add dropdown here later) -->
              <!-- mini navbar B (add dropdown here later) -->  
              <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                    <span class="navbar-brand mb-0 h1">B. Productivity Dimension: please check/tick the appropriate item if the P/P/A involves technology:</span> 
                  </nav>
                  <!--Productivity Dimension table-->
                  <table class="table">                   
                      <tbody>
                        <tr>
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="prodor">
                                  <label class="custom-control-label" for="prodor" style="color:#484a49 !important; font:Roboto !important;">Production of new technology</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="health">
                                  <label class="custom-control-label" for="healthadv" style="color:#484a49 !important; font:Roboto !important;">Transfer of existing technology</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="litval">
                                  <label class="custom-control-label" for="litval" style="color:#484a49 !important; font:Roboto !important;">Utilization of existing technology</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="buildchrist">
                                  <label class="custom-control-label" for="buildchrist" style="color:#484a49 !important; font:Roboto !important;">Refinement/modification of existing technology</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="socialwelf">
                                  <label class="custom-control-label" for="socialwelf" style="color:#484a49 !important; font:Roboto !important;">Training or capacity-building for the use of Technology</label>
                              </div>
                            </td>
                            <td>   
                              <div style="margin:10px;">
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
                  <!--end of program area table-->
              </div>
              <!--end of mini navbar B-->
              <!--mini navbar C-->
              <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                    <span class="navbar-brand mb-0 h1">C. Economic Dimension: please check/tick the appropriate item if the P/P/A has economic implications:</span> 
                  </nav> 
                  <!--economic dimension table-->
                  <table class="table">                   
                      <tbody>
                        <tr>
                            <td>
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                <input type="checkbox" class="custom-control-input" id="gen">
                                  <label class="custom-control-label" for="gen" style="color:#484a49 !important; font:Roboto !important;">Generation of new livelihood projects/opportunities</label>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="enhancement">
                                  <label class="custom-control-label" for="enhancement" style="color:#484a49 !important; font:Roboto !important;">Enhancement of partner’s current livelihood</label>
                              </div>
                            </td>
                          </tr>
                          <tr>  
                            <td>
                              <div style="margin:10px;">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="employability">
                                    <label class="custom-control-label" for="employability" style="color:#484a49 !important; font:Roboto !important;">Employability of partners at:</label>
                                </div>
                                <div>
                                  <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                </div>
                              </div>
                            </td>
                            <td>   
                              <div class="custom-control custom-checkbox" style="margin:10px;">
                                  <input type="checkbox" class="custom-control-input" id="measurable">
                                  <label class="custom-control-label" for="measureble" style="color:#484a49 !important; font:Roboto !important;">Measurable increase in the income of partnersy</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>   
                              <div style="margin:10px;">
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
                  <!--end of economic dimension table-->
              </div>
              <!--end of mini navbar C-->
              <!--mini navbar D-->
              <div style="width:95%; margin:auto;">
                  <nav class="navbar navbar-light" style="background-color: #dfede3 !important; margin:auto;">
                    <span class="navbar-brand mb-0 h1">D. Social Dimension: please check/tick the appropriate item if the P/P/A will lead to or benefit: PROVIDE THE ESTIMATED NUMBER OF BENEFICIARIES PER GROUP</span>                    
                  </nav>
                  <!--social dimension table-->
                  <table class="table">
                  <thead class="text-primary" style="color:black !important;">
                    <th style="text-align:center;width:100% !important;">
                      The P/P/A will benefit:     <!--NEEDS FIXING-->
                    </th>
                   </thead>
                   <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox" style="margin:10px;">
                          <input type="checkbox" class="custom-control-input" id="households">
                          <label class="custom-control-label" for="households" style="color:#484a49 !important; font:Roboto !important;">households</label>
                        </div>
                      </td>
                      <td>   
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="maleyouth">
                          <label class="custom-control-label" for="maleyouth" style="color:#484a49 !important; font:Roboto !important;">youth (male) [13 to 30 years old]</label>
                        </div>
                      </td>
                    </tr>
                   </tbody>
               </table>
              </div>
              <!--end of mini navbar D-->            


            </div><!--untouchable div--> 
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Participants, Partners and Beneficiaries</span>
              </nav>
            </div>
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Implications to Work hours, Academic Program, and Research</span>
              </nav>
            </div>
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Linkage Profile</span>
              </nav>
                  
            </div>
          </div>
    </div>
  </div>
          </div>
</div>
@endsection

