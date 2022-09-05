<?php 
session_start();
$mysqli = new mysqli("localhost","root","","8669");

class pelanggan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_pelanggan()
	{
		$ambildata = $this->koneksi->query("SELECT * FROM pelanggan");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function simpan_pelanggan($id_pel,$nama_pel,$telp_pel,$alamat_pel)
	{
		$this->koneksi->query("INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp_pelanggan`, `alamat_pelanggan`) VALUES ('$id_pel', '$nama_pel', '$telp_pel', '$alamat_pel');");
		return 'sukses';

	}
	function hapus_pelanggan($id)
	{
		$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id' ");
	}
	function ambil_pelanggan($id)
	{
		$ambilpelanggan = $this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
		$pecahpelanggan = $ambilpelanggan->fetch_assoc();
		return $pecahpelanggan;
	}
	function edit_pelanggan($id,$_nama,$_telp,$_alamat)
	{
		$this->koneksi->query("UPDATE pelanggan set nama_pelanggan ='$_nama', telp_pelanggan ='$_telp', alamat_pelanggan = '$_alamat' WHERE id_pelanggan='$id'");
		return "sukses";
	}

}

class supplier
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_supplier()
	{
		$ambildata = $this->koneksi->query("SELECT * FROM supplier");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function simpan_supplier($id_sup,$nama_sales,$alamat_sup,$telp_sales,$nama_sup)
	{
		$this->koneksi->query("INSERT INTO `supplier` (`id_supplier`, `nama_sales`, `alamat_supplier`, `telp_sales`, `nama_supplier`) VALUES ('$id_sup', '$nama_sales', '$alamat_sup', '$telp_sales', '$nama_sup');");
		return 'sukses';

	}
	function hapus_supplier($id)
	{
		$this->koneksi->query("DELETE FROM supplier WHERE id_supplier='$id' ");
	}
	function ambil_supplier($id)
	{
		$ambilsupplier = $this->koneksi->query("SELECT * FROM supplier WHERE id_supplier = '$id'");
		$pecahsupplier = $ambilsupplier->fetch_assoc();
		return $pecahsupplier;
	}
	function edit_supplier($id,$nama_sales,$alamat_sup,$telp_sales,$nama_sup)
	{
		$this->koneksi->query("UPDATE supplier set nama_sales ='$nama_sales', alamat_supplier ='$alamat_sup', telp_sales = '$telp_sales', nama_supplier = '$nama_sup' WHERE id_supplier='$id'");
		return "sukses";
	}

}

class jasaservice
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_jasa()
	{
		$ambildata = $this->koneksi->query("SELECT * FROM jasa_service");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function simpan_jasa($id_jasa,$harga_jasa,$nama_jasa)
	{
		$this->koneksi->query("INSERT INTO `jasa_service` (`id_jasa`, `harga_jasa`, `nama_jasa`) VALUES ('$id_jasa', '$harga_jasa', '$nama_jasa');");
		return 'sukses';

	}
	function hapus_jasa($id)
	{
		$this->koneksi->query("DELETE FROM jasa_service WHERE id_jasa='$id' ");
	}
	function ambil_jasa($id)
	{
		$ambiljasa = $this->koneksi->query("SELECT * FROM jasa_service WHERE id_jasa = '$id'");
		$pecahjasa = $ambiljasa->fetch_assoc();
		return $pecahjasa;
	}
	function edit_jasa($id,$harga_jasa,$nama_jasa)
	{
		$this->koneksi->query("UPDATE jasa_service set harga_jasa ='$harga_jasa', nama_jasa ='$nama_jasa' WHERE id_jasa='$id'");
		return "sukses";
	}

}

