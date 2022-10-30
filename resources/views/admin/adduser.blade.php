@extends('layouts.master')

@section('content')


<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Add User</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <form action="{{ url('add-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                           
                            <div class="form-group col-md-12">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">   
                            </div>
                        </div>
                        
      
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="@gmail.com">
                            </div>
    
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <select class="form-control" name="is_admin" aria-label="Default select example">
                                    <option value="">Select User</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                          </div>
                        </div>    
                    </form>
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
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection