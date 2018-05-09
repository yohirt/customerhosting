<?php

// your first date coming from a mysql database (date fields)
$dateA = '2008-03-01 13:32';
// your second date coming from a mysql database (date fields)
$dateB = '2008-03-01 13:34';

if (strtotime($dateA) >= strtotime($dateB)) {
    echo "Data jest większa";
} else {
    echo "data jest mniejsza <br />";
}
