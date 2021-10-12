<?php

echo time();
echo '<br>';
echo date('d/m/Y');
echo '<br>';
echo date('d/m/Y', strtotime ('+4 days'));
echo '<br>';
$timestamp = strtotime('10-10-2021');
echo $timestamp;


var_dump(date('d/m/Y') > date('d/m/Y', strtotime ('+1 days')));