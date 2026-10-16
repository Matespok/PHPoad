<?php

session_start();
session_unset();
session_destroy();
echo "logged out. Go back to <a href='index.php'>index</a>";
