<?php
function OpenPanel() {
	echo "
	<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
	<div class='card'>
		<div class='header bg-blue'>
			<h2><i class='fa fa-list'></i> <span id='TitlePanel'></span></h2>
			<div class='pull-right'><div class='switch panel-switch-btn' id='BtnPanel'></div></div>
		</div>
	<div class='body'>";
}

function ClosePanel() {
	echo "</div>
		</div>
		</div>
		</div>";
}

function DirKop() {
	return "../../new/img/kop/";
}

function iCount($db, $Key, $From) {
	$count=$db->query("SELECT count($Key) AS tot FROM $From")->fetch(PDO::FETCH_ASSOC);
	return $count['tot'];
}

function FilterColumns($Columns) {
	for ($i=0;$i<count($Columns);$i++) {
		$Col = explode(".", $Columns[$i]);
		if (count($Col)>1) {
			$a 	  = !empty($iColumns)?',':null; 
			$iColumns[] = $Col[1];
		} else {
			$a 	  = !empty($iColumns)?',':null;
			$iColumns[] = $Columns[$i];
		}
	}
	return $iColumns;
}

function iSearch($Columns) {
	$iColumns 	= FilterColumns($Columns);
	if (isset($_POST['search']['value']) && $_POST['search']['value'] != '') {
		$Where  = '';
		for ($i=0;$i<count($iColumns);$i++) {
			$where .= $iColumns[$i] . ' LIKE "%'.$_POST['search']['value'].'%"';
			if ($i < count($iColumns)-1) {
				$where .= ' OR ';
			}
		}
		$iQuery .= ' WHERE ' . $where;
	}
	return $iQuery;
}

function iFilter($Filter, $Status) {
	if ($Status==""){
		$fill = "=";
	} else {
		$fill = $Status;
	}
    $iFilter = '';
    if (isset($_POST['search']['value']) && $_POST['search']['value'] != '') {
        if (!empty($Filter)) {
            for ($i=0;$i<count($Filter);$i++) {
                $Awal = $i!=0?" AND":null;
                $iFilter .= $Awal." ".$Filter[$i][0]."$fill'".$Filter[$i][1]."'";
            }
        }
    } else {
        if (!empty($Filter)) {
            for ($i=0;$i<count($Filter);$i++) {
                $Awal = $i!=0?" AND":" WHERE";
                $iFilter .= $Awal." ".$Filter[$i][0]."$fill'".$Filter[$i][1]."'";
            }
        }
    }

    $iQuery .= $iFilter;
    return $iQuery;
}

function iSort($Columns, $Sort) {
	$iColumns 	= FilterColumns($Columns);
	$iSortColumn= isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 0;
	$iSortDir   = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';

	if (empty($iSortColumn)) {
		if (!empty($Sort)) {
			$OrderBy='';
			for ($i=0;$i<count($Sort);$i++) {
				$koma = $i!=0?", ":null;
				$OrderBy .= $koma." ".$Sort[$i][0]." ".$Sort[$i][1];
			}
			$iQuery .= " ORDER BY ".$OrderBy;
		}
	} else {
		$iSortColumn = $iColumns[$iSortColumn];
		$iQuery .= " ORDER BY ".$iSortColumn." ".$iSortDir;
	}
	return $iQuery;
}


function iLimit() {
	if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' ) {
        $sLimit = " LIMIT ".intval( $_POST['start'] ).", ".intval( $_POST['length'] );
    }
	$iQuery .= $sLimit;
	return $iQuery;
}


function iPageNum($page){
	$iPage = !empty($page)?$page:1;
	return $iPage;
}

function OffsetNum($page, $iRow) {
	$Offset	= (iPageNum($page) - 1) * $iRow;
	return $Offset;
}
function iLimitNum($iRow, $Offset) {
	$iQuery .= " LIMIT ".$Offset.", ".$iRow;
	return $iQuery;
}

function AntiInjeksi($string){
	$text = addslashes($string);					
	$text = filter_var($string,FILTER_SANITIZE_STRING);

	return $text;
}


function FullAntiInject($string){
	$text = AntiInjeksi($string);
	$text = strip_tags($text);
	return $text;
}

