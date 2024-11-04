  

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
    <div class="content-header">
        <h1>جزئیات جلسه برای {{ $patient->patient_name }}</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جلسات</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>شماره جلسه</th>
                                <th>نام جلسه</th>
                                <th>توضیحات</th>
                                <th>تاریخ</th> <!-- Adjust this if you have a date field -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sessions as $session)
                            <tr>
                                <td>{{ $session->session_id }}</td>
                                <td>{{ $session->session_name }}</td>
                                <td>{{ $session->description }}</td>
                                <td>{{ $session->created_at }}</td> <!-- Assuming you have a timestamp -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($sessions->isEmpty())
                        <p>هیچ جلسه‌ای یافت نشد.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

