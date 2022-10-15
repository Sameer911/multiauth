<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credit Data</title>
    
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
          <h5 class="modal-title" id="exampleModalLabel">Add Credit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group mb-3">
                <form action="{{ url('credit-insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control"  name="date">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="details">Details</label>
                            <input type="text" class="form-control" name="details" placeholder="Details">

                        </div>
                    </div>
     
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="debit">Debit</label>
                            <input type="number" class="form-control" name="debit" placeholder="Debit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="credit">Credit</label>
                            <input type="number" class="form-control"  name="credit" placeholder="Credit">
                        </div>
                    </div>                      
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control"  name="user_id" placeholder="User ID">
                        </div>
     
                    </div>                        
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" rows="3" class="form-control"></textarea>
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









  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div>

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
                <a class="nav-link" href="{{url('credit')}}" style="color: white">Credit</a>
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
                              <h4>Credit</h4>
                              <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Credit
                              </button>
                        </div>
                            
                            <div class="card-body">
                              <table class="table myTable">
                                <thead>
                                  <tr>
                                    <td>ID</td>
                                    <td>Date</td>
                                    <td>Details</td>
                                    <td>Debit</td>
                                    <td>Credit</td>
                                    <td>User ID</td>
                                    <td>Remarks</td>
                                    <td>Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($credits as $item)
                                  <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->details}}</td>
                                    <td>{{$item->debit}}</td>
                                    <td>{{$item->credit}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->remarks}}</td>
                                    <td>
                                      <button type="button" value="{{$item->id}}" class="btn btn-primary editbtn btn-sm">
                                        Edit
                                      </button>
                                      <a href="{{url('delete-credit/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>


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
          $(document).on('click', '.editbtn', function(){
            var credit_id = $(this).val();
            // alert(credit_id);
            $('#editModal').modal('show');

              $.ajax({
                type:"GET",
                url:"/credit-edit/"+credit_id,
                success:function(response){
                  // console.log(response);

                  $('#date').val(response.credit.date);
                  $('#details').val(response.credit.details);
                  $('#debit').val(response.credit.debit);
                  $('#credit').val(response.credit.credit);
                  $('#user_id').val(response.credit.user_id);
                  $('#remarks').val(response.credit.remarks);
                  $('#credit_id').val(credit_id);

                }
              })
          }); 
      });



        $(document).ready( function () {
            $('.myTable').DataTable();
        });
    </script>
</body>
</html>

{{-- @foreach ($credits as $row )
<div class="col-md-6 col-sm-12">
    <label>Account Number:</label> <label><strong>{{ $row->id }}</strong></label>
</div>
<div class="col-md-6 col-sm-12">
    <label>Name:</label> <label><strong>{{ $row->date}}</strong></label>
</div>
<div class="col-md-6 col-sm-12">
    <label> Address:</label> <label><strong>{{ $row->details}}</strong></label>
</div>
<div class="col-md-6 col-sm-12">
    <label>Type:</label> <label><strong>{{ $row->debit}}</strong></label>
</div>
<div class="col-md-6 col-sm-12">
    <label>Account Status:</label> <label><strong>{{ $row->credit}}</strong></label>
</div>
@endforeach --}}
       
 
