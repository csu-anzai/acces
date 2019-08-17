@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title " style="font-size:40px;">{{ __('Form A') }}</h4>
                  <p class="card-category"> {{ __('Filling Out Form A: CES Program/Project/Activity Proposal') }}</p>
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
          <div class="row">
                  <label class="col-sm-2 col-form-label" style="color:black">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control" name="title" id="input-title" type="text" placeholder="{{ __('Name of the Program/Project/Activity') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
          </div>
          <div class="row">
                  <label class="col-sm-2 col-form-label" style="color:black">{{ __('CES Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group" name="cestype" required>
                      <select class="form-control" name="CES Type" required>
                        <option disabled selected value="">CES Type</option>
                        <option value="Program Based">Program Based</option>
                        <option value="Program Based">Activity Based</option>                       
                      </select>
                    </div>
                  </div>
          </div>
          <div class="row">
                  <label class="col-sm-2 col-form-label" style="color:black">{{ __('Inclusive Date') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group row">
                      <input class="form-control col-sm-5" type="date" placeholder="from" required>
                      <p style="width:20px"></p>
                      <p style="font-size:20px">to</p>        
                      <p style="width:20px"></p>
                      <input class="form-control col-sm-5" type="date" required>
                    </div>
                  </div>
          </div>
          <div class="row">
                  <label class="col-sm-2 col-form-label" style="color:black">{{ __('Venue') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('venue') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control" name="title" id="input-title" type="text" placeholder="{{ __('Where will the activity take place?') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
          </div>
          <!-- start of textareas and other things--> 
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Rationale and Contextualization</span> 
              </nav>
            </div>
            <div class="md-form">
                <textarea id="form1" class="md-textarea form-control" rows="6"></textarea>
                <label for="form1">Type here</label>
            </div>
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Goal, Objectives, and Outcomes</span>
              </nav>
            </div>
            <div class="md-form">
                <textarea id="form2" class="md-textarea form-control" rows="6"></textarea>
                <label for="form2">Type here</label>
            </div>
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Participants, Partners and Beneficiaries</span>
              </nav>
            </div>
            <div class="md-form">
                <textarea id="form3" class="md-textarea form-control" rows="6"></textarea>
                <label for="form3">Type here</label>
            </div>
          </div>
          <div> 
            <!-- outline of activities -->
            <!-- place code here -->
                    <div class="card">
                      <div class="navbar navbar-light" style="background-color: #dfede3 !important;">
                        <h4 class="navbar-brand mb-0 h1">Outline of Activities</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary" style='color:black !important;'>
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
                                <button class='btn btn-success'>  Add row </button>
                              </th>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <input type='text' class='form-control'>
                                </td>
                                <td>
                                  <input type='text' class='form-control'>
                                </td>
                                <td>
                                  <input type='text' class='form-control'>
                                </td>
                                <td>
                                  <input type='text' class='form-control'>
                                </td>
                                <td class="text-primary">
                                  
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- end of table -->
          </div>
          <div> 
            <!-- Budgetary requirements -->
            <!-- place code here -->
            <div class="card">
                      <div class="navbar navbar-light" style="background-color: #dfede3 !important;">
                        <h4 class="navbar-brand mb-0 h1">Budgetary Requirements</h4>
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
                                <td> <button class='btn btn-success'> Add row </button> </td>
                              </tr>
                              <tr>
                                <td> B. Transportation </td>
                                <td> </td> 
                                <td> </td> 
                                <td> </td>
                                <td> <button class='btn btn-success'> Add row </button> </td>
                              </tr>
                              <tr>
                                <td> C. Materials </td>
                                <td> </td> 
                                <td> </td> 
                                <td> </td>
                                <td> <button class='btn btn-success' > Add row </button> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- end of table -->
          </div>
          
        </div>
        <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
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
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Program/Project/Activity Profile</span> 
              </nav>
              
            </div>
          </div>
          <div> 
            <div>
              <nav class="navbar navbar-light" style="background-color: #dfede3 !important;">
                <span class="navbar-brand mb-0 h1">Significance/Relevance Matrix</span>
              </nav>
            </div>
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