function Enkripsi($pass) {
	$password=$pass;
	for($i=1;$i<=10;$i++) {
		if ($i<=3) {
			$password=md5("Ju".$password."Hd1");
		} elseif ($i>4 && $i<=7) {
			$password=md5("s4k".$password."T1");
		} else {
			$password=md5("0k".$password."M1");
		}
	}
	return $password;
}

function GetKdModul($db, $hal) {
	if (!empty($hal)) {
		return str_pad(GetIdMenu($db, $hal), 3, "0", STR_PAD_LEFT);
	}
}


function GetNoSurat($db, $hal) {
	$res=$db->query("SELECT KdSurat FROM tbl_menu WHERE Folder='$hal'")->fetch(PDO::FETCH_ASSOC);
	if (!empty($res['KdSurat'])) {
		return $res['KdSurat'];
	}
}

function GetIdMenu($db, $hal) {
	$res=$db->query("SELECT IdMenu FROM tbl_menu WHERE Folder='$hal'")->fetch(PDO::FETCH_ASSOC);
	if (!empty($res['IdMenu'])) {
		return $res['IdMenu'];
	}
}

function LogAktifitas($db, $hal, $iduser, $user, $aksi, $status, $data) {
	if ($aksi!="Login" && $aksi!="Logout") {
		$IdMenu  	= GetIdMenu($db, $hal);
		$Menu 		= $db->query("SELECT Menu FROM tbl_menu WHERE IdMenu='$IdMenu'")->fetch(PDO::FETCH_ASSOC);
		$Kode	 	= $status=="sukses"?date('i:s').":SCS-".GetKdModul($db, $hal):date('i:s').":ERR-".GetKdModul($db, $hal);
		if (!empty($data)) {
			$Catatan 	= $status." ".$aksi." data ".$Menu['Menu']." pada ".$data;
		} else {
			$Catatan 	= $status." ".$aksi." data ".$Menu['Menu'];
		}
	} else {
		$Kode	 	= $status=="sukses"?date('i:s').":SCS-".$aksi:date('i:s').":ERR-".$aksi;
		$Catatan 	= $status." ".$aksi;
	}

	$Kode .= "-".$user;
	$TglCreate=date('Y-m-d H:i:s');

	$FieldIdMenu = $aksi!="Login" && $aksi!="Logout"?", IdMenu=?":null;
	$query = $db->prepare("INSERT INTO tbl_log SET Kode=?, IdUser=?, Catatan=?, TglCreate=? $FieldIdMenu");
	$query->bindParam(1, $Kode);
	$query->bindParam(2, $iduser);
	$query->bindParam(3, $Catatan);
	$query->bindParam(4, $TglCreate);
	if ($aksi!="Login" && $aksi<>"Logout") {
		$query->bindParam(5, $IdMenu);
	}
	$query->execute();
}


//====== FUNGSI HARI INDONESIA ===///
function HariIndo($tgl) {
	$tanggal = $tgl;
	$day = date('D', strtotime($tanggal));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	return $dayList[$day];
}

//====== FUNGSI JAM INDONESIA ===///
function JamIndo($tgl){
	$timestamp = strtotime($tgl);
	return date("h.i A", $timestamp);
}

//====== FUNGSI TANGGAL INDONESIA ===///
function TglIndo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = BlnIndo(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}

function BlnIndo($bln){
    switch ($bln){
        case 1:
          return "Januari"; break;
        case 2:
          return "Februari"; break;
        case 3:
          return "Maret"; break;
        case 4:
          return "April"; break;
        case 5:
          return "Mei"; break;
        case 6:
          return "Juni"; break;
        case 7:
          return "Juli"; break;
        case 8:
          return "Agustus"; break;
        case 9:
          return "September"; break;
        case 10:
          return "Oktober"; break;
        case 11:
          return "November"; break;
        case 12:
          return "Desember"; break;
    }
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function Terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}


function Rupiah($angka) { return number_format($angka,0,',','.'); }
function Angka($rupiah) { $int = ereg_replace("[^0-9]", "", $rupiah); return $int; }

