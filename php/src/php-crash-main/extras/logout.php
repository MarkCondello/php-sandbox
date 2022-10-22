<?php
session_start();

// destroy the session
session_destroy();
header('Location: /12_COOKIES_SESSIONS.php');
