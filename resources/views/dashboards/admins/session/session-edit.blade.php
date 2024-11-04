
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
<form action="{{ route('editSession', $session->session_id) }}" method="post">
    @csrf
    <input type="hidden" name="session_id" value="{{ $session->session_id }}">
    <div class="card">
        <div class="card-body">
            <div class="card-title">ویرایش جلسه</div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">نام</label>
                        <input type="text" name="session_name" class="form-control form-control-rounded" value="{{ old('session_name', $session->session_name) }}" placeholder="Enter session's Name" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">توضیحات</label>
                        <input type="text" name="description" class="form-control form-control-rounded" value="{{ old('description', $session->description) }}" placeholder="Enter session's Name" required>
                    </div>
                </div>
               

            

             

            
              

                        
                <div class="col-md-12">
                    <div class="form-group">
                        <label>نام مریض</label>
                        <select name="patient_id" class="form-control form-control-rounded">
                            <option value="">Select Patient</option>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->patient_id }}" @if($patient->patient_id == $session->patient_id) selected @endif>{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-round mt-5 px-5" value="ذخیره">
            </div>
        </div>
    </div>
</form>
        </div>

@endsection




