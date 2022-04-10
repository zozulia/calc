<?php


namespace App\Http\Controllers;

use App\Models\Contragent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContragentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()

    {

        $contragents = Contragent::latest()->paginate(5);


        return view('contragents.index', compact('contragents'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()

    {

        return view('contragents.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)

    {

        $request->validate([

            'title' => 'required',

            'notes' => 'required',

        ]);


        Contragent::create($request->all());


        return redirect()->route('contragents.index')
            ->with('success', 'Contragent created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param Contragent $contragent
     * @return Response
     */

    public function show(Contragent $contragent)

    {

        return view('contragents.show', compact('contragent'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Contragent $contragent
     * @return Response
     */

    public function edit(Contragent $contragent)

    {

        return view('contragents.edit', compact('contragent'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contragent $contragent
     * @return Response
     */

    public function update(Request $request, Contragent $contragent)

    {

        $request->validate([

            'title' => 'required',

            'notes' => 'required',

        ]);


        $contragent->update($request->all());


        return redirect()->route('contragents.index')
            ->with('success', 'Contragent updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contragent $contragent
     * @return Response
     */

    public function destroy(Contragent $contragent)

    {

        $contragent->delete();


        return redirect()->route('contragents.index')
            ->with('success', 'Contragent deleted successfully');

    }

    public function options()
    {
        return view('common.options', ['options' => Contragent::orderby('title')->pluck('title')]);
    }
}