class kendaraan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_kendaraan()
	{
		$ambildata = $this->koneksi->query("SELECT * FROM kendaraan");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function simpan_kendaraan($id_kend,$id_pel,$nopol,$merk_kend,$tipe_kend)
	{
		$this->koneksi->query("INSERT INTO `kendaraan` (`id_kendaraan`, `id_pelanggan`, `nomor_polisi`, `merk_kendaraaan`, `tipe_kendaraan`) VALUES ('$id_kend', '$id_pel', '$nopol', '$merk_kend', '$tipe_kend');");
		return 'sukses';

	}
	function hapus_kendaraan($id)
	{
		$this->koneksi->query("DELETE FROM kendaraan WHERE id_kendaraan='$id' ");
	}
	function ambil_kendaraan($id)
	{
		$ambilkendaraan = $this->koneksi->query("SELECT * FROM kendaraan WHERE id_kendaraan = '$id'");
		$pecahkendaraan = $ambilkendaraan->fetch_assoc();
		return $pecahkendaraan;
	}
	function edit_kendaraan($id,$id_pel,$nopol,$merk_kend,$tipe_kend)
	{
		$this->koneksi->query("UPDATE kendaraan set id_pelanggan ='$id_pel', nomor_polisi ='$nopol', merk_kendaraan = '$merk_kend', tipe_kendaraan = '$tipe_kend' WHERE id_kendaraan='$id'");
		return "sukses";
	}

}

class owner
{
	public $koneksi;
	
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function login_owner($username,$password)
	{
		$cek_login = $this->koneksi->query("SELECT * FROM owner Where username='$username'&& password='$password'");
		if($cek_login->num_rows>=1){
			$_SESSION['data_owner']=$cek_login->fetch_assoc();
			return "sukses";

		}
		else{
			return "gagal";
		}

	}
	
	
}
class pegawai
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_pegawai()
	{
		$ambildata = $this->koneksi->query("SELECT * FROM pegawai");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function simpan_pegawai($id_peg,$id_cab,$nama,$alamat,$telp,$gaji,$role)
	{
		$this->koneksi->query("INSERT INTO `pegawai` (`id_pegawai`, `id_cabang`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`, `gaji_pegawai`,`id_role`) VALUES ('$id_peg', '$id_cab', '$nama', '$alamat', '$telp', '$gaji', '$role');");
		return 'sukses';

	}
	function hapus_pegawai($id)
	{
		$this->koneksi->query("DELETE FROM pegawai WHERE id_pegawai='$id' ");
	}
	function ambil_pegawai($id)
	{
		$ambilpegwai = $this->koneksi->query("SELECT * FROM pegawai WHERE id_pegawai = '$id'");
		$pecahpegawai = $ambilpegwai->fetch_assoc();
		return $pecahpegawai;
	}
	function edit_pegawai($id,$_cabang,$_nama,$_alamat,$_telp,$_gaji,$_role)
	{
		$this->koneksi->query("UPDATE pegawai set id_cabang='$_cabang', nama_pegawai='$_nama', alamat_pegawai='$_alamat', telp_pegawai='$_telp', gaji_pegawai='$_gaji', id_role='$_role' WHERE id_pegawai='$id'");
		return "sukses";
	}

}
class cabang 
{
	public $koneksi;
	
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_cabang()
	{
		$ambilcabang = $this->koneksi->query("SELECT * FROM cabang");
		while($pecahcabang = $ambilcabang->fetch_assoc())
		{
			$semuacabang[] = $pecahcabang;
		} 
		return $semuacabang;
	}
	
}
class role 
{
	public $koneksi;
	
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_role()
	{
		$ambilrole = $this->koneksi->query("SELECT * FROM role");
		while($pecahrole = $ambilrole->fetch_assoc())
		{
			$semuarole[] = $pecahrole;
		} 
		return $semuarole;
	}	
}

class transaksi
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_transaksi()
	{
		$ambiltransaksi = $this->koneksi->query("SELECT * FROM transaksi");
		while($pecahtransaksi = $ambiltransaksi->fetch_assoc())
		{
			$semuatransaksi[] = $pecahtransaksi;
		}
		return $semuatransaksi;
	}
}
class transaksijasa
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_transaksijasa()
	{
		$ambiltransaksijas = $this->koneksi->query("SELECT * FROM detail_transaksi_jasa");
		while($pecahtransaksijas = $ambiltransaksijas->fetch_assoc())
		{
			$semuatransaksijas[] = $pecahtransaksijas;
		}
		return $semuatransaksijas;
	}
}

