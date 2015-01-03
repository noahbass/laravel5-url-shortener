<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Urls;
use App\Http\Requests\CreateUrlRequest;
use App\Http\Requests\UpdateUrlRequest;

class SlugController extends Controller {

	/**
	 * Get the title of a page.
	 *
	 * @return var
	 */
	public function getTitle($url)
	{
		$fp = file_get_contents($url);
		if(!$fp) {
			return null;
		}

		$res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
		if(!$res) {
			return null;
		}

		$title = preg_replace('/\s+/', ' ', $title_matches[1]);
		$title = trim($title);

		return $title;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$urls = Urls::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

		return view('urls.index')
			->with('urls', $urls);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('urls.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUrlRequest $request)
	{
		$r = new Urls;
		$r->user_id = $request->user_id;
		$r->slug    = $request->slug;
		$r->dist    = $request->dist;
		$r->title   = $this->getTitle($request->dist);
		$r->clicks  = 0;
		$r->save();

		return redirect('panel');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$r = Urls::where('slug', '=', $slug)->first();

		if(empty($r)) {
			return ':( nothing was found';
		}

		$r->clicks += 1;
		$r->save();

		return redirect($r->dist);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$r = Urls::find($id);

		return view('urls.edit')
			->with('resource', $r);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateUrlRequest $request, $id)
	{
		$r = Urls::find($id);

		if($request->user_id === $r->user_id) {
			$r->slug = $request->slug;
			$r->dist = $request->dist;
			$r->title = $this->getTitle($request->dist);
			$r->save();
		}

		return redirect('panel');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$r = Urls::find($id);

		if(Auth::user()->id === $r->user_id) {
			$r->delete();
		}

		return redirect('panel');
	}

}
