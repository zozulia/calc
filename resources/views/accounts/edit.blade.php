@extends('accounts.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Редактирование счёта</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('accounts.index') }}"> Назад</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Увы!</strong> Есть проблемы со вводом.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('accounts.update',$account->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Заголовок:</strong>

                    <input type="text" name="title" value="{{ $account->title }}" class="form-control" placeholder="Title">

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Расход:</strong>

                    <input type="radio" name="mult" value="-1" placeholder="mult"
                           @if ($account->mult == -1)
                           checked
                        @endif
                    >

                    <strong>Доход:</strong>

                    <input type="radio" name="mult" value="1" placeholder="mult"
                           @if ($account->mult == 1)
                           checked
                        @endif
                    >

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Примечания:</strong>

                    <textarea class="form-control" style="height:150px" name="notes"
                              placeholder="notes">{{ $account->notes }}</textarea>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>

        </div>


    </form>

@endsection
