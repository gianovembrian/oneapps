<?php

/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
* @var \App\View\AppView $this
*/

$cakeDescription = 'DITSPSI ITB';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?> 
        <?php
        $this->fetch('title'); 
        ?> 
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?> -->

    <script>
        var hostUrl = "/assets/";
    </script>

    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <!-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> -->
    <link rel="shortcut icon" href="https://login.itb.ac.id/cas/images/itb.ico" />
    <link href="/node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/datatables-style.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script(['scripts.bundle']) ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="/assets/js/custom/widgets.js"></script>
    <script src="/assets/js/custom/apps/chat/chat.js"></script>
    <script src="/assets/js/custom/modals/create-app.js"></script>
    <script src="/assets/js/custom/modals/upgrade-plan.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>





    <style type="text/css">
        .select2-container .select2-selection--single {
            height: 2.875rem; 
        }
        
        .icon-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid currentColor;
            font-size: 1.2em;
        }
        
        .input-group-text {
            display: flex;
            align-items: center;
            height: 100%;
        }
        
        select.form-select {
            height: calc(5.25rem + 2px); 
        }
        
        th{
            vertical-align:middle
        }

  
        footer {
            background-color: #f8f9fa;
            color: #6c757d;
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" 
style="kt-toolbar-height:55px;kt-toolbar-height-tablet-and-mobile:55px">
<main class="main">
    <?= $this->Flash->render() ?>
    <?= $this->element('aside') ?>

    <div class="wrapper" id="kt_wrapper" >
        <div id="kt_header" class="header align-items-stretch" style="background-color:#005aab">
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
             <!--begin::Aside mobile toggle-->
             <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                    <i class="bi bi-list fs-1"></i>
                </div>
            </div>
            <!--end::Aside mobile toggle-->
            <!--begin::Mobile logo-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="/" class="d-lg-none">
                    <img alt="Logo" src="https://ditbang.itb.ac.id/wp-content/uploads/sites/27/2024/06/logo-ditbang.png" class="h-45px" />
                </a>
            </div>

            <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">

            </div>
        </div>
    </div>

    <div class="card-body">
        <?= $this->fetch('content') ?>
        <footer class="footer">
            <div class="container-fluid text-center py-3" style="background-color: #f8f9fa; color: #6c757d;">
                <p class="mb-0">&copy; <?= date('Y') ?> Direktorat Sarana Prasarana dan Sistem Informasi <br />Institut Teknologi Bandung.</p>
            </div>
        </footer>
    </div>
</div>
</main>

</body>
</html>

