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
              <h4>Users Table</h4>
              <a href="{{ url('add-user') }}" class="btn btn-primary btn-sm">Register User</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Cash In Hand</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>                   
                        <td>{{cashInHandAmountByUser($item->id)}}</td>                   
                        
                        <td>
                          <a href="{{url('edit-user/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{url('delete-user/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
  var table = $('#table-1').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true,
      order: [],
    
  } );
  table.rowReorder.disable();
  });
</script>

@endsection
