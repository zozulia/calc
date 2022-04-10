@extends('operations.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Operation</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('operations.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('operations.update',$operation->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Заголовок:</strong>

                    <input type="text" name="title" value="{{ $operation->title }}" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Счёт:</strong>
                    <select name="account_id" class="form-control custom-select">
                        <option value="">Виберите счёт</option>
                        @foreach($accounts as $accountId => $accountTitle)
                            <option value="{{ $accountId }}" @if ($operation->account_id == $accountId) selected @endif>
                                {{ $accountTitle }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Заказчик или поставщик:</strong>
                    <select name="contragent_id" class="form-control custom-select">
                        <option value="">Виберите контрагента</option>
                        @foreach($contragents as $contragentId => $contragentTitle)
                            <option value="{{ $contragentId }}" @if ($operation->contragent_id == $contragentId) selected @endif>
                                {{ $contragentTitle }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Примечание:</strong>

                    <textarea class="form-control" style="height:150px" name="notes"
                              placeholder="notes">{{ $operation->notes }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Розмір платежу:</strong>

                    <input type="number" name="value" class="form-control" placeholder="Вартість"
                           step=".01" value="{{ $operation->value }}" />

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Дата платежа:</strong>

                    <input type="date" name="date" class="form-control" placeholder="Дата"
                           value="{{ $operation->date }}" />

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>

        </div>


    </form>

@endsection
