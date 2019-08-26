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
                    <strong> Mode of request </strong>
                  </h3>
                  <p class="card-category">
                    (please check/tick the appropriate item and attach </br>
                    said communication to this proposal)
                  </p>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  
                </div>
              </div>
            </div>
            <!-- End of Mode of request -->
          </div>
        </div>
      </div>
      <!-- end of Program/Project/Activity Profile -->
      
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

