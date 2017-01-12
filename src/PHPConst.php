<?php

namespace Frc\WP\Env\Heroku\PHPConst;

$all_frc_php_const_env_keys = array_filter(array_keys($_ENV), function ($k) {
    return preg_match('/^FRC_PHP_CONST_/', $k);
});

foreach ($all_frc_php_const_env_keys as $php_const_env_key) {
    $constant_name = preg_replace('/^FRC_PHP_CONST_/', '', $php_const_env_key);
    define($constant_name, getenv($php_const_env_key));
}
