<?php

// phpcs:ignoreFile

/**
 * @file
 * DDEV settings file.
 */

$host = "db";
$port = 3306;
$driver = "mysql";

// If DDEV_PHP_VERSION is not set but IS_DDEV_PROJECT *is*, it means we're running (drush) on the host,
// so use the host-side bind port on docker IP
if (empty(getenv('DDEV_PHP_VERSION') && getenv('IS_DDEV_PROJECT') == 'true')) {
  $host = "127.0.0.1";
  $port = 32813;
}

$databases['default']['default'] = array(
  'database' => "db",
  'username' => "db",
  'password' => "db",
  'host' => $host,
  'driver' => $driver,
  'port' => $port,
  'prefix' => "",
);

// Reporting level.
error_reporting(E_ALL);
ini_set('display_errors', 1);
$config['system.logging']['error_level'] = 'verbose';

// Services file.
$settings['container_yamls'][] = __DIR__ . "/services.ddev.yml";

// Hash salt.
$settings['hash_salt'] = 'rJHMTbimmrZdkliUAVuTHcHmLCyqDGnEWFzAzcNPaONiKLyDqKiYICHKPFnmkuXt';

// This will prevent Drupal from setting read-only permissions on sites/default.
$settings['skip_permissions_hardening'] = TRUE;

// This will ensure the site can only be accessed through the intended host
// names. Additional host patterns can be added for custom configurations.
$settings['trusted_host_patterns'] = ['.*'];

// Don't use Symfony's APCLoader. ddev includes APCu; Composer's APCu loader has
// better performance.
$settings['class_loader_auto_detect'] = FALSE;

// Set $settings['config_sync_directory'] if not set in settings.php.
if (empty($settings['config_sync_directory'])) {
  $settings['config_sync_directory'] = 'sites/default/files/sync';
}

// Override drupal/symfony_mailer default config to use Mailhog
$config['symfony_mailer.mailer_transport.sendmail']['plugin'] = 'smtp';
$config['symfony_mailer.mailer_transport.sendmail']['configuration']['user']='';
$config['symfony_mailer.mailer_transport.sendmail']['configuration']['pass']='';
$config['symfony_mailer.mailer_transport.sendmail']['configuration']['host']='localhost';
$config['symfony_mailer.mailer_transport.sendmail']['configuration']['port']='1025';

// Override drupal/swiftmailer default config to use Mailhog
$config['swiftmailer.transport']['transport'] = 'smtp';
$config['swiftmailer.transport']['smtp_host'] = '127.0.0.1';
$config['swiftmailer.transport']['smtp_port'] = '1025';
$config['swiftmailer.transport']['smtp_encryption'] = '0';

// Cache settings.
$settings['cache']['bins']['discovery_migration'] = 'cache.backend.memory';
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

// Aggregation settings.
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

// Update access.
$settings['update_free_access'] = TRUE;
