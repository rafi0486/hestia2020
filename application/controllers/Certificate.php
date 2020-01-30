<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('./application/libraries/Classes/TCPDF/tcpdf.php');

class ZNW_PDF extends TCPDF {

    // Page header

    public function Header() {

        // Quelle: http://www.tcpdf.org/examples/example_051.phps
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set background image
        $img_file = 'assets/certificate/participation.jpg';
        $this->Image($img_file, 0, 0,  297,210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footer() {

        // no special footer

    }
}

class Certificate extends CI_Controller {

    public function Verify(){
        $this->load->model('report_model');
$data['msg']="";
        if(!$this->input->post('cert_no')){
            $this->load->view("dashboard/certificate_verify",$data);

        }else{
            $data['record']=$this->report_model->get_single_certificate($this->input->post('cert_no'));

            if($data['record']){
    $this->load->view("dashboard/certificate_view",$data);

}else{
    $data['msg']="Invalid Certificate No";
    $this->load->view("dashboard/certificate_verify",$data);

}

        }
        //echo "this certificate belongs to ".$record->fullname;
    }

    public function Get($eventid=-1)
    {

        //  header('Content-Type: application/pdf');
        require_once('./application/libraries/Classes/TCPDF/tcpdf.php');

// New PDF doc with class ZNW_PDF (Tools / Libraries / Project / znw_header_footer.php)
// Header with background image (A4)
        $pdf = new ZNW_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('HESTIA TKMCE');
        $pdf->SetTitle('Certificate of participation');
        $pdf->SetSubject('Certificate');
        $pdf->SetKeywords('Hestia 19 Participation Certificate');


        //
//        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//        $pdf->SetCreator(PDF_CREATOR);
//        $pdf->SetTitle('Application Form');
        $this->load->model('report_model');
        if(isset($_SESSION['email'])){

        }else{
            return;
        }
        $records=$this->report_model->get_all_registrations_certificate($_SESSION['email'], $eventid);
       if(!$records){
           return;
       }
        $pdf->SetLeftMargin(100);
        $pdf->SetTopMargin(80);
        $pdf->SetProtection(array('modify'));

        $style = array(
            'border' => 1,
            'padding' => 'auto',
            'fgcolor' =>  array(0,0,0),
            'bgcolor' => array(255,255,255)
        );

//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);
//        $img_file = 'uploads/certificate_bg.png';
//        $pdf->Image($img_file, 10, 10, 210, 297, '', '', '', false, 300, '', false, false, 0);
        foreach ($records as $row){
            $pdf->AddPage('L');
            $pdf->SetXY(0, 89);
            $html1="";
            $html="<h3>$row->fullname</h3>";
            $htmlcollege="<h3>$row->college</h3>";
            $htmlevent="<h3>$row->title</h3>";
           $html1="<h3>H/19/$row->reg_id</h3>";
          //  $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->writeHTMLCell(380, 10, 142, 83, $html, 0, 1, 0, true, '', true);
            $pdf->writeHTMLCell(380, 10, 62, 93, $htmlcollege, 0, 1, 0, true, '', true);
            $pdf->writeHTMLCell(380, 10, 110, 103, $htmlevent, 0, 1, 0, true, '', true);

            $pdf->writeHTMLCell(300, 10, 223, 67, $html1, 0, 1, 0, true, '', true);

            //$pdf->write2DBarcode("www.hestia.live/certificate/".$row->certificate_no, 'QRCODE,L', 20, 158, 30, 30, $style, 'N');

        }

        $pdf->Output('Certificate.pdf', 'D');
    }
}
