@extends('layouts.master')



@section('content')




{{-- <div class="container-sm">
    <div class="row">
        <div class="col-md-12 mt-5">
          @if(session('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
          @endif
            <div class="card">
                <div class="card-header">
                      <h4>Paid Order Data</h4> --}}
                      {{-- <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Data
                      </button> --}}
                {{-- </div>
                    
                    <div class="card-body">
                      <table class="table " id="ordertable">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>Paid Date</td>                          
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($all_users as $item)
                          <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            
                          
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
</div> --}}


<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Users Table</h4>
              <a href="{{ url('register-user') }}" class="btn btn-primary btn-sm">Register User</a>

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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>                   
                        
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
  });
</script>

@endsection
