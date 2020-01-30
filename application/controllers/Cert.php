<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cert extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getCert()
    {
     //  header('Content-Type: application/pdf');
        require_once('Classes/TCPDF/tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Application Form');
        $this->report_model->UpdateViewdApplicationForms($aid,$typ);
        $pdf->SetLeftMargin(10);
        $pdf->SetTopMargin(0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();


        $html=  $this->getHizbApplicationDetailsHTML($typ,$aid);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('Application Form.pdf', 'D');
    }
}
