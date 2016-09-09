<?php
require('connections/lib_connect.php');


if(isset($_GET['directory'])){
download($_GET['directory']);
}
 ?>
