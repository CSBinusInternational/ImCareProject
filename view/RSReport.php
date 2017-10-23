<?php
include_once '../function/config.php';
include_once '../function/koneksi.php';
include_once '../dao/RsDao.php';

require_once('TCPDF-master/tcpdf.php');
    
$rsdao = new RsDao();


class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Daftar Rumah Sakit', 0, 1, 'C');
        $this->SetFont('Helvetica', 'B', 16);
        //Ganti baris
        $this->Ln(20);
    }

    function Footer() {
        //Geser posisi ke 1,5 cm dari bawah
        $this->SetY(-15);
        //Pilih font Arial italic 8
        $this->SetFont('Helvetica', 'I', 8);
        //Tampilkan nomor halaman rata tengah
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

$pdf = new PDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Daftar Rumah Sakit');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 048', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// add a page
$pdf->AddPage();

$pdf->SetFont('Helvetica', '', 12);

$pdf->SetFont('Helvetica', '', 9);
//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1" align="center">';
$tbl .= '<tr bgcolor="lightblue" style="font-weight:bold; text-align:center;">';
$tbl .= '<th style="width: 5%;">No</th>';
$tbl .= '<th style="width: 15%;">Nama Rumah Sakit </th>';
$tbl .= '<th style="width: 35%;">Alamat</th>';
$tbl .= '<th style="width: 10%;">Kota</th>';
$tbl .= '<th style="width: 10%;">Telepon</th>';
$tbl .= '<th style="width: 10%;">Fax</th>';
$tbl .= '</tr>';
//Header Tabel

$no = 1;
$iterator = $rsdao->get_all_rs()->getIterator();
while ($iterator -> valid()) 
{
    $nmrs = $iterator->current()->getNmrs();
    $almt = $iterator->current()->getAlmt();
    $kotars = $iterator->current()->getKotars();
    $kdposrs = $iterator->current()->getKdposrs();
    $kelurahanrs = $iterator->current()->getKelurahanrs();
    $kecamatanrs = $iterator->current()->getKecamatanrs();
    $telprs = $iterator->current()->getTelprs();
    $faxrs = $iterator->current()->getFaxrs();
                    
    $tbl .= '<tr style="text-align:center;">';
    $tbl .= "<td>" . $no . "</td>";
    $tbl .= "<td>" . $nmrs . "</td>";
    $tbl .= "<td>" . $almt . "</td>";
    $tbl .= "<td>" . $kotars . "</td>";
    $tbl .= "<td>" . $telprs . "</td>";
    $tbl .= "<td>" . $faxrs . "</td>";
    $tbl .= "</tr>";

    $no++;
    $iterator->next();
}
$tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
