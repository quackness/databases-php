<html>
<head>
<?php
        $servername = "localhost";
        $username = "rootdb";
        $password = "root";
        $dbname = "phpsampledb01";       
    
    try{
        // open MySQL connection with PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT id, firstname, lastname, email FROM Person";
?>
</head>
<body>
<h1>MySQL (PDO)</h1>
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
    <!-- //display the rows -->
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