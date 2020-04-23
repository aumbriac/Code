
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Anthony Umbriac">
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Form Validation</h1>
    <p>This <code>form validation code</code> was completed on 4/22.</a></p>
  </div>

  <div class="form-label-group">
    <input type="text" id="username" class="form-control" placeholder="Username" autocomplete="off" maxlength="15" required autofocus>
    <label for="username">Username</label>
  </div>

  <div class="form-label-group">
    <input type="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required>
    <label for="email">Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="password" class="form-control" placeholder="Password" autocomplete="off" required>
    <label for="password">Password</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
    <label for="confirmPassword">Confirm Password</label>
  </div>

  <div class="alert alert-danger">
    <div id="output"></div>
  </div>

  <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit" disabled="true">Submit</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; Anthony Umbriac <?php echo date('Y');?></p>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>
