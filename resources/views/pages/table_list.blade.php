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

      <!-- basic information card -->
      <div class="row">
        <div class="card">
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h3> 
                <strong> Form C </strong>
              </h3>
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
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h3>
                <strong> Program/Project/Activity Profile </strong>
              </h3>
            </div>
          </div>
          <div class="card-body">
            <!-- Requester card -->
            <div class="card">
              <div class="card-header card-header-text card-header-success">
                <div class="card-text">
                  <h3>
                    <strong> A. Requester </strong>
                  </h3>
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
                  <div class="col-sm-7 toggle-target">
                    <div class="form-group">
                      <div class="form-group has-success">
                        <input type="text" class="form-control" name="usc-unit-input" id="usc-unit-input" placeholder="Please specify">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- end of Requester card -->

            <!-- Mode of request -->
            <div class="card">
              <div class="card-header card-header-text card-header-success">
                <div class="card-text">
                  <h3>
                    <strong> B. Mode of request </strong>
                  </h3>
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
                  <h3>
                    <strong> C. Nature of the Program/Project/Activity </strong>
                  </h3>
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
                  <h3>
                  <strong> D. Program Area </strong>
                  </h3>
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
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h3>
              <strong> Rationale and Contextualization </strong>
              </h3>
            </div>
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
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h3>
              <strong> Goal, Objectives, and Outcomes </strong>
              </h3>
            </div>
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
          <div class="card-header card-header-text card-header-success">
            <div class="card-text">
              <h3>
              <strong> Participants, Partners and Beneficiaries </strong>
              </h3>
            </div>
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
      <div class="card">
        <div class="card-header card-header-text card-header-success">
          <div class="card-text">
            <h3>
            <strong> Outline of Activities </strong>
            </h3>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <td>
                <strong> Tentative Date </strong>
              </td>
              <td>
                <strong> Activities	</strong>
              </td>
              <td>
                <strong> Participants Needed </strong>
              </td>
              <td>
                <strong> Person/s In-charge </strong>
              </td>
              <td>

              </td>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
      <!-- End of Outline of Activities -->
      
      <!-- end of form c-->
    </div>
  </div>
</div>

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.toggle-target').hide();

    $('.toggle').click(function(){
      $target = $(this).parent().parent().next();
      $target.slideToggle();
    });
  });
</script>
@endsection

