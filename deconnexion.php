<?php
session_start();
session_destroy();

echo "  <script language='JavaScript'>
            localStorage.removeItem('who');
        </script>";
echo 'hello';
header('Location:my-page.php');
