<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Urls;
use Illuminate\Support\Facades\Response;

class CsvController extends Controller {

	/**
	 * Create the csv sheet.
	 */
	public function create()
	{
		$table = Urls::all();
		$output = '';

		foreach($table as $row) {
			$output.=  implode(",",$row->toArray());
		}

		return $output;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function text()
	{
		$output = $this->create();
		$headers = array('Content-Type' => 'text');

		return Response::make(rtrim($output, "\n"), 200, $headers);
	}


	/**
	 * Download a listing of the resource.
	 *
	 * @return Response
	 */
	public function download()
	{
		$output = $this->create();
		$headers = array(
			'Content-Type' => 'text/csv',
			'Content-Disposition' => 'attachment; filename="export.csv"',
		);

		return Response::make(rtrim($output, "\n"), 200, $headers);
	}

}
