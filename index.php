<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- ===========datepicker========== -->
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script>
        jQuery(function(){
            jQuery('#datepicker').datepicker({
                dateFormat: "yy-mm-dd"
            });
        })
    </script>
    <title>Custemer hosting </title>
  </head>
  <body>

      <div class="container">
          <header>
                <!-- Fixed navbar -->
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                  <a class="navbar-brand" href="#">Management of clients hosting</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=add_customers">Add customer <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item" >
                        <a class="nav-link" href="index.php?page=add_service">Add service</a>
                      </li>

                      <li class="nav-item" >
                        <a class="nav-link" href="index.php?page=show_all_customers">Customers</a>
                      </li>
                      <li class="nav-item" >
                        <a class="nav-link" href="index.php?page=show_all_services">Services</a>
                      </li>
                      <li class="nav-item" >
                        <a class="nav-link" href="index.php?page=customer_service">Customers/services</a>
                      </li>

                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
                      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </div>
                </nav>
              </header>

              <!-- Begin page content -->
              <main role="main" class="container customer-hosting">


          <?php
          // include_once("DB/connect.php");
          include_once("DB/DATABASE.php");
          include_once("inc/class_customers.php");
          include_once("inc/class_services.php");
          include_once("inc/class_customer_service.php");
          $db = new Database("erte_customerhost", "root", "", "localhost");
          // // $db = new Database($database_name, $username, $password, $host);
          // global $db;

          // include_once("DB/DB-1.9.2/DB.php");

          if (isset($_GET['page'])) {
              $page = $_GET['page'];
              $source = "pages/" . $page . ".php";
              // echo "$source";
              // echo "<h1>sdddddddddddddd</h1>";
              include_once $source;
          } else {
              echo "nie ma page";
          }
          ?></main>
      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script> -->
  </body>
</html>
