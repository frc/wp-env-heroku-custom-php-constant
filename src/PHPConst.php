<?php

namespace Frc\WP\Env\Heroku\PHPConst;

$all_frc_php_const_env = array_filter(array_keys($_ENV), function ($k) {
    return preg_match('/^FRC_PHP_CONST_/', $k);
});

foreach ($all_frc_php_const_env as $php_const_env) {
    $constant_name = preg_replace('/^FRC_PHP_CONST_/', '', $php_const_env);
    define($constant_name, getenv($php_const_env));
}
