@extends('layouts.template')
@section('page-title')
Detail {{$data->nama_toko}}
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
                            <th> Nama toko </th>
                            <td width="5%">:</td>
                            <td width="70%">{{$data->nama_toko}}</td>
                            <td rowspan="7">
                                <img src="{{asset('storage/images/toko/'.$data->icon_toko)}}" width="200px"
                                    alt="gambar">
                            </td>
                        </tr>
                        <tr>
                            <th> Nama pemilik Toko</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$data->user->name}}</td>
                        </tr>
                        <tr>
                            <th> Status toko </th>
                            <td width="5%">:</td>
                            <td width="70%">
                                @if ($data->aktif==TRUE)
                                <span class="badge badge-success">Toko Sedang Aktif</span>
                                @else
                                <span class="badge badge-danger">Toko Sedang Tidak Aktif</span>
                                @endif</td>
                        </tr>
                        <tr>
                            <th> Kategori Toko</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$data->kategori_toko}}</td>
                        </tr>
                        <tr>
                            <th> Deskripsi Toko</th>
                            <td width="5%">:</td>
                            <td width="70%">{!! $data->desc_toko !!}</td>
                        </tr>
                        <tr>
                            <th> Hari Buka Toko</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$data->hari_buka}}</td>
                        </tr>
                        <tr>
                            <th> Jam Operasi Toko</th>
                            <td width="5%">:</td>
                            <td width="70%">{{$data->jam_buka}} - {{$data->jam_libur}}</td>
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

                <form action="{{route('toko.update',$data->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label>Nama toko</label>
                        <input type="text" name="nama_toko" value="{{$data->nama_toko}}" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori Toko</label>
                        <select name="kategori_toko" required  class="form-control">
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
                        <label>Deskripsi Toko</label>
                        <textarea name="desc_toko" id="summernote">
                            {!!$data->desc_toko!!}
                              </textarea>
                    </div>
                    <div class="form-group">
                        <label>Hari Buka Toko</label>

                        <!-- checkbox -->

                        @if ($data->hari_buka == TRUE)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="senin"
                                value="Senin">
                            <label for="senin" class="custom-control-label">Senin</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="selasa"
                                value="Selasa">
                            <label for="selasa" class="custom-control-label">Selasa</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="rabu"
                                value="Rabu">
                            <label for="rabu" class="custom-control-label">Rabu</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="kamis"
                                value="Kamis">
                            <label for="kamis" class="custom-control-label">Kamis</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="jumat"
                                value="Jumat">
                            <label for="jumat" class="custom-control-label">Jumat</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="sabtu"
                                value="Sabtu">
                            <label for="sabtu" class="custom-control-label">Sabtu</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="minggu"
                                value="Minggu">
                            <label for="minggu" class="custom-control-label">Minggu</label>
                        </div>`
                        @endif


                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
                        <label>Status Toko</label>
                        <select name="aktif" class="form-control" required>
                            <option value="0">Non Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>icon toko</label>
                        <input type="file" name="icon_toko" class="form-control">
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
