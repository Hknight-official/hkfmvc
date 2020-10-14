<?php

// platform_check.php @generated by Composer

$issues = array();

$missingExtensions = array();
extension_loaded('mbstring') || $missingExtensions[] = 'mbstring';
extension_loaded('mysqli') || $missingExtensions[] = 'mysqli';
extension_loaded('openssl') || $missingExtensions[] = 'openssl';

if ($missingExtensions) {
    $issues[] = 'Your Composer dependencies require the following PHP extensions to be installed: ' . implode(', ', $missingExtensions);
}

if ($issues) {
    echo 'Composer detected issues in your platform:' . "\n\n" . implode("\n", $issues);
    exit(104);
}
