<?php


namespace App\Http\Controllers;


use App\Http\Requests\OperationIndexRequest;
use App\Models\{Account, Contragent, Operation};
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * List of Filter params values
     *
     * @var string
     */
    private $filterTitle = '';


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index(OperationIndexRequest $request)

    {
        $operations = Operation::filter($request)->latest()->paginate(5);

        if ($request->input('csv')) {
            header('Accept : "text/csv; charset=utf-8"');
            header('Content-Type: "text/csv; charset=utf-8"');
            header('Cache-Control: no-cache, must-revalidate');
            header('Content-Disposition: attachment; filename="filename.csv"');
            return $this->getCsv($request);
        } else {
            $operations->appends($request->toArray());
            $this->filterHandle($request);
            $this->setSum($request);

            return view(
                'operations.index',
                ['operations' => $operations, 'filterTitle' => $this->filterTitle, 'filterParams' => $request->toArray()]
            )->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()

    {
        $accounts = Account::pluck('title', 'id');
        $contragents = Contragent::pluck('title', 'id');

        return view('operations.create', compact('accounts', 'contragents'));

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


        Operation::create($request->all());


        return redirect()->route('operations.index')
            ->with('success', 'Платёж сохранён успешно.');

    }


    /**
     * Display the specified resource.
     *
     * @param Operation $operation
     * @return Response
     */

    public function show(Operation $operation)

    {

        return view('operations.show', compact('operation'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Operation $operation
     * @return Response
     */

    public function edit(Operation $operation)

    {
        $accounts = Account::pluck('title', 'id');
        $contragents = Contragent::pluck('title', 'id');

        return view('operations.edit', compact('operation', 'accounts', 'contragents'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Operation $operation
     * @return Response
     */

    public function update(Request $request, Operation $operation)

    {

        $request->validate([

            'title' => 'required',

            'notes' => 'required',

        ]);


        $operation->update($request->all());


        return redirect()->route('operations.index')
            ->with('success', 'Operation updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Operation $operation
     * @return Response
     */

    public function destroy(Operation $operation)

    {

        $operation->delete();


        return redirect()->route('operations.index')
            ->with('success', 'Operation deleted successfully');

    }

    private function filterHandle(OperationIndexRequest $request) {
        $filterDelimiter = 'Фильтр: ';
        if (!empty($request->input('account_id'))){
            $account = Account::find($request->input('account_id'));
            $this->filterTitle .= $filterDelimiter . $account->title;
            $filterDelimiter = ', ';
        }

        if (!empty($request->input('contragent_id'))){
            $contragent = Contragent::find($request->input('contragent_id'));
            $this->filterTitle .= $filterDelimiter . $contragent->title;
            $filterDelimiter = ', ';
        }


        foreach($request->toArray() as $fieldName => $value){

            if (strpos($fieldName, '_id') !== false) continue;
            if (strpos($fieldName, '_token') !== false) continue;
            if (in_array($fieldName, ['sum', 'page'])) continue;
            if (empty($value)) continue;

            $this->filterTitle .= $filterDelimiter . $value;
            $filterDelimiter = ', ';
        }

        if (!empty($this->filterTitle)) {
            $this->filterTitle .= '.';
        }

    }

    /**
     * Counts sum of all operations
     *
     * @param OperationIndexRequest $request
     */
    private function setSum(OperationIndexRequest $request): void
    {
        if (!$request->input('sum')) {
            return;
        }
        $balans = Operation::crossJoin('accounts', 'account_id', '=', 'accounts.id')->filter($request)->sum(DB::raw('`mult` * `value`'));
        $this->filterTitle .= "\n" . 'Баланс: ' . $balans . '.';
    }

    /**
     * @param OperationIndexRequest $request
     * @return string
     */
    private function getCsv(OperationIndexRequest $request): string
    {
        if (!$request->input('csv')) {
            return '';
        }
        $ret = "Дата\tПартнёр\tСчёт\tСумма\tЗаголовок\tПримечание";
        foreach(Operation::crossJoin('accounts', 'account_id', '=', 'accounts.id')
                    ->crossJoin('contragents', 'contragent_id', '=', 'contragents.id')
                    ->filter($request)
                    ->orderby('date' ,'DESC')
                    ->orderby('operations.id', 'DESC')
                    ->select(
                        'date',
                        'contragents.title as peer',
                        'accounts.title as account',
                        DB::raw('mult*value as value'),
                        'operations.title',
                        'operations.notes'
                    )
                    ->get()
                    ->toArray() as $row){
            $ret .= "\n";
            foreach($row as $cell){
                $ret .= $cell . "\t";
            }
        }

            return $ret;
    }
}
