@extends('operations.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Платёж</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('operations.index') }}"> Назад</a>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Заголовок:</strong>

                {{ $operation->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Стоимость:</strong>

                {{ $operation->value }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Примечание:</strong>

                {{ $operation->notes }}

            </div>

        </div>

    </div>

@endsection
