<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Inventory Management</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
    <div class="container pt-3">
        <div class="row justify-content-sm-center">
            <div class="col-sm-6 col-md-4">

                <div class="card border-info text-center">
                    <div class="card-header">
                    Sign in to continue
                    </div>
                    <div class="card-body">
                    <img src="/img/logo.jpg" width="100%" height="auto">
                    
                    <!-- <h4 class="text-center">Inventory</h4> -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" type="email" class="form-control mb-2" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            <input id="password" type="password" class="form-control mb-2" name="password" placeholder="Password" required>
                            <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Sign in</button>
                            <label class="checkbox float-left">
                            <!-- <input type="checkbox" value="remember-me">
                            Remember me
                            </label> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>

  

</body>

</html>
