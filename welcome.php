<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <button id="logout">Logout</button>

    <h1>Hello</h1>
    <h2>Your email is:
        <?php
        session_start();

        if (isset($_SESSION['email'])) {
        ?>
            <span id="loggedEmail"> <?php echo $_SESSION['email']; ?></span>
        <?php
        }
        ?>
    </h2>
    <script src="./js/app.logout.js"></script>
</body>

</html>