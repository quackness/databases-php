<?php
// https://www.php.net/manual/en/mongodb-driver-bulkwrite.delete.php

    $Pid = $_GET["Pid"];

    $manager = new MongoDB\Driver\Manager("mongodb+srv://rezarw:Password01@cluster0.4catg.azure.mongodb.net/PersonalDB?retryWrites=true&w=majority");

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['Pid'=>intval($Pid)], ['limit' => 1]);

    $result = $manager->executeBulkWrite('PersonalDB.Person', $bulk);

    header("Location: list.php");
?>