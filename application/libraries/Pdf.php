<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

/**
 * 
 */
class Pdf extends Dompdf
{
	
	function __construct()
	{
		parent ::__construct();
	}
}
?>