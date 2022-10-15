<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #4e73df">

        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('user-dash')}}" style="color: white">Dashboard</a>
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
                <div class="card-header">
                    <h4>Add Paid Data</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <form action="{{ url('insert-paid') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="date">Order Date</label>
                                    <input type="date" class="form-control"  name="date">    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="p_dait">Paid Date</label>
                                    <input type="date" class="form-control" name="p_date">
                
                                </div>
                            </div>
                
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="receiver">Receiver</label>
                                    <input type="text" class="form-control" name="receiver" placeholder="Receiver">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" class="form-control"  name="father_name" placeholder="Father Name">
                                </div>
                            </div>                      
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sender">Sender</label>
                                    <input type="text" class="form-control"  name="sender" placeholder="Sender">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cnic">CNIC</label>
                                    <input type="text" class="form-control"  name="cnic" placeholder="CNIC">
                                </div>
                            </div>    
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control"  name="amount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="paid">Paid</label>
                                    <input type="number" class="form-control"  name="paid">
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="balance">Balance</label>
                                    <input type="number" class="form-control"  name="balance">
                                </div>
                               
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control"  name="image">
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

    

    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>  






