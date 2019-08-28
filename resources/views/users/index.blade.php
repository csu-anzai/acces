@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Manage individual user accounts.') }}</p>
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
                </div>
                <div class="table-responsive">
                  <table class="table" id="testdatatable">
                    <thead class=" text-success">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Designation') }}
                      </th>
                      <th>
                        {{ __('School') }}
                      </th>
                      <th>
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <?php
                        $designation = DB::table('designations')
                          ->where('id', $user->designation_id)
                          ->first();

                        $school = DB::table('departments')
                          ->join('schools', 'departments.school_id', 'schools.id')
                          ->where('departments.id', $user->department_id)
                          ->first();
                      ?>
                        <tr>
                          <td>
                            {{$user->firstname}} {{$user->lastname}}
                          </td>
                          <td>
                            {{$designation->name}}
                          </td>
                          <td>
                            {{$school->name}}
                          </td>
                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons" style="margin:auto">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
                                  onclick="Swal.fire({
                                            title: 'Are you sure?',
                                            text: 'This user account will be permanently deleted.',
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#5cb85c',
                                            confirmButtonText: 'Delete'
                                            }).then((result) => {
                                              if (result.value) {
                                                Swal.fire(
                                                  'Deleted!',
                                                  'Your file has been deleted.',
                                                  'success'
                                                );                                                
                                                this.parentElement.submit();
                                               }
                                             })
                                    ">
                                      <i class="material-icons" style="margin:auto">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                <i class="material-icons" style="margin:auto">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <a href="{{ route('user.create') }}" class="btn btn-success btn-round btn-lg btn-fab" style="position: fixed; bottom: 10%; right: 4%;" rel="tooltip" data-placement="left" title="Create New User">
                    <i class="material-icons">person_add</i>
                  </a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
<script src="../public/js/dataTables.bootstrap4.min.js"></script>
<!--Datatable function-->
<script>
    $(document).ready(function() {
      $('#testdatatable').DataTable();
    } );
</script>