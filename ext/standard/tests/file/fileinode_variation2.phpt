--TEST--
Test fileinode() function: usage variations - invalid filenames
--CREDITS--
Dave Kelsey <d_kelsey@uk.ibm.com>
--FILE--
<?php
/*
Prototype: int fileinode ( string $filename );
Description: Returns the inode number of the file, or FALSE in case of an error.
*/

/* Testing fileinode() with invalid arguments -int, float, bool, NULL, resource */

$file_path = __DIR__;

echo "*** Testing Invalid file types ***\n";
$filenames = array(
  /* Invalid filenames */
  -2.34555,
  " ",
  "",
  TRUE,
  FALSE,
  NULL,

  /* scalars */
  1234,
  0
);

/* loop through to test each element the above array */
foreach( $filenames as $filename ) {
  var_dump( fileinode($filename) );
  clearstatcache();
}

echo "\n*** Done ***";
?>
--CLEAN--
<?php
$file_path = __DIR__;
unlink($file_path."/fileinode_variation2.tmp");
?>
--EXPECTF--
*** Testing Invalid file types ***

Warning: fileinode(): stat failed for -2.34555 in %s on line %d
bool(false)

Warning: fileinode(): stat failed for   in %s on line %d
bool(false)
bool(false)

Warning: fileinode(): stat failed for 1 in %s on line %d
bool(false)
bool(false)
bool(false)

Warning: fileinode(): stat failed for 1234 in %s on line %d
bool(false)

Warning: fileinode(): stat failed for 0 in %s on line %d
bool(false)

*** Done ***
