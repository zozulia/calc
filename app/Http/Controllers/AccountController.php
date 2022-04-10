<?php


namespace App\Http\Controllers;


use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AccountController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()

    {

        $accounts = Account::latest()->paginate(5);


        return view('accounts.index', compact('accounts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()

    {

        return view('accounts.create');

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


        Account::create($request->all());


        return redirect()->route('accounts.index')
            ->with('success', 'Account created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param Account $account
     * @return Response
     */

    public function show(Account $account)

    {

        return view('accounts.show', compact('account'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return Response
     */

    public function edit(Account $account)

    {

        return view('accounts.edit', compact('account'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $account
     * @return Response
     */

    public function update(Request $request, Account $account)

    {

        $request->validate([

            'title' => 'required',

            'notes' => 'required',

        ]);


        $account->update($request->all());


        return redirect()->route('accounts.index')
            ->with('success', 'Account updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return Response
     */

    public function destroy(Account $account)
    {

        $account->delete();


        return redirect()->route('accounts.index')
            ->with('success', 'Account deleted successfully');

    }

    public function options()
    {
        return view('common.options', ['options' => Account::orderby('title')->pluck('title')]);
    }
}
