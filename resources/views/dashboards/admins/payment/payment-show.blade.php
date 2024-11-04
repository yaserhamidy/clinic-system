
         
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

<div class=" card">
	     <div class="d-flex justify-content-between card-header">پرداختی ها
       <div class=''>
<a href="payment-add" class="btn btn-primary btn-round px-5">اضافه کردن پرداختی</a>

</div>
</div>	

	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                     <th>شماره</th>
                     <th>مقدار</th>
                     <th>تاریخ</th>
                     <th>نام مریض</th>
                     <th>عملیات</th>
                     
                   </tr>
                   </thead>
                   <tbody>
                   <?php $counter = 0; ?>
                            @foreach($payments as $payment)
                    <tr>
                                <th scope="row">{{++$counter}}</th>
                                <td>{{$payment->amount}} AFG</td>
                                <td>{{$payment->date}}</td>
                                <td>{{$payment->name}}</td>
                    <td>
                                    <div class="row" style="gap:10px">
                                      <a href="paymentEdit/{{$payment->payment_id}}" class='btn btn-primary' style="margin: 0 10px;">ویرایش</a>
                                      <a href="paymentDelete/{{$payment->payment_id}}" class='btn btn-danger' style="margin: 0 10px;">حذف </a>
                                    </div>
                                </td>
                   
                   </tr>
                   @endforeach
                  

                 </tbody></table>
               </div>
	   </div>
        
        </div>

@endsection

