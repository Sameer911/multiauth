@extends('layouts.master')

@section('content')




<section class="section">
  <div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Cash In Hand</h5>
                  <h2 class="mb-3 font-18">{{$Cashinhand}}  PKR</h2>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="assets/img/banner/1.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15"> Pending Order</h5>
                  <h2 class="mb-3 font-18">{{$pendingOrders}}</h2>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="assets/img/banner/2.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Paid Orders</h5>
                  <h2 class="mb-3 font-18">{{$paidOrders}}</h2>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="assets/img/banner/3.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div> 
</section>






<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Users Table</h4>
            <a href="{{ url('add-user') }}" class="btn btn-primary btn-sm">Register User</a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table " id="user_tab">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Cash In Hand</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>                   
                      <td>{{cashInHandAmountByUser($item->id)}}</td>                   
                      
                      <td>
                        <a href="{{url('paid-order-user/'.$item->id)}}" class="btn btn-primary btn-sm">Paid</a>
                        <a href="{{url('pending-order-user/'.$item->id)}}" class="btn btn-warning btn-sm">Pending</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</section>
       


@endsection

@section('scripts')

<script>
  $(document).ready(function() {
  var table = $('#user_tab').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true,
      order: [],
    
  } );
  table.rowReorder.disable();
  });

</script>

@endsection









        