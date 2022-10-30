@extends('layouts.master')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <form action="{{ url('data-update/'.$all_orders->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="daily_id" id="daily_id">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="order">Order ID</label>
                                    <input type="number" class="form-control" value="{{$all_orders->order}}" name="order" placeholder="Order Id">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" value="{{$all_orders->date}}" name="date" placeholder="Details">
                
                                </div>
                            </div>
                
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{$all_orders->city}}" name="city" placeholder="City">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sender">Sender</label>
                                    <input type="text" class="form-control" value="{{$all_orders->sender}}" name="sender" placeholder="Sender">
                                </div>
                            </div>                      
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="receiver">Receiver</label>
                                    <input type="text" class="form-control" value="{{$all_orders->receiver}}" name="receiver" placeholder="Receiver">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" class="form-control" value="{{$all_orders->father_name}}" name="father_name" placeholder="Father Name">
                                </div>
                            </div>       
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cnic">CNIC</label>
                                    <input type="number" class="form-control" value="{{$all_orders->cnic}}" name="cnic" placeholder="Cnic">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="entry_date">Entry Date</label>
                                    <input type="date" class="form-control" value="{{$all_orders->entry_date}}" name="entry_date" placeholder="User ID">
                                </div>
                                
                            </div>     
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required aria-label="Default select example">   
                                        <option value="pending">Pending</option>
                                        <option value="cancel">Cancel</option>
                                    </select>
                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Amount">Amount</label>
                                    <input type="number" class="form-control" value="{{$all_orders->amount}}" name="amount" placeholder="Amount">
                                </div>
                            
                            </div>   
                            <div class="form-row">
                                
                                
                            
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