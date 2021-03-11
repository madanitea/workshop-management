@extends('admin')

@section('main')
    <div class="row fixed-top">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4" id="pesan"></div>
    </div>
    <!-- DIV UNTUK TEST -->

    <!-- <div>
        <form method="POST" action="{{ url('jual/addsparepart') }}">
            @csrf
            <input type="number" name="id_jual" placeholder="id_jual">
            <input type="number" name="kuantitas" placeholder="kuantitas">
            <input type="number" name="id_sparepart" placeholder="id_sparepart">
            <button type="submit">submit</button>
        </form>
    </div> -->
    <div class="highlight-clean">
            <div class="row mb-3">
                <div class="col-md-7 p-0">
                    <h6 class="card-title"><b>Tambah data servis</b></h6>
                    <div class="card">
                        <div class="card-body border-right border-bottom border-warning shadow">
                            <div class="input-group">
                                  <input type="text" class="form-control" id="no_plat" placeholder="Masukan plat nomor disini.">
                                <button class="btn btn-outline-success" id="tambahservis" type="button">+ Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h6 class="card-title"><b>Tambah pembelian suku cadang</b></h6>
                    <div class="card">
                        <div class="card-body border-right border-bottom border-success shadow">
                            <div class="input-group">
                                  <input type="text" class="form-control" id="ket" placeholder="Masukan keterangan (Opsional)">
                                <button class="btn btn-outline-success" type="submit" id="addjual">+ Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 p-0">
                    <div class="card-title"><h6><strong>Data Servis</strong></h6></div>
                    <div class="row" id="serviskonten">
                        <!-- Kontainer Data Servis -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-title"><h6><strong>Data Penjualan</strong></h6></div>
                    <div class="row" id="jualkonten">
                        <!-- Kontener Data Jual -->
                    </div>
                </div>
            </div>
        
    </div>
    <div class="map-clean"></div>
    <!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"><strong>Hapus data servis</strong></h6>
      </div>
      <div class="modal-body">
        <p class="sure"></p>
        <form action="" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input id="del_id" type="hidden" name="servis" value="">
            <button href="" class="btn btn-sm btn-outline-danger float-right">- Hapus</button>
        </form>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal Hapus Penjualan-->
<div class="modal fade" id="hapusjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h6 class="modal-title"><b>Hapus data penjualan</b></h6>
        <p class="sure"></p>
        <button type="button" class="submitdelete btn btn-sm btn-outline-danger float-right" data-dismiss="modal" data-id="">- Hapus</button>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Selesai -->
