<?php

// Start session if needed
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

view('about', [
    'heading' => 'About Us'
]);
