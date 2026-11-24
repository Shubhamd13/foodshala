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

    <title>FoodShala|My Account</title>
    <style>
    body{
       //text-align:center;

    }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <content>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?= base_url("/") ?>">
        <img src="/static/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo" loading="lazy">
        FoodShala
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url("/myAccount") ?>">My Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("/addItem") ?>">Add Item </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("/viewItems") ?>">View Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("/viewOrders") ?>">View Orders</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <button id="sgn" class="btn btn-danger my-2 my-sm-0" onclick="location.href ='<?= base_url("/login/logout") ?>';" >Sign Out</button>
        </ul>
      </div>
    </nav>
   <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-8 col-md-8 pb-3">
          <div class="card border-info ">
            <div class="card-header">
              Add Item 
            </div>
            <div class="card-body">
              <form action="<?= base_url("/addItem") ?>" method="post" name="registration">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="dishname">Dish Name</label>
                      <input type="text" name="dishname" class="form-control" placeholder="Biryani" id="dishname" required oninvalid="this.setCustomValidity('Enter Dish Name')" >
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label for="description" >Description</label>
                      <input type="text" name="description" class="form-control" placeholder="Classic Biryani" id="description" required oninvalid="this.setCustomValidity('Enter Dish Name')">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" name="price" class="form-control numericInput" placeholder="500" id="price" required oninvalid="this.setCustomValidity('Enter Price')">
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="custom-control custom-switch">
                        <input type="checkbox" name="preference" value="NonVeg" class="custom-control-input" id="switch1">
                        <label class="custom-control-label" for="switch1">Non-Vegetarian</label>
                      </div>
                  </div>
                </form>
            </div>
          </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" ></script>
    <script>
    $(document).ready(function() {
        //Restrict to only numbers-------------------------------
        $('FORM input').attr('readonly', 'readonly');
    });
    //-----------------Errors
    <?php 
    if (! empty($error) && is_array($error)) {
        foreach ($error as $key => $value){
            echo("$('#".$key."').addClass('is-invalid');\n");
            echo("$(\"<div class='invalid-feedback'>".$value."<div>\").insertAfter('#".$key."');\n");
        }
    }
    //echo(var_dump($values));
    if (! empty($values)){
        foreach ($values as $key => $value){
            echo("$('#".$key."').val('".$value."');\n");
            //if(gettype($value)=="integer")
            //echo("$('#".$key."').val(".$value.");\n");
        }
    }

    ?>
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b9bdbd120a.js" ></script>
  </body>
</html>