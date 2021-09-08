<!DOCTYPE html>
<html @lang(str_replace('_', '-', app()->getLocale()))>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
    <link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.css"/>   
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    {{-- @csrf--}}
    {{--  <meta name="csrf-token" content="{{ csrf_token() }}" />--}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
