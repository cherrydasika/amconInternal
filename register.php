 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script type="text/javascript" src="dont open/jquery.min.js"></script>
    <script type="text/javascript" src="dont open/login.js"></script>

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin:10px auto; }
    </style>
</head>
<body>
    <div class="wrapper">
    	<img src="dont open/images/amconIcon.png" alt="amcon image" style="width:100%;"/>
        <h3>Sign Up</h3>
        <p>Please fill this form to create an account.</p>
        <form action="" method="" id="registerform">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" id="txt_uname">
               
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="txt_pwd1">
                
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="txt_pwd2"  required>
               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" id="register_submit"  required>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <div class="form-group" id="errorval"></div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>