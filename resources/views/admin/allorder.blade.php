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
                            <div class="form-group col-md-6">
                                <label for="balance">Balance</label>
                                <span type="number" class="form-control" id="balance" name="balance"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" name="amount">
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <div id="remote-media" style="width:100%;"></div>
                                <button type="button" class="btn btn-default btn-mat btn-success form-control mt-2 "
                                    onclick="CaptureImage()">Capture Image</button>
                                <input type="hidden" id="image-hidden" name="image-hidden">
                            </div>
                        </div> 
                        <div class="form-row"> 
                            <div class="form-group col-md-12">
                                <div><img id="captured_image" width="100%"> </div>
                            </div>
                        </div>    
                        <div class ="form-row">    
                            <div class="form-group col-md-12">
                                <label for="image">Image</label>
                                
                                <input type="file" id="image" class="form-control" name="image" required>
                            </div>
                        </div>
                        <div class="form-row"> 
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END--Save--Modal -->


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
              <h4>Orders Table</h4>
              <a href="{{url('add-daily-data')}}" class="btn btn-primary btn-sm float-end">Add</a>
            </div>

            <div class="col-sm-12 form-group">
                <form action="{{url('date-search')}}">
                    @csrf
                    <input type="text" name="datefilter" value="" />
                </form>
                
                {{-- <input type="text" name="daterange" id="daterange" class="form-control" value="10/01/2022 - 10/15/2022" /> --}}
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="allOrders">
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
                        {{-- <td>User Name</td>  --}}
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
                            {{-- <td>{{$item->user->name}}</td> --}}
                            <td>{{$item->status}}</td>
                            <td>
                                <a href="{{url('editallorder/'.$item->id)}}" class="btn btn-primary btnedit btn-sm">Edit</a>
                                <a href="{{ url('delete-daily/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            <td>
                                @if ($item->status != 'cancel')
                                <button type="button" value="{{$item->id}}" class="btn btn-success savebtn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Save
                                </button>
                                @endif
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
       var balance = 0;
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
        table.rowReorder.disable();
        

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
                    $('#balance').html();
                    $('#order_id').val(save_id);
                     balance = parseFloat(response.savetopaid.amount);

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
    $(document).on('keyup','input[name="amount"]',function(){
        let enterdAmount = parseFloat($(this).val());
        if(enterdAmount){ 
            let finalAmount = balance - enterdAmount;
            $('#balance').text(finalAmount);
            console.log(enterdAmount);
        }else{
            $('#balance').html(balance);
        }
    });

    function getMedia() {
        return new Promise((resolve, reject) => {
            let constraints = {
                audio: false,
                video: {
                    facingMode: 'environment'
                }
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


        $(function() {

$('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});

$(document).click('#btn', function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var actionUrl = form.attr('action');

$.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
    //   alert(data); // show response from the php script.
    console.log(data);
    }
});

});


        

      </script>

@endsection







       
 
