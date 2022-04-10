@extends('accounts.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Счета</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('accounts.create') }}">Внести новый счёт</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Название</th>

            <th>Примечания</th>

            <th width="280px">Действия</th>

        </tr>

        @foreach ($accounts as $account)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $account->title }}</td>

                <td>{{ $account->notes }}</td>

                <td>

                    <form action="{{ route('accounts.destroy',$account->id) }}" method="POST">


                        <a class="btn btn-info" href="{{ route('accounts.show',$account->id) }}">Показать</a>


                        <a class="btn btn-primary" href="{{ route('accounts.edit',$account->id) }}">Редактировать</a>


                        @csrf

                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Удалить</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>



    {!! $accounts->links() !!}



@endsection
