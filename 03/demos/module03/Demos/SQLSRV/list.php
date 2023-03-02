<html>
<head>
<?php
    // open MS SQL Server connection
    $serverName = "srvsqldbps01.database.windows.net,1433"; //serverName\instanceName

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"phpdb01", "UID"=>"dbadmin", "PWD"=>"KpassPS!2009");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( !$conn ) {
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
    
    // only proceed if connection is healthy
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
   }
    
   $sql = "SELECT Id, Firstname, Lastname, Email FROM Person";
   $stmt = sqlsrv_query($conn, $sql);

   if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
?>
</head>
<body>
<h1>Azure SQL Database / Microsoft SQL Server</h1>
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
    <?php while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php print $row["Id"] ?></td>
            <td><?php print $row["Firstname"] ?></td>
            <td><?php print $row["Lastname"] ?></td>
            <td><?php print $row["Email"] ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>
<?php
    sqlsrv_free_stmt( $stmt);
?>