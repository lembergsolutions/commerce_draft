<?php

require_once 'default.settings.php';

// This is defined inside the read-only "config" directory, deployed via Git.
$settings['config_sync_directory'] = $app_root . '/../config/default';

// Installation profile.
$settings['install_profile'] = 'draft';

// Local settings. These come last so that they can override anything.
if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
$databases['default']['default'] = array (
  'database' => 'drupal',
  'username' => 'drupal',
  'password' => 'drupal',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$settings['hash_salt'] = 'TR6haBmvgM8QWP66wmA3P7rFbeRcQhb-AxQnol2mb3o6MjdzqgHz0vtrPyHsOhm9yg3t_nw35Q';
