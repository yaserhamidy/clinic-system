


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
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">خرید های ثبت شده</h3>
              </div>

              <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                  <thead>
                    <tr>
                      <th>شماره</th>
                      <th>نام دارو</th>
                      <th>تعداد</th>
                      <th>تاریخ خرید</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $counter = 0; ?>
                    @foreach($purchases as $purchase)
                      <tr>
                        <th scope="row">{{ ++$counter }}</th>
                        <td>{{ $purchase->medicine->medicine_name }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->purchase_date->format('Y-m-d') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>
    <!-- Main content -->
   
</div>

@endsection

