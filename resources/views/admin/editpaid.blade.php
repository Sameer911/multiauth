@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            @if(session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
              @endif
            <form action="{{ url('update-paid/'.$paid->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Order Date</label>
                        <input type="date" class="form-control" value="{{$paid->order->date}}" name="date">    
                    </div>
                    <div class="form-group col-md-6">
                        <label for="p_dait">Paid Date</label>
                        <input type="date" class="form-control" value="{{$paid->order->p_date}}" name="p_date">

                    </div>
                </div>
 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="receiver">Receiver</label>
                        <input type="text" class="form-control" value="{{$paid->order->receiver}}" name="receiver" placeholder="Receiver">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="father_name">Father Name</label>
                        <input type="text" class="form-control" value="{{$paid->order->father_name}}" name="father_name" placeholder="Father Name">
                    </div>
                </div>                      
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sender">Sender</label>
                        <input type="text" class="form-control" value="{{$paid->order->sender}}" name="sender" placeholder="Sender">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnic">CNIC</label>
                        <input type="number" class="form-control" value="{{$paid->order->cnic}}" name="cnic" placeholder="CNIC">
                    </div>
                </div>    
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" value="{{$paid->amount}}" name="amount">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="paid">Paid</label>
                        <input type="number" class="form-control" value="{{$paid->order->amount}}" name="paid">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="balance">Balance</label>
                        <input type="number" class="form-control" value="{{$paid->order->amount}}" name="balance">
                    </div>
                   
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="image">Image</label>
                        @if($paid->image)
                        <img src="{{asset('images/'. $paid->image)}}" width="100" alt="">
                        @endif
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
@endsection
    
    





