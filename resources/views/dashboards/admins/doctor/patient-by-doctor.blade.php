
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
           

<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">لیست بیماران مربوط به داکتر</h3>
                            <div class="card-tools">
                                <a href="{{ route('doctor-show') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                                <thead>
                                    <tr>
                                        <th>شماره</th>
                                        <th>نام بیمار</th>
                                        <th>تخلص</th>
                                        <th>سن</th>
                                        <th>شماره تماس</th>
                                        <th>آدرس</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $index => $patient)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $patient->patient_name }}</td>
                                        <td>{{ $patient->lastName }}</td>
                                        <td>{{ $patient->age }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>        
        
      
        </div>

@endsection