<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h6 class="modal-title"><b>Selesaikan Pekerjaan</b></h6>
        <form>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Total Sparepart | Rp</label>
                </div>
                <input id="total_harga_suku_cadang" type="number" class="form-control" name="total" placeholder="Total harga suku cadang." disabled="">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Jasa | Rp</label>
                </div>
                <input id="jasa" type="number" class="form-control" name="jasa" placeholder="Masukan biaya jasa servis.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Uang | Rp</label>
                </div>
                <input id="uang" type="number" class="form-control" name="uang" placeholder="Masukan jumlah uang dari pelanggan.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Kembalian | Rp</label>
                </div>
                <input id="kembalian" type="number" class="form-control" name="kembalian" placeholder="Kembalian." disabled="">
            </div>
            <button id="submit" class="btn btn-sm btn-outline-primary float-right">+ Selesai</button>
        </form>  
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1"><< Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Selesai Penjualan -->
<div class="modal fade" id="selesaijual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h6 class="modal-title"><b>Selesaikan Penjualan</b></h6>
        <form method="POST">
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Rp</label>
                </div>
                <input type="number" id="total_harga_suku_cadang_jual" class="form-control" name="" placeholder="Total harga suku cadang." disabled="">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Rp</label>
                </div>
                <input type="number" id="uang_jual" class="form-control" name="" placeholder="Masukan jumlah uang dari pelanggan.">
            </div>
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Rp</label>
                </div>
                <input type="number" id="kembalian_jual" class="form-control" name="" placeholder="Kembalian." disabled="">
            </div>
        </form>  
        <a href="{{ url('dashboard') }}" id="submitjual" class="btn btn-sm btn-outline-primary float-right">+ Selesai</a>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"><b id="edit-title"></b></h6>
        </div>
      <div class="modal-body">
        <div class="table-responsive mt-2">
            <table class="data_sparepart table table-borderless">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Merk</th>
                <th>Ket</th>
                <th>Untuk Motor</th>
                <th>Harga</th>
                <th>Tersisa</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spareparts as $sparepart)
            <tr>
                <td>{{ $sparepart->nama }}</td>
                <td>{{ $sparepart->merk }}</td>
                <td>{{ $sparepart->ket }}</td>
                <td>{{ $sparepart->untuk_motor }}</td>
                <td>{{ $sparepart->harga }}</td>
                <td>{{ $sparepart->jumlah }}</td>
                <td><input type="number" name="jumlah" id="jumlah{{ $sparepart->id }}" class="form-control" max="{{ $sparepart->jumlah }}" min="1"></td>
                <td><button class="add btn btn-sm btn-outline-success" data-servis-id="" data-id="{{ $sparepart->id }}">+</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="mt-4">
            <a href="{{ url('dashboard') }}" class="btn btn-sm btn-outline-success float-right">+ Simpan</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Penjualan -->
<div class="modal fade" id="editjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"><b>Edit data penjualan Pa Imam</b></h6>
        </div>
      <div class="modal-body">
        <div class="table-responsive mt-2">
        <table class="data_sparepart table table-borderless">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Merk</th>
                <th>Ket</th>
                <th>Untuk Motor</th>
                <th>Harga</th>
                <th>Tersisa</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spareparts as $sparepart)
            <tr>
                <td>{{ $sparepart->nama }}</td>
                <td>{{ $sparepart->merk }}</td>
                <td>{{ $sparepart->ket }}</td>
                <td>{{ $sparepart->untuk_motor }}</td>
                <td>{{ $sparepart->harga }}</td>
                <td>{{ $sparepart->jumlah }}</td>
                <td><input type="number" name="jumlah" id="jumlahjual{{ $sparepart->id }}" class="form-control" max="{{ $sparepart->jumlah }}" min="1"></td>
                <td><button class="addjual btn btn-sm btn-outline-success" data-jual-id="{{ $sparepart->id }}" data-id="{{ $sparepart->id }}">+</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="mt-4">
            <a href="{{ url('dashboard') }}" class="btn btn-sm btn-outline-success float-right">+ Simpan</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
    $('add').on('click',function(){
        $.ajax({
            url: "lalala.com",
            type: "get",
            success: function(response){
                console.log(response)
            },
            error: function(response){
                alert(response)
            }
        })
    })
