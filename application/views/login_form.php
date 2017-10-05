<!DOCTYPE html>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Help Me Grow</title>
  <script
        src="//code.jquery.com/jquery-2.2.2.min.js"
        integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
        crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="<?php echo asset_url('datepicker/css/datepicker.css');?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
  <script type="text/javascript" src="<?php echo asset_url('datepicker/js/bootstrap-datepicker.js');?>"></script>
  <link rel="stylesheet" href="<?php echo asset_url('stylesheets/style.css') ;?>" type="text/css" media="screen" title="no title" charset="utf-8"/>

<style type="text/css">
  .navbar-inverse {
    background-color: lightblue
  }

  h4 {
    color:green;
  }
  .datepicker{
    z-index:1151 !important;
  }

  .shadow {
  -moz-box-shadow:    .5px .5px 2px 3px #ccc;
  -webkit-box-shadow: .5px .5px 2px 3px #ccc;
  box-shadow:         .5px .5px 2px 3px #ccc;
   }
  
</style>


</head>
<body>


   

   <div id="login_form" class="shadow">
      
   <h1>Reporting Login</h1>
   
  <form action="index.php/login/validate_credentials" method="POST">
   <div class="form-group">
      <label for='username'>User Name:</label>
      <input type='text' class="form-control" name='username'>
   </div>
    <div class="form-group">
      <label for='password'>Password:</label>
      <input type='password' class="form-control" name='password'>
   </div>
   <input type="submit" class="btn btn-default" value="Sign In"></input>
   </form>
 
     
   </div>
 