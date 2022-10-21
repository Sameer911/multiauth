@extends('layouts.master')


@section('content')
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cash In Hand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group mb-3">
                    <form action="{{ url('debit-insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="debit">Debit</label>
                                <input type="text" class="form-control"  name="debit" placeholder="Debit">
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="credit">Amount</label>
                                <input type="text" class="form-control" name="credit" placeholder="">
    
                            </div>
                        </div>
      
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
    
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                          </div>
                        </div>    
                    </form>
            </div> 
        </div>
        
      </div>
    </div>
  </div> --}}




    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <h5 class="alert alert-success">{{ session('status') }}</h5>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>Cash In Hand</h4>
                            <h5>{{ $Cashinhand }} PKR</h5>
                        </div>

                        <div class="card-header">

                            <a href="{{ url('cash-page') }}" class="btn btn-primary btn-sm float-end">Add</a>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="cashtable">
                                    <thead>
                                        <tr>

                                            <td>ID</td>
                                            <td>Debit</td>
                                            <td>Credit</td>
                                            <td>Description</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($debit_all as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->debit }}</td>
                                                <td><?php echo number_format($item->credit); ?></td>
                                                <td>{{ $item->description }}</td>

                                                <td>
                                                    <button type="button" value="{{ $item->id }}"
                                                        class="btn btn-primary nweditbtn btn-sm">
                                                        Edit
                                                    </button>
                                                    <a href="{{ url('delete-debit/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>


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




    <!-- Edit-Modal -->
    <div class="modal fade" id="neweditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <form action="{{ url('debit-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="deb_it" id="deb_it">
                                <div class="form-row">
                                    {{-- <div class="form-group col-md-6">
                            <label for="debit">Debit</label>
                            <input type="text" class="form-control" id="debit" name="debit" placeholder="Debit">
                            
                        </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="credit">Amout</label>
                                        <input type="text" class="form-control" id="credit" name="credit"
                                            placeholder="Credit">

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Description</label>
                                        <textarea name="description" rows="3" id="description" class="form-control"></textarea>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.nweditbtn', function() {
                var deb_it = $(this).val();
                // alert(deb_it);
                $('#neweditModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/debit-edit/" + deb_it,
                    success: function(response) {
                        // console.log(response.debit.debit);
                        $('#debit').val(response.debit.debit);
                        $('#credit').val(response.debit.credit);
                        $('#description').val(response.debit.description);
                        $('#deb_it').val(deb_it);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var table = $('#cashtable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                order: [],
                dom: 'Bfrtip',
                buttons: [
                    'pdf', 'print'
                ]
            });
        });

       
    </script>
@endsection
