<?php

// Load default settings
$settings = require __DIR__ . '/settings_default.php';

// Overwrite default settings with environment specific local settings
if (file_exists(__DIR__ . '/../../poppopchaos.private_settings.php')) {
    require __DIR__ . '/../../poppopchaos.private_settings.php';
}

return $settings;
