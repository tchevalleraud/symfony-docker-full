<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
$openapi = \OpenApi\Generator::scan(['/path/to/project']);
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();