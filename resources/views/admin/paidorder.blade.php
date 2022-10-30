@extends('layouts.master')




  @section('content')

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








    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
              @if(session('status'))
              <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
           
            <div class="card">
              <div class="card-header">
                <h4>Paid orders Table</h4>
                {{-- <a href="{{url('add-daily-data')}}" class="btn btn-primary btn-sm float-end">Add</a> --}}
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="ordertable">
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
                        <td>{{$item->order->date}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->order->receiver}}</td>
                        <td>{{$item->order->father_name}}</td>
                        <td>{{$item->order->sender}}</td>
                        <td>{{$item->order->cnic}}</td>
                        <td>{{formatNumber($item->order->amount)}}</td>
                        <td>{{formatNumber($item->amount)}}</td>
                        <td>{{formatNumber($item->order->balance)}}</td>
                        <td>
                          <a href="{{url('image-view/'.$item->id)}}">
                          <div id="results"><img src="{{ asset('images/'. $item->image) }}" alt="Image" width="50"></div>
                          
                          </a>
                          
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
  
        
      </div>
  </section>




  @endsection



    @section('scripts')

    <script>
      $(document).ready(function() {
      var table = $('#ordertable').DataTable( {
          rowReorder: {
              selector: 'td:nth-child(2)'
          },
          responsive: true,
          order: [],
          dom: 'Bfrtip',
          buttons: [
              'pdf', 'print'
          ]
      } );
      table.rowReorder.disable();
      });
    </script>

    @endsection


       




                                   
