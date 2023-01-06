<?php

namespace App\Http\Controllers\Admin\Entrant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entrant\StoreRequest;
use App\Models\Entrant\Entrant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EntrantController extends Controller
{
    public function index()
    {
        $entrants = Entrant::orderBy('id', 'desc')->paginate(50);

        return view('admin.sections.entrants.index', compact('entrants'));
    }

    public function create()
    {
        $citizenshipList = Entrant::getCitizenshipList();

        return view('admin.sections.entrants.create', compact('citizenshipList'));
    }

    public function store(StoreRequest $request)
    {
        Entrant::create($request->validated());

        return redirect()->route('admin.entrants.index')->with('success', 'Абитуриент добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
