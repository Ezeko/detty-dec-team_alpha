<?php include_once('../backendphp/connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['recommended'])){
        $standard = $_POST['standard'];
        $location = $_POST['location'];
        $environment = $_POST['environment'];
        $type = $_POST['schoolType'];
        $fee = $_POST['fees'];




        //search with resemblance
        $sql = "SELECT * FROM `schools` WHERE standard = '$standard' or location = '$location' or 
        environment = '$environment' or type = '$type' or fee = '$fee'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($query);


    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/desktop1.css">
    <!--link that displays icon in title-->
    <link rel="shortcut icon" href="https://res.cloudinary.com/taofeeq/image/upload/v1576179225/dettyDecember/smallLogo_iojdjf.png" 
        type="image/x-icon">
        <style>
            p{
                 margin:0;
    padding:0;
    margin-left: 5%;
    display: block;
            }
        </style>
    <!--Google fonts link for lato font family-->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!--Font awesome 5 link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <!--bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
    <title>Preferred Interests</title>
</head>
<body>
    <div class="container-fluid p-0">
        <!--nav codes start here-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img src="https://res.cloudinary.com/taofeeq/image/upload/v1576178817/dettyDecember/logo_gxjzq2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="#">Creche / Nursery</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Primary / Secondary</a>
                    </li>
                </ul>
                <form action="" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" style="font-family:'Lato', 'Font Awesome 5 Free' !important; font-weight: 900;" placeholder="&#xf002; &nbsp; Search" aria-label="Search">
                </form>
            </div>
        </nav>
        <!--nav codes end here-->
        <!--header codes start here-->
        <header>
            <div class="row col-md-12 d-flex flex-column justify-content-center align-items-center mt-2">
                <h2 class="text-center my-2">Choose your preferred interests</h2>
                <h5 class="text-center my-2">Tell us your interests to see recommended schools around you</h5>
                <div class="row text-center col-xs-12 preferences d-flex flex-row flex-wrap justify-content-around align-items-center" id="preferredInterests">
                    <div class="d-flex flex-column">
                        <span class="ml-1"><i class="fa fa-map-marker-alt fa-lg"></i></span>
                        Location
                    </div>
                    <div class="d-flex flex-column">
                        <span class="ml-3"><i class="fa fa-building fa-lg"></i></span>
                        Environment
                    </div>
                    <div class="d-flex flex-column">
                        <span class="ml-3"><i class="fa fa-graduation-cap fa-lg"></i></span>
                        School Type
                    </div>
                    <div class="d-flex flex-column">
                        <span class="ml-1"><i class="fa fa-search-plus fa-lg"></i></span>
                        Standard
                    </div>
                    <div class="d-flex flex-column">
                        <span><i class="fa fa-money-bill-alt fa-lg"></i></span>
                        Fees
                    </div>
                </div>
            </div>
        </header>
        <!--header codes end here-->
        <!--section codes start here-->
        <section>
            <div class="row my-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mx-2">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select name="location" id="location" class="form-control">
                                <option name="location" id="location" value="none">Select Location</option>
                                <option name="location" id="location" value="lagos">Lagos</option>
                                <option name="location" id="location" value="abuja">Abuja</option>
                                <option name="location" id="location" value="ogun">Ogun</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="environment">Environment</label>
                            <select name="environment" id="environment" class="form-control">
                                <option name="environment" id="environment" value="">Select Environment</option>
                                <option name="environment" id="environment" value="city">City</option>
                                <option name="environment" id="environment" value="rural">Rural</option>
                                <option name="environment" id="environment" value="none">No preference</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="schoolType">School Type</label>
                            <select name="schoolType" id="schoolType" class="form-control">
                                <option name="schoolType" id="schoolType" value="">Select School Type</option>
                                <option name="schoolType" id="schoolType" value="Creche/ Nursery">Creche / Nursery</option>
                                <option name="schoolType" id="schoolType" value="primary/ secondary">Primary / Secondary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="standard">Standard</label>
                            <select name="standard" id="standard" class="form-control">
                                <option name= "standard" id="standard" value="">Select Standard</option>
                                <option name="standard" id="standard" value="British">British Education</option>
                                <option name="standard" id="standard" value="Montessori">Montessori Education</option>
                                <option name="standard" id="standard" value="none">No preference</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fees">Fees</label>
                            <input type="text" name="fees" id="fees" class="form-control">
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <button type="submit" class="form-control btn" name="recommended">See recommended schools</button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
                <!-- print school details here -->
            <div class='row col-md-12 d-flex flex-row justify-content-center' id='schools'>
                <?php 
                //if the query doesn't match database data
                // if num not set display nothing
                if (!(isset($num))){
                    echo "";
                }else if ($num < 1){
                    print "No match found";
                }else{
                    while ($row= mysqli_fetch_array($query)){

                        echo "
                         <div class='school d-flex flex-column mx-4'>
                            <img src=".$row['image_url']." alt='school picture'>
                            <a href='#' class='align-self-center mt-2'>
                                <img src=".$row['logo']." alt='school logo'>".
                                $row['school_name'] ."<p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>Location:</span> &emsp; &nbsp;". $row['location'] ."</p><p style='font-size: small;' class='my-2  text-left'> <span class='font-weight-light'>Standard:</span> &emsp; ". $row['standard'] .
                                        "</p><p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>Type:</span> &emsp; &emsp; &nbsp; &nbsp; ". $row['type'].
                                "</p> <p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>School Fees:</span> &#8358;". number_format($row['fee']). "</p>".
                            "</a>
                        </div>";
                    }

                } 
                
                ?>
                </div>

        </section>
        <!--section codes end here-->
        <!--footer codes start here-->
        <footer style="color: #00AD50;">
            <div class="row col-md-12 d-flex py-3 px-4">
                <img class="mr-auto" src="https://res.cloudinary.com/taofeeq/image/upload/v1576178817/dettyDecember/logo_gxjzq2.png" height="25" alt="logo">
                <p>Contact us</p>
                <a href="#" class=" mx-2"><i class="fab fa-facebook" style="color: #395185;"></i></a>
                <a href="#" class=" mx-2"><i class="fab fa-instagram" style="color: #e0525e;"></i></a>
                <a href="#" class=" mx-2"><i class="fab fa-twitter" style="color: #55acee;"></i></a>
            </div>
        </footer>
        <!--footer codes end here-->
    </div>

    <!--bootstrap scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
