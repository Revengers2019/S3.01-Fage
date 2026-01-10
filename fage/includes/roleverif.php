<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ?/=/login");
    exit();
}

function isadmin():bool{
    return true;
}
?>