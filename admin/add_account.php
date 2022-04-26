<?php require 'create.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USER - Dashboard</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <style>
  input[type="submit"] {
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    font-style: italic;
    background: linear-gradient(to top, rgb(90, 49, 6), rgb(69, 29, 2), rgb(102, 72, 16));
}

input[type="submit"]:hover {
    color: white;
    background: linear-gradient(to bottom, rgb(90, 49, 6), rgb(69, 29, 2),rgb(102, 72, 16));
}
  </style>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Account</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="item" name="item" class="form-control" autofocus placeholder="Item" required autofocus>
                    <label for="Item">Item</label>
                  </div>
                </div>

            <div class="form-group">
              <div class="form-label-group">
              <select class="form-control" id="department" name="department" required>
                <option value="Null"> --- DEPARTMENT --- </option>
                <option value="Mission"> Mission </option>
                <option value="Prayer"> Prayer </option>
                <option value="Music"> Music </option>
                <option value="Ushering"> Ushering </option>
                <option value="Media"> Media </option>
              </select>
             </div>
            </div>

            <div class="form-group">
                  <div class="form-label-group">
                 <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" required>
                 <label for="Amount">Amount (In Figures)</label>
              </div>
            </div>
            
            <div class="form-group">
            <input  class="form-control" id="submit" type="submit" name="add_account" value="Add" >
</div>
          </form>
        </div>
      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
