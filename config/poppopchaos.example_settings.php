<?php
Copy this file to '__DIR__ . '/../../poppopchaos.private_settings.php'
or wherever settings.php tries to find it.
For security, your db passwords should NOT be in any repo.

This is discussed at length at
https://github.com/odan/slim4-skeleton/blob/master/docs/configuration.md
   (In the link above, Daniel (odan) wrote `env.php`
    In this repo, I called it `poppopchaos.private_settings.php`)

I am leaving this text not in a comment so you cannot possibly run it before
considering where you will keep your passwords safe

// Database
$settings['db']['host'] = 'CHANGE THESE';
$settings['db']['database'] = 'CHANGE THESE';
$settings['db']['username'] = 'CHANGE THESE';
$settings['db']['password'] = 'CHANGE THESE';
