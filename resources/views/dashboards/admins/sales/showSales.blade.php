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

    <div class="card-body col-md-4">
        <form method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="جستجو بر اساس نام دارو فروخته شده" value="{{ request()->get('query') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">جستجو</button>
                </div>
            </div>
        </form>
        <a class=" btn btn-primary" href="{{ route('sell.create') }}">اضافه کردن فروش</a>
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

                        <!-- Print Button -->
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" onclick="printPage()">print</button>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>شماره فروش</th>
                                    <th>نام دارو</th>
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

                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function printPage() {
        window.print();
    }
</script>

@endsection