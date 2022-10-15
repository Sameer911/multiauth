<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paid Order</title>
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<body>

      {{-- Modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paid Order Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group mb-3">
                <form action="{{ url('insert-paid') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Order Date</label>
                            <input type="date" class="form-control"  name="date" required>    
                        </div>
                        <div class="form-group col-md-6">
                            <label for="p_dait">Paid Date</label>
                            <input type="date" class="form-control" name="p_date" required>

                        </div>
                    </div>
     
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="receiver">Receiver</label>
                            <input type="text" class="form-control" name="receiver" placeholder="Receiver" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control"  name="father_name" placeholder="Father Name" required>
                        </div>
                    </div>                      
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sender">Sender</label>
                            <input type="text" class="form-control"  name="sender" placeholder="Sender" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cnic">CNIC</label>
                            <input type="text" class="form-control"  name="cnic" placeholder="CNIC" required>
                        </div>
                    </div>    
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control"  name="amount" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="paid">Paid</label>
                            <input type="number" class="form-control"  name="paid" required>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="balance">Balance</label>
                            <input type="number" class="form-control"  name="balance" required>
                        </div>
                       
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="image">Image</label>
                            <input type="file" class="form-control"  name="image" required>
                        </div>
                    </div> 

   
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>    
                </form>
            </div>
    </div>
        </div>

      </div>
  </div>
  </div>









  {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Credit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group mb-3">
                <form action="{{ url('credit-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden"  name="credit_id" id="credit_id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date"  name="date">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="details">Details</label>
                            <input type="text" class="form-control" id="details" name="details" placeholder="Details">

                        </div>
                    </div>
     
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="debit">Debit</label>
                            <input type="number" class="form-control" id="debit" name="debit" placeholder="Debit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="credit">Credit</label>
                            <input type="number" class="form-control" id="credit"  name="credit" placeholder="Credit">
                        </div>
                    </div>                      
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                        </div>
     
                    </div>                        
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" rows="3" id="remarks" class="form-control"></textarea>
                        </div>

                    </div>
   
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>

      </div>
    </div>
  </div> --}}

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg" style="background-color: #4e73df">

        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('dashboard')}}" style="color: white">Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{url('cashinhand')}}" style="color: white">Cash In Hand</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('order-paid')}}" style="color: white">Paid Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('allorders')}}" style="color: white">All Orders</a>
              </li>
                            
            </ul>            
          </div>
        </div>
    </nav>
        {{-- END NAVBAR --}}

    <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                  @if(session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                  @endif
                    <div class="card">
                        <div class="card-header">
                              <h4>Paid Order Data</h4>
                              <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Data
                              </button>
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
                                    <td>Action</td>
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
                                    <td><?php echo number_format($item->amount); ?></td>
                                    <td><?php echo number_format($item->paid); ?></td>
                                    <td><?php echo number_format($item->balance); ?></td>
                                    <td>
                                      <div id="results"><img src="{{ asset('images/'. $item->image) }}" alt="Image" width="50"></div>
                                      
                                    </td>
                                  
                                    <td>
                                      <a href="{{url('edit-paidorder/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                      <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>


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
    //   $(document).ready(function(){
    //       $(document).on('click', '.editbtn', function(){
    //         var credit_id = $(this).val();
    //         // alert(credit_id);
    //         $('#editModal').modal('show');

    //           $.ajax({
    //             type:"GET",
    //             url:"/credit-edit/"+credit_id,
    //             success:function(response){
    //               // console.log(response);

    //               $('#date').val(response.credit.date);
    //               $('#details').val(response.credit.details);
    //               $('#debit').val(response.credit.debit);
    //               $('#credit').val(response.credit.credit);
    //               $('#user_id').val(response.credit.user_id);
    //               $('#remarks').val(response.credit.remarks);
    //               $('#credit_id').val(credit_id);

    //             }
    //           })
    //       }); 
    //   });



        $(document).ready( function () {
            $('.myTable').DataTable();
        });
    </script>
</body>
</html>

       
 