function AngsuranSelesai($AngsuranMulai, $JmlAngsuran) {
	$Mulai=explode("-", $AngsuranMulai);
	$Bln = $Mulai[0]-1;
	$Thn = $Mulai[1];

	for ($i=1;$i<=$JmlAngsuran; $i++) { 
		if ($Bln >= 12) {
			$Bln 	= 1;
			$Thn 	= $Thn+1;
		} else {
			$Bln 	= $Bln+1;
			$Thn 	= $Thn;
		}
		$Nol=$Bln<=9?"0":null;
	}
	return $Nol.$Bln."-".$Thn;
}

function NoRefInvoice($db, $KodeNo, $KodeDepartemen) {
	$Thn=date("y");
	$Bln=date("m");
	$NoRefKontrak 	= $db->query("SELECT max(NoRef) AS max FROM tbl_invoice_kontrak WHERE DATE_FORMAT(TglCreate, '%Y')='".date("Y")."'")->fetch(PDO::FETCH_ASSOC);
	$NoRefProgres 	= $db->query("SELECT max(NoRef) AS max FROM tbl_invoice_progres WHERE DATE_FORMAT(TglCreate, '%Y')='".date("Y")."'")->fetch(PDO::FETCH_ASSOC);
	$NoRefNilai 	= $db->query("SELECT max(NoRef) AS max FROM tbl_invoice_nilai WHERE DATE_FORMAT(TglCreate, '%Y')='".date("Y")."'")->fetch(PDO::FETCH_ASSOC);
	$NoRef = array($NoRefKontrak['max'], $NoRefProgres['max'], $NoRefNilai['max']);
	$NoRef = max($NoRef);
	if ($NoRef) {
		$Kode = explode("-", $NoRef);
		$Kode = angka($Kode[1]);
		$Kode = (int)$Kode;
		$Kode = $Kode + 1;
		$No = $KodeDepartemen."-".$KodeNo.str_pad($Kode, 4, "0", STR_PAD_LEFT)."-".$Bln.$Thn;
	} else {
		$No = $KodeDepartemen."-".$KodeNo."0001"."-".$Bln.$Thn;
	}
	return $No;
}

function NoRef($db, $Field, $Table, $KodeNo, $KodeDepartemen) {
	$Thn=date("y");
	$Bln=date("m");
	$NoRef = $db->query("SELECT max($Field) AS max FROM $Table WHERE DATE_FORMAT(TglCreate, '%Y')='".date("Y")."'")->fetch(PDO::FETCH_ASSOC);
	if ($NoRef['max']) {
		$Kode = explode("-", $NoRef['max']);
		$Kode = angka($Kode[1]);
		$Kode = (int)$Kode;
		$Kode = $Kode + 1;
		$No = $KodeDepartemen."-".$KodeNo.str_pad($Kode, 4, "0", STR_PAD_LEFT)."-".$Bln.$Thn;
	} else {
		$No = $KodeDepartemen."-".$KodeNo."0001"."-".$Bln.$Thn;
	}
	return $No;
}

function KodeFM($db, $Modul) {
	$resFM = $db->query("SELECT KdFM FROM tbl_menu WHERE Folder='$Modul'")->fetch(PDO::FETCH_ASSOC);
	$KodeFM = !empty($resFM['KdFM'])?$resFM['KdFM']:" ";
	return $KodeFM;
}



function KodeDp($dbhrs, $Devisi, $Seksi) {
	$KodeDp  = $dbhrs->query("SELECT NoSurat FROM hrs_persuratan WHERE IdDivisi='$Devisi' AND IdSeksi='$Seksi'")->fetch(PDO::FETCH_ASSOC);
	$KodeNo  = $KodeDp['NoSurat'];
	return $KodeNo;
}

function LastId($db, $Field, $Table) {
	$LastId = $db->query("SELECT max($Field) AS max FROM $Table")->fetch(PDO::FETCH_ASSOC);
	$LastId = $LastId['max']+1;
	return $LastId;
}


