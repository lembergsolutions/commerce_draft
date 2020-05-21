<?php

require_once 'default.settings.php';

// This is defined inside the read-only "config" directory, deployed via Git.
$settings['config_sync_directory'] = $app_root . '/../config/default';

// Installation profile.
$settings['install_profile'] = 'draft';

// Include Platform.sh settings if available.
if (file_exists($app_root . '/' . $site_path . '/settings.platformsh.php')) {
  include $app_root . '/' . $site_path . '/settings.platformsh.php';
}

// Local settings. These come last so that they can override anything.
if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
