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
            <div class="card p-3">
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
                              {{-- <th scope="col">Permissions</th> --}}
                              <th scope="col">Date</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $id=1;
                            ?>
                            @foreach ($getRecord as $value)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="width:5%">{{ $value->name }}</td>
                                {{-- <td>{{ $value->permissions->pluck('name')->implode(', ') }}</td> --}}
                                <td>{{ $value->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                  <button data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $value->id }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i>Show</button>
                  
                                    <a href="{{ url('/edit/role/' . $value->id) }}" class="btn btn-info mx-1"   ><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $value->id }}" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $value->id }}">Show Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="d-flex">
                                              <h3 class="fw-bold me-2">Role Name:</h3> 
                                              <h3>{{ $value->name }}</h3> <br>
                                            </div>
                                            <h5 class="fw-bold me-2">Permissions:</h5> 
                                            <div style="max-height: 150px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                                                @foreach ($value->permissions as $permission)
                                                    <div>{{ $permission->name }}</div>
                                                @endforeach
                                            </div>
                                         
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <!-- Optionally handle saving changes here -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <a href="{{ url('/delete/role/' . $value->id) }}" class="btn btn-dark"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                           
                        </tbody>
                    </table>
                    <div class="my-3">
                          {{ $getRecord->links() }}
                    </div>
                  
            </div>
        </div>
      </div>
      
    
     
  </main>
  @endsection
  <!--   Core JS Files   -->
 