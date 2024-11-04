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
                        <h1> فروش جدید</h1>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('sell.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="medicine_id">انتخاب دارو</label>
                                <select name="medicine_id" id="medicine_id" class="form-control" required>
                                    <option value="">-- انتخاب دارو --</option>
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->medicine_id }}">{{ $medicine->medicine_name }} (موجود: {{ $medicine->amount }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">اندازه</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                            </div>

                            <button type="submit" class="btn btn-success">اضافه کردن فروش</button>
                            <a href="{{ route('sell.show') }}" class="btn btn-secondary">کنسل کردن</a>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection