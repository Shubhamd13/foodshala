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

    <title>FoodShala|View Item</title>
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
                <a class="nav-link" href="<?= base_url("/") ?>">Menu</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url("/addItem") ?>">Add Item </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("/viewItems") ?>">View Items <span class="sr-only">(current)</span></a>
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
          <div class="card border-info">
            <div class="card-header">
              View Items 
            </div>
            <div class="card-body">
              <?php if (! empty($menuItems) && is_array($menuItems)) : ?>

                    <div class="row row-cols-1 row-cols-md-2">
                    <?php foreach ($menuItems as $menuItem): ?>
                      <div class="col mb-4">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"><?= esc($menuItem->dishname); ?></h5>
                            <p class="card-text"><?= esc($menuItem->description); ?></p>
                            <div class="row">
                            <div class="col">
                              <div class="custom-control custom-switch">
                                <?php if ($menuItem->preference=="NonVeg") : ?>
                                <input type="checkbox" checked class="custom-control-input" id="">
                                <?php else : ?>
                                <input type="checkbox" class="custom-control-input" id="">
                                <?php endif ?>
                                <label class="custom-control-label" for="">Non-Veg</label>
                              </div>
                            </div>
                            
                            <div class="col">
                                <button class="btn btn-primary float-right">&#8377;<?= esc($menuItem->price); ?></button>
                            </div>
                            </div>
                        </div>
                      </div>
                      </div>
                      
                    <?php endforeach; ?>
                    </div>
                <?php else : ?>

                    <h3>No Items added</h3>

                    <p>Add Items.</p>

                <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </content>
    <footer class="mt-auto">
        <div class="footer-copyright text-center py-2 bg-secondary text-white">© Copyright 2020:
            <a  class="text-light" href="https://www.linkedin.com/in/shubham-derhgawen-021a56186/"> Shubham Derhgawen</a>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" ></script>
    <script>
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b9bdbd120a.js" ></script>
  </body>
</html>