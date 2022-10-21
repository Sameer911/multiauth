@extends('layouts.master')



@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Edit User</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <form action="{{ url('user-update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="name">
                                
                            </div>
                        </div>  
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="@gmail.com">
            
                            </div>
                        </div>
 
                           <div class="col-md-6">
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