class spareparts
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_spareparts()
	{
		$ambilspareparts = $this->koneksi->query("SELECT * FROM spareparts");
		while($pecahspareparts = $ambilspareparts->fetch_assoc())
		{
			$semuaspareparts[] = $pecahspareparts;
		}
		return $semuaspareparts;
	}
	function tampil_sparepartsbystok()
	{
		$ambilspareparts = $this->koneksi->query("SELECT * FROM spareparts ORDER BY jumlah_stok ASC");
		while($pecahspareparts = $ambilspareparts->fetch_assoc())
		{
			$semuaspareparts[] = $pecahspareparts;
		}
		return $semuaspareparts;
	}
	function simpan_spareparts($kode_spare,$id_sup,$kode_tempat,$nama_spare,$tipe_spare,$merk_spare,$motor,$stok,$harga,$stokmin)
	{
		$password=sha1($pass);
		$this->koneksi->query("INSERT INTO `spareparts` (`kode_spareparts`, `id_supplier`, `kode_penempatan`, `nama_spareparts`, `tipe_spareparts`, `merk_spareparts`, `motor`, `jumlah_stok`, `harga`, `stok_min`)
							VALUES ('$kode_spare','$id_sup','$kode_tempat','$nama_spare','$tipe_spare','$merk_spare','$motor','$stok','$harga','$stokmin');");
		return 'sukses';
	}
	function hapus_spareparts($id)
	{
		$this->koneksi->query("DELETE FROM spareparts WHERE kode_spareparts='$id' ");
	}
	function ambil_spareparts($id)
	{
		$ambilspareparts = $this->koneksi->query("SELECT * FROM spareparts WHERE kode_spareparts = '$id'");
		$pecahspareparts = $ambilspareparts->fetch_assoc();
		return $pecahspareparts;
	}
	function edit_spareparts($id,$id_sup,$kode_tempat,$nama_spare,$tipe_spare,$merk_spare,$motor,$stok,$harga,$stokmin)
	{
		$this->koneksi->query("UPDATE spareparts set id_supplier = '$id_sup', kode_penempatan = '$kode_tempat', nama_spareparts='$nama_spare', tipe_spareparts='$tipe_spare', merk_spareparts='$merk_spare', motor='$motor', jumlah_stok='$stok', harga='$harga', stok_min='$stokmin' WHERE kode_spareparts='$id'");
		return "sukses";
	}
}

class transpengadaan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_transpengadaan()
	{
		$ambiltrans = $this->koneksi->query("SELECT * FROM transaksi_pengadaan");
		while($pecahtrans = $ambiltrans->fetch_assoc())
		{
			$semuatrans[] = $pecahtrans;
		}
		return $semuatrans;
	}
	function simpan_transpengadaan($id_trans,$id_sup,$kode_spare,$tanggal,$harga,$jumlah,$total)
	{
		$this->koneksi->query("INSERT INTO `transaksi_pengadaan` (`id_transaksi_pengadaan`, `id_supplier`, `kode_spareparts`, `tanggal_pengadaan`, `harga_satuan`, `jumlah_barang`, `total_harga`)
							VALUES ('$id_trans','$id_sup','$kode_spare','$tanggal','$harga','$jumlah','$total');");
		return 'sukses';
	}
	function hapus_transpengadaan($id)
	{
		$this->koneksi->query("DELETE FROM transaksi_pengadaan WHERE id_transaksi_pengadaan='$id' ");
	}
	function ambil_transpengadaan($id)
	{
		$ambiltrans = $this->koneksi->query("SELECT * FROM transaksi_pengadaan WHERE id_transaksi_pengadaan = '$id'");
		$pecahtrans = $ambiltrans->fetch_assoc();
		return $pecahtrans;
	}
	function edit_transpengadaan($id,$id_sup,$kode_spare,$tanggal,$harga,$jumlah,$total)
	{
		$this->koneksi->query("UPDATE transaksi_pengadaan set id_supplier = '$id_sup', kode_spareparts = '$kode_spare', tanggal_pengadaan='$tanggal', harga_satuan='$harga', jumlah_barang='$jumlah', total_harga='$total' WHERE id_transaksi_pengadaan='$id'");
		return "sukses";
	}

}

$pelanggan = new pelanggan($mysqli);
$pegawai = new pegawai($mysqli);
$cabang = new cabang($mysqli);
$role = new role($mysqli);
$owner = new owner($mysqli);
$transaksi = new transaksi($mysqli);
$transaksijasa = new transaksijasa($mysqli);
$spareparts = new spareparts($mysqli);
$supplier = new supplier($mysqli);
$kendaraan = new kendaraan($mysqli);
$jasaservice = new jasaservice($mysqli);
$transpengadaan = new transpengadaan($mysqli);
?>