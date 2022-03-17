<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<div class="container">
    <h1 class="page-title">SignUp</h1>
    <div class="" style="margin-bottom:10px;margin-top:15px;"></div>
     <div class="row justify-content-center">
      <div class="col-md-12">
    
       <div class="card">

          <div class="card-header">SignUp</div>
             <div class="card-body">
                  <form action="{{route('register.create')}}" method="post" class="needs-validation" novalidate>
                 //@if(session('status'))
                 @if(Session::has('status'))
                   <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
              //{{session('status')}}
              {{Session::get('status')}}
                  </div>
                  @endif
                    // @if(session('failed')) 
                    @if(Session::has('fails'))
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    //{{session('failed')}}
                    {{Session::get('fails')}}
                  </div>
                      @endif
                    @csrf 
*/
        <div class="form-group">
         <label>Name:</label>
         <input type="text" name="name" id="name" class="form-control col-sm-6 @error('name')? 'is-invalid':''" required>
         @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
         <label>Email ID:</label>
         <input type="email" name="email" id="email_id" class="form-control col-sm-6 @error('email')? 'is-invalid':''" required>
         @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
         <label>Password:</label>
         <input type="password" name="password" id="password" class="form-control col-sm-6 @error('password')? 'is-invalid':''" required>
         @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
         <label>Confirm Password:</label>
         <input type="password" name="password_confirmation" id="password_confirmation" class="form-control col-sm-6 @error('password')? 'is-invalid':''" required">
         @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
         <button type="submit" class="btn btn-primary">SignUp</button>
        </div>

    </form>
    </div>
    </div>
    </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
