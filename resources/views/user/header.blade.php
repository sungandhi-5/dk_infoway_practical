<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$header['title']}}</title>

    <!-- Bootstrap & DataTables CSS -->

    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/ag-grid-community/23.1.0/ag-grid-community.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/ag-grid-community/23.1.0/theme/ag-theme-alpine.css">
    <link href="{{asset('/css/toaster.min.css')}}" rel="stylesheet">
    <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}" href="{{ route('get.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/stock/add') ? 'active' : '' }}" href="{{ route('get.stock.add') }}">Add Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>