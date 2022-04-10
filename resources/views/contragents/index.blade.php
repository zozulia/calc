@extends('contragents.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Заказчики и поставщики</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('contragents.create') }}">Внести нового заказчика/поставщика</a>

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

            <th>Название или имя</th>

            <th>Примечание</th>

            <th width="280px">Действия</th>

        </tr>

        @foreach ($contragents as $contragent)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $contragent->title }}</td>

                <td>{{ $contragent->notes }}</td>

                <td>

                    <form action="{{ route('contragents.destroy',$contragent->id) }}" method="POST">


                        <a class="btn btn-info" href="{{ route('contragents.show',$contragent->id) }}">Показать</a>


                        <a class="btn btn-primary" href="{{ route('contragents.edit',$contragent->id) }}">Редактировать</a>


                        @csrf

                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Удалить</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>



    {!! $contragents->links() !!}



@endsection