//Function Aprovel
function CreateAprovel($db, $IdMenu, $IdData) {
	$QueryUserAprovel = $db->query("SELECT Nik FROM tbl_user_aprovel WHERE IdMenu='$IdMenu'");
	while ($resUser=$QueryUserAprovel->fetch(PDO::FETCH_ASSOC)) {
		$query = $db->prepare("INSERT INTO tbl_aprovel SET IdMenu=?, IdData=?, Nik=?");
		$query->bindParam(1, $IdMenu);
		$query->bindParam(2, $IdData);
		$query->bindParam(3, $resUser['Nik']);
		$query->execute();
	}	
}

function GetAprovel($db, $IdMenu, $IdData) {
	$sql=$db->query("SELECT Nik, Status, TglAprovel FROM tbl_aprovel WHERE IdMenu='$IdMenu' AND IdData='$IdData'");
	$st0 = 0;
	$st1 = 0;
	$st2 = 0;
	while ($res=$sql->fetch(PDO::FETCH_ASSOC)) {
		$data['data'][] = $res;

		$st0 = $res['Status']=="0"?$st0+1:$st0;
		$st1 = $res['Status']=="1"?$st1+1:$st1;
		$st2 = $res['Status']=="2"?$st2+1:$st2;
	}
	$data['st0'] = $st0;
	$data['st1'] = $st1;
	$data['st2'] = $st2;

	return $data;
}

function GetStatusAprovel($db, $IdMenu, $IdData, $Nik) {
	$data 	= GetAprovel($db, $IdMenu, $IdData);
	$count 	= count($data['data']);
	$Status = "";
	if ($data['st2']>0) {
		$Status=2;
	} elseif ($count==$data['st0'] || $data['st0']>0) {
		$Status=0;
	} elseif ($count==$data['st1']) {
		$Status=1;
	}

	$a 	  = array_search($Nik, array_column($data['data'], 'Nik'));
	$data = array($Status, $data['data'][$a]['Status']);
	return $data;
}

function StatusAprovel($Status) {
	$ListStatus = array('Belum Disetujui','Disetujui','Tidak Di Setujui');
	$ListLabel 	= array('label-warning','label-success','label-danger');
	$ListIcon 	= array('fa-exclamation-circle','fa-check-circle','fa-times');

	return "<font size='2'><span class='label label-lg ".$ListLabel[$Status]."'><i class='fa ".$ListIcon[$Status]."'></i> ".$ListStatus[$Status]." </span></font>";
}

function CountUserAprovel($db, $IdMenu, $SesNik) {
	$res=$db->query("SELECT count(Id) AS tot FROM tbl_user_aprovel WHERE IdMenu='$IdMenu' AND Nik='$SesNik'")->fetch(PDO::FETCH_ASSOC);
	return $res['tot'];
}

function StatuUserAprovel($db, $IdMenu, $IdData, $SesNik) {
	$res=$db->query("SELECT Status FROM tbl_user_aprovel WHERE IdMenu='$IdMenu' AND IdData='$IdData' AND Nik='$SesNik'")->fetch(PDO::FETCH_ASSOC);
	return $res['Status'];
}

function GetDetailAprovel($db, $IdMenu, $IdData) {

	$data = GetAprovel($db, $IdMenu, $IdData);
	$ListUser=$data['data'];
	$DetailAprovel="";
	foreach ($ListUser as $key) {
		$Nik 	= $key['Nik'];
		$Status = $key['Status'];
		if (!empty($key['TglAprovel'])) {
			$Ket = $key['Nik']." - ".TglIndo($key['TglAprovel'])." ".JamIndo($key['TglAprovel']);
		} else {
			$Ket = $key['Nik'];
		}
		$StyleLabel = array('label-warning','label-success','label-danger');
		
		$DetailAprovel .= "
			<font size='2'><span class='label label-lg ".$StyleLabel[$Status]."'>".$Ket."</span></font>
		";
	}
	return $DetailAprovel;

}

