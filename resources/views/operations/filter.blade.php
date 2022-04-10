<form action="{{ route('operations.index') }}" method="GET">

    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-4">

            <div class="form-group">

                <strong>Заголовок:</strong>

                <input type="text" name="title" value="{{ $filterParams['title'] ?? ''}}" class="form-control" placeholder="Заголовок">

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Счёт:</strong>
                <select name="account_id" class="form-control custom-select" onclick="fillSelectWithOptions(this)">
                    @if (($filterParams['account_id'] ?? 0) > 0)
                        <option value="{{ $filterParams['account_id'] ?? 0 }}" selected>
                            Счет выбран
                        </option>
                        @else
                        <option value="0">Выберите счёт</option>
                    @endif
                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Заказчик чи поставщик:</strong>
                <select name="contragent_id" class="form-control custom-select" onclick="fillSelectWithOptions(this)">
                    @if (($filterParams['contragent_id'] ?? 0) > 0)
                        <option value="{{ $filterParams['contragent_id'] ?? 0}}" selected>
                            Партнёр выбран
                        </option>
                        @else
                        <option value="0" selected>Выберите партнёра</option>
                    @endif
                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Примечание:</strong>

                <input type="text" class="form-control" name="notes"
                          placeholder="notes" value="{{ $filterParams['notes'] ?? '' }}" />

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Сумма от:</strong>

                <input type="number" name="valueFrom" class="form-control" placeholder="Вартість"
                       step=".01" value="{{ $filterParams['valueFrom'] ?? '' }}" />

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Сумма до:</strong>

                <input type="number" name="valueTo" class="form-control" placeholder="Сумма"
                       step=".01" value="{{ $filterParams['valueTo'] ?? '' }}" />

            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Дата платежа от:</strong>

                <input type="date" name="dateFrom" class="form-control" placeholder="Дата от"
                       value="{{ $filterParams['dateFrom'] ?? '' }}"
                       pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                />
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">

                <strong>Дата платежа до:</strong>

                <input type="date" name="dateTo" class="form-control" placeholder="Дата до"
                       value="{{ $filterParams['dateTo'] ?? '' }}" />
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="form-group">
                <label>
                    <strong>Подсчитать баланс всех платежей</strong>

                    <input type="checkbox" name="sum" placeholder="Сумма всех операций"
                       value="1" {{ ($filterParams['sum'] ?? false) ? 'checked' : ''}} />
                </label>
            </div>

            <div class="form-group">
                <label>
                    <strong>Загрузить как файл</strong>

                    <input type="checkbox" name="csv" placeholder="CSV"
                       value="1" />
                </label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">

            <button type="submit" class="btn btn-primary">Фильтровать</button>

        </div>

    </div>

</form>
<script>
    function fillSelectWithOptions(parent)
    {
        if (parent.options.length > 1){return;}
        parent.options = false;
        let request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if(request.readyState === 4) {
                if(request.status === 200) {
                    parent.innerHTML = request.responseText;
                } else {
                    parent.innerHTML = '<option>' +  request.status + ' ' + request.statusText + '</option>';
                }
            }
        }

        request.open('Get', parent.name.replace('_id', 's_options'));

        request.send();
    }
</script>
