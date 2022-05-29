<?php

session_start();

    unset($_SESSION['ADMIN_LOGIN']);
    unset($_SESSION['ADMIN_USERNAME']);
    echo "session destroyed";
    session_destroy();
    echo"<script>location.href='admin_login.php'</script>";





?>