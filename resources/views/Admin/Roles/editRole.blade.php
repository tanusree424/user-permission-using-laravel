@extends('Admin.AdminLayout')
@section('title' , 'ADMIN|ROLE')

@section('content')

<body class="g-sidenav-show  bg-gray-100">
@include('Admin.AdminSidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="hright:100vh;">
    <!-- Navbar -->
   @include('Admin.AdminNavbar')
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      <div class="row">
       
        <div class="ms-3">
            <h3 class="mb-0 h4 font-weight-bolder">Edit Roles</h3>
        </div>
        </div>
      </div>
      <div class="row">
     <div class="col-md-8">
        <div class="card p-4">
            <div class="card-body">
                <h5 class="card-title">Edit Role</h5>
                <form action="{{ url('/edit/role/{id}'.$getRecord->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <lable class="col-sm-2 col-form-label">Name</lable>
                        <div class="col-mm-">
                            <input type="text" value="{{ $getRecord->name }}" name="role" style="border:1px solid red; padding:5px 7px;" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
<div class="col-md-12">
    <button class="btn btn-primary" style="text-align: left;">Update</button>
</div>
                    </div>
                </form>
            </div>
        </div>
     </div>
      </div>
      
    
     
  </main>
  @endsection
  <!--   Core JS Files   -->
 