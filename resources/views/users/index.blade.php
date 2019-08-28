@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<style>
   div.dataTables_filter input {
   border: 1px solid #ccc;
   background-color: white;
   background-position: 10px 10px; 
   background-repeat: no-repeat;
   padding: 12px 25px 12px 5px;
   }
   .pagination > li > a, .pagination > li > span{
   background-color: white !important;
   color: black !important;
   }
   .pagination > li.active > a, .pagination > li.active > span{
   background-color: #28a745 !important;
   color: white !important;
   }
   .avatar {
   width: 2.75rem;
   height: 2.75rem;
   line-height: 3rem;
   border-radius: 50%;
   display: inline-block;
   background: transparent;
   position: relative;
   text-align: center;
   color: #868e96;
   font-weight: 700;
   vertical-align: bottom;
   font-size: 1rem;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   .avatar-sm {
   width: 2.5rem;
   height: 2.5rem;
   font-size: 0.83333rem;
   line-height: 1.5;
   }
   .avatar-img {
   width: 100%;
   height: 100%;
   -o-object-fit: cover;
   object-fit: cover;
   }
   .avatar-green {
   background-color: #e8f2e6;
   color: #28a745;
   }
</style>
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
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-12">
                           <table id="example" class="table table-hover">
                              <thead>
                                 <tr>
                                    <th>
                                       <div style="padding:9px 0">Name</div>
                                    </th>
                                    <th>Phone Number</th>
                                    <th>Designation</th>
                                    <th>Office/School</th>
                                    <th class="text-right"></th>
                                 </tr>
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
                                       <div class="d-flex align-items-center">
                                          <div class="avatar avatar-green mr-3">{{$user->firstname[0]}}{{$user->lastname[0]}}</div>
                                          <div>
                                             <p class="font-weight-bold mb-0">{{$user->firstname}} {{$user->lastname}}</p>
                                             <small class="text-muted mb-0">{{$user->email}}</small>
                                          </div>
                                       </div>
                                    </td>
                                    <td><small>{{$user->contact}}</small>
                                    </td>
                                    <td>
                                       {{$designation->name}}
                                    </td>
                                    <td>
                                       @if($school->name == "School of Architecture, Fine Arts and Design")
                                       <div class="badge badge-danger badge-danger-alt">{{$school->name}}</div>
                                       @elseif($school->name == "School of Arts and Sciences")    
                                       <div class="badge badge-primary badge-primary-alt">{{$school->name}}</div>
                                       @elseif($school->name == "School of Education")    
                                       <div class="badge badge-info badge-info-alt">{{$school->name}}</div>
                                       @elseif($school->name == "School of Health Care Professions")    
                                       <div class="badge badge-primary badge-primary-alt" style="background-color:purple !important">{{$school->name}}</div>
                                       @elseif($school->name == "School of Law and Governance")    
                                       <div class="badge badge-secondary badge-secondary-alt">{{$school->name}}</div>
                                       @elseif($school->name == "School of Business and Economics")    
                                       <div class="badge badge-success badge-success-alt" style="background-color:forestgreen !important">{{$school->name}}</div>
                                       @elseif($school->name == "School of Engineering")    
                                       <div class="badge badge-warning badge-warning-alt">{{$school->name}}</div>
                                       @elseif($school->name == "Extra-Curricular")    
                                       <div class="badge badge-light badge-light-alt">{{$school->name}}</div>
                                       @elseif($school->name == "CES Office")    
                                       <div class="badge badge-success badge-success-alt">{{$school->name}}</div>
                                       @elseif($school->name == "Support Unit")    
                                       <div class="badge badge-dark badge-dark-alt">{{$school->name}}</div>
                                       @endif                      
                                    </td>
                                    <td class="td-actions text-right">
                                       @if ($user->id != auth()->id())
                                       <form action="{{ route('user.destroy', $user) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                             <i class="material-icons">edit</i>
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
                                             this.parentElement.submit();
                                             }
                                             })
                                             ">
                                             <i class="material-icons">close</i>
                                             <div class="ripple-container"></div>
                                          </button>
                                       </form>
                                       @else
                                       <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                          <i class="material-icons">edit</i>
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
   </div>
</div>
@endsection
<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
<!--Datatable function-->
<script>
   $(document).ready(function() {
   $("#example").DataTable({
   "language": {
   "lengthMenu": '<div class="mt-3">Display <select class="custom-select" style="height:23px; padding-top:0px; padding-bottom:0px">'+
     '<option value="5">5</option>'+
     '<option value="10">10</option>'+
     '<option value="20">20</option>'+
     '<option value="30">30</option>'+
     '<option value="40">40</option>'+
     '<option value="50">50</option>'+
     '<option value="-1">All</option>'+
     '</select> records.</div>'
     }
   });
   });
</script>