<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #4e73df">

    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/home')}}" style="color: white">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('paid-order')}}" style="color: white">Paid Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('daily')}}" style="color: white">All Orders</a>
          </li>
                        
        </ul>            
      </div>
    </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
              @if(session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
              @endif
                <div class="card">
                    <div class="card-header">
                          <h4>Paid Order Data</h4>
                          {{-- <a href="{{url('paid-data')}}" class="btn btn-primary btn-sm float-end">Add</a> --}}
                    </div>
                        
                        <div class="card-body">
                          <table class="table myTable">
                            <thead>
                              <tr>
                                <td>ID</td>
                                <td>Date</td>
                                <td>Paid Date</td>
                                <td>Receiver</td>
                                <td>Father Name</td>
                                <td>Sender</td>
                                <td>Cnic</td>
                                <td>Amount</td>
                                <td>Paid</td>
                                <td>Balance</td>
                                <td>image</td>
                                {{-- <td>Action</td> --}}
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($paid_orders as $item)
                              <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->p_date}}</td>
                                <td>{{$item->receiver}}</td>
                                <td>{{$item->father_name}}</td>
                                <td>{{$item->sender}}</td>
                                <td>{{$item->cnic}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->paid}}</td>
                                <td>{{$item->balance}}</td>
                                <td>
                                  <img src="{{ asset('images/'. $item->image) }}" alt="Image" width="50">
                                </td>
                              
                                <td>
                                  {{-- <a href="{{url('edit-paidorder/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{url('delete-paid/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}


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




    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.neweditbn', function(){
                var daily_id = $(this).val();
                $('#EditModal').modal('show');
                $.ajax({
                    type:"GET",
                    url:"/edit-data/"+daily_id,
                    success:function(response){
                        $('#order').val(response.daily.order);
                        $('#date').val(response.daily.date);
                        $('#city').val(response.daily.city);
                        $('#sender').val(response.daily.sender);
                        $('#receiver').val(response.daily.receiver);
                        $('#father_name').val(response.daily.father_name);
                        $('#cnic').val(response.daily.cnic);
                        $('#amount').val(response.daily.amount);
                        $('#user_id').val(response.daily.user_id);
                        $('#entry_date').val(response.daily.order);
                        $('#daily_id').val(daily_id);

                    }
                });
                
            });
        });
        $(document).ready( function () {
            $('.myTable').DataTable();
        });
    </script>
</body>
</html>