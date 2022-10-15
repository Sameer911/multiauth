@extends('layouts.user')


@section('content')
        {{-- <div class="container-fluid">
            <div class="container-fluid">
            <table class="table table-striped">
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
                        <td>User ID</td>
                        <td>Entry Date</td>
                        <td>Action</td>
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
                                    <td>{{$item->order_id}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->cnic}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->entry_date}}</td>
                                    <td>
                                        <button type="button" value="{{$item->id}}" class="btn btn-primary btnedit btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                          </button>
                                        <a href="{{ url('delete/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                          
                                    </td>
                                    
                                </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Order ID">
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
        </div>
</div> --}}
@endsection