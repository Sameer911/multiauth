@extends('layouts.master')








    <!-- Save--Modal -->
    <div class="modal" id="ModalSave" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Save To Paid</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body modal-body">

                <form action="{{ url('insert-paid') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id">
                    <input type="hidden" name="save_id" id="save_id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Order Date</label>
                            <span class="form-control" name="" id="date"> </span>
                        </div>
    
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="receiver">Receiver</label>
                            <span class="form-control" name="receiver" id="receiver"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name:</label>
                            <span class="form-control" name="father_name" id="father_name"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sender">Sender:</label>
                            <span class="form-control" name="sender" id="sender"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cnic">CNIC:</label>
                            <span class="form-control" name="cnic" id="cnic"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="balance">Balance</label>
                            <span type="number" class="form-control" id="balance" name="balance"></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" name="amount">
                        </div>
                        <div class="form-group col-md-12">
                            <div id="remote-media" style="width:100%;"></div>
                            <button type="button" class="btn btn-default btn-mat btn-success form-control mt-2 "
                                onclick="CaptureImage()">Capture Image</button>
                            <input type="hidden" id="image-hidden" name="image-hidden">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="image">Image</label>
                            <div><img id="captured_image" width="100%"> </div>
                            <input type="file" id="image" class="form-control" name="image" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- END--Save--Modal -->


@section('content')

