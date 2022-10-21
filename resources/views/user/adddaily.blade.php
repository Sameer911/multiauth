@extends('layouts.user')


@section('content')


<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Inser Data</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <form action="{{ url('data-insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="order">Order ID</label>
                                <input type="number" class="form-control"  name="order" placeholder="Order Id" required>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" required>
            
                            </div>
                        </div>
            
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sender">Sender</label>
                                <input type="text" class="form-control"  name="sender" placeholder="Sender" required>
                            </div>
                        </div>                      
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="receiver">Receiver</label>
                                <input type="text" class="form-control"  name="receiver" placeholder="Receiver" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="father_name">Father Name</label>
                              <input type="text" class="form-control"  name="father_name" placeholder="Father Name" required>
                          </div>
                        </div>       
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="cnic">CNIC</label>
                              <input type="number" class="form-control"  name="cnic" placeholder="Cnic" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="entry date">Entry Date</label>
                              <input type="date" class="form-control"  name="entry_date" placeholder="User ID" required>
                          </div>
                         
                      </div>     
                      <div class="form-row">
                       <div class="form-group col-md-6">
                          <label for="Amount">Amount</label>
                          <input type="number" class="form-control"  required name="amount" placeholder="Amount" required>
                      </div>
                        <div class="form-group col-md-6 mb-3">
                        <label for="user_id">User id</label>    
                        <select class="form-control" name="user_id" required aria-label="Default select example">
                                <option value="">Select User</option>
                                @foreach ($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
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
</section>



@endsection


