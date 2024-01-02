@extends('layout.template')

@section('title')
    Profile
@endsection

@section('namaMenu')
    <i class="fa fa-lg fa-angle-double-right"></i> Profile
@endsection

@section('link')
    <li class="breadcrumb-item"><a href="{{ url('/dashboard', []) }}">dashboard</a></li>
    <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <!-- /.col -->
    <div class="col-md-8">
      <div class="card card-outline card-secondary">
        <div class="card-header">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link"><b>UBAH PASSWORD</b></a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">

              <div class="post">
                <form class="form-horizontal" action="{{ url('/profile/ubahpassword', []) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                      <label for="inputPassword1" class="col-sm-3 col-form-label">Password Baru</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" onkeyup="cek()" name="password1" id="inputPassword1" placeholder="password baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword2" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" onkeyup="cek();" name="password2" id="inputPassword2" placeholder="ulangi password baru">
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger">Ubah Password</button>
                        </div>
                      </div>
                </form>

                <script>
                    function cek(){
                        var pass1 = document.getElementById('inputPassword1').value;
                        var pass2 = document.getElementById('inputPassword2').value;

                        if(pass1.length >=5 ){
                                document.getElementById('inputPassword1').className="form-control";
                            if(pass1 == pass2){
                                document.getElementById('inputPassword1').className="form-control is-valid";
                                document.getElementById('inputPassword2').className="form-control is-valid";
                            }else if(pass2.length == 0){
                                document.getElementById('inputPassword2').className="form-control";

                            }else {
                                 document.getElementById('inputPassword2').className="form-control is-invalid";
                            }
                        }else if(pass1.length==0){
                                document.getElementById('inputPassword1').className="form-control";
                        }else {
                            document.getElementById('inputPassword1').className="form-control is-invalid";

                        }


                    }
                </script>

              </div>
              <!-- /.post -->
            </div>

            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>


@endsection









