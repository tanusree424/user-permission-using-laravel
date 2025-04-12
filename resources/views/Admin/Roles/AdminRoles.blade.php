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
            <h3 class="mb-0 h4 font-weight-bolder">Roles</h3>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card p-4">
                <div class="row">
               <div class="col-md-6 m-auto">
                <h5 class="card-title">Role List</h5>
               </div>
               @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

               <div class="col-md-6">
                <a class="btn btn-primary" href="{{ route('AddAdminRole') }}">Add Role</a>
               </div>
            </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $id=1;
                            ?>
                            @foreach ($getRecord as $value )
                               
                           
                            <tr>
                              <th scope="row">{{$id++;}}</th>
                              <td>{{$value->name}}</td>
                              <td>{{$value->created_at}}</td>
                              <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ url('/edit/role/'. $value->id)  }}" class="btn btn-warning mx-2">Edit</a>
                                    <a href="{{ url('/delete/role/'. $value->id)  }}" class="btn btn-dark">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      
    
     
  </main>
  @endsection
  <!--   Core JS Files   -->
 