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
            <h3 class="mb-0 h4 font-weight-bolder">ADD Permission</h3>
        </div>
        </div>
      </div>
      <div class="row">
     <div class="col-md-8">
        <div class="card p-4">
            <div class="card-body">
                <h5 class="card-title">Add New Permission</h5>
                <form action="{{ route('PostAdminPermission') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                          <input type="text" name="name" style="border:1px solid red; padding:5px 7px;" class="form-control" value="{{ old('name') }}">
                          @error('name')
                              <div class="text-danger mt-1">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-12">
                          <button class="btn btn-primary" type="submit">Add Permission</button>
                      </div>
                  </div>
              </form>
  @endsection
  <!--   Core JS Files   -->
 