@extends('contragents.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Редактирование заказчика или поставщика</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('contragents.index') }}">Назад</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Ой!</strong> Что-то было введено не так.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('contragents.update',$contragent->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Название/имя:</strong>

                    <input type="text" name="title" value="{{ $contragent->title }}" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Примечания:</strong>

                    <textarea class="form-control" style="height:150px" name="notes"
                              placeholder="notes">{{ $contragent->notes }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>

        </div>


    </form>

@endsection
