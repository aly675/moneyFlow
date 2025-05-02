<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Uang Tunai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/kategori.css') }}">
</head>

<body>
    <nav class="sidebar">
        <div class ="sidebar-icon ">
            <a href="">
                <img src="{{ asset('assets/img/avatar.png') }}" alt="" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-cash-stack" href="{{ route('dashboard') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" id="active" href="{{ route('manejemen.anggaran') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" href="/Dashboard/3Rekap/index.html"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-journal" href="/Dashboard/4Target/index.html"></a>
            </i>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div><a class="bi bi-arrow-left-short" href="{{ route('manejemen.anggaran') }}"></a></div>
            <input type="date" id="date" value="{{ now()->toDateString() }}">
        </div>

        <div class="main-container">
            
