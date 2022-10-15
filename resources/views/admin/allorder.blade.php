@extends('layouts.master')







<!-- Save--Modal -->
<div class="modal fade" id="saveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Save To Paid</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-paid') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="save_id" id="save_id">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Order Date</label>
                        <input type="text"  name="" id="date"> 
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_dait">Paid Date</label>
                        <input type="date" class="form-control" id="date" name="p_date">

                    </div>
                </div>
 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="receiver">Receiver</label>
                        <input type="text"  name="receiver" id="receiver">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Father Name:</label>
                        <input type="text"  name="father_name"  id="father_name">
                    </div>
                </div>                      
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Sender:</label>
                        <input type="text"  name="sender" id="sender">
                    </div>
                    <div class="form-group col-md-6">
                        <label>CNIC:</label>
                        <input type="text" name="cnic" id="cnic">
                    </div>
                </div>    
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount">
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
                        <input type=button value="Take Image" onClick="take_snapshot()" class="btn btn-primary btn-sm">
                        <input type="hidden" name="image" class="image-tag">
                         
                        {{-- <input type="file" class="form-control"  name="image" required> --}}
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
<!-- END--Save--Modal -->


@section('content')
<div class="container">
    <div class="row">
        <div class="com-md-12 mt-1">
            @if(session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
              @endif
              <div class="card">
                <div class="card-header">
                    <h4>Daily Data</h4>
                    <a href="{{url('add-daily-data')}}" class="btn btn-primary btn-sm float-end">Add</a>
                </div>
              </div>
        </div>
    </div>
</div>
        

<div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <table class="myTable table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Receiver</td>
                                <td>Father Name</td>
                                <td>City</td>
                                <td>Sender</td>
                                <td>Order ID</td>
                                <td>Date</td>
                                <td>CNIC</td>
                                <td>Amount</td>
                                <td>Status</td>
                                <td>Action</td>
                                <td>Save</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daily_orders as $item)
                                <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->receiver}}</td>
                                            <td>{{$item->father_name}}</td>
                                            <td>{{$item->city}}</td>
                                            <td>{{$item->sender}}</td>
                                            <td>{{$item->order}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->cnic}}</td>
                                            <td><?php echo number_format($item->amount) ; ?></td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="{{url('editallorder/'.$item->id)}}" class="btn btn-primary btnedit btn-sm">Edit</a>
                                                {{-- <button type="button" value="{{$item->id}}" class="btn btn-primary btnedit btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Edit
                                                  </button> --}}
                                                <a href="{{ url('delete/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                                  
                                            </td>
                                            <td>
                                                <button type="button" value="{{$item->id}}" class="btn btn-success savebtn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Save
                                                  </button>
                                            </td>
                                            
                                        </tr>
        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


      {{-- Edit Modal --}}
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" >Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                    <form action="{{ url('data-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="_method" value="put">

                        <input type="hidden" name="daily_id" id="daily_id" value="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Order_id">Order ID</label>
                                <input type="text" class="form-control" id="order" name="order" placeholder="Order ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
         
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sender">Sender</label>
                                <input type="text" class="form-control"  id="sender" name="sender" placeholder="Sender">
                            </div>
                        </div>           
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="receiver">Receiver</label>
                                <input type="text" class="form-control"  id="receiver" name="receiver" placeholder="Receiver">
                            </div>
         
                        </div>                       
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="father_name">Father Name</label>
                                <input type="text" class="form-control"  id="father_name" name="father_name" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cnic">CNIC</label>
                                <input type="number" class="form-control"  id="cnic" name="cnic" placeholder="CNIC Number">
                            </div>
                        </div>
                             
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount"  name="amount" placeholder="Amount">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="entry_date">Entry Date</label>
                                <input type="date" class="form-control" id="entry_date" name="entry_date">
                            </div>
                        </div>
        
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                  
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>    
                    </form>
                   
        
        
                </div>
            </div>
            
          </div>
</div> --}}
      {{-- END--Edit Modal --}}

      
      {{-- <div class="container">
                <form method="POST" action="storeImage.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results">Your captured image will appear here...</div>
                        </div>
                        <div class="col-md-12 text-center">
                            <br/>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div> --}}





@endsection



      @section('scripts')

      <script>
       
        $(document).ready(function(){
            $(document).on('click', '.savebtn', function(){
                var save_id = $(this).val();
                $('#saveModal').modal('show');

                $.ajax({
                    type:"GET",
                    url:"/save-to-paid/"+save_id,
                    success:function(response){
                        // console.log(response);
                        $('#order').val(response.savetopaid.order);
                        $('#receiver').val(response.savetopaid.receiver);
                        $('#father_name').val(response.savetopaid.father_name);
                        $('#cnic').val(response.savetopaid.cnic);
                        $('#sender').val(response.savetopaid.sender);
                        $('#city').val(response.savetopaid.city);
                        $('#amount').val(response.savetopaid.amount);
                        $('#paid').val(response.savetopaid.paid);
                        $('#date').val(response.savetopaid.date);
                        $('#save_id').val(save_id);
                        
                    }
                });
            });
        });

        Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }


        $(document).ready( function () {
            $('.myTable').DataTable();
        });
      </script>

@endsection







       
 
