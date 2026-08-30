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
    <style>
      :root, [data-theme] {
        --color-primary: #39B54A !important;
        --p: #39B54A !important;
        --pc: #ffffff !important;
      }
      
      /* Card Boxes: No Shadows, Thin Light Grey Border */
      .card,
      .cards .card,
      .form-container {
        box-shadow: none !important;
        border: 1px solid #e5e7eb !important;
      }
      
      /* Target action buttons specifically */
      .btn-primary,
      button.btn-primary,
      a.btn-primary {
        background-color: #39B54A !important;
        border-color: #39B54A !important;
        color: #ffffff !important;
        box-shadow: none !important;
        outline: none !important;
        filter: none !important;
        transform: none !important;
        transition: none !important;
      }
      
      .btn-primary:hover,
      .btn-primary:focus,
      .btn-primary:active {
        background-color: #39B54A !important;
        border-color: #39B54A !important;
        color: #ffffff !important;
      }

      .btn-ghost {
        background-color: transparent !important;
        border-color: transparent !important;
        color: inherit !important;
        box-shadow: none !important;
      }

      .btn-soft.btn-primary {
        background-color: rgba(57, 181, 74, 0.15) !important;
        border-color: transparent !important;
        color: #39B54A !important;
        box-shadow: none !important;
        transition: none !important;
      }

      .btn-soft.btn-primary.active,
      .category-btn.active {
        background-color: #39B54A !important;
        border-color: #39B54A !important;
        color: #ffffff !important;
        box-shadow: none !important;
        transition: none !important;
      }

      /* Disable underline on footer links */
      footer a,
      footer a:hover,
      footer .link,
      footer .link:hover {
        text-decoration: none !important;
      }
    </style>
    <title><?php echo $pageTitle ?? 'NSBM Event Hub'; ?></title>

</head>
<body>