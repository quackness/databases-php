<html>
<body>
<h1>MariaDB</h1>
<br />
<a href="index.php">menu</a>
<br />
<form action="#" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="John"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="Smith"><br><br>
    <label for="email">Last name:</label><br>
    <input type="text" id="email" name="email" value="John.Smith@test.com"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php

    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
    {
//$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "srvmariadbps01.mariadb.database.azure.com", "dbadmin@srvmariadbps01", {your_password}, {your_database}, 3306);

        $servername = "srvmariadbps01.mariadb.database.azure.com";
        $username = "dbadmin";
        $password = "KpassPS!2009";
        $dbname = "PersonalDB";        
        
        // open MySQL connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // only proceed if connection is healthy
        if ($conn->connect_error) {
            die("MySQL Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind the INSERT query - protects against SQL injection attacks
        $stmt = $conn->prepare("INSERT INTO Person (firstname, lastname, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstname, $lastname, $email);
        
        // set parameters and execute
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];

        $stmt->execute();

        $conn->close();
    }    
?>