<div class="container">
    <div class="row">
        <div class="com-md-12 mt-1">
            @if(session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
              @endif
              <div class="card">
                <div class="card-header">
                    <h4>Daily Data</h4>
                    <a href="{{url('add-daily-data')}}" class="btn btn-primary btn-sm float-end">Add</a>
                </div>
                <div class="card-body">
                    <table class="table" id="allOrders">
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
                                <td>Status</td>
                                <td>Action</td>
                                <td>Save</td>
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
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="{{url('editallorder/'.$item->id)}}" class="btn btn-primary btnedit btn-sm">Edit</a>
 
                                                <a href="{{ url('delete/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$item->id}}" class="btn btn-success savebtn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Save
                                                  </button>
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
        



      {{-- Edit Modal --}}
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" >Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                    <form action="{{ url('data-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="_method" value="put">

                        <input type="hidden" name="daily_id" id="daily_id" value="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Order_id">Order ID</label>
                                <input type="text" class="form-control" id="order" name="order" placeholder="Order ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
         
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sender">Sender</label>
                                <input type="text" class="form-control"  id="sender" name="sender" placeholder="Sender">
                            </div>
                        </div>           
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="receiver">Receiver</label>
                                <input type="text" class="form-control"  id="receiver" name="receiver" placeholder="Receiver">
                            </div>
         
                        </div>                       
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="father_name">Father Name</label>
                                <input type="text" class="form-control"  id="father_name" name="father_name" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cnic">CNIC</label>
                                <input type="number" class="form-control"  id="cnic" name="cnic" placeholder="CNIC Number">
                            </div>
                        </div>
                             
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount"  name="amount" placeholder="Amount">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="entry_date">Entry Date</label>
                                <input type="date" class="form-control" id="entry_date" name="entry_date">
                            </div>
                        </div>
        
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                  
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>    
                    </form>
                   
        
        
                </div>
            </div>
            
          </div>
</div> --}}
      {{-- END--Edit Modal --}}






@endsection



      @section('scripts')

      <script>
       
        $(document).ready(function() {


        var table = $('#allOrders').DataTable( {
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

        $(document).on('click', '.savebtn', function() {
            var save_id = $(this).val();
            $('#ModalSave').modal('show');
            $('#captured_image').attr('src','');
            ready();
            $.ajax({
                type: "GET",
                url: "/save-paid/" + save_id,
                success: function(response) {
                    //  console.log(response);
                    $('#order').val(response.savetopaid.order);
                    // $('#p_date').html(response.savetopaid.p_date);
                    $('#receiver').html(response.savetopaid.receiver);
                    $('#father_name').html(response.savetopaid.father_name);
                    $('#cnic').html(response.savetopaid.cnic);
                    $('#sender').html(response.savetopaid.sender);
                    $('#city').html(response.savetopaid.city);
                    $('#balance').html(response.savetopaid.amount);
                    $('#order_id').val(save_id);

                }
            });
        });

        var captured_image = null;
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
                navigator.msGetUserMedia;
            if (!navigator.getUserMedia) {
                $('#remote-media').text('Sorry, WebRTC is not available in your browser.');
            }
      });

      $(document).on('hidden.bs.modal', '#ModalSave', function() {
        console.log('modal is hidden');
        stopCamera();
    });


    function getMedia() {
        return new Promise((resolve, reject) => {
            let constraints = {
                audio: false,
                video: true
            };
            navigator.mediaDevices.getUserMedia(constraints)
                .then(str => {
                    resolve(str);
                    $('#remote-media').html(
                        '<video id="basic-stream" width="100%" class="hidden videostream" autoplay=""></video>'
                    );
                }).catch(err => {
                    $('#remote-media').text('Could not get Media: ' + err);
                    reject(err);
                })
        });
    }




    function base64_2_blob(dataURI) {
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {
            type: mimeString
        });
    }

    function capture_video_frame(video, format) {
        if (typeof video === 'string') {
            video = document.getElementById(video);
        }

        format = format || 'jpeg';

        if (!video || (format !== 'png' && format !== 'jpeg')) {
            return false;
        }

        var canvas = document.createElement("canvas");

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        canvas.getContext('2d').drawImage(video, 0, 0);


        var dataUri = canvas.toDataURL('image/' + format);
        var data = dataUri.split(',')[1];
        var mimeType = dataUri.split(';')[0].slice(5)

        var bytes = window.atob(data);
        var buf = new ArrayBuffer(bytes.length);
        var arr = new Uint8Array(buf);

        for (var i = 0; i < bytes.length; i++) {
            arr[i] = bytes.charCodeAt(i);
        }

        var blob = new Blob([arr], {
            type: mimeType
        });
        return {
            blob: blob,
            dataUri: dataUri,
            format: format
        };
    }
    function ready() {

        //Get users camera and mic
        getMedia()
            .then(str => {
                stream = str;
                window.localStream = stream;
                //set cam feed to video window so user can see self.
                let vidWin = document.getElementsByTagName('video')[0];
                if (vidWin) {

                    $('#basic-stream').removeClass('hidden');
                    //$('.wow_end_live_btn').removeClass('hidden');
                    vidWin.srcObject = stream;
                    //startBroadcast();
                }
            })
            .catch(e => {
                $('#remote-media').html(
                    '<div class="valign empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.27,2L2,3.27L4.73,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16C16.2,18 16.39,17.92 16.54,17.82L19.73,21L21,19.73M21,6.5L17,10.5V7A1,1 0 0,0 16,6H9.82L21,17.18V6.5Z" fill="currentColor"></path></svg> getUserMedia Error: ' +
                    e + '</div>');
            });
        }

        function CaptureImage() {
            image = capture_video_frame('basic-stream', 'png');
            console.log(image);
            var thumb = new File([base64_2_blob(image.dataUri)], "thumb.png", {
                type: "image/png"
            });
            let file = new File([base64_2_blob(image.dataUri)], "img.jpg",{type:"image/jpeg", lastModified:new Date().getTime()});
            $('#captured_image').attr('src', image.dataUri);
            $('#image-hidden').val(thumb);
            let container = new DataTransfer();
            container.items.add(file);
            fileInputElement = document.getElementById('image');
            fileInputElement.files = container.files;
        }

        function stopCamera() {
            localStream.getTracks().forEach((track) => {
                track.stop();
            });
            localStream.getVideoTracks().forEach((track) => {
                track.stop();
            });
        }
        $(document).on('click','.btn-close',function(){
            $('#ModalSave').modal('hide');    
        });
      </script>

@endsection







       
 
