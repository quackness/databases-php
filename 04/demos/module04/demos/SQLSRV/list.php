<html>
<head>
<?php
/*
https://docs.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server?view=sql-server-ver15
*/

    $servername = "srvsqldbps01.database.windows.net";
    $username = "dbadmin";
    $password = "KpassPS!2009";
    $dbname = "phpdb01";
    
    try{
        // open MySQL connection with PDO
        $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname", $username, $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT id, firstname, lastname, email FROM Person";
?>
</head>
<body>
<h1>MS SQL Server/Azure SQL Database (PDO)</h1>
<br />
<a href="index.php">menu</a>
<br />
<table>
    <tr>
    <th>Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    </tr>
    <?php foreach($conn->query($sql) as $row) { ?>
        <tr>
            <td><?php print $row["id"] ?></td>
            <td><?php print $row["firstname"] ?></td>
            <td><?php print $row["lastname"] ?></td>
            <td><?php print $row["email"] ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>