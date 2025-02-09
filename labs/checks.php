<?php

// check injection 0x01
$tableName = "injection0x01";
$checkTable = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($checkTable);
if ($result->num_rows == 0) {
    $errorMessage = "Error: Could not find injection0x01 table.";
}

// check injection 0x02
$tableName = "injection0x02";
$checkTable = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($checkTable);
if ($result->num_rows == 0) {
    $errorMessage = "Error: Could not find injection0x02 table.";
}

// check injection 0x03
#$tableName = "injection0x03";
#$checkTable = "SHOW TABLES LIKE '$tableName'";
#$result = $conn->query($checkTable);
#if ($result->num_rows == 0) {
#    $errorMessage = "Error: Could not find injection0x03 table.";
#}