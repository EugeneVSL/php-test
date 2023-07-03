<?php

use Core\App;
use Core\Authenticator;

(new Authenticator)->logout();

// redirect to home page
header('location: /php-test/');
exit();