</script> -->
<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"></h6>
        </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-sm table-borderless table-light table-hover" id="detail_servis">
                <!-- DETAIL SERVIS KONTAINER -->
            </table>
        </div>
        <a href="{{ url('dashboard') }}" class="btn btn-sm btn-outline-success float-right mr-1"><i class="fa fa-check"></i> Simpan</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal fade" id="detailjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"><b>Detail data penjualan Pa Imam</b></h6>
        </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-sm table-borderless table-light table-hover" id="detail_jual">
                <!-- Kontainer Detail Penjualan -->
            </table>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Tutup</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        readjual()
        $('#addjual').on('click', function(){
            $('#jualkonten').html('')
            jualbaru()
            readjual()
            $('#ket').val('')
        })
        $('#ket').on('keypress',function(e){
            if(e.which == 13){
                $('#jualkonten').html('')
                jualbaru()
                readjual()
                $(this).val('')
            }
        })
        function jualparse(data){
        let no = 1;
        console.log('masuk')
        for (i=0; i < data.length; i++) {
            console.log(data[i].ket + ", " + data[i].id + ", " + data[i].created_at);
            $("#jualkonten").append(`
                <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body border-right border-bottom border-success shadow">
                                    <p class="card-title"><b>#`+ no +`- `+ data[i].ket +`</b></p>
                                    <p class="card-subtitle">Total : Rp`+ data[i].total_harga +`,-</p>
                                    <p class="card-text">`+ data[i].created_at +`</p>
                                    <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#editjual" data-id="`+ data[i].id +`" data-ket="`+ data[i].ket +`">+ Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#hapusjual" data-ket="`+ data[i].ket +`" data-id="`+ data[i].id +`">- Hapus</button>
                                    <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#detailjual" data-ket="`+ data[i].ket +`" data-id="`+ data[i].id +`">>> Detail</button>
                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#selesaijual" data-id="`+ data[i].id +`">Selesai</button>
                                </div>
                            </div>
                        </div>
            `)
            no++;
        }

    }
    $('#editjual').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget)
        let ket = button.data('ket')
        let id = button.data('id')
        let modal = $(this)
        console.log(ket)
        modal.find('.modal-title').text('Edit data penjualan '+ket)
        modal.find('.addjual').attr('data-jual-id', id)
    })

    $('.addjual').on('click', function(){
        var id_sparepart = $(this).attr('data-id')
        var jumlah = $('#jumlahjual'+id_sparepart).val()
        var id_jual = $(this).attr('data-jual-id')
        console.log(id_sparepart+' jumlah '+jumlah+' Dengan id jual '+id_jual)
        $('#jumlahjual'+id_sparepart).val("")
            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('jual/addsparepart') }}",
            type: "post",
            data: {
                "id_jual" : id_jual,
                "id_sparepart" : id_sparepart,
                "kuantitas" : jumlah
            },
            success: function(data){
                $("#pesan").append(`<div class="alert alert-success alert-dismissible fade show mt-2 mr-2" role="alert">
              <strong>Berhasil!</strong> `+ data +`
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
            },
            error: function(data){
                alert("Error"+data)
            }
            })
        })

    $('#hapusjual').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget)
        let ket = button.data('ket')
        let id = button.data('id')
        let id_jual = $('.submitdelete').attr('data-id',id)
        let modal = $(this)
        modal.find('.sure').text('Yakin akan menghapus data penjualan '+ket+' ?')

    })
    $('.submitdelete').on('click', function(){
            let jual_id = $(this).attr('data-id')
            console.log(jual_id)
            $.ajax({
                url: `{{ url('jual') }}`+`/`+jual_id,
                type: 'delete',
                success : function(response){
                    console.log(response)
                    $('#jualkonten').html('')
                    readjual()
                },
                error: function(response){
                    console.log(response)
                    alert('Terjadi kesalahan.')
                }
            })
        })
        function readjual(){
            $.ajax({
                type: 'get',
                url: `{{ url('jual') }}`,
                success: function(response){
                    console.log(response)
                    let data = JSON.parse(response)
                    jualparse(data)
                },
                error: function(response){
                    console.log(response)
                }
            })
        }
        function jualbaru(){
            let ket = $('#ket').val()
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : `{{ url('jual') }}`,
                data: {
                    ket : ket
                },
                success : function(data){
                    console.log('Sukses')
                    alert('Berhasil ditambahkan!')
                },
                error: function(){
                    console.log('Gagal')
                    alert('Gagal menambahkan karena beberapa error')
                }
            })
        }
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
         $(".data_sparepart").DataTable();
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function readservis(){
        $.ajax({
            url: "{{ url('servis') }}",
            type: "get",
            success: function(response){
                var data = JSON.parse(response);
                servisparse(data);
            }
        })
    }

    function servisparse(data){
        let no = 1;
        for (i=0; i < data.length; i++) {
            console.log(data[i].no_plat + ", " + data[i].id + ", " + data[i].tanggal_mulai);
            $("#serviskonten").append(`
                <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body border-right border-bottom border-warning shadow">
                                    <p class="card-title"><b>#`+ no +`- `+ data[i].no_plat +`</b></p>
                                    <p class="card-subtitle">Total : Rp`+ data[i].total_harga_suku_cadang +`,-</p>
                                    <p class="card-text">`+ data[i].tanggal_mulai +`</p>
                                    <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#edit" data-id="`+ data[i].id +`" data-no-plat="`+ data[i].no_plat +`">+ Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#hapus" data-no-plat="`+ data[i].no_plat +`" data-id="`+ data[i].id +`">- Hapus</button>
                                    <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#detail" data-no-plat="`+ data[i].no_plat +`" data-id="`+ data[i].id +`">>> Detail</button>
                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#selesai" data-id="`+ data[i].id +`">Selesai</button>
                                </div>
                            </div>
                        </div>
            `)
            no++;
        }

    }

    $(document).ready(function(){
        readservis();
    })

    function storeservis(){
        var no_plat = $("#no_plat").val()
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('servis') }}",
            type: "post",
            data: {
                "no_plat" : no_plat
            },
            success: function(data){
                $("#pesan").append(`<div class="alert alert-success alert-dismissible fade show mt-2 mr-2" role="alert">
              <strong>Semangat!</strong> `+ data +`
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
            },
            error: function(data){
                alert("Error"+data)
            }
        })
        $("#no_plat").val("")
    };

    $("#tambahservis").on("click",function(){
        $("#serviskonten").html("");
        storeservis();
        readservis();
    });

    $("#no_plat").on('keypress',function(e) {
        if(e.which == 13) {
            $("#serviskonten").html("");
            storeservis();
            readservis();
        }
    });
