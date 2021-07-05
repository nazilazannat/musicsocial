@extends('layouts.app')

@section('style_css')
{{-- <style>
    a{
        font-size: 20px;
    }
a:hover{
    font-size:25px;
}
</style> --}}
@endsection

@section('content')
<div class="container py-3">
@foreach ($user as $users)

    <div class="row">
      <div class="col-3">
          <div class="card sha">
            <img id="image_preview_container" src="{{ asset('user') }}/{{ $users->avatar }}" alt="preview image" style="height: 250px; width:100%;">
                <ul class="list-group">
                    <li class="list-group-item">
                        <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)" >
                            @csrf
                            <div class="row">
                                @auth
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                            {{-- <label class="custom-file-label" for="inputGroupFile01">{{ $errors->first('title') }}</label> --}}
                                            <input type="file" class="form-control-file" name="avatar" placeholder="Choose image" id="image">
                                            </div>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-success" type="submit"> Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </form>

                    </li>
                @if (Auth::user())
                @else
                    <li class="list-group-item">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success">Message</button>
                            <button type="button" class="btn btn-outline-primary">Follow</button>
                        </div>
                    </li>
                @endif
                    <li class="list-group-item">{{ $users->name }}</li>
                    <li class="list-group-item">{{ $users->email }}</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
              {{-- </div> --}}
          </div>
      </div>


      <div class="col-9">
        <div class="card sha">

                <div class="row">
                    <div class="col-md-12">
                        <img id="cover_preview_container" src="{{ asset('user') }}/{{ $users->cover }}" alt="preview image" style="height: 250px; width:100%;">
                    </div>
                    @auth
                    <div class="col-md-4">
                    <div class="container text-center">
                        <form method="POST" enctype="multipart/form-data" action="{{url('updatecover')}}">
                            @csrf
                            <div class="input-group">
                                <div class="custom-file">
                                {{-- <label class="custom-file-label" for="inputGroupFile01">{{ $errors->first('title') }}</label> --}}
                                <input type="file" class="form-control-file" name="cover" id="cover">
                                </div>
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-success" type="submit"> Save </button>
                                </div>
                              </div>
                        </form>
                    </div>
                    @endauth
                </div>
                </div>

            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Music</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('edit') }}/{{ $users->name }}" style="color: #000000;" class="nav-link">Edit</a>
                        </li>
                      </ul>
                      <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      </form>
                    </div>
                  </nav>
            </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>

@endsection
@section('footer_js')
<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
              $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#upload_image_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ url('update-ava')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#cover').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
              $('#cover_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        // $('#upload_cover_form').submit(function(e) {
        //     e.preventDefault();

        //     var formData = new FormData(this);

        //     $.ajax({
        //         type:'POST',
        //         url: "{{ url('update-cover')}}",
        //         data: formData,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         success: (data) => {
        //             this.reset();
        //             alert('Cover has been uploaded successfully');
        //         },
        //         error: function(data){
        //             console.log(data);
        //         }
        //     });
        // });
    });

</script>
@endsection
