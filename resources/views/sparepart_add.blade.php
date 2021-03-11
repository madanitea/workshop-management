@extends('admin')

@section('main')
<div class="highlight-clean">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Tambah Suku Cadang</h5>
                            </div>
                            <form method="POST" action="{{ url('sparepart') }}">
                                {{ csrf_field() }}
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                                    </div>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama suku cadang.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Merk</label>
                                    </div>
                                    <input type="text" class="form-control" name="merk" placeholder="Merk.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Untuk</label>
                                    </div>
                                    <input type="text" class="form-control" name="untuk_motor" placeholder="Motor yang dapat menggunakan sparepart ini.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Jumlah</label>
                                    </div>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Harga</label>
                                    </div>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga satuan.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Keterangan</label>
                                    </div>
                                    <input type="text" class="form-control" name="ket" placeholder="Keterangan.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">No Suku Cadang</label>
                                    </div>
                                    <input type="number" class="form-control" name="no_suku_cadang" placeholder="Nomor unik suku cadang.">
                                </div>
                                <button type="submit" class="btn btn-outline-success float-right">+ Tambahkan</button>
                            </form>  
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Suku Cadang Terbaru</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Untuk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Keterangan</th>
                                            <th>No Suku Cadang</th>
                                            <th>Terakhir Diperbaharui</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($suku_cadang as $sparepart)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $sparepart->nama }}</td>
                                            <td>{{ $sparepart->merk }}</td>
                                            <td>{{ $sparepart->untuk_motor }}</td>
                                            <td>{{ $sparepart->jumlah }}</td>
                                            <td>Rp{{ number_format($sparepart->harga,0,",",".") }},-</td>
                                            <td>{{ $sparepart->ket }}</td>
                                            <td>{{ $sparepart->no_suku_cadang }}</td>
                                            <td>{{ $sparepart->updated_at }}</td>
                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="highlight-clean">
</div>
@stop