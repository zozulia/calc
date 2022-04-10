@extends('operations.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Добавить платёж</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('operations.index') }}">Назад</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Ой!</strong> Что-то введено не так.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('operations.store') }}" method="POST">

        @csrf


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Заголовок:</strong>

                    <input type="text" name="title" class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Примечания:</strong>

                    <textarea class="form-control" style="height:150px" name="notes" placeholder="Notes"></textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <strong>Счет:</strong>
                    <select name="account_id" class="form-control custom-select">
                        <option value="">Виберіть рахунок</option>
                        @foreach($accounts as $accountId => $accountTitle)
                            <option value="{{ $accountId }}">{{ $accountTitle }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Заказчик или поставщик:</strong>
                    <select name="contragent_id" class="form-control custom-select">
                        <option value="">Виберите партнёра</option>
                        @foreach($contragents as $contragentId => $contragentTitle)
                            <option value="{{ $contragentId }}">
                                {{ $contragentTitle }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Размер платежа:</strong>

                    <input type="number" name="value" class="form-control" placeholder="Вартість"
                           step=".01" />

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Дата платежа:</strong>

                    <input type="date" name="date" class="form-control" placeholder="Дата" />

                </div>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Сохранить</button>

        </div>

        </div>

    </form>

@endsection
