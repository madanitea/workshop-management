@extends('admin')

@section('main')
<div class="alert alert-success alert-dismissible fade show fixed-bottom col-md-4 col-lg-4 ml-3" role="alert" id="success-alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="highlight-clean">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Tambah Peralatan</h5>
                            </div>
                            <form method="POST" action="{{ url('tools') }}">
                                @csrf
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                                    </div>
                                    <input type="text" class="form-control" name="nama_alat" placeholder="Masukan nama alat.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Merk</label>
                                    </div>
                                    <input type="text" class="form-control" name="merk" placeholder="Masukan merk alat.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Jumlah</label>
                                    </div>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Masukan jumlah alat.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Harga Satuan</label>
                                    </div>
                                    <input type="number" class="form-control" name="harga" placeholder="Masukan harga satuan.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Keterangan</label>
                                    </div>
                                    <input type="text" class="form-control" name="ket" placeholder="Masukan keterangan.">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tempat</label>
                                    </div>
                                    <input type="text" class="form-control" name="tempat" placeholder="Masukan tempat menyimpan alat.">
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
                                <h5>Peralatan Terbaru</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="data_tools" class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Tempat</th>
                                            <th>Tanggal Beli</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($alats as $alat)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $alat->nama_alat }}</td>
                                            <td>{{ $alat->merk }}</td>
                                            <td>{{ $alat->jumlah }}</td>
                                            <td>Rp{{ number_format($alat->harga,0,",",".") }},-</td>
                                            <td>{{ $alat->ket }}</td>
                                            <td>{{ $alat->tempat }}</td>
                                            <td>{{ $alat->tanggal_beli }}</td>
                                            <?php $no++; ?>
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
    </div>
</div>
<div class="highlight-clean">
</div>
@stop
@section('script')
<script type="text/javascript">
    $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
@stop