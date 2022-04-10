@extends('contragents.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Заказчик или поставщик</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('contragents.index') }}">Назад</a>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Название/имя:</strong>

                {{ $contragent->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Примечания:</strong>

                {{ $contragent->notes }}

            </div>

        </div>

    </div>

@endsection
