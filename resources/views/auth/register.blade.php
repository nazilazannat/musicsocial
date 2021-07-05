@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb bg-light ftco-appointment">
    <div class="container py-4">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert" >
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif
                <h2 class="mb-0">Register</h2>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="appointment bg-white p-4 p-md-5">
                        @csrf
                        <div class="row">

                         <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" class="form-control @error('bloodgroup') is-invalid @enderror" placeholder="Blood Group" name="bloodgroup">
                        @error('bloodgroup')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        {{-- <div class="select-wrap"> --}}
                        <input type="file" class="form-control" title="Upload Profile Picture" name="avatar">
                        {{-- </div> --}}
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        <div class="select-wrap">
                        <input id="name" type="text" placeholder="User Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        <div class="select-wrap">
                        <input type="text" placeholder="First Name" class="form-control @error('f_name') is-invalid @enderror" name="f_name" required autofocus>
                        @error('f_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        <div class="select-wrap">
                        <input type="text" placeholder="Last Name" class="form-control @error('l_name') is-invalid @enderror" name="l_name" required autofocus>
                        @error('l_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-field">
                            <div class="select-wrap">
                            <input type="text" placeholder="Age" class="form-control @error('age') is-invalid @enderror" name="age" required autofocus>
                            @error('age')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-field">
                                <div class="select-wrap">
                                <input type="text" class="form-control" name="status" value="1" required autofocus>
                                </div>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        <div class="select-wrap">
                        <select class="form-control" title="Select Gender" name="gender" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-field">
                        <div class="select-wrap">
                        <input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group">
                        <input type="submit" value="Send message" class="btn btn-primary py-3 px-4">
                        </div>
                        </div>

                        </div><!--End Row-->
              </form>
            </div>
</section>
@endsection
{{-- @section('footer_js')

@endsection --}}
