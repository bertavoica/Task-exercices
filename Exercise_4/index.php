<html>
<head>
    <title>Assignment LOGIN</title>
</head>
<body>
<form action="login.php" method="post">
    <h2>Welcome to the login page</h2>
    <?php if (isset($_GET['message'])) { ?>
        <p><?php echo $_GET['message']; ?></p>
    <?php } ?>

    <label for="user">User:</label>
    <input type="text" name="username" placeholder="Username" id="user"><br>

    <label for="pass">Password</label>
    <input type="password" name="password" placeholder="Password" id="pass"><br>

    <button type="submit">Login</button>
</form>
<a href="logout.php">Logout</a>
</body>
</html>