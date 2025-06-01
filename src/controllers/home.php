<?php
include ("config.php");
$userprofile = $_SESSION['username'];
if ($userprofile == true) {

} else {
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examinaton in India | MyExam.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</head>

<body style="background-color:#ECF0F1;">
    <div class="container">
        <br>
        <h1 class="text-center text-primary">Welcome to Online Exam</h1></br>

        <div class="col-lg-8 col-xl-8 col-md-8 col-md-8 m-auto d-block">
            <div class="card">
                <h3 class="text-center card-header"> Welcome <?php echo $_SESSION['username']; ?> All the Best</h3>
                <h5 class="text-center">

                    <?php
                    date_default_timezone_set('Asia/Kolkata');

                    #calculate 60 days in the future:seconds*minutes*hours*days+ current time
                    
                    $exp = 60 * 60 * 24 * 60 + time();
                    setcookie('last_visit', date("d/m/y"), $exp);
                    if (isset($_COOKIE['last_visit'])) {
                        $visit = $_COOKIE['last_visit'];
                        echo "your last visit was- " . $visit;
                    } else {

                    }
                    ?>
                </h5>

            </div>
            <br>
            <div class="col-ld-8 m-auto d-block">



                <form action="check.php" method="post">
                    <?php

                    for ($i = 1; $i < 6; $i++) {
                        $q = "select * from questions where qid=$i";
                        $query = mysqli_query($con, $q);

                        while ($rows = mysqli_fetch_array($query)) {
                            ?>

                            <div classs="card">
                                <h4 class="card-header m-auto primary"> <?php echo $rows['question']; ?></h4>

                                <?php
                                $q = "select * from answers where ans_id=$i";
                                $query = mysqli_query($con, $q);

                                while ($rows = mysqli_fetch_array($query)) {


                                    ?>
                                    <div class="card-body d-block">
                                        <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]"
                                            value="<?php echo $rows['aid']; ?>">
                                        <?php echo $rows['answer']; ?>

                                    </div>




                                    <?php
                                }
                        }
                    }
                    ?>

                        <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">
                </form>
            </div>
        </div>
        <br>
        <br>





    </div>
    <div class="m-auto d-block">
        <a href="logout.php" class="btn btn-primary">LOGOUT</a>
    </div><br>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p> Copyright &copy; www.OnlineExam.com.&nbsp; All right reserved <a href="#">Privacy</a> · <a
                href="#">Terms</a></p>
    </footer>
</body>

</html>