function ProsesAprovel($db, $IdMenu, $IdData, $SesNik, $Status) {
	$query=$db->prepare("UPDATE tbl_aprovel SET Status=?, TglAprovel=? WHERE IdMenu=? AND IdData=? AND Nik=?");
	$query->bindParam(1, $Status);
	$query->bindParam(2, date('Y-m-d H:i:s'));
	$query->bindParam(3, $IdMenu);
	$query->bindParam(4, $IdData);
	$query->bindParam(5, $SesNik);
	$query->execute();

	if ($query) {
		return true;
	} else {
		return false;
	}
}

function UpdateAprovel($db, $Table, $Key, $StatusAprovel, $IdData) {
	$query=$db->prepare("UPDATE $Table SET StatusAprovel=? WHERE $Key=?");
	$query->bindParam(1, $StatusAprovel);
	$query->bindParam(2, $IdData);
	$query->execute();
}

function DeleteAprovel($db, $IdMenu, $IdData) {
	$query=$db->prepare("DELETE FROM tbl_aprovel WHERE IdMenu=? AND IdData=?");
	$query->bindParam(1, $IdMenu);
	$query->bindParam(2, $IdData);
	$query->execute();
}

function TotalNilai($db, $Key, $Table, $Field, $IdData) {
	$TotalNilai = $db->query("SELECT SUM($Field) AS Tot FROM $Table WHERE $Key='$IdData'")->fetch(PDO::FETCH_ASSOC);
	return $TotalNilai['Tot'];
}

function HapusArusKas($db, $Hal, $IdData, $Status) {
	$IdMenu  	= GetIdMenu($db, $Hal);
	$resDelete 	= $db->query("DELETE FROM tbl_arus_kas WHERE IdMenu='$IdMenu' AND IdData='$IdData' AND Status='$Status'");
}
function ArusKas($db, $Hal, $IdData, $IdBank, $Status, $Nilai, $Ket) {
	$IdMenu  	= GetIdMenu($db, $Hal);
	$TglCreate 	= date('Y-m-d H:i:s');
	$KetStatus 	= $Status==0?"Pemasukan dari ".$Ket:"Pengeluaran Dari ".$Ket;
	$resArusKas = $db->prepare("INSERT INTO tbl_arus_kas SET IdMenu=?, IdData=?, IdBank=?, Ket=?, Nilai=?, Status=?, TglCreate=?");
	$resArusKas->bindParam(1, $IdMenu);
	$resArusKas->bindParam(2, $IdData);
	$resArusKas->bindParam(3, $IdBank);
	$resArusKas->bindParam(4, $KetStatus);
	$resArusKas->bindParam(5, $Nilai);
	$resArusKas->bindParam(6, $Status);
	$resArusKas->bindParam(7, $TglCreate);
	$resArusKas->execute();
}

function GetSaldo($db, $IdBank) {
	$query=$db->query("SELECT Saldo FROM tbl_kas WHERE IdBank='$IdBank'")->fetch(PDO::FETCH_ASSOC);
	return $query['Saldo'];
}

function UpdateKas($db, $IdBank, $Status, $Nilai) {
	$Saldo 		= GetSaldo($db, $IdBank);
	$NilaiUpdate= $Status==1?$Saldo-$Nilai:$Saldo+$Nilai;
	$resUpdate 	= $db->query("UPDATE tbl_kas SET Saldo='$NilaiUpdate' WHERE IdBank='$IdBank'");
}


function PecahKrakter($Karakter, $JnsKarakter) {
	$iKarakter = "";
	if ($Karakter!="") {
		$a = explode("___", $Karakter);
		if ($JnsKarakter=="Rp") {
			for($i=0;$i<COUNT($a);$i++) {
				$iKarakter .= "<p style='padding:0px;margin:0px;'>&rarr; Rp. ".Rupiah($a[$i])."</p>";
			}
		} elseif ($JnsKarakter=="Tgl") {
			for($i=0;$i<COUNT($a);$i++) {
				$iKarakter .= "<p style='padding:0px;margin:0px;'>&rarr; ".TglIndo($a[$i])."</p>";
			}
		} else {
			for($i=0;$i<COUNT($a);$i++) {
				$iKarakter .= "<p style='padding:0px;margin:0px;'>&rarr; ".$a[$i]."</p>";
			}
		}
	}
	return $iKarakter;

}