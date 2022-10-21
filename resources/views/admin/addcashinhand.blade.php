@extends('layouts.master')


@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card" >
            <div class="card-header">
              <h4>Add Cash</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <form action="{{ url('debit-insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            {{-- <div class="form-group col-md-6">
                                <label for="debit">Debit</label>
                                <input type="text" class="form-control"  name="debit" placeholder="Debit">
                                
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="credit">Amount</label>
                                <input type="text" class="form-control" name="credit" placeholder="">
    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <select class="form-control" name="cate_id" aria-label="Default select example">
                                    <option value="">Select User</option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
      
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
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