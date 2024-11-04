



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
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
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
<div class="card">
    <div class="d-flex justify-content-between card-header">
        <h4>انقالات</h4>
  
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush table-borderless">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th>مقدار</th>
                    <th>نام اکانت</th>
                    <th> پرداختی ID</th>
                    <th>تاریخ</th> 
                    
                </tr>
            </thead>
            <tbody>
            <?php $counter = 0; ?>
                @foreach($transactions as $transaction)
                    <tr>
                    <th scope="row">{{++$counter}}</th>
                        <td>{{ $transaction->amount }} AFG</td>
                        <td>{{ $transaction->account_name }}</td>
                        <td>{{ $transaction->payment_id }}</td>
                        <td>{{ $transaction->date}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        </div>

@endsection


