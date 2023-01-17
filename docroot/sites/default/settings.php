<?php

require_once 'default.settings.php';

// This is defined inside the read-only "config" directory, deployed via Git.
$settings['config_sync_directory'] = $app_root . '/../config/' . basename($site_path);

$on_platformsh = !empty($_ENV['PLATFORM_PROJECT']);
if ($on_platformsh) {
  if (file_exists(__DIR__ . '/settings.platformsh.php')) {
    require __DIR__ . '/settings.platformsh.php';
  }
}
else {
  // Draft.
  if (file_exists(__DIR__ . '/settings.draft.php')) {
    include __DIR__ . '/settings.draft.php';
  }
  // Local.
  if (file_exists(__DIR__ . '/settings.local.php')) {
    include __DIR__ . '/settings.local.php';
  }
}

// Automatically generated include for settings managed by ddev.
$ddev_settings = dirname(__FILE__) . '/settings.ddev.php';
if (getenv('IS_DDEV_PROJECT') == 'true' && is_readable($ddev_settings)) {
  require $ddev_settings;
}
