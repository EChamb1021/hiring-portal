<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Job Application</title>
</head>
<body>
    <h1>Log in</h1>
    
    <!-- Log in Form -->
    <form id="log-in" action="login.php" method="post">
        <div class="form-field">
            <label for="username" id="username-label">
                Username
            </label>

            <input name="username" type="text" id="user-name" value="<?php echo isset($_POST['username'])? $_POST['username']:''; ?>">
        </div>
        <div class="form-field">
            <label for="password" id="password-label">
                Password
            </label>

            <input name="password" type="text" id="password">
        </div>
        <input type="submit" value="Log in"></input>
    </form>
</body>
</html>





