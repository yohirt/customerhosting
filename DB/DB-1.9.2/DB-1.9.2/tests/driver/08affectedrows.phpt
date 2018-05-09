--TEST--
DB_driver::affectedRows
--SKIPIF--
<?php
require_once dirname(__FILE__) . '/skipif.inc';

// ibase_query on PHP 4 doesn't support affected rows.
if ($dbh->phptype == 'ibase' && version_compare(PHP_VERSION, '5.0.0', '<')) {
	die('skip ibase doesn\'t return affected rows from ibase_query in PHP 4');
}
?>
--FILE--
<?php
require_once dirname(__FILE__) . '/mktable.inc';

/**
 * Local error callback handler.
 *
 * Drops the phptest table, prints out an error message and kills the
 * process.
 *
 * @param object  $o  PEAR error object automatically passed to this method
 * @return void
 * @see PEAR::setErrorHandling()
 */
function pe($o) {
    global $dbh;

    $dbh->setErrorHandling(PEAR_ERROR_RETURN);
    drop_table($dbh, 'phptest');

    die($o->toString());
}

$dbh->setErrorHandling(PEAR_ERROR_CALLBACK, 'pe');


// Clean table
$dbh->query("DELETE FROM phptest");

// Affected rows by INSERT statement
$dbh->query("INSERT INTO phptest (a,b) VALUES(1, 'test')");
$dbh->query("INSERT INTO phptest (a,b) VALUES(2, 'test')");
printf("%d after insert\n", $dbh->affectedRows());

// Affected rows by SELECT statement
$dbh->query("SELECT * FROM phptest");
printf("%d after select\n", $dbh->affectedRows());
$dbh->query("DELETE FROM phptest WHERE b = 'test'");
printf("%d after delete\n", $dbh->affectedRows());

// Affected rows by DELETE statement
$dbh->query("INSERT INTO phptest (a,b) VALUES(1, 'test')");
$dbh->query("INSERT INTO phptest (a,b) VALUES(2, 'test')");
$dbh->query("DELETE FROM phptest");
printf("%d after delete all\n", $dbh->affectedRows());


$dbh->setErrorHandling(PEAR_ERROR_RETURN);
drop_table($dbh, 'phptest');

?>
--EXPECT--
1 after insert
0 after select
2 after delete
2 after delete all
