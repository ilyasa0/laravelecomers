@extends('layouts.template')
@section('page-title')
Detail {{$user->name}}
@endsection

@section('content')

@if ($errors->any())

  

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Sorry error in edit!</h5>
        @foreach($errors->all() as $item)
        <ul>
            <li>{{$item}}</li>
        </ul>
        
        @endforeach
      </div>

    
@endif

{{-- area detail pemilik toko --}}
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Tentang User (Penjual)
                    </div>


                </div>
                <div class="card-body">
                    <strong>Info akun</strong>
                    <table class="table table-borderless">

                        <tr>
                            <th> Nama User (pemilik Toko)</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th> Email User (pemilik Toko)</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$user->email}}</td>
                        </tr>

                    </table>
                    <strong> Detail Profile</strong>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('penjual.update',$user->id)}}" method="POST">
                    {{method_field('PUT')}}
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap Penjual</label>
                            <input type="text" name="name" value="{{$user->name}}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                            <input type="text" name="level" hidden value="penjual">
                        </div>
                        <div class="form-group">
                            <label>kata sandi</label>
                           <input type="password" name="password" class="form-control" id="" 
                           placeholder=" Minimal 8 Karakter"  >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    
                </form>

            </div>


        </div>
    </div>
</div>

@endsection
