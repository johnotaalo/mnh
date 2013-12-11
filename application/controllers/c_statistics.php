<?php
class C_Statistics extends MY_Controller {
	var $data;
	var $county;

	public function __construct() {
		parent::__construct();
		$this -> data = '';
		$this -> load -> model('m_statistics');
		$this -> load -> library('PHPExcel');

		//$this -> county = $this -> session -> userdata('county_analytics');
	}

	public function reportingFacilities() {
		$facilities = $this -> m_statistics -> reportingFacilities();
		//echo "<pre>";
		//print_r($facilities);
		//echo "</pre>";
		//Order by County
		foreach ($facilities as $facility) {
			$county = $facility['facilityCounty'];

			$dataArr[$county][] = $facility;
		}
		//echo "<pre>";
		//print_r($dataArr);
		//echo "</pre>";
		//die;
		//$pdf = "<h3>Facility List that responded <em>NEVER</em> for $value District</h3>";

		//echo $pdf;
		//die ;4
		//$myPdf = $this -> createTable($dataArr);
		//$this -> loadPDF($myPdf);
		$this -> loadExcel($dataArr);
	}

	public function createTable($dataArr) {
		$pdf = "";
		$pdf .= '<table>';
		foreach ($dataArr as $key => $facility) {
			//$pdf .= "<tr><h3>Facility List that responded <em>NEVER</em> for $key District</h3></tr>";
			$pdf .= '<tr><th style="text-align:left" colspan="1">' . $key . '<th></tr>';
			#Per Title
			foreach ($facility as $value) {
				$pdf .= '<tr class="tableRow"><td width="150px">' . $value['facilityMFC'] . '</td><td>' . $value['facilityName'] . '</td><td>' . $value['facilityDistrict'] . '</td><td width="500px">' . $value['facilityCounty'] . '</td></tr>';
			}
		}
		$pdf .= '</table>';
		return $pdf;
	}

	#Load PDF
	public function loadPDF($pdf) {
		$stylesheet = ('
		th{
			padding:5px;
			text-align:left;
		}
		tr.tableRow:nth-child(even){
			background:#DDD;
		}
		h3 em {
			color:red;
		}
		');
		$html = ($pdf);
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('Maternal Newborn and Child Health Assessment');
		$this -> mpdf -> SetHTMLHeader('<em>Child Health Assessment Tool</em>');
		$this -> mpdf -> SetHTMLFooter('<em>Child Health Assessment Tool</em>');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($html, 2);
		$report_name = 'CH Assessment Tool_Reporting Facility List' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

	public function loadExcel($data) {
		$objPHPExcel = new PHPExcel();

		// Set properties
		echo date('H:i:s') . " Set properties\n";
		$objPHPExcel -> getProperties() -> setCreator("Maarten Balliauw");
		$objPHPExcel -> getProperties() -> setLastModifiedBy("Maarten Balliauw");
		$objPHPExcel -> getProperties() -> setTitle("Office 2007 XLSX Test Document");
		$objPHPExcel -> getProperties() -> setSubject("Office 2007 XLSX Test Document");
		$objPHPExcel -> getProperties() -> setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

		// Add some data
		echo date('H:i:s') . " Add some data\n";
		$objPHPExcel -> setActiveSheetIndex(0);

		$rowExec = 1;
		//Looping through the Counties
		//Looping Through a County
		foreach ($data as $row) {
			foreach ($row as $facility) {
				//Looping through the cells per facility
				$column = 0;
				foreach ($facility as $cell) {
					$objPHPExcel -> getActiveSheet() -> setCellValueByColumnAndRow($column, $rowExec, $cell);
					$column++;
				}
				$rowExec++;
			}
		}

		//die ;

		// Rename sheet
		echo date('H:i:s') . " Rename sheet\n";
		$objPHPExcel -> getActiveSheet() -> setTitle('Simple');

		// Save Excel 2007 file
		echo date('H:i:s') . " Write to Excel2007 format\n";
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

		// We'll be outputting an excel file
//		header('Content-type: application/vnd.ms-excel');

		// It will be called file.xls
//		header('Content-Disposition: attachment; filename="file.xls"');
		
		
		
		// Write file to the browser
		$objWriter -> save('php://output');
		// Echo done
		echo date('H:i:s') . " Done writing file.\r\n";
	}

}
