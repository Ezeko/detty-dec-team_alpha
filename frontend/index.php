<?php include_once('../backendphp/connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])){
        $data = $_POST['search'];
        //search with resemblance
        $sql = "SELECT * FROM `schools` WHERE school_name like '%$data%' or location like '%$data%' or environment like '%$data%' OR type like '%$data%' OR fee like '%$data%' or standard like '%$data%' ";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num = mysqli_num_rows($query);
        $row;


    }
}

?>
<script data-ad-client="ca-pub-8916245492091836" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <!--link that displays icon in title-->
    <link rel="shortcut icon" href="https://res.cloudinary.com/taofeeq/image/upload/v1576179225/dettyDecember/smallLogo_iojdjf.png" 
        type="image/x-icon">
    <!--Google fonts link for lato font family-->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!--Font awesome 5 link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <!--bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
        <style>
            p{
                 margin:0;
    padding:0;
    
    margin-left: 5%;
    display: block;
            }
              .school:hover{
                transform: scale(1.25);
            }
        </style>
    <title>School Search</title>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-inline my-2 my-lg-0" method="post">
                    <input class="form-control mr-sm-2" name="search" type="search" style="font-family:'Lato', 'Font Awesome 5 Free' !important; font-weight: 900;" placeholder="&#xf002; &nbsp; Search" aria-label="Search">
                </form>
            </div>
        </nav>
        <!--nav codes end here-->
        <!--header codes start here-->
        <header>
            <div class="row col-md-12 d-flex flex-column justify-content-center align-items-center" id="header">
                <h1 class="text-center my-2">Find the perfect school for your kids and yourself</h1>
                <h4 class="text-center my-2">Discover the creche, nursery, primary and secondary schools that are right for you and your kids</h4>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-inline my-2 my-lg-0 align-center d-flex justify-content-center" id="headForm">
                    <input class="form-control text-center my-2" id="headSearch" name="search" type="search" style="font-family:'Lato', 'Font Awesome 5 Free' !important; font-weight: 900;" placeholder="&#xf002; &nbsp; Search for your preferred schools" aria-label="Search">
                </form>
            </div>
        </header>
        <!--header codes end here-->
        <!--section codes start here-->
        <section>
            <div class="row mx-4">
                <div class="row col-md-12 mt-4 mb-2 justify-content-center">
                    <h5>We suggest schools that are relevant to you</h5>
                </div>
                <div class='row col-md-12 d-flex flex-row justify-content-center' id='schools'>
                <?php 
                //if the searched doesn't match database data
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
                                $row['school_name'] . "<p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>Location:</span> &emsp; &nbsp;". $row['location'] ."</p><p style='font-size: small;' class='my-2  text-left'> <span class='font-weight-light'>Standard:</span> &emsp; ". $row['standard'] .
                                        "</p><p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>Type:</span> &emsp; &emsp; &nbsp; &nbsp;  ". $row['type'].
                                "</p> <p style='font-size: small;' class='my-2 text-left'> <span class='font-weight-light'>School Fees:</span> &#8358;". number_format($row['fee']). "</p>".
                            "</a>
                        </div>";
                    }

                } 
                
                ?>
                </div>
                <!--div class="row col-md-12 d-flex flex-row justify-content-between" id="schools">
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div>
                    <div class="school d-flex flex-column">
                        <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png" alt="school picture">
                        <a href="#" class="align-self-center mt-2">
                            <img src="https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png" alt="school logo">
                            Atlantic Hall Schools
                        </a>
                    </div!-->
                </div>
            </div>
            <div class="row">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center py-3" id="bottomSection">
                <h4 class="text-center text-capitalize">tell us your preferences to narrow down your school search</h4>
                <div class="row text-center col-xs-6 preferences d-flex flex-row flex-wrap justify-content-around align-items-center">
                    <a href="preffered.php" class="d-flex flex-column">
                        <span class="ml-1"><i class="fa fa-map-marker-alt fa-lg"></i></span>
                        Location
                    </a>
                    <a href="preffered.php" class="d-flex flex-column">
                        <span class="ml-3"><i class="fa fa-building fa-lg"></i></span>
                        Environment
                    </a>
                    <a href="preffered.php" class="d-flex flex-column">
                        <span class="ml-3"><i class="fa fa-graduation-cap fa-lg"></i></span>
                        School Type
                    </a>
                    <a href="preffered.php" class="d-flex flex-column">
                        <span class="ml-1"><i class="fa fa-search-plus fa-lg"></i></span>
                        Standard
                    </a>
                    <a href="preffered.php" class="d-flex flex-column">
                        <span><i class="fa fa-money-bill-alt fa-lg"></i></span>
                        Fees
                    </a>
                </div>
            </div>
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
