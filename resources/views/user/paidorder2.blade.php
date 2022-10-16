@extends('layouts.user')


  @section('content') 
  
  <div class="col-md-12 mt-5">
    @if(session('status'))
      <h5 class="alert alert-success">{{session('status')}}</h5>
    @endif
      <div class="card">
          <div class="card-header">
                <h4>Paid Order Data</h4>
                {{-- <a href="{{url('paid-data')}}" class="btn btn-primary btn-sm float-end">Add</a> --}}
          </div>
              
              <div class="card-body">
                <table class="table" id="paidTable">
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
                      <td>{{formatNumber($item->balance)}}</td>
                      <td>
                        <img src="{{ asset('images/'. $item->image) }}" alt="Image" width="50">
                      </td>
                    
                      <td>
                        


                      </td>
                    </tr>
                    @endforeach
                      
                  </tbody>
                </table>
              </div>
      </div>
  </div>
  @endsection
            


@section('scripts')

<script>

$(document).ready(function() {
var table = $('#paidTable').DataTable( {
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
});




       
</script>

@endsection
