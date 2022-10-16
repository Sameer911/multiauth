@extends('layouts.user')

    

 @section('content')
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
 @endsection   






