<html>
<head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "phpsampledb";        
    
    // open MySQL connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // only proceed if connection is healthy
    if ($conn->connect_error) {
        die("MySQL Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, firstname, lastname, email FROM Person";
    $result = $conn->query($sql);  
?>
</head>
<body>
<br />
<a href="index.php">menu</a>
<br />
<?php
if ($result->num_rows > 0) 
{
    ?>
    <table>
    <tr>
    <th>Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php print $row["id"] ?></td>
            <td><?php print $row["firstname"] ?></td>
            <td><?php print $row["lastname"] ?></td>
            <td><?php print $row["email"] ?></td>
        </tr>
    <?php } ?>
    </table>
    <?php
}
$conn->close();
?>
</body>
</html>