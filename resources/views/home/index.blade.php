<!Doctype html>
<html>
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=width-device,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logout System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<div class="container">
    <h1 class="page-title">Users</h1>
    <div class="row">
      <div class="col-sm-12">
        <form action="{{url('home.index')}}" method="POST">
         @method('get')
         @csrf 
         <button class="btn btn-danger" style="float:right;">Logout</button>
         </form>
    </div>
</div>

<div class="row justify-content-center">
 <div class="col-md-12">
  <div class="card">
   <div class="card-body">
   @if(session('failed'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('failed')}}
    </div>
     @else(session('success'))
     <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('success')}}
      </div>
      @endif
      
   </div>
  </div>
 </div>
</div>
</div>
</body>
</html>