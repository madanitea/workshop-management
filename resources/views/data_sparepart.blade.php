@extends('admin')

@section('main')
    <div class="highlight-clean">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <a href="#" class="statistik">
                        <div class="card konten">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-shopping-basket"></i> Jumlah Suku Cadang</h4>
                                <h6 class="text-muted card-subtitle mb-2">Keseluruhan</h6>
                                <h1 class="card-text">{{ $jumlah }}</h1></div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4">
                    <a href="#" class="statistik">
                        <div class="card konten">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-money"></i> Harga Suku Cadang</h4>
                                <h6 class="text-muted card-subtitle mb-2">Keseluruhan</h6>
                                <h1 class="card-text">Rp{{ number_format($total,'0',',','.') }},-</h1></div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="statistik">
                        <div class="card konten">
                            <div class="card-body">
                                <h4 class="card-title"> Banyak Jenis Suku Cadang</h4>
                                <h6 class="text-muted card-subtitle mb-2">Keseluruhan</h6>
                                <h1 class="card-text">{{ $banyak }}</h1></div>
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
                                <h5>Data Suku Cadang <small>Ditemukan {{ $banyak }} data suku cadang.</small></h5>
                            </div>
                            <div class="table-responsive mt-2">
                                <table id="data_sparepart" class="table table-borderless">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach( $sparepart as $spareparts )
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $spareparts->nama }}</td>
                                            <td>{{ $spareparts->merk }}</td>
                                            <td>{{ $spareparts->untuk_motor }}</td>
                                            <td>{{ $spareparts->jumlah }}</td>
                                            <td>Rp{{ number_format($spareparts->harga,0,',','.') }},-</td>
                                            <td>{{ $spareparts->ket }}</td>
                                            <td>{{ $spareparts->no_suku_cadang }}</td>
                                            <td>{{ $spareparts->updated_at }}</td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus" data-merk="{{ $spareparts->merk }}" data-nama="{{ $spareparts->nama }}" data-id="{{ $spareparts->id }}"><i class="fa fa-lg fa-trash"></i> Hapus</button>
                                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit" data-no_suku_cadang="{{ $spareparts->no_suku_cadang }}" data-nama="{{ $spareparts->nama }}" data-merk="{{ $spareparts->merk }}" data-id="{{ $spareparts->id }}" data-no="{{ $no }}" data-jumlah="{{ $spareparts->jumlah }}" data-harga="{{ $spareparts->harga }}" data-no_suku_cadang="{{ $spareparts->updated_at }}" data-ket="{{ $spareparts->ket }}" data-untuk_motor="{{ $spareparts->untuk_motor }}"><i class="fa fa-lg fa-edit"></i> Ubah</button>
                                            </td>
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
                <input id="nama" type="text" class="form-control" name="nama" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Merk</label>
                </div>
                <input id="merk" type="text" class="form-control" name="merk" placeholder="Masukan nama alat.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Untuk</label>
                </div>
                <input id="untuk_motor" type="text" class="form-control" name="untuk_motor" placeholder="Masukan nama alat.">
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
                    <label class="input-group-text" for="inputGroupSelect01">No Suku Cadang</label>
                </div>
                <input id="no_suku_cadang" type="number" class="form-control" name="no_suku_cadang" placeholder="Masukan nama alat.">
            </div>
            <input id="del_id" type="hidden" name="sparepart" value="">
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
    $(document).ready(function() {
        $('#data_sparepart').DataTable( {
            "ajax": ""
        } );
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
  modal.find('.modal-body form').attr("action",`{{ url('/sparepart/`+ id +`') }}`)
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
  var untuk_motor = button.data('untuk_motor')
  var no_suku_cadang = button.data('no_suku_cadang')
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text("#"+no+" Perbaharui data "+nama)
  modal.find('.modal-body form').attr("action",`{{ url('/sparepart/`+ id +`') }}`)
  modal.find('.modal-body form #del_id').val(id)
  modal.find('.modal-body form #nama').val(nama)
  modal.find('.modal-body form #merk').val(merk)
  modal.find('.modal-body form #jumlah').val(jumlah)
  modal.find('.modal-body form #harga').val(harga)
  modal.find('.modal-body form #ket').val(ket)
  modal.find('.modal-body form #untuk_motor').val(untuk_motor)
  modal.find('.modal-body form #no_suku_cadang').val(no_suku_cadang)
})
</script>
@stop