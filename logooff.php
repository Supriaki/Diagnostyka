<?php
    // Deleting cookies/session
    session_start();    
    session_destroy();

    if (isset($_COOKIE['loginob'])) {
        unset($_COOKIE['loginob']);
        setcookie('loginob', '', time() - 3600, '/'); // empty value and old timestamp
    }
?>

<script language="JavaScript" type="text/javascript">
    location.href="index.php";
</script>