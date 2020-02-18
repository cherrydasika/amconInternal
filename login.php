<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="background-color: #fff;">
            <div class="col-sm-12">
            <img src="images/amconIcon.png" alt="amcon image" class="mx-auto d-block"/>
            </div>
        </div>

        <div class="row" id="content-1">
            <div class="col-sm"></div>
            <div class="col-sm py-4">
                <form action="includes/login.inc.php" method="POST" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" name="uname">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login-submit">Login</button>

                    <div><?php if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error =="empty"){echo "<p class='text-danger pt-1'>Fields missing!!</p>";}
                        else if($error =="invalid"){echo "<p class='text-danger pt-1'>Username or password incorrect!!</p>";}
                        else if($error =="invalidlogin"){echo "<p class='text-danger pt-1'>Something is wrong. Please try later.</p>";}
                    } ?>
                    </div>

                    <div>
                        <p class="pt-1">To sign up please click <a href="#" class="nav-link d-inline">here</a></p>
                    </div>                   
                </form>                 
            </div>
            <div class="col-sm"></div>           
        </div>

        <div class="row" style="" id="content-2">
            <div class="col-sm-3">
                <table class="table table-sm table-borderless text-white text-center">
                    <tr><th>COMPANY</th></tr>
                    <tr><td>About US</td></tr>
                    <tr><td>Our Team</td></tr>
                    <tr><td>Major Markets</td></tr>
                    <tr><td>Career</td></tr>                    
                </table>
            </div>
            <div class="col-sm-3">
            <table class="table table-sm table-borderless text-white text-center">
                    <tr><th>LEGAL</th></tr>
                    <tr><td>Privacy Policy</td></tr>
                    <tr><td>Cookie Policy</td></tr>
                    <tr><td>Terms of Service</td></tr>
                    <tr><td></td></tr>                    
                </table>
            </div>
            <div class="col-sm-3">
            <table class="table table-sm table-borderless text-white text-center">
                    <tr><th>PROFILE</th></tr>
                    <tr><td>Quality</td></tr>
                    <tr><td>Certifications</td></tr>
                    <tr><td>R&D</td></tr>
                    <tr><td>Achievements</td></tr>                    
                </table>
            </div>
            <div class="col-sm-3">
            <table class="table table-sm table-borderless text-white text-center">
                    <tr><th>CONTACT</th></tr>
                    <tr><td>Email</td></tr>
                    <tr><td>Phone</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>                    
                </table>
            </div>            
        </div>

        <div class="row" style="background-color: #114B71;">
            <div class="col-sm text-white text-center py-4" >
                <p>©Amcon Fibreglass & Plastic Engineering Co.. All Rights Reserved (Terms of Use)</p>
            </div>
        </div>

    </div>
</body>
</html>