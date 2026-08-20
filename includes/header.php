<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Build a base URL when the project is served from a subdirectory like /GROUP-AA-NSBM.
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $segments = explode('/', trim($scriptName, '/'));
    $baseUrl = '';

    if (!empty($segments[0]) && strpos($segments[0], '.php') === false) {
        $baseUrl = '/' . $segments[0];
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/style.css">
    <title><?php echo $pageTitle ?? 'NSBM Event Hub'; ?></title>

</head>
<body>