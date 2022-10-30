@extends('layouts.master')



    @section('content')
    
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Deleted Users</h4>              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>User Name</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($trash as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>                   
                        
                        
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
          
        </script>
    @endsection