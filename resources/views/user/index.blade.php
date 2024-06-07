@extends('layouts.template')

@section('page-title')
halaman data user
@endsection

@section('content')
@if ($errors->any())

  

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Sorry error!</h5>
        @foreach($errors->all() as $item)
        <ul>
            <li>{{$item}}</li>
        </ul>
        
        @endforeach
      </div>

    
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pemilik Toko</h3>
            </div>
            <div class="col-md-8 text-right">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                    Tambah data
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pemilik Toko</th>
                            <th>Email</th>
                            <th>Pilihan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        {{-- @if ($user->level =='penjual') --}}
                            
                        
                        <tr>
                            <td>{{$item -> name}}</td>
                            <td>{{$item -> email}}</td>
                            <td>
                                    <a href="#"  class="btn btn-outline-success" data-toggle="dropdown"> Pilihan </a>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{route('penjual.show',$item->id)}}">Detail</a>
                                         <form action="{{route('penjual.destroy',$item->id)}}"  method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="dropdown-item" onclick="return confirm('hapus data?')">Hapus</button>
                                    </form>
                                    </div>
                            </td>
                        </tr>
                        {{-- @endif  --}}
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Pemilik Toko</th>
                            <th>Email</th>
                            <th>Pilihan</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('penjual.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap Penjual</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" required class="form-control">
                        <input type="text" name="level" hidden value="penjual">
                    </div>
                    <div class="form-group">
                        <label>kata sandi</label>
                       <input type="password" name="password" class="form-control" id="" required >
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
