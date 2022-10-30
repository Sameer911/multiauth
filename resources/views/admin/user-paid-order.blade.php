@extends('layouts.master')


@section('content')
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
                    @foreach ($paid as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->date}}</td>
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