@extends('accounts.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Счёт</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('accounts.index') }}">Назад</a>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Название:</strong>

                {{ $account->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Примечание:</strong>

                {{ $account->notes }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                @if ($account->mult > 0)
                    <strong>Доход</strong>
                    @else
                    <strong>Расход</strong>
                @endif


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Изменено</strong>
                {{ $account->updated_at }}

            </div>

        </div>
    </div>

@endsection
