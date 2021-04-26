<?php

date_default_timezone_set('America/Caracas');
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', true);
ini_set('display_errors', false);
ini_set('log_errors', true);
ini_set('error_log', './errors.log');

require_once 'config/config.php';

require_once 'libs/app.php';

require_once 'libs/db.php';

require_once 'libs/controller.php';

require_once 'class/errorsManagement.php';

require_once 'libs/view.php';
require_once 'libs/model.php';

require_once 'controllers/errorsController.php';

$app = new App();