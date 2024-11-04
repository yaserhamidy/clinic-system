@extends('layout.main')

@section('content')

</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">داروها</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="container">
    <h1>لیست فروش</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>شماره فروش</th>
                <th>نام دارو </th>
                <th>اندازه فروش</th>
                <th>تاریخ فروش</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->sell_id }}</td>
                    <td>{{ $sale->medicine->medicine_name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->sell_date->format('Y-m-d') }}</td>
                    
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('sell.create') }}" class="btn btn-primary">اضافه کردن فروش</a>
</div>

                    <!-- ./col -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection