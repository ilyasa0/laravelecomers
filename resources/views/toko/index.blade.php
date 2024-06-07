@extends('layouts.template')

@section('page-title')
halaman data toko
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
                <h3 class="card-title">Data Toko</h3>
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
                            <th>Nama Toko</th>
                            <th>kategori</th>
                            <th>pemilik toko</th>
                            <th>Hari Buka</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th>status Toko</th>
                           
                            <th>Pilihan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toko as $item)
                        <tr>
                            <td>{{$item -> nama_toko}}</td>
                            <td>{{$item -> kategori_toko}}</td>
                            <td>{{$item -> user -> name}}</td>
                            <td>{{$item -> hari_buka}}</td>
                            <td>{{$item -> jam_buka}}</td>
                            <td>{{$item -> jam_libur}}</td>
                            <td>
                                @if ($item -> aktif == FALSE)
                                    <span class="badge badge-danger">Toko Tutup</span>
                                    @else
                                    <span class="badge badge-success">Toko Buka</span>
                                @endif
                            
                            </td>
                          
                            <td>
                                    <a href="#"  class="btn btn-outline-success" data-toggle="dropdown"> Pilihan </a>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{route('toko.show',$item->id)}}">Detail</a>
                                         <form action="{{route('toko.destroy',$item->id)}}"  method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="dropdown-item" onclick="return confirm('hapus data?')">Hapus</button>
                                    </form>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Toko</th>
                            <th>kategori</th>
                            <th>pemilik toko</th>
                            <th>status toko</th>
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
                <h4 class="modal-title">tambah data toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('toko.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>nama toko</label>
                        <input type="text" name="nama_toko" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>nama pemilik</label>
                        <select name="id_user" class="form-control" id="">
                            <option value="">Pilih nama pemilik</option>
                          

                            @foreach ($user as $item)
                            @if ($item->level=='penjual')
                                <option value="{{$item->id}}">{{$item->name}}</option>
                             @endif
                            @endforeach
                                
                          
                        </select>
                       
                    </div>
                    <div class="form-group">
                        <label>deskripsi toko</label>
                        <textarea name="desc_toko" id="summernote">
                            
                          </textarea>
                          
                    </div>
                    <div class="form-group">
                        <label>kategori</label>
                       <select name="kategori_toko" required class="form-control" >
                        <option value="elektronik">elektronik</option>
                        <option value="otomotif">otomotif</option>
                        <option value="sembako">sembako</option>
                        <option value="fashion">fashion</option>
                        <option value="makanan">makanan</option>
                        <option value="obat">obat</option>
                        <option value="aksesoris">aksesoris</option>
                        <option value="prabotan">prabotan</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hari buka</label>
                         <!-- checkbox -->
            
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="senin" value="Senin">
                          <label for="senin" class="custom-control-label">Senin</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="selasa" value="Selasa">
                            <label for="selasa" class="custom-control-label">Selasa</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="rabu" value="Rabu">
                            <label for="rabu" class="custom-control-label">Rabu</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="kamis" value="Kamis">
                            <label for="kamis" class="custom-control-label">Kamis</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="jumat" value="Jumat">
                            <label for="jumat" class="custom-control-label">Jumat</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="sabtu" value="Sabtu">
                            <label for="sabtu" class="custom-control-label">Sabtu</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="minggu" value="Minggu">
                            <label for="minggu" class="custom-control-label">Minggu</label>
                          </div>

                    </div>

                    <div class="row justify-content-around">
                       <div class="form-group col-md-6">
                        <label>Jam buka</label>
                        <input type="time" class="form-control" name="jam_buka">
                       </div>
                       <div class="form-group col-md-6">
                        <label>Jam tutup</label>
                        <input type="time" class="form-control" name="jam_libur">
                       </div>
                    </div>

                    <div class="form-group">
                        <select name="aktif" class="form-control" required>
                            <option value="0">Non Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >icon toko</label>
                        <input type="file" name="icon_toko" class="form-control">
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