</script>
<script type="text/javascript">
    $('#edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var no_plat = button.data('no-plat')
        var modal = $(this)
        modal.find('.modal-header .modal-title #edit-title').text('Edit data servis '+no_plat)
        modal.find('.add').attr('data-servis-id', id)
        //modal.find('')
    })
</script>
<script type="text/javascript">
    $('.add').on('click', function(){
        var id_sparepart = $(this).attr('data-id')
        var jumlah = $('#jumlah'+id_sparepart).val()
        var id_servis = $(this).attr('data-servis-id')
        console.log(id_sparepart+' jumlah '+jumlah+' Dengan id servis '+id_servis)
        $('#jumlah'+id_sparepart).val("")
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('servis/addsparepart') }}",
            type: "post",
            data: {
                "id_servis" : id_servis,
                "id_sparepart" : id_sparepart,
                "kuantitas" : jumlah
            },
            success: function(data){
                $("#pesan").append(`<div class="alert alert-success alert-dismissible fade show mt-2 mr-2" role="alert">
              <strong>Berhasil!</strong> `+ data +`
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`);
            },
            error: function(data){
                alert("Error"+data)
            }
        })
    })
</script>
<script type="text/javascript">
        $('#hapus').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var plat = button.data('no-plat')
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body .sure').text('Hapus data servis dengan plat nomor ' + plat + ' ?')
          modal.find('.modal-body form').attr("action",`{{ url('servis/`+ id +`') }}`)
          modal.find('.modal-body form #del_id').val(id)
        })
