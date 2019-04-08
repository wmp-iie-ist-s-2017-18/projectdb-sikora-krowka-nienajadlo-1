<?php
    session_destroy();
    header("Location: ../index.php?logged_out=true");
?>