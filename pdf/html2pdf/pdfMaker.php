<?php
	
	require_once('html/htmlCode.php');
	require_once(dirname(__FILE__).'/../../conexion.php');
	
	$fp = fopen("html/html.php","w");
	fwrite($fp, codeGenerator($_POST,Conectar()));
	fclose($fp);
	
	ob_start();
    include(dirname(__FILE__).'/html/html.php');
    $content = ob_get_clean();
	ob_end_clean();
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
		require_once(dirname(__FILE__).'/../html2pdf.class.php');
		$html2pdf = new HTML2PDF('P','A4','fr');
		$html2pdf->WriteHTML($content);
		$html2pdf->Output('htmlCode.pdf');
	}catch(HTML2PDF_exception $e){
		echo $e;
        exit;
	}
	
?>