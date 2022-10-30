{{-- 1. Dashboard show users                                         ----->done
2. Users list two action show pending orders and paid orders    ----->done
3. Order Insert date,  Paid Date Selection in add Order
4. Dashboard show total pending order and paid orders             ---->done 
5. Admin cancel daily order for user so user cannot pay order.   ----->done
6. Add Search Filter as DATE 
 User Area :
7. Paid Orders remove action column                             ------>done
8. Daily Orders, dont show paid orders in admin also            ----->done
9. Datatable movable rows remove from both admin and user     ------>done
10.
 --}}


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
              <h4>Pending orders Table</h4>
              
              {{-- <a href="{{url('add-daily-data')}}" class="btn btn-primary btn-sm float-end">Add</a> --}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="pendingtable">
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
                          <td>User Name</td>
                          <td>Status</td>
                          <td>Action</td>
                          {{-- <td>Save</td> --}}
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
                              <td>{{formatNumber($item->amount)}}</td>
                              <td>{{$item->user->name}}</td>
                              <td>{{$item->status}}</td>
                              <td>
                                  <a href="{{url('editallorder/'.$item->id)}}" class="btn btn-primary btnedit btn-sm">Edit</a>
                                  <a href="{{ url('delete-daily/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                              {{-- <td>
                                  <button type="button" value="{{$item->id}}" class="btn btn-success savebtn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Save
                                  </button>
                              </td>         --}}
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
var table = $('#pendingtable').DataTable( {
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