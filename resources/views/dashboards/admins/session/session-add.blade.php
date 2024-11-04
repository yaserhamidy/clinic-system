      
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
<form action="{{ route('addSession') }}" method="post" id="sessionForm">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="card-title">اضافه کردن جلسه</div>
            <hr>
            <div class="form-group">
                <label for="session_name">نام</label>
                <input type="text" name="session_name" class="form-control form-control-rounded" placeholder="Enter Session Name" required>
            </div>
            
            <div class="form-group">
                <label for="description">توضیحات</label>
                <input type="text" name="description" class="form-control form-control-rounded" placeholder="Enter Session Description">
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
                <input type="submit" class="btn btn-light btn-round px-5" value="Add Session">
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




