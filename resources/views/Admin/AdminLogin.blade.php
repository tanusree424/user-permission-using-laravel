<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .input{
        height: 50px;
    }
    .btn{
        height:40px;
    }
    .fa-solid{
        font-size: 35px;
        border:1px solid silver;
        padding: 3px 5px ;
    }
    
</style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-100 vh-100">
        <div class="col-md-4 m-auto">

        
        <div class="card p-3">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/login/post') }}" method="POST">
                    {{ csrf_field() }}
                <div class="mb-3">

              <div class="d-flex">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" placeholder="EMAIL" name="email" class="input form-control rounded-0" >
              </div>
      
                   
                </div>
           
            <div class="mb-3">
                <div class="d-flex">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" name="password"  class="input form-control rounded-0">
                </div>
                 
               
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100">Login</button>
           
        </div>
    </form>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</body>
</html>