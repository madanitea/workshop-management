@extends('admin')

@section('main')
    <div class="highlight-clean">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-6">
                    <a href="#" class="statistik">
                        <div class="card konten">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-shopping-basket"></i> Jumlah Peralatan</h4>
                                <h6 class="text-muted card-subtitle mb-2">Keseluruhan</h6>
                                <h1 class="card-text">{{ $jumlah }}</h1></div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6">
                    <a href="#" class="statistik">
                        <div class="card konten">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-money"></i> Harga Peralatan</h4>
                                <h6 class="text-muted card-subtitle mb-2">Keseluruhan</h6>
                                <h1 class="card-text">Rp{{ number_format($total,0,",",".") }},-</h1></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Data Peralatan <small>Ditemukan {{ $banyak }} data Peralatan.</small></h5>
                            </div>
                            <div class="table-responsive mt-2">
                                <table id="data_tools" class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Tempat</th>
                                            <th>Kondisi</th>
                                            <th>Tanggal Beli</th>
                                            <th>Aksi</th>
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
                                            <td>{{ $alat->status }}</td>
                                            <td>{{ $alat->tanggal_beli }}</td>
                                            <td>
                                                <button class="btn btn-light" data-toggle="modal" data-target="#hapus" data-nama="{{ $alat->nama_alat }}" data-merk="{{ $alat->merk }}" data-id="{{ $alat->id }}"><i class="fa fa-lg fa-trash"></i> Hapus</button>
                                                <button class="btn btn-light" data-toggle="modal" data-target="#edit" data-nama="{{ $alat->nama_alat }}" data-merk="{{ $alat->merk }}" data-id="{{ $alat->id }}" data-no="{{ $no }}" data-jumlah="{{ $alat->jumlah }}" data-harga="{{ $alat->harga }}" data-tgl_beli="{{ $alat->tanggal_beli }}" data-ket="{{ $alat->ket }}" data-tempat="{{ $alat->tempat }}"><i class="fa fa-lg fa-edit"></i> Ubah</button>
                                            </td>
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
    <div class="highlight-clean">
    </div>
    <!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>
      </div>
      <div class="modal-body">
        <p class="sure"></p>
        <form action="" method="POST">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <input id="del_id" type="hidden" name="tool" value="">
            <button href="" class="btn btn-sm btn-outline-danger float-right">- Hapus</button>
        </form>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>
      </div>
      <div class="modal-body">
        <p class="sure"></p>
        <form action="" method="POST">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                </div>
                <input id="nama" type="text" class="form-control" name="nama_alat" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Merk</label>
                </div>
                <input id="merk" type="text" class="form-control" name="merk" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tempat</label>
                </div>
                <input id="tempat" type="text" class="form-control" name="tempat" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Jumlah</label>
                </div>
                <input id="jumlah" type="number" class="form-control" name="jumlah" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Harga</label>
                </div>
                <input id="harga" type="number" class="form-control" name="harga" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Keterangan</label>
                </div>
                <input id="ket" type="text" class="form-control" name="ket" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Kondisi</label>
                </div>
                <select class="form-control" name="status">
                    <option>Baik</option>
                    <option>Rusak</option>
                </select>
            </div>
            <input id="del_id" type="hidden" name="tool" value="">
            <button href="" class="btn btn-sm btn-outline-success float-right">+ Simpan</button>
        </form>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script type="text/javascript">
    $(document).ready( function () {
    $('#data_tools').DataTable();
} );
</script>
<script type="text/javascript">
    $('#hapus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nama = button.data('nama')
  var id = button.data('id')
  var merk = button.data('merk') // Extract info from data-* attributes
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Hapus ' + nama)
  modal.find('.modal-body .sure').text('Yakin akan menghapus '+nama+' dengan merk '+merk+' dari database ? ')
  modal.find('.modal-body form').attr("action",`{{ url('/tools/`+ id +`') }}`)
  modal.find('.modal-body form #del_id').val(id)
})
</script>

<script type="text/javascript">
    $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nama = button.data('nama')
  var id = button.data('id')
  var merk = button.data('merk')
  var no = button.data('no')
  var jumlah = button.data('jumlah')
  var harga = button.data('harga')
  var ket = button.data('ket') 
  var tempat = button.data('tempat')
  var tgl_beli = button.data('tgl_beli')
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text("#"+no+" Perbaharui data "+nama)
  modal.find('.modal-body form').attr("action",`{{ url('/tools/`+ id +`') }}`)
  modal.find('.modal-body form #del_id').val(id)
  modal.find('.modal-body form #nama').val(nama)
  modal.find('.modal-body form #merk').val(merk)
  modal.find('.modal-body form #jumlah').val(jumlah)
  modal.find('.modal-body form #harga').val(harga)
  modal.find('.modal-body form #ket').val(ket)
  modal.find('.modal-body form #tempat').val(tempat)
  modal.find('.modal-body form #tgl_beli').val(tgl_beli)
})
</script>
@stop