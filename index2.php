<?php

$_SESSION['token'] = md5(time() * rand(142, 628));

echo $_SESSION['token'];