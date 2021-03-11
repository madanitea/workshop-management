@extends('admin')
@section('main')
<div class="highlight-clean"></div>
<div class="row p-0">
	<div class="col-md-6">
		<div class="card shadow">
			<div class="card-body text-center">
				<h5 class="card-title">Statistik Penjualan Mingguan</h5>
				<canvas id="kabbandung-line"></canvas>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card shadow border-top-0 border-left-0 border-warning">
			<div class="card-body text-center">
				<h5 class="card-title">Riwayat Penjualan Hari Ini</h5>
				<h1>{{ $banyak_today }}</h1>
				<h6>Motor Telah Diservis</h6>
			</div>
		</div>
		<div class="card shadow mt-1 border-top-0 border-left-0 border-warning">
			<div class="card-body text-center">
				<h5 class="card-title">Riwayat Pendapatan Penjualan Hari Ini</h5>
				<h1>Rp{{ number_format($jasa_today,0,'.',',') }},-</h1>
				<h6>Telah didapat dari servis.</h6>
			</div>
		</div>
	</div>
</div>
<div class="row p-0">
	<div class="col-md-6">
		<div class="card shadow mt-1 border-top-0 border-left-0 border-warning">
			<div class="card-body text-center">
				<h5 class="card-title">Riwayat Pendapatan Penjualan Bulan Ini</h5>
				<h1>Rp{{ number_format($jasa_thismonth,0,'.',',') }},-</h1>
				<h6>Telah didapat dari servis.</h6>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card shadow border-top-0 border-left-0 border-warning">
			<div class="card-body text-center">
				<h5 class="card-title">Rata-Rata Pendapatan Harian Bulan Ini</h5>
				<h1>Rp{{ number_format($jasa_avgmonth,0,'.',',') }},-</h1>
				@if($change < 0)
          <?php echo "<h6>Menurun Rp".number_format($change,0,'.',',').",- dari bulan lalu.</h6>" ?>
        @else
          <?php echo "<h6>Meningkat Rp".number_format($change,0,'.',',').",- dari bulan lalu.</h6>" ?>
        @endif
			</div>
		</div>
	</div>
</div>
<div class="highlight-clean"></div>
<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="table-responsive">
			<table id="riwayat_servis" class="table table-borderless table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Total Harga</th>
                                            <th>Uang</th>
                                            <th>Kembalian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                      @foreach($serviss as $servis)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $servis->ket }}</td>
                                            <td>{{ $servis->updated_at }}</td>
                                            <td>Rp{{ number_format($servis->total_harga,'0',',','.') }},-</td>
                                            <td>Rp{{ number_format($servis->uang,'0',',','.') }},-</td>
                                            <td>Rp{{ number_format($servis->kembalian,'0',',','.') }},-</td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus" data-no-plat="{{ $servis->no_plat }}" data-tanggal="{{ $servis->tanggal_mulai }}" data-id="{{ $servis->id }}"><i class="fa fa-lg fa-trash"></i> Hapus</button>
                                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#detail" data-tanggal="{{ $servis->tanggal_mulai }}" data-no-plat="{{ $servis->no_plat }}" data-id="{{ $servis->id }}"><i class="fa fa-lg fa-info"></i> Detail</button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
		</div>
	</div>
</div>
<div class="highlight-clean"></div>
<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"><b>Hapus Riwayat</b></h6>
      </div>
      <div class="modal-body">
        <p class="sure">Anda yakin ingin menghapus riwayat ini ?</p>
        <button type="button" class="btn btn-sm btn-outline-danger float-right">- Hapus</button>
        <button type="button" class="btn btn-sm btn-outline-secondary float-right mr-1" data-dismiss="modal"><< Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"><b>Detail Riwayat</b></h6>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-borderless table-light table-hover">
                <tr>
                    <th>Suku Cadang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Busi</td>
                    <td>NGK</td>
                    <td>2</td>
                    <td>Rp12.000,-</td>
                    <td>Rp24.000,-</td>
                </tr>
                <tr>
                    <td>Busi</td>
                    <td>Champion</td>
                    <td>2</td>
                    <td>Rp12.000,-</td>
                    <td>Rp24.000,-</td>
                </tr>
            </table>
        </div>
        <button type="button" class="btn btn-sm btn-outline-success float-right mr-1" data-dismiss="modal"><< Tutup</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#riwayat_servis').DataTable( {
            "ajax": ""
        } );
    } );
</script>
<script type="text/javascript">
  //line
var ctxL = document.getElementById("kabbandung-line").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["01-5-2019", "02-5-2019", "03-5-2019", "04-5-2019", "05-5-2019", "06-5-2019", "07-5-2019"],
    datasets: [
      {
        label: "Pendapatan",
        data: [480000, 280000, 150000, 670000, 450000, 230000, 400000],
        backgroundColor: [
          'rgba(250, 188, 60, .2)',
        ],
        borderColor: [
          'rgba(255, 119, 61, .7)',
        ],
        borderWidth: 2
      }
    ]
  },
  options: {
    responsive: true
  }
});
</script>
@stop