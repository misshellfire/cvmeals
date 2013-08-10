<?php
include 'framework.php';
$contentPage = substr_replace($_SERVER['REQUEST_URI'], '/', '-', 1);
$contentPage = $contentPage === '/' ? 'main' : $contentPage;

ob_start();
partial('header');
content($contentPage);
partial('footer');
ob_end_flush();