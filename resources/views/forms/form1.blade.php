@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Proposals')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row" style="margin-top:-3%">

    <!-- Form A -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h3 class="card-title" style='font-family: "Roboto Black";'>Form A</h3>
            <p class="card-category"> {{ __('CES Program/Project/Activity Proposal (Concept Note)') }}</p>
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
                              <input type='number' min='1' class='form-control'>
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
                        B. Transportation
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
          <!-- End of Budgetary Requirements -->
          
          
          <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
          <script>
            $('document').ready(function() {
              //function to hide all the select tags under time frame
              $('.termSelect').hide();

              $('.termToggle').click(function(){
                $('.termSelect').hide();
                $(this).parent().next().children().show();
              });

              //function to add new table row
              $('.activities_add').click(function() {
                  //long string because having escape characters won't make it work
                  $(".activities_table").append("<tr><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td><div class='form-group has-success'><input type='number' min='1' class='form-control'></div></td><td><div class='form-group has-success'><input type='text' class='form-control'></div></td><td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
              });
              //function to add Meals and Snacks row
              $('.meals-add').click(function() {
                  //long string because having escape characters won't make it work
                  $(".meals-row").append(
                    "<tr><td><div class='form-group has-success'><input type='text' class='form-control'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' step='.01' class='form-control data-input'></div></td>" +
                    "<td class='data-total'><div class='form-group has-success'><input type='text' min='1' readonly class='data-total-input'></div></td>" +
                    "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
              });

              //function to add Transportation row
              $('.transportations-add').click(function() {
                  //long string because having escape characters won't make it work
                  $(".transportations-row").append(
                    "<tr><td><div class='form-group has-success'><input type='text' class='form-control'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' step='.01' class='form-control data-input'></div></td>" +
                    "<td class='data-total'><div class='form-group has-success'><input type='text' min='1' readonly class='data-total-input'></div></td>" +
                    "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
              });

              //function to add Transportation row
              $('.materials-add').click(function() {
                  //long string because having escape characters won't make it work
                  $(".materials-row").append(
                    "<tr><td><div class='form-group has-success'><input type='text' class='form-control'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' class='form-control data-input'></div></td>" +
                    "<td class='data-table'><div class='form-group has-success'><input type='number' min='1' step='.01' class='form-control data-input'></div></td>" +
                    "<td class='data-total'><div class='form-group has-success'><input type='text' min='1' readonly class='data-total-input'></div></td>" +
                    "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities_add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
              });
            })
            
            function commaSeparateNumber(val){
              while (/(\d+)(\d{3})/.test(val.toString())){
                val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
              }
              return val;
            }

            function calcuGrandTotal(){
              var grand = 0;

              $('.data-total-input').each(function(){
                grand += parseFloat($(this).val().replace(/\,/g, ''));
              });

              var splitString = grand.toString().split('.');
              var decimal = splitString[1];

              if(decimal === undefined){
                decimal = "00"
              }
              console.log("grandTotal: " + grand);
              $('#grand-total').html(commaSeparateNumber(splitString[0]) + '.' + decimal.substring(0,2));
            }

            //function to delete row containing selected button
            function DeleteRow(o)
            {
              var p = o.parentNode.parentNode;
              p.parentNode.removeChild(p);
              
              calcuGrandTotal();
            }

            $(document).on('keyup', 'input.data-input', function(){
              //Subtotal
              var siblings = $(this).parent().parent().siblings('.data-table');
              var total = $(this).val();

              siblings.each(function(){
                total *= $(this).children(':first').children(':first').val();
              });

              var splitString = total.toString().split('.');

              var decimal = splitString[1];

              if(decimal === undefined){
                decimal = "00"
              }

              $(this).parent().parent().
                siblings('.data-total:first').children(':first')
                .children(':first').val(commaSeparateNumber(splitString[0]) + '.' + decimal.substring(0,2));     

              calcuGrandTotal();
            });

            

            //time frame toggle
            $(document).ready(function(){
              $(".selectdiv").hide();
              $(".selecttoggle").click(function(){
                $(this).parent().next().toggle();
            });
            });

          </script>

          <!-- Floating Action Buttons -->
          <button class="btn btn-success btn-round btn-lg btn-fab" style="position: fixed; bottom: 10%; right: 4%; background-color: grey;" rel="tooltip" data-placement="left" title="Save as Draft">
            <i class="material-icons" style="font-size: 35px">archive</i>
          </button>
        </div>

          </div>
          
        </div>     
      </div>
      

      <!-- Form B -->
      <div class="card">
                <div class="card-header card-header-success">
                <h3 class="card-title" style='font-family: "Roboto Black";'>Form B</h3>
                <p class="card-category"> {{ __('CES Program/Project/Activity Proposal (Details)') }}</p>
                </div>
        <div class="card-body">

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
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cesoffice">
                                        <label class="custom-control-label" for="cesoffice" style="color:#484a49 !important; font:Roboto !important;">CES Office</label>
                                    </div>
                                  </td>
                                  <td><!--look here-->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="sas">
                                        <label class="custom-control-label" for="sas" style="color:#484a49 !important; font:Roboto !important;">School of Arts and Sciences</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="safad">
                                        <label class="custom-control-label" for="safad" style="color:#484a49 !important; font:Roboto !important;">School of Architecture, Fine Arts and Design</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>      
                                </tr>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="sed">
                                        <label class="custom-control-label" for="sed" style="color:#484a49 !important; font:Roboto !important;">School of Education</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="soe">
                                        <label class="custom-control-label" for="soe" style="color:#484a49 !important; font:Roboto !important;">School of Engineering</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="sbe">
                                        <label class="custom-control-label" for="sbe" style="color:#484a49 !important; font:Roboto !important;">School of Business and Economics</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="shcp">
                                        <label class="custom-control-label" for="shcp" style="color:#484a49 !important; font:Roboto !important;">School of Health Care Profession</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="slg">
                                        <label class="custom-control-label" for="slg" style="color:#484a49 !important; font:Roboto !important;">School of Law and Governance</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Department</option>
                                      </select>
                                    </div>
                                  </td>      
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="supp">
                                        <label class="custom-control-label" for="supp" style="color:#484a49 !important; font:Roboto !important;">Support Unit</label>
                                    </div>
                                    <div class="form-group selectdiv">
                                      <select class="browser-default custom-select">
                                        <option selected value="Program Based">Select Unit</option>
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
                            <table class="table">
                              <thead>
                                <tr>
                                  <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="termRadio" class="custom-control-input termToggle" id="shortTerm">
                                        <label class="custom-control-label" for="shortTerm" style="color:#484a49 !important; font:Roboto !important;">Short Term</label>
                                    </div>
                                    <div class="form-group">
                                      <select class="browser-default custom-select termSelect">
                                        <option selected value="Program Based">Select Unit</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="termRadio" class="custom-control-input termToggle" id="mediumTerm">
                                        <label class="custom-control-label" for="mediumTerm" style="color:#484a49 !important; font:Roboto !important;">Medium Term</label>
                                    </div>
                                    <div class="form-group">
                                      <select class="browser-default custom-select termSelect">
                                        <option selected value="Program Based">Select Unit</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="termRadio" class="custom-control-input termToggle" id="longTerm">
                                        <label class="custom-control-label" for="longTerm" style="color:#484a49 !important; font:Roboto !important;">Long Term</label>
                                    </div>
                                    <div class="form-group">
                                      <select class="browser-default custom-select termSelect">
                                        <option selected value="Program Based">Select Unit</option>
                                      </select>
                                    </div>
                                  </td>
                                </tr>                  
                              </thead>
                              <tr>
                                <td>
                                
                                </td>
                              </tr>
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

          <!-- End of Program/Project/Activity Profile -->
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                  <h5 class="card-title"><strong>Significance/Relevance Matrix</strong></h5>
                </div>
                <div class="card-body">
                <!--start of contextual dimension-->
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                <h5 class="card-title"><strong>A. Contextual Dimension: establish responsive is the P/P/A to the local context:</strong></h5>
                                <p class="card-category"> {{ __('Please check the appropriate item.') }}</p>
                              </div>
                            </div> 
                            <div class="card-body">
                              <!--contextual dimension table-->
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input selecttoggle" id="doneassess" name="defaultExampleRadios">
                                        <label class="custom-control-label" for="doneassess" style="color:black !important;">unit has done preliminary needs assessment </label>
                                                                  
                                      </div>

                                      <!--unit has done preliminary needs assessment table--> 
                                      <div class="selectdiv">
                                          <table class="table" style="background-color:white !important">
                                            <thead> 
                                              <tr>
                                                <th class="col-md-12" style="font-size: 100%;">Unit personnel involved in the needs assessment activity:</th>                                   
                                              </tr>                  
                                            </thead>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=facultyuser>
                                                  <label class="custom-control-label" for="facultyuser" style="color:#484a49 !important; font:Roboto !important;">Faculty members</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=studentorg>
                                                  <label class="custom-control-label" for="studentorg" style="color:#484a49 !important; font:Roboto !important;">Student org./majors</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=classinstructor>
                                                  <label class="custom-control-label" for="classinstructor" style="color:#484a49 !important; font:Roboto !important;">Class instructor</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=coursenrollees>
                                                  <label class="custom-control-label" for="coursenrollees" style="color:#484a49 !important; font:Roboto !important;">Course enrollees</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=staff>
                                                  <label class="custom-control-label" for="staff" style="color:#484a49 !important; font:Roboto !important;">Staff</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=studentvolunteers>
                                                  <label class="custom-control-label" for="studentvolunteers" style="color:#484a49 !important; font:Roboto !important;">Student volunteers</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=commorgmembers>
                                                  <label class="custom-control-label" for="commorgmembers" style="color:#484a49 !important; font:Roboto !important;">Community/Org members</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=employedenumerators>
                                                  <label class="custom-control-label" for="employedenumerators" style="color:#484a49 !important; font:Roboto !important;">Employed enumerators</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=employedenumerators>
                                                  <label class="custom-control-label" for="employedenumerators" style="color:#484a49 !important; font:Roboto !important;">Employed enumerators</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="context-others">
                                                      <label class="custom-control-label" for="context-others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                  </div>
                                                  <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                          </table>
                                       <!--end of unit has done preliminary needs assessment table--> 
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
                                      <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input selecttoggle" id="withdata" name="defaultExampleRadios">
                                        <label class="custom-control-label" for="withdata" style="color:black !important;">with existing verifiable data from the field</label>
                                      </div>
                                      <!--with existing verifiable data from the field table-->
                                      <div class="selectdiv">
                                          <table class="table" style="background-color:white !important">
                                            <thead> 
                                              <tr>
                                                <th class="col-md-12">Data source/s:</th>                                   
                                              </tr>                  
                                            </thead>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="researchfacstu">
                                                  <label class="custom-control-label" for="researchfacstu" style="color:#484a49 !important; font:Roboto !important;">Research(faculty/student)</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="provided">
                                                  <label class="custom-control-label" for="provided" style="color:#484a49 !important; font:Roboto !important;">Provided/expressed by the partner</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="thesis">
                                                  <label class="custom-control-label" for="thesis" style="color:#484a49 !important; font:Roboto !important;">Thesis/dissertation</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="recommendedfac">
                                                  <label class="custom-control-label" for="recommendedfac" style="color:#484a49 !important; font:Roboto !important;">Recommended by faculty/student/class</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="cesdatagathering">
                                                  <label class="custom-control-label" for="cesdatagathering" style="color:#484a49 !important; font:Roboto !important;">CES data gathering initiatives</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="fromgov">
                                                  <label class="custom-control-label" for="fromgov" style="color:#484a49 !important; font:Roboto !important;">From Government agency</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="communitymeetings">
                                                  <label class="custom-control-label" for="communitymeetings" style="color:#484a49 !important; font:Roboto !important;">Community meetings</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=employedenumerators>
                                                  <label class="custom-control-label" for="employedenumerators" style="color:#484a49 !important; font:Roboto !important;">Reflection notes/papers</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="secondarysources">
                                                  <label class="custom-control-label" for="secondarysources" style="color:#484a49 !important; font:Roboto !important;">From secondary sources</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="context-others">
                                                      <label class="custom-control-label" for="context-others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                  </div>
                                                  <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <thead>
                                                <th>Tools used to gather data:</th>
                                              </thead>  
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="survey">
                                                  <label class="custom-control-label" for="survey" style="color:#484a49 !important; font:Roboto !important;">Survey/questionnaire</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="exposure">
                                                  <label class="custom-control-label" for="exposure" style="color:#484a49 !important; font:Roboto !important;">Exposure/immersions</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="kiifgds">
                                                  <label class="custom-control-label" for="kiifgds" style="color:#484a49 !important; font:Roboto !important;">KII/FGDs</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="validationsessions">
                                                  <label class="custom-control-label" for="validationsessions" style="color:#484a49 !important; font:Roboto !important;">Validation sessions</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="ocularvisit">
                                                  <label class="custom-control-label" for="ocularvisit" style="color:#484a49 !important; font:Roboto !important;">Ocular visit</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="documentsreview">
                                                  <label class="custom-control-label" for="documentsreview" style="color:#484a49 !important; font:Roboto !important;">Documents review</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="communitymeetings">
                                                  <label class="custom-control-label" for="communitymeetings" style="color:#484a49 !important; font:Roboto !important;">Community meetings</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="context-others">
                                                      <label class="custom-control-label" for="context-others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                  </div>
                                                  <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <thead>
                                                <th>Means employed to verify the data:</th>
                                              </thead>                                             
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="survey">
                                                  <label class="custom-control-label" for="survey" style="color:#484a49 !important; font:Roboto !important;">Survey/questionnaire</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="exposure">
                                                  <label class="custom-control-label" for="exposure" style="color:#484a49 !important; font:Roboto !important;">Exposure/immersions</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="kiifgds">
                                                  <label class="custom-control-label" for="kiifgds" style="color:#484a49 !important; font:Roboto !important;">KII/FGDs</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="validationsessions">
                                                  <label class="custom-control-label" for="validationsessions" style="color:#484a49 !important; font:Roboto !important;">Validation sessions</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="ocularvisit">
                                                  <label class="custom-control-label" for="ocularvisit" style="color:#484a49 !important; font:Roboto !important;">Ocular visit</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="documentsreview">
                                                  <label class="custom-control-label" for="documentsreview" style="color:#484a49 !important; font:Roboto !important;">Documents review</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="communitymeetings">
                                                  <label class="custom-control-label" for="communitymeetings" style="color:#484a49 !important; font:Roboto !important;">Community meetings</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="context-others">
                                                      <label class="custom-control-label" for="context-others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                  </div>
                                                  <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <thead>
                                                <th>Who collected the data:</th>
                                              </thead>  
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="tablefaculty">
                                                  <label class="custom-control-label" for="tablefaculty" style="color:#484a49 !important; font:Roboto !important;">Faculty</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="govagency">
                                                  <label class="custom-control-label" for="govagency" style="color:#484a49 !important; font:Roboto !important;">Government agency</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="undergradstudents">
                                                  <label class="custom-control-label" for="undergradstudents" style="color:#484a49 !important; font:Roboto !important;">Undergraduate students</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="partnercomm">
                                                  <label class="custom-control-label" for="partnercomm" style="color:#484a49 !important; font:Roboto !important;">Partner community/org./institution</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="graduatestudents">
                                                  <label class="custom-control-label" for="graduatestudents" style="color:#484a49 !important; font:Roboto !important;">Graduate students</label>
                                                </div>
                                              </td>
                                              <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id=deloadedresearcher>
                                                  <label class="custom-control-label" for="deloadedresearcher" style="color:#484a49 !important; font:Roboto !important;">Deloaded researcher</label>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                            <td>
                                                <div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="context-others">
                                                      <label class="custom-control-label" for="context-others" style="color:#484a49 !important; font:Roboto !important;">Others</label>  
                                                  </div>
                                                  <div>
                                                      <input class="form-control" id="others-txt" type="text" placeholder="Type Here"/>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>

                                          </table>
                                       <!--end of with existing verifiable data from the field--> 
                                      </div>
                                      
                                    </td>
                                    <td>
                                      <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="withoutdata" name="defaultExampleRadios">
                                        <label class="custom-control-label" for="withoutdata" style="color:black !important;">without data from the field</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>  
                                </tbody>      
                              </table>
                              <!--end of contextual dimension table-->
                            </div> 
                        </div>
                        
                  </div>
                  <!--end of contextual dimension-->
                  <!--productivity dimension-->
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                <h5 class="card-title"><strong>B. Productivity Dimension: please check/tick the appropriate item if the P/P/A involves technology:</strong></h5>
                                <p class="card-category"> {{ __('Please check the appropriate item.') }}</p>
                              </div>
                            </div> 
                            <div class="card-body">
                              <table class="table">                   
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newtech">
                                          <label class="custom-control-label" for="newtech" style="color:#484a49 !important; font:Roboto !important;">Production of new technology</label>
                                      </div>
                                    </td>
                                    <td>   
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="techtransfer">
                                          <label class="custom-control-label" for="techtransfer" style="color:#484a49 !important; font:Roboto !important;">Transfer of existing technology</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="utilexistingtech">
                                          <label class="custom-control-label" for="utilexistingtech" style="color:#484a49 !important; font:Roboto !important;">Utilization of existing technology</label>
                                      </div>
                                    </td>
                                    <td>   
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="refinement">
                                          <label class="custom-control-label" for="refinement" style="color:#484a49 !important; font:Roboto !important;">Refinement/modification of existing technologys</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="training">
                                          <label class="custom-control-label" for="training" style="color:#484a49 !important; font:Roboto !important;">Training or capacity-building for the use of technology</label>
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
                            </div>
                        </div> 
                  </div>
                  <!--end of productivity dimension-->  
                  <!--economic dimension-->
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                <h5 class="card-title"><strong>C. Economic Dimension: please check/tick the appropriate item if the P/P/A has economic implications:</strong></h5>
                                <p class="card-category"> {{ __('Please check the appropriate item.') }}</p>
                              </div>
                            </div> 
                            <div class="card-body">
                              <table class='table'>
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="generationOfLivelihood">
                                          <label class="custom-control-label" for="generationOfLivelihood" style="color:#484a49 !important; font:Roboto !important;">generation of new livelihood projects/opportunities</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="enhancementOfPartners">
                                          <label class="custom-control-label" for="enhancementOfPartners" style="color:#484a49 !important; font:Roboto !important;">enhancement of partner’s current livelihood</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="employabilityOfPartners">
                                          <label class="custom-control-label" for="employabilityOfPartners" style="color:#484a49 !important; font:Roboto !important;">employability of partners at</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="measurableIncrease">
                                          <label class="custom-control-label" for="measurableIncrease" style="color:#484a49 !important; font:Roboto !important;">measurable increase in the income of partners</label>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="otherEconomicDimension">
                                          <label class="custom-control-label" for="otherEconomicDimension" style="color:#484a49 !important; font:Roboto !important;">others</label>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>      
                        </div>
                  <div> 
                  <!--end of economic dimension-->
                               
            </div>
            
          </div>
          <!--social dimension-->
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text card-header-success">
                              <div class="card-text">
                                <h5 class="card-title"><strong>D. Social Dimension:</strong></h5>
                                <p class="card-category"> {{ __('please check/tick the appropriate item if the P/P/A will lead to or benefit: PROVIDE THE ESTIMATED NUMBER OF BENEFICIARIES PER GROUP') }}</p>
                              </div>
                            </div> 
                            <div class="card-body">
                              <table class='table'>
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="households">
                                          <label class="custom-control-label" for="households" style="color:#484a49 !important; font:Roboto !important;">households</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-households" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="youthMale">
                                          <label class="custom-control-label" for="youthMale" style="color:#484a49 !important; font:Roboto !important;">youth (male) [13 to 30 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-youth-male" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="localGov">
                                          <label class="custom-control-label" for="localGov" style="color:#484a49 !important; font:Roboto !important;">Local Government Units</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-LGU" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="youthFemale">
                                          <label class="custom-control-label" for="youthFemale" style="color:#484a49 !important; font:Roboto !important;">youth (female) [13 to 30 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-youth-female" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="organizations">
                                          <label class="custom-control-label" for="organizations" style="color:#484a49 !important; font:Roboto !important;">Organizations/Associations</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-org" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="childrenBoy">
                                          <label class="custom-control-label" for="childrenBoy" style="color:#484a49 !important; font:Roboto !important;">children (boy) [6 to 12 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-children-boy" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="seniorMale">
                                          <label class="custom-control-label" for="seniorMale" style="color:#484a49 !important; font:Roboto !important;">senior citizens (male) [at least 60 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-senior-male" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="childrenGirl">
                                          <label class="custom-control-label" for="childrenGirl" style="color:#484a49 !important; font:Roboto !important;">children (girl) [6 to 12 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-children-girl" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="seniorFemale">
                                          <label class="custom-control-label" for="seniorFemale" style="color:#484a49 !important; font:Roboto !important;">senior citizens (female) [at least 60 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-senior-female" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="infantsBoy">
                                          <label class="custom-control-label" for="infantsBoy" style="color:#484a49 !important; font:Roboto !important;">infants (boy) [0 to 5 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-infants-boy" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="adultsMale">
                                          <label class="custom-control-label" for="adultsMale" style="color:#484a49 !important; font:Roboto !important;">adults (male) [31 to 59 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-adults-male" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="infantsGirl">
                                          <label class="custom-control-label" for="infantsGirl" style="color:#484a49 !important; font:Roboto !important;">infants (girl) [0 to 5 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-infants-girl" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="adultsFemale">
                                          <label class="custom-control-label" for="adultsFemale" style="color:#484a49 !important; font:Roboto !important;">adults (female) [31 to 59 years old]</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-adults-female" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selecttoggle" id="otherSocialDimension">
                                          <label class="custom-control-label" for="otherSocialDimension" style="color:#484a49 !important; font:Roboto !important;">others</label>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-other-social-dimension-name" type="text" placeholder="{{ __('Type here') }}" required="true" aria-required="true"/>
                                      </div>
                                      <div class="form-group selectdiv">
                                        <input class="form-control" name="title" id="input-other-social-dimension-quantity" type="text" placeholder="{{ __('How many?') }}" required="true" aria-required="true"/>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>      
                        </div>
                  <div> 
                  <!--end of social dimension-->
    </div>

    </div>
    <!--environmental dimension-->
      <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                    <h5 class="card-title"><strong>E. Environmental Dimension:</strong></h5>
                    <p class="card-category"> {{ __('the P/P/A addresses the environmental needs of the community') }}</p>
                  </div>
                </div> 
                <div class="card-body">
                  <table class='table'>
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="riverManagement">
                              <label class="custom-control-label" for="riverManagement" style="color:#484a49 !important; font:Roboto !important;">River Management</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="greeningInitiatives">
                              <label class="custom-control-label" for="greeningInitiatives" style="color:#484a49 !important; font:Roboto !important;">Greening Initiatives (e.g. Tree Panting, forestation, etc.)</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="mangrovePlanting">
                              <label class="custom-control-label" for="mangrovePlanting" style="color:#484a49 !important; font:Roboto !important;">Mangrove Planting</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cleanUpDrives">
                              <label class="custom-control-label" for="cleanUpDrives" style="color:#484a49 !important; font:Roboto !important;">Clean-up Drives (coastal, river, drainage, sewage, etc.</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="beautificationActivities">
                              <label class="custom-control-label" for="beautificationActivities" style="color:#484a49 !important; font:Roboto !important;">Beautification Activities</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="otherEnvironmentalDivision">
                              <label class="custom-control-label" for="otherEnvironmentalDivision" style="color:#484a49 !important; font:Roboto !important;">Others</label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>      
            </div>
      <div> 
      <!--end of environmental dimension-->
      </div>
      </div>
      <!--governance dimension-->
      <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                    <h5 class="card-title"><strong>F. Governance Dimension:</strong></h5>
                    <p class="card-category"> {{ __('the program/project/activity will yield:') }}</p>
                  </div>
                </div> 
                <div class="card-body">
                  <table class='table'>
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="networkingWithLGU">
                              <label class="custom-control-label" for="networkingWithLGU" style="color:#484a49 !important; font:Roboto !important;">networking with Local Government Units and community leaders</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="fundingSupportFromLGU">
                              <label class="custom-control-label" for="fundingSupportFromLGU" style="color:#484a49 !important; font:Roboto !important;">funding support from Local Government Units</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="fundingSupportFromOther">
                              <label class="custom-control-label" for="fundingSupportFromOther" style="color:#484a49 !important; font:Roboto !important;">funding support from other partners</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="establishedCounterpartsFromLGU">
                              <label class="custom-control-label" for="establishedCounterpartsFromLGU" style="color:#484a49 !important; font:Roboto !important;">established counterparts from Local Government Units</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="establishedCounterpartsFromOther">
                              <label class="custom-control-label" for="establishedCounterpartsFromOther" style="color:#484a49 !important; font:Roboto !important;">established counterparts from other partners</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="MOAWithLGU">
                              <label class="custom-control-label" for="MOAWithLGU" style="color:#484a49 !important; font:Roboto !important;">Memorandum of Agreement or Memorandum of Understanding with Local Government Units</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="MOAWithOther">
                              <label class="custom-control-label" for="MOAWithOther" style="color:#484a49 !important; font:Roboto !important;">Memorandum of Agreement or Memorandum of Understanding with other partners</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="policyByUSC">
                              <label class="custom-control-label" for="policyByUSC" style="color:#484a49 !important; font:Roboto !important;">policy advocacy by USC faculty/students/staff</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="policyChangeByLGU">
                              <label class="custom-control-label" for="policyChangeByLGU" style="color:#484a49 !important; font:Roboto !important;">policy change initiatives by Local Government Units</label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="otherGovernanceDivision">
                              <label class="custom-control-label" for="otherGovernanceDivision" style="color:#484a49 !important; font:Roboto !important;">Others</label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>      
            </div>
      <div> 
      <!--end of governance dimension-->
      </div>
      </div>
      </div>
      <!-- implications card -->
      <div class="card">
        <div class="card-header card-header-text card-header-success">
          <div class="card-text">
            <h5 class="card-title"><strong>Implications to Work hours, Academic Program, and Research</strong></h5>
            <p class="card-category"> {{ __('The following variables are identified as essentials in order to determine that your program/project/activities are aligned to your unit’s program offerings and research priorities. Please provide the required preliminary data. Also, do take note that these will be verified after the completion of the program/project/activity.') }}</p>
          </div>
        </div> 
        <div class="card-body">
          <!-- practical counts -->
          <div class='card'>
            <div class="card-header card-header-text card-header-success">
              <div class="card-text">
                <h5 class="card-title"><strong>A. Practical Counts:</strong></h5>
                <p class="card-category"> {{ __('please provide below your estimated count per item:') }}</p>
              </div>
            </div> 
            <div class="card-body">
              <table class="table">
                
              </table>
            </div>
          </div>
          <!-- end of practical counts -->

          <!-- human resource -->
          <div class="card">
            <div class="card-header card-header-text card-header-success">
              <div class="card-text">
                <h5 class="card-title"><strong>Human Resource Implications: </strong></h5>
                <p class="card-category"> {{ __('please provide the specifics:') }}</p>
              </div>
            </div>
            <div class="card-body">
              <p style="text-align:center">
                <strong>PREPARATION OF THE PPA</strong>
              </p>
              <table class="table">    
                <tr>
                  <td></td>
                  <td>Faculty Members</td>
                  <td>Students</td>
                </tr>
                <tr>
                  <td>Expertise and/or specialization needed	</td>
                  <td>
                    <textarea class="md-textarea form-control" rows="2"></textarea>
                  </td>
                  <td>
                    <textarea class="md-textarea form-control" rows="2"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>Roles/tasks</td>
                  <td>
                    <textarea class="md-textarea form-control" rows="2"></textarea>
                  </td>
                  <td>
                    <textarea class="md-textarea form-control" rows="2"></textarea>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- end of human resource -->
        </div>
      </div>
      <!-- end of implications card -->
      <!-- linkage profile -->
      <div class="card">
        <div class="card-header card-header-text card-header-success">
          <div class="card-text">
            <h5 class="card-title"><strong>Linkage Profile </strong></h5>
          </div>
        </div>
        <div class="card-body">
          <!-- Nature of Linkage/Partnership: -->
          <div class="card">
            <div class="card-header card-header-text card-header-success">
              <div class="card-text">
                <h5 class="card-title"><strong>Nature of Linkage/Partnership:</strong></h5>
                <p class="card-category"> {{ __('please specify:') }}</p>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <td>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="nature-of-linkage-radio" id="with-MOA">
                      <label class="custom-control-label" style="color:black !important;" for="with-MOA">with Memorandum of Understanding / Memorandum of Agreement</label>                           
                    </div>
                    <div class="">
                      
                    </div>
                  </td>
                  <td>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="nature-of-linkage-radio" id="without-MOA">
                      <label class="custom-control-label" style="color:black !important;" for="without-MOA">without Memorandum of Understanding / Memorandum of Agreement</label>                           
                    </div>
                  </td>
                </tr>
              </table>
              <table class="table">
                <tr>
                  <p><strong> Enumerate the opportunities identified: </strong></p>
                </tr>
                <tr>
                  <textarea class="md-textarea form-control" rows="4"></textarea>
                </tr>
                <tr>
                  <p> <strong> Enumerate the challenges/problems encountered: </strong></p>
                </tr>
                <tr>
                  <textarea class="md-textarea form-control" rows="4"></textarea>
                </tr>
              </table>
            </div>
          </div>
          <!-- end of Nature of Linkage/Partnership: -->
        </div>
      </div>
      <!-- end of linkage profile -->

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
@endsection

