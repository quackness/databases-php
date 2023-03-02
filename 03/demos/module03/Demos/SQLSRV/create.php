<html>
<body>
<h1>Azure SQL Database / Microsoft SQL Server</h1>
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
        // open MS SQL Server connection
        $serverName = "srvsqldbps01.database.windows.net,1433"; //serverName\instanceName

        // Since UID and PWD are not specified in the $connectionInfo array,
        // The connection will be attempted using Windows Authentication.
        $connectionInfo = array( "Database"=>"phpdb01", "UID"=>"dbadmin", "PWD"=>"KpassPS!2009");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        if( $conn ) {
            echo "Connection is successfully established.<br />";
        }else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        
        // only proceed if connection is healthy
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
       }
        
        // prepare and bind the INSERT query - protects against SQL injection attacks
        $sql = "INSERT INTO Person (firstname, lastname, email) VALUES (?, ?, ?)";

        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];
        $params = array($firstname, $lastname, $email);

        $stmt = sqlsrv_query( $conn, $sql, $params);

        if( $stmt === false ) {
             die( print_r( sqlsrv_errors(), true));
        }
    }    
?>