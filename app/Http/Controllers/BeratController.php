<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Berat;
use Illuminate\Http\Request;

class BeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $berat = Berat::where('max', 'LIKE', "%$keyword%")
                ->orWhere('min', 'LIKE', "%$keyword%")
                ->orWhere('perbedaan', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $berat = Berat::latest()->paginate($perPage);
        }

        return view('berat.index', compact('berat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('berat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'max' => 'required',
			'min' => 'required'
		]);
        $requestData = $request->all();

        $requestData['perbedaan'] = $request['max'] - $request['min'];

        Berat::create($requestData);

        return redirect('berat')->with('flash_message', 'Berat added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $berat = Berat::findOrFail($id);

        return view('berat.show', compact('berat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $berat = Berat::findOrFail($id);

        return view('berat.edit', compact('berat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'max' => 'required',
			'min' => 'required'
		]);
        $requestData = $request->all();

        $requestData['perbedaan'] = $request['max'] - $request['min'];

        $berat = Berat::findOrFail($id);
        $berat->update($requestData);

        return redirect('berat')->with('flash_message', 'Berat updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Berat::destroy($id);

        return redirect('berat')->with('flash_message', 'Berat deleted!');
    }
}
