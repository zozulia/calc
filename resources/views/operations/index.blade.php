@extends('operations.layout')



@section('content')

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    @if ($filterTitle != '')

        <div class="alert alert-success">

            <p>{{ $filterTitle }}</p>

        </div>

    @endif

    @include('operations.filter')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Платежи</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('operations.create') }}">Внести новый платёж</a>

            </div>

        </div>

    </div>

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Имя</th>

            <th>Сумма</th>

            <th>Примечания</th>

            <th width="280px">Действия</th>

        </tr>

        @foreach ($operations as $operation)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $operation->title }}</td>

                <td>{{ $operation->value }}</td>

                <td>{{ $operation->notes }}</td>

                <td>

                    <form action="{{ route('operations.destroy',$operation->id) }}" method="POST">


                        <a class="btn btn-info" href="{{ route('operations.show',$operation->id) }}">Показать</a>


                        <a class="btn btn-primary" href="{{ route('operations.edit',$operation->id) }}">Редактировать</a>


                        @csrf

                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Удалить</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

    {!! $operations->links() !!}

@endsection
