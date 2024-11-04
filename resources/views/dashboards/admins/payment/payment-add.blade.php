
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
<form action="{{ route('addPayment') }}" method="post" id="paymentForm">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="card-title">اضافه کردن پرداختی</div>
            <hr>
            <div class="form-group">
                <label for="amount">مقدار</label>
                <input type="text" name="amount" class="form-control form-control-rounded" placeholder="Enter Payment Amount" required>
            </div>
            
            <div class="form-group">
                <label for="date">تاریخ</label>
                <input type="date" name="date" class="form-control form-control-rounded" placeholder="Enter Payment Date">
            </div>

            <div class="form-group">
                <label>نام مریض</label>
                <select name="patient_id" class="form-control form-control-rounded" id="patient-id">
                    @foreach($patients as $patient)
                        <option value="{{$patient->patient_id }}">{{ $patient->patient_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Account Name</label>
                <select name="account_id" class="form-control form-control-rounded" required>
                  @foreach($accounts as $account) <!-- Ensure you fetch accounts in your add method -->
                  <option value="{{ $account->account_id }}">{{ $account->account_name }}</option>
                 @endforeach
               </select>
            </div>
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-round px-5" value="اضافه کردن پرداختی">
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
        </div>

@endsection


