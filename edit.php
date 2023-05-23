<?php

include './include/database.php';
$sql = 'DELETE FROM `sabir1` WHERE id=12';
if ($connection->query($sql) === true) {
    echo'record deleted successfully';
} else {
    echo' record did not delete successfully';
}
