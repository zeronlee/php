<?php 
require_once(dirname(__FILE__)."/DooDigestAuth.php");
DooDigestAuth::http_auth('example.com', array('admin'=>"123456789"));