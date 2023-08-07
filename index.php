
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
    <header>
        <div class="left-nav">
            <img src="assets/LC_COMPANY LOGO_MARCH 2023-01.png" alt="logo">
        </div>
        <div class="right-nav">
            <h1>bliss customer service e-log</b></h1>
        </div>
    </header>
    <center>
    <form action="login.php" method="post">
     	<h2>LOGIN</h2>
        <img src="assets/user.png" alt="user">
        <br>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label> <br>
     	<input type="text" name="username" ><br>

     	<label>User Password</label> <br>
     	<input type="password" name="password" ><br>
            <br>
         <button type="submit" class="btn btn-primary">Login</button>
     </form>
     </center>
    <footer>
        <center>
          <p>© 2023 Little Caliph International</p>
        </center>
    </footer>
 </body>
 </html>