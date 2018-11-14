<?php

namespace Frc\WP\Env\Heroku\PHPConst;

$all_envs = $_ENV;

if(version_compare(phpversion(), '7.1') >= 0 && empty($all_envs)) {
    $all_envs = getenv();
}

$env = (!empty($all_envs)) ? $all_envs : $_SERVER;

$all_frc_php_const_env_keys = array_filter(array_keys($env), function ( $k ) {
    return preg_match('/^FRC_PHP_CONST_/', $k);
});

foreach ($all_frc_php_const_env_keys as $php_const_env_key) {
    $constant_name = preg_replace('/^FRC_PHP_CONST_/', '', $php_const_env_key);
    $constant_value = getenv($php_const_env_key);

    // Treat true/false strings as boolean values
    if ($constant_value && strtolower($constant_value) === 'false') {
        $constant_value = false;
    } elseif ($constant_value && strtolower($constant_value) === 'true') {
        $constant_value = true;
    }

    define($constant_name, $constant_value);
}
