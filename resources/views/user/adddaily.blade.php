@extends('layouts.user')


@section('content')

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
              <input type="date" class="form-control"  name="entry_date" required>
          </div>
         
      </div>     
      <div class="form-row">
          {{-- <div class="form-group col-md-6">
              <label for="status">Status</label>
              <input type="text" class="form-control"  name="status" placeholder="Status" required>
          </div> --}}
          {{-- <div class="form-group col-md-6">
              <label for="user_id">User ID</label>
              <input type="text" class="form-control"  name="user_id" placeholder="User ID">
          </div>
       --}}
       <div class="form-group col-md-12">
          <label for="Amount">Amount</label>
          <input type="number" class="form-control"  name="amount" required>
      </div>
      </div>   

        


            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>    
    </form>
</div>



@endsection