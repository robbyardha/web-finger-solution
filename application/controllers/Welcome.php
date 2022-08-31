<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use TADPHP\TAD;
use TADPHP\TADFactory;

class Welcome extends CI_Controller
{

	public function index()
	{
		// phpinfo();
		// die;
		$options = [
			'ip' => '192.168.1.241',
			'com_key' => 111825,
			'soap_port' => 80
		];
		$tad = new TADFactory($options);
		$con = $tad->get_instance();
		if ($con->is_alive()) {
			$data = $con->get_att_log()->to_array();

			foreach ($data["Row"] as $key => $log) {
				var_dump($log);
				echo "<br/>";
				echo "<br/>";
			}
		} else {
			echo "can't connect to machine";
		}
	}
}
