# wp-env-heroku-custom-php-constant

Allow PHP constants to be defined through Heroku environment, as long as the environment key starts with FRC_PHP_CONST_ prefix.

The prefix gets removed when the constant is set in the PHP side. For example, an environment variable FRC_PHP_CONST_PLL_LANGUAGE will define the PHP constant PLL_LANGUAGE within WordPress (with the value coming from the env key).