</script>
<script type="text/javascript">
    $('#detailjual').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        let ket = button.data('ket')
        let id = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').html(`<b>Detail data `+ket+`</b>`);
        databarujual();
        function databarujual(){
            $.ajax({
                url : `{{ url('jual/detail/`+id+`') }}`,
                type : 'get',
                success : function(response){
                    data = (JSON.parse(response))
                    console.log(data)
                    showdetailjual(data)
                },
                error : function(response){
                    console.log(response)
                }
            })
        }

        function showdetailjual(data){
            $('#detail_jual').html('')
            $('#detail_jual').append(`<tr>
                    <th>Suku Cadang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>`)
            let harga = 0
            for(i=0; i < data.length; i++){
                $('#detail_jual').append(`<tr>
                    <td>`+ data[i].nama +`</td>
                    <td>`+ data[i].merk +`</td>
                    <td>`+ data[i].kuantitas +`</td>
                    <td>Rp`+ data[i].harga +`,-</td>
                    <td>Rp`+ data[i].total_harga +`,-</td>
                    <td><button class="del_detail btn btn-sm btn-outline-danger" data-id="`+ data[i].id +`">- Hapus</button></td>
                </tr>`)
                harga = harga + parseInt(data[i].total_harga)
            }
            $('#detail_jual').append(`<tr>
                    <td colspan="4"><b>Total Harga Sementara: <b></td>
                    <td><b>Rp`+ harga +`,-</b></td>
                </tr>`)
            $('.del_detail').on('click', function(){
                var id_detail = $(this).attr('data-id')
                console.log(id_detail)
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ url('jual/detail/`+ id_detail +`') }}`,
                    type: 'delete',
                    success: function(response){
                        databarujual()
                    },
                    error: function(response){
                        databarujual()
                    }
                })
            })
        }
    })

    $('#detail').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        let plat = button.data('no-plat')
        let id = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').html(`<b>Detail data servis `+plat+`</b>`);
        databaru();
        function databaru(){
            $.ajax({
                url : `{{ url('servis/detail/`+id+`') }}`,
                type : 'get',
                success : function(response){
                    data = (JSON.parse(response))
                    console.log(data)
                    showdetail(data)
                },
                error : function(response){
                    console.log(response)
                }
            })
        }

        function showdetail(data){
            $('#detail_jual').html('')
            $('#detail_jual').append(`<tr>
                    <th>Suku Cadang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>`)
            let harga = 0
            for(i=0; i < data.length; i++){
                $('#detail_jual').append(`<tr>
                    <td>`+ data[i].nama +`</td>
                    <td>`+ data[i].merk +`</td>
                    <td>`+ data[i].kuantitas +`</td>
                    <td>Rp`+ data[i].harga +`,-</td>
                    <td>Rp`+ data[i].total_harga +`,-</td>
                    <td><button class="del_detail btn btn-sm btn-outline-danger" data-id="`+ data[i].id +`">- Hapus</button></td>
                </tr>`)
                harga = harga + parseInt(data[i].total_harga)
            }
            $('#detail_jual').append(`<tr>
                    <td colspan="4"><b>Total Harga Sementara: <b></td>
                    <td><b>Rp`+ harga +`,-</b></td>
                </tr>`)
            $('.del_detail').on('click', function(){
                var id_detail = $(this).attr('data-id')
                console.log(id_detail)
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ url('servis/detail/`+ id_detail +`') }}`,
                    type: 'delete',
                    success: function(response){
                        databaru()
                    },
                    error: function(response){
                        databaru()
                    }
                })
            })
        }
    })
    $('#detail').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        let plat = button.data('no-plat')
        let id = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').html(`<b>Detail data servis `+plat+`</b>`);
        databaru();
        function databaru(){
            $.ajax({
                url : `{{ url('servis/detail/`+id+`') }}`,
                type : 'get',
                success : function(response){
                    data = (JSON.parse(response))
                    console.log(data)
                    showdetail(data)
                },
                error : function(response){
                    console.log(response)
                }
            })
        }

        function showdetail(data){
            $('#detail_servis').html('')
            $('#detail_servis').append(`<tr>
                    <th>Suku Cadang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>`)
            let harga = 0
            for(i=0; i < data.length; i++){
                $('#detail_servis').append(`<tr>
                    <td>`+ data[i].nama +`</td>
                    <td>`+ data[i].merk +`</td>
                    <td>`+ data[i].kuantitas +`</td>
                    <td>Rp`+ data[i].harga +`,-</td>
                    <td>Rp`+ data[i].total_harga +`,-</td>
                    <td><button class="del_detail btn btn-sm btn-outline-danger" data-id="`+ data[i].id +`">- Hapus</button></td>
                </tr>`)
                harga = harga + parseInt(data[i].total_harga)
            }
            $('#detail_servis').append(`<tr>
                    <td colspan="4"><b>Total Harga Sementara: <b></td>
                    <td><b>Rp`+ harga +`,-</b></td>
                </tr>`)
            $('.del_detail').on('click', function(){
                var id_detail = $(this).attr('data-id')
                console.log(id_detail)
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ url('servis/detail/`+ id_detail +`') }}`,
                    type: 'delete',
                    success: function(response){
                        databaru()
                    },
                    error: function(response){
                        databaru()
                    }
                })
            })
        }
    })
</script>
<script type="text/javascript">
    $('#selesai').on('show.bs.modal', function(event){
        $('#total_harga_suku_cadang').val()
        $('#uang').val('')
        $('#jasa').val('')
        $('#kembalian').val('')
        var button = $(event.relatedTarget)
        var id = button.data('id')
        $.ajax({
            url: `{{ url('servis/`+ id +`/detail') }}`,
            type: 'get',
            success: function(response){
                console.log(response)
                show_last_servis(response)
            },
            error: function(response){
                console.log(response)
            }
        })

        function show_last_servis(total_harga){
            var total_harga_suku_cadang = parseInt(total_harga)
            $('#selesai #total_harga_suku_cadang').val(total_harga_suku_cadang)
            $('#selesai #uang').on('keyup', function(){
                var jasa = parseInt($('#selesai #jasa').val())
                var uang = parseInt($(this).val())
                var keseluruhan = jasa + total_harga_suku_cadang
                var kembalian = uang - keseluruhan
                $('#selesai #kembalian').val(kembalian)

                $('#submit').on('click',function(){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `{{ url('servis/selesai') }}`,
                        type: 'post',
                        data: {
                            id : id,
                            total : keseluruhan,
                            jasa : jasa,
                            uang : uang,
                            kembalian, kembalian
                        },
                        success: function(response){
                            console.log(response)
                        },
                        error: function(response){
                            console.log(response)
                        }
                    })
                })
            })
        }
    })

    $('#selesaijual').on('show.bs.modal', function(event){
        $('#total_harga_suku_cadang_jual').val('')
        $('#uang').val('')
        $('#kembalian').val('')
        var button = $(event.relatedTarget)
        var id = button.data('id')
        $.ajax({
            url: `{{ url('jual/`+ id +`/detail') }}`,
            type: 'get',
            success: function(response){
                console.log(response)
                show_last_jual(response)
            },
            error: function(response){
                console.log(response)
            }
        })

        function show_last_jual(total_harga){
            var total_harga_suku_cadang_jual = parseInt(total_harga)
            $('#selesaijual #total_harga_suku_cadang_jual').val(total_harga_suku_cadang_jual)
            $('#selesaijual #uang_jual').on('keyup', function(){
                var uang = parseInt($(this).val())
                var keseluruhan = total_harga_suku_cadang_jual
                var kembalian = uang - keseluruhan
                console.log(kembalian)
                $('#selesaijual #kembalian_jual').val(kembalian)

                $('#submitjual').on('click',function(){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `{{ url('jual/selesai') }}`,
                        type: 'post',
                        data: {
                            id : id,
                            total : keseluruhan,
                            uang : uang,
                            kembalian, kembalian
                        },
                        success: function(response){
                            console.log(response)
                        },
                        error: function(response){
                            console.log(response)
                        }
                    })
                })
            })
        }
    })
</script>
@stop