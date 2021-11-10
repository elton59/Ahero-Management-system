<?php

function fetch_data()
{
  $output='';
  include('db.php');
   $result=$mysqli->query("select * from customers")or die($mysqli->error);
      while ($row=$result->fetch_assoc())
      {
      $output.=
  "
      
      <tr>
      <td>". $row ['customer_id']."</td>
      <td>". $row ['customer_name']."</td>
      <td>". $row ['email']."</td>
      <td>". $row ['location']."</td>
   
      </tr>
      ";

}
return $output;
}

// Include the main TCPDF library (search for installation path).
include('library/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('John Elton');
$pdf->SetTitle('customers report');
$pdf->SetSubject('TCPDF ');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'AHERO IRRIGATION SCHEME', 'P.O.BOX  30372, KISUMU', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$content='';
$content.='
<style>
table
{
border-collapse:collapse;
}
th,td
{
  border:1px solid #888;
}
table tr th
{
  background-color:#FFFAFA;
  color:fff;
  font-weight:bold; 
}

</style>

';
$content.='


<h3 align="center"><u>Customers list</u></h3>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th cellpadding="2" ><b> CustomerID</b></th>
<th><b> CustomerName</b></th>
<th cellpadding="2"> <b>Email</b></th>
<th><b> Location</b></th>

</tr>
';
$content.=fetch_data();
$content.='</table>';
$pdf->writeHTML($content);
$pdf->output('customers report.pdf','I');



// Print text using writeHTMLCell()
;


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->writeHTML($content);

//============================================================+
// END OF FILE
//============================================================+