<?php 
session_start();

require_once dirname(__FILE__)."/core/App/autoloading.php";

\App\Kernel::run();

?>