<?php
class C_Pdf extends MY_Controller {

	public function index() {
	}

	public function loadPDF() {
		$stylesheet = ('');
		$html = ('');
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('DCAH Assessment Tool');
		$this -> mpdf -> SetHTMLHeader('<em>DCAH Assessment Tool</em>');
        $this -> mpdf -> SetHTMLFooter('<em>DCAH Assessment Tool</em>');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($html, 2);
		$report_name = 'DCAH Assessment Tool' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

}
