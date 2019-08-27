@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

<style>
  .black-text{
    color:black !important;
  }
</style>
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <!-- form c -->
      <div class="row">
        <div class="card">
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h5>
                <strong> Form C </strong>
              </h5>
            </div>
          </div>
          <div class="card-body">
            <!-- basic information card -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-text card-header-success">
                  <div class="card-text">
                    <h5> 
                      <strong> Basic Information </strong>
                    </h5>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                          <label class="black-text">  Title: </label>
                        </div>
                        <div class="col-sm-7">
                          <div class="form-group has-success">
                            <input type="text" class="form-control" name="c-title" id="c-title" placeholder="Name of the Program/Project/Activity">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2">
                        <label class="black-text"> CES Type: </label>
                      </div>
                      <div class="col-sm-7">
                        <div class="form-group has-success">
                          <select class="form-control" name="c-cestype" id="c-cestype">
                            <option> Program based </option>
                            <option> Activity based </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2">
                        <label class="black-text"> Inclusive date: </label>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group has-success">
                            <input class="form-control no-include" id='input-start-date' type="date" name="a-start-date" required>
                            <small>Start of Activity</small>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <p>to</p>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group has-success">
                            <input class="form-control no-include" id='input-end-date' type="date" name="a-end-date" required>
                            <small>End of Activity</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2">
                        <label class="black-text"> Venue: </label> 
                      </div>
                      <div class="col-sm-7">
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="c-title" id="c-title" placeholder="Where will the activity take place?">
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- end of basic information card -->
            
            <!-- Program/Project/Activity Profile -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Program/Project/Activity Profile </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <!-- Requester card -->
                  <div class="card">
                    <div class="card-header card-header-text card-header-success">
                      <div class="card-text">
                        <h5>
                          <strong> A. Requester </strong>
                        </h5>
                        <p class="card-category"> 
                          (please check/tick the appropriate item and include </br> 
                          the specific name of partner or requester) 
                        </p>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input toggle" id="community" name="community">
                            <label for="community" class="custom-control-label black-text"> Community </label>
                          </div>
                        </div>
                        <div class="col-sm-7 toggle-target">
                          <div class="form-group">
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="community-input" id="community-input" placeholder="Please specify">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input toggle" id="organization" name="organization">
                            <label for="organization" class="custom-control-label black-text"> Organization </label>
                          </div>
                        </div>
                        <div class="col-sm-7 toggle-target">
                          <div class="form-group">
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="organization-input" id="organization-input" placeholder="Please specify">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input toggle" id="institution" name="institution">
                            <label for="institution" class="custom-control-label black-text"> Institution </label>
                          </div>
                        </div>
                        <div class="col-sm-7 toggle-target">
                          <div class="form-group">
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="institution-input" id="institution-input" placeholder="Please specify">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input toggle" id="usc-unit" name="usc-unit">
                            <label for="usc-unit" class="custom-control-label black-text"> Unit/s within USC, please specify </label>
                          </div>
                        </div>
                      </div>
                      <div class="row toggle-target">
                        <table class="table">
                          <tr>
                            <td>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ces-office" name="ces-office">
                                <label for="ces-office" class="custom-control-label black-text"> CES Office </label>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="sas" name="sas">
                                  <label for="sas" class="custom-control-label black-text"> School of Arts and Sciences </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="sas-select" id="sas-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="safad" name="safad">
                                  <label for="safad" class="custom-control-label black-text"> School of Architecture, Fine Arts and Design </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="safad-select" id="safad-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="sed" name="sed">
                                  <label for="sed" class="custom-control-label black-text"> School of Education </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="sed-select" id="sed-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="soe" name="soe">
                                  <label for="soe" class="custom-control-label black-text"> School of Engineering </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="soe-select" id="soe-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="sbe" name="sbe">
                                  <label for="sbe" class="custom-control-label black-text"> School of Business and Economics </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="sbe-select" id="sbe-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="shcp" name="shcp">
                                  <label for="shcp" class="custom-control-label black-text"> School of Health Care Profession </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="shcp-select" id="shcp-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="slg" name="slg">
                                  <label for="slg" class="custom-control-label black-text"> School of Law and Governance </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="slg-select" id="slg-select">
                                  <option> select department </option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input toggle" id="support-unit" name="support-unit">
                                  <label for="support-unit" class="custom-control-label black-text"> Support Unit </label>
                                </div>
                              </div>
                              <div class="form-group has-success toggle-target">
                                <select class="form-control" name="support-unit-select" id="support-unit-select">
                                  <option> select option </option>
                                </select>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                  <!-- end of Requester card -->

                  <!-- Mode of request -->
                  <div class="card">
                    <div class="card-header card-header-text card-header-success">
                      <div class="card-text">
                        <h5>
                          <strong> B. Mode of request </strong>
                        </h5>
                        <p class="card-category">
                          (please check/tick the appropriate item and attach </br>
                          said communication to this proposal)
                        </p>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="letter" name="letter">
                            <label for="letter" class="custom-control-label black-text"> letter </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="email" name="email">
                            <label for="email" class="custom-control-label black-text"> email </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="verbal" name="verbal">
                            <label for="verbal" class="custom-control-label black-text"> verbal </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sms" name="sms">
                            <label for="sms" class="custom-control-label black-text"> SMS </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other-modeofrequest" name="other-modeofrequest">
                            <label for="other-modeofrequest" class="custom-control-label black-text"> Others </label>
                          </div>
                        </div>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="other-request-input" id="other-request-input" placeholder="Please specify">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Mode of request -->

                  <!-- Nature of the Program/Project/Activity -->
                  <div class="card">
                    <div class="card-header card-header-text card-header-success">
                      <div class="card-text">
                        <h5>
                          <strong> C. Nature of the Program/Project/Activity </strong>
                        </h5>
                      </div>
                      <p class="card-category">
                        (please check/tick the appropriate item)
                      </p>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="trainingprogram" name="trainingprogram">
                              <label for="trainingprogram" class="custom-control-label black-text"> 
                                Traning Program <small>(non-degree and non-credited courses offered to the community)</small> 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="communityoutreach" name="communityoutreach">
                              <label for="communityoutreach" class="custom-control-label black-text"> 
                                Community Outreach <small>(community-based and charity driven social services)</small> 
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="technical assistance" name="technical assistance">
                              <label for="technical assistance" class="custom-control-label black-text"> 
                                Technical Assistance <small>(for agencies, organization, civic groups)</small> 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="technologytransfer" name="technologytransfer">
                              <label for="technologytransfer" class="custom-control-label black-text"> 
                                Technology transfer and utilization <small>(process of circulating, promoting and marketing or technologies to potential users)</small> 
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="advisory-services" name="advisory-services">
                              <label for="advisory-services" class="custom-control-label black-text"> 
                                Advisory Services <small>(for agencies, organization, civic groups)</small> 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="other-nature-of-program" name="other-nature-of-program">
                              <label for="other-nature-of-program" class="custom-control-label black-text"> 
                                Others  
                              </label>
                              <div class="form-group has-success">
                                <textarea class="md-textarea form-control" rows="3" placeholder="Please specify"></textarea>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="information-services" name="information-services">
                              <label for="information-services" class="custom-control-label black-text"> 
                                Information Services <small>(dissemination of knowledge/information through various means)</small> 
                              </label>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- End of Nature of the Program/Project/Activity -->

                  <!-- Program Area-->
                  <div class="card">
                    <div class="card-header card-header-text card-header-success">
                      <div class="card-text">
                        <h5>
                        <strong> D. Program Area </strong>
                        </h5>
                      </div>
                      <p class="card-category">
                        (please check/tick the appropriate item)
                      </p>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="product-oriented-initiatives" name="product-oriented-initiatives">
                              <label for="product-oriented-initiatives" class="custom-control-label black-text"> 
                                  Productivity-Oriented Initiatives 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="health-advocacy" name="health-advocacy">
                              <label for="health-advocacy" class="custom-control-label black-text"> 
                                  Health Advocacy and Wellness Promotion
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="literacy" name="literacy">
                              <label for="literacy" class="custom-control-label black-text"> 
                                  Literacy, Values Formation and Life-long Learning 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="building-christian-communities" name="building-christian-communities">
                              <label for="building-christian-communities" class="custom-control-label black-text"> 
                                  Building Christian Communities
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="social-welfare" name="social-welfare">
                              <label for="social-welfare" class="custom-control-label black-text"> 
                                  Social Welfare Services 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="information-sharing" name="information-sharing">
                              <label for="information-sharing" class="custom-control-label black-text"> 
                                  Information Sharing
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="environmental-sustainability" name="environmental-sustainability">
                              <label for="environmental-sustainability" class="custom-control-label black-text"> 
                                  Environmental Sustainability 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="heritage-conservation" name="heritage-conservation">
                              <label for="heritage-conservation" class="custom-control-label black-text"> 
                                  Heritage Conservation
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="issue-advocacy" name="issue-advocacy">
                              <label for="issue-advocacy" class="custom-control-label black-text"> 
                                  Issue Advocacy and Rights Promotion 
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="rural-and-urban" name="rural-and-urban">
                              <label for="rural-and-urban" class="custom-control-label black-text"> 
                                  Rural and Urban Development
                              </label>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- End of Program Area-->

                </div>
              </div>
            </div>
            <!-- end of Program/Project/Activity Profile -->
            
            <!-- Rationale and Contextualization -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Rationale and Contextualization </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <div class="form-group has-success">
                    <textarea class="md-textarea form-control" id="rationale" name="rationale" rows="6" placeholder="Type here"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Rationale and Contextualization -->

            <!-- Goal, Objectives, and Outcomes -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Goal, Objectives, and Outcomes </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <div class="form-group has-success">
                    <textarea class="md-textarea form-control" id="goal" name="goal" rows="6" placeholder="Type here"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Goal, Objectives, and Outcomes -->

            <!--  Participants, Partners and Beneficiaries -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Participants, Partners and Beneficiaries </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <div class="form-group has-success">
                    <textarea class="md-textarea form-control" id="participants" name="participants" rows="6" placeholder="Type here"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of  Participants, Partners and Beneficiaries -->

            <!-- Outline of Activities -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Outline of Activities </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <table class="table activities-table">
                    <thead>
                      <th>
                        <strong> Tentative Date </strong>
                      </th>
                      <th>
                        <strong> Activities	</strong>
                      </th>
                      <th>
                        <strong> Participants Needed </strong>
                      </th>
                      <th>
                        <strong> Person/s In-charge </strong>
                      </th>
                      <th>
                        <button class='btn btn-success activities-add'>  <span class="material-icons" style="font-size: 25px">add</span>Add row</button>
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-group has-success">
                            <input type="date" class="form-control" id="outline-tentative-date" name="outline-tentative-date">
                          </div>
                        </td>
                        <td>
                          <div class="form-group has-success">
                            <input type="text" class="form-control" id="activities" name="activities"> 
                          </div>
                        </td>
                        <td>
                          <div class="form-group has-success">
                            <input type="number" class="form-control" id="participants-needed" name="participants-needed"> 
                          </div>
                        </td>
                        <td>
                          <div class="form-group has-success">
                            <input type="text" class="form-control" id="in-charge" name="in-charge"> 
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End of Outline of Activities -->

            <!-- Budgetary Requirements -->
            <div class="row">
              <div class="card">
                <div class="card-header card-header-success">
                  <h5>
                    <strong> Budgetary Requirements </strong>
                  </h5>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead class="black-text">
                      <th>
                        <strong> Particulars </strong>
                      </th>
                      <th>
                        <strong> Frequency </strong>
                      </th>
                      <th>
                        <strong> Quantity </strong>
                      </th>
                      <th>
                        <strong> Amount </strong> 
                      </th>
                      <th>
                        <strong> Subtotal </strong>
                      </th>
                      <th></th>
                    </thead>
                    <thead class=" text-primary" style='color:black !important;'>
                      <th>
                        A. Meals / Snacks 
                      </th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> 
                        <button class='btn btn-success meals-add'>  
                          <span class="material-icons" style="font-size: 25px">add</span>Add row 
                        </button> 
                      </th>
                    </thead>
                    <tbody class="meals-row">
                    
                    </tbody>
                    <thead class="black-text">
                      <th>
                        B. Transportations
                      </th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> 
                        <button class='btn btn-success transportations-add'>  
                          <span class="material-icons" style="font-size: 25px">add</span>Add row 
                        </button> 
                      </th>
                    </thead>
                    <tbody class="transportations-row">
                    
                    </tbody>
                    <thead class=" text-primary" style='color:black !important;'>
                      <th>
                        C. Materials
                      </th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> 
                        <button class='btn btn-success materials-add'>  
                          <span class="material-icons" style="font-size: 25px">add</span>Add row 
                        </button> 
                      </th>
                    </thead>
                    <tbody class="materials-row">
                    
                    </tbody>
                  </table>    
                </div>
              </div>
            </div>
            <!-- End of Budgetary Requirements-->
          </div>
        </div>
      </div>
      <!-- End of form c-->
    </div>
  </div>
</div>

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    //function to hide all toggle targets
    $('.toggle-target').hide();

    //function to show/hide selected target
    $('.toggle').click(function(){
      if($(this).attr("id")=="usc-unit"){
        $target = $(this).parent().parent().parent().next();
      } else {
        $target = $(this).parent().parent().next();
      }
      $target.slideToggle();
    });

    //function to add new table row
    $('.activities-add').click(function() {
        //long string because having escape characters won't make it work
        $(".activities-table").append("<tr><td><div class='form-group has-success'><input type='date' name='a-outline-date' class='form-control'></div></td>" +
        "<td><div class='form-group has-success'><input type='text' name='a-outline-activity' class='form-control'></div></td>"+
        "<td><div class='form-group has-success'><input type='number' name='a-outline-participants' min='1' class='form-control'></div></td>"+
        "<td><div class='form-group has-success'><input type='text' name='a-outline-charge' class='form-control'></div></td>"+
        "<td> <button class='btn btn-danger btn-fab btn-fab-mini btn-round activities-add' onclick='DeleteRow(this)'> <span class='material-icons' style='font-size: 25px'>remove</span></button></td></tr>");
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
</script>
@endsection

