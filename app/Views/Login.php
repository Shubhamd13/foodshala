<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- 
    <link rel="shortcut icon" type="image/png" href="static/img/logo.png"/>
    -->
    <link rel="apple-touch-icon" sizes="180x180" href="/static/img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/static/img/favicon_io/site.webmanifest">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>FoodShala|Login</title>
    <style>
    body{
       //text-align:center;

    }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <content>
    <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-5">
          <div class="card border-info text-center">
            <div class="card-header">
              Sign in to continue
            </div>
            <div class="card-body">
              <img src="/static/img/logo.png" class="img-fluid" alt="FoodShala Logo">
              <ul class="nav nav-tabs nav-fill w-100 " id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="customers-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="true">Customer</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="restaurants-tab" data-toggle="tab" href="#restaurants" role="tab" aria-controls="restaurants" aria-selected="false">Restaurant</a>
                  </li>
              </ul> 
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
                    <form class="form-signin" action="<?= base_url("/login/customer") ?>" method="post">
                        <label for="email"  class="float-left">Email address</label>
                        <input type="email" name="email" class="form-control mb-2" id="email" placeholder="Email" required autofocus>
                        <label for="password" class="float-left">Password</label>
                        <div class="input-group mb-3" id="show_hide_password">
                          <input class="form-control" name="password" type="password" id="password" pattern=".{6,}" title="Enter atleast 6 characters"  placeholder="Password" required aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                          </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Sign in</button>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="restaurants" role="tabpanel" aria-labelledby="restaurants-tab">
                    <form class="form-signin" action="<?= base_url("/login/restaurant") ?>" method="post">
                        <label for="email1" class="float-left">Email address</label>
                        <input type="email" name="email" class="form-control mb-2" id="email1" placeholder="Email" required autofocus>
                        <label for="password1" class="float-left">Password</label>
                        <div class="input-group mb-3" id="show_hide_password">
                          <input class="form-control" name="password1" type="password" pattern=".{6,}" title="Enter atleast 6 characters" id="password1" placeholder="Password" required aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                          </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Sign in</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <label class="float-right">New to FoodShala?Register(<a href="<?= base_url("/register/customer") ?>">Customer</a>/<a href="  <?= base_url("/register/restaurant") ?>">Restaurant</a>)</label>
        </div>
      </div>
    </div>
    </content>
    <footer class=" mt-auto">
        <div class="footer-copyright text-center py-2 bg-secondary text-white">© Copyright 2020:
            <a  class="text-light" href="https://www.linkedin.com/in/shubham-derhgawen-021a56186/"> Shubham Derhgawen</a>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    
    <?php
    if(!empty($type)){
        if($type=="customer"){
            $negateType="restaurant";
        }else{
            $negateType="customer";
        }
        echo("$('#".$negateType."s').removeClass('active show');\n");
        echo("$('#".$negateType."s-tab').removeClass('active');\n");
        echo("$('#".$type."s').addClass('active show');\n");
        echo("$('#".$type."s-tab').addClass('active');\n");
    }
    if (! empty($error) && is_array($error)) {
        foreach ($error as $key => $value){
            echo("$('#".$key."').addClass('is-invalid');\n");
            if($key=="password" || $key=="password1"){
            //echo("$(\"<div class='invalid-feedback'>".$value."</div>\").next().insertAfter('#".$key."');\n");
            echo("$('#".$key."').next().after(\"<div class='invalid-feedback'>Invalid Password</div>\");\n");
            }else{
                echo("$(\"<div class='invalid-feedback'>".$value."</div>\").insertAfter('#".$key."');\n");
            }
        }
    }
    if (! empty($values)){
        foreach ($values as $key => $value){
            echo("$('#".$key."').val('".$value."');\n");
        }
    }

    ?>
    });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b9bdbd120a.js" ></script>
  </body>
</html>