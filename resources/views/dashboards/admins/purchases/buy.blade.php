

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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('buyMedicine') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">خرید دارو</div>
                                <hr>
                                <div class="form-group">
                                    <label for="medicine_id">انتخاب دارو</label>
                                    <select name="medicine_id" class="form-control form-control-rounded" required>
                                        @foreach($medicines as $medicine)
                                            <option value="{{ $medicine->medicine_id }}">{{ $medicine->medicine_name }} (موجود: {{ $medicine->amount }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">تعداد</label>
                                    <input type="number" name="quantity" class="form-control form-control-rounded" required min="1">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-round mt-5 px-5" value="خرید">
                                </div>
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                </div>
            </div>
        </div>
    </section>
</div>

@endsection