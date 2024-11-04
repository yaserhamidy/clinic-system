
         



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
        <h1>جزئیات پرداخت برای {{ $patient->patient_name }}</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">پرداخت‌ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>شماره پرداخت</th>
                                <th>مقدار</th>
                                <th>تاریخ</th>
                                <th>حساب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->payment_id }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->account_id }}</td> <!-- You may want to join with accounts to get the account name -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($payments->isEmpty())
                        <p>هیچ پرداختی یافت نشد.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection