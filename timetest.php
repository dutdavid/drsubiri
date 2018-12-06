<?php
date_default_timezone_set("Africa/Nairobi");

$current = time() + (3600*24);

print date("Y-m-d H:i:s, l", $current);

?>