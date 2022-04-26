<!DOCTYPE html>

<html lang="en">

<head>

    <title>PAG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="BOOTSTRAP/dist/css/bootstrap.min.css"/>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

  <img src="images/aglogo.png" height="150px" width="150px" style="padding: 20px;" alt="">

  <div class="container" style="margin-top: 10px;">
    
    <div class="text-center" style="top: 0; left: 0; right: 0; position: fixed; margin-top: 100px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: #007ACC;"><h1>ASSEMBLIES OF GOD ( PENIEL TEMPLE )</h1></div>
    
    <section>
        
<?php include 'index_query.php'; ?>

    <form method="post">

        <h6 class="header text-center" style="color: #007ACC; font: Arial;">
            <i class="fa fa-user-alt fa-3x"> USER LOGIN </i>
        </h6>

        <div class="form-group" style="margin-top: 50px">
            <input type="text" style="background: rgb(243, 248, 242); padding: 10px; font-size: 15px;" class="form-control" name="username" placeholder="Username" required>
        </div>

        <div class="form-group" style="margin-top: 5px;">
            <input type="password" style="background: rgb(243, 248, 242); padding: 10px; font-size: 15px;" class="form-control" name="password" placeholder="Password ( * * * * * * * )" required>
        </div>
        <input class="form-control btn btn-danger" style="font-size: 18px;" id="submit" type="submit" name="login" value="Login">

        <div class="text-center" style="margin-top: 20px; font-size: 18px;">New? <a href="#signup" class="text-info" data-target="#signup" data-toggle="modal"> Sign Up </a></div>

    </form>

</section>

<footer style="color: #007ACC; bottom: 0; left: 0; right: 0; position: fixed; text-align: center; padding: 20px 0;" >
    <span style="font-weight: bold; font-family: Arial; font-size: 20px;"> COPYRIGHT © ED CONSULT <span style="font-family: Arial; font-weight: bold;" id="output"></span>
        <script>
            let d = new Date();
            output.innerHTML = d.getFullYear();
        </script>
        / GAGAEII !!!  WATCH OUT !!!
    </span>
</footer>

</div>

<!-- SIGNUP FORM -->

<?php include 'signup.php'; ?>

<div class="modal fade" id="signup" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">SIGNUP FORM</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" id="form" role="form">

            <div class="form-group" style="margin-top: -5px;">
                <div class="form-label-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>    
                </div>
            </div>

            <div class="form-group" style="margin-top: -5px;">
                <div class="form-label-group">
                    <input type="password" class="form-control" name="password" placeholder=" ( * * * * * * * * * * ) " required>
                </div>
            </div>

            <div class="form-group" style="margin-top: -5px;">
                <div class="form-label-group">
                    <select class="form-control" name="role">
                      <option value="Null"> -- Role -- </option>
                      <option value="Admin"> Admin </option>
                      <option value="User"> User </option>
                    </select>
                </div>
            </div>
                               
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="signup" name="signup" value="Save" />
                    </div>
                </div>

            </form>
        </div>

</div>

    
<script src="vendor/jquery/jquery.min.js"></script>
<script src="JQuery/jquery/dist/jquery-3.3.1.min.js"></script>
<script src="BOOTSTRAP/dist/js/bootstrap.min.js"></script>
    
</body>


</html>