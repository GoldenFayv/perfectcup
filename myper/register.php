<?php
    if(!isset($fname)){
        $fname = '';
    }
    if(!isset($lname)){
        $lname = '';
    }
    if(!isset($email)){
        $email = '';
    }

    require'dbh.php';
    require'function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $email = $_POST['email'];
        // $passwd = $_POST['password'
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $passwd = filter_input(INPUT_POST, 'password');




        
        if(empty($fname)){
            $fname_err = "Please, enter in your first name";
        }
        elseif(strlen($fname) < 3){
            $fname_err ="Your full name should have a minimum of 4 characters";
        }
    
        if(empty($lname)){
            $lname_err = "Please, enter in your password";
        }
        elseif(strlen($lname) < 3){
            $lname_err ="Your last name should have a minimum of 3 characters";
        }
    
        if(empty($email)){
            $email_err = "Please, enter in your email";
        }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $email_err = "Wrong email format";
        }
    
        if(empty($passwd)){
            $passwd_err = "Please, enter in your password";
        }
        elseif(strlen($passwd) < 6){
            $passwd_err ="Your password should have a minimum of 6 characters";
        }
    
        elseif(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($passwd_err)){
            $query = "INSERT INTO members(fname, lname, email, password)VALUES('$fname', '$lname', '$email', '$passwd')";
            mysqli_query($conn, $query);

            header("Location: login.php");
            die;
        }


    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>The Perfect Cub - Register</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/jquery.js"></script>

    </head>

    <body>

        <div class="brand">The Perfect Cup</div>
        <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

        <!-- Navigation -->
        <?php require_once 'nav.php'; ?>


        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Registration <strong>form</strong></h2>
                        <!-- <div id="add_err2"></div> -->
                        <hr>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p> -->


                        <form method="post">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label>First Name</label>
                                    <input type="text" id="fname" name="fname" maxlength="25" class="form-control" value = "<?php echo htmlspecialchars($fname);?>">
                                    <span style="color: red;">
                                        <?php
                                            if(isset($fname_err)){
                                                echo $fname_err;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Last Name</label>
                                    <input type="text" id="lname" name="lname" maxlength="25" class="form-control" value = "<?php echo htmlspecialchars($lname);?>">
                                    <span style="color: red;">
                                        <?php
                                            if(isset($lname_err)){
                                                echo $lname_err;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Email Address</label>
                                    <input type="email" id="email" name="email" maxlength="25" class="form-control" value = "<?php echo htmlspecialchars($email);?>">
                                    <span style="color: red;">
                                        <?php
                                            if(isset($email_err)){
                                                echo $email_err;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" maxlength="10" class="form-control">
                                    <span style="color: red;">
                                        <?php
                                            if(isset($passwd_err)){
                                                echo $passwd_err;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <!-- <div class="form-group col-lg-12">
                                    <label>Check password</label>
                                    <input type="password" id="cpassword" name="cpassword" maxlength="10" class="form-control">
                                </div> -->
                                <div class="form-group col-lg-12">
                                    <!-- <input type="hidden" name="save" value="contact"> -->
                                    <button type="submit" class="btn btn-default" name="register" id="register">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <!-- <script src="js/jquery.js"></script> -->

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>



    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $("#register").click(function(){
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var password = $("#password").val();

                $.ajax({
                    type: "POST",
                    url: "adduser.php",
                    // dataType: "json",
                    data: {fname: fname, lname: lname, email: email, password: password},
                    success: function(output){
                        if(output == 'true'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Account </strong>Processed.</div>');
                            window.location.href = "index.php";
                        }
                        else if(output == 'false'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Email Address </strong>already exist.</div>');
                        }
                        else if(output == 'fname'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>First Name </strong>is required.</div>');
                        }
                        else if(output == 'lname'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Last Name </strong>is required.</div>');
                        }
                        else if(output == 'eshort'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Email address </strong>is required.</div>');
                        }
                        else if(output == 'pshort'){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Password </strong>must be at least 4 characters.</div>');
                        }
                        else if(output == 'eformat'){
                            $("#add_err2").html('<div class="alert alert-success">Email address <strong>format is not valid </strong></div>');
                        }

                        else{
                            $("#add_err2").html('<div class="alert alert-danger">Error processing request.<strong> Please try again</strong></div>');
                        }
                        
                    },

                    beforeSend: function(){
                        $("#add_err2").html("Loading...");
                    } 
                });
                return false;
            });
        });
    </script> -->
</html>
