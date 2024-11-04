

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
    <div class="card-body col-md-4">
                            <form method="GET" action="{{ route('patient-show') }}">
                                <div class="input-group mb-3">
                                    <input type="text" name="query" class="form-control" placeholder="جستجو بر اساس نام مریض" value="{{ request()->get('query') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">جستجو</button>
                                    </div>
                                </div>
                            </form>
                        </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
<div class="col-md-12">
        
<div class="card">
    <div class="d-flex justify-content-between card-header">مریضان
        <div class=''>
            <a href="patient-add" class="btn btn-primary btn-round px-5">اضافه کردن مریض</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush table-borderless">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th>نام</th>
                    <th>تخلص</th>
                    <th>سن</th>
                    <th>شماره تماس</th>
                    <th>آدرس</th>
                    <th>جنسیت</th>
                    <th>فشار خون</th>
                    <th>تاریخچه مریضی</th>
                    <th>تاریخ</th>
                    <th>وضعیت</th>
                    <th>نام داکتر</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
            <?php $counter = 0; ?>
                @foreach($patients as $patient)
                <tr>
                <th scope="row">{{++$counter}}</th>
                    
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->lastName }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->blood_pressure }}</td>
                    <td>{{ $patient->medical_history }}</td>
                    <td>{{ $patient->created_at }}</td>
                    <td>{{ $patient->status }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>
                        <div class="row" style="gap:10px">
                            <a href="patientEdit/{{$patient->patient_id}}" class='btn btn-primary'>ویرایش</a>
                            <a href="patientDelete/{{$patient->patient_id}}" class='btn btn-danger'>حذف</a>
                            <a href="{{ route('payment-details', $patient->patient_id) }}" class='btn btn-info'>جزئیات پرداخت</a>
                            <a href="{{ route('session-details', $patient->patient_id) }}" class='btn btn-info'>جزئیات جلسه</a>
                            <form action="{{ route('completePatient', $patient->patient_id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">تمام شده</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        </div>

@endsection




