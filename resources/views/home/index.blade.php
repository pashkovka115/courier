@extends('layouts/index')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>№№</th>
            <th>Дата</th>
            <th>Заработал</th>
            <th>Поступило<br>на карту</th>
            <th>Комиссия<br>парка</th>
            <th>Заправка со<br>счёта парка</th>
            <th>Заправка<br>за свои</th>
            <th>Запчасти</th>
            <th>Комментарий</th>
            <th></th>
        </tr>
        @foreach($data as $datum)
            @php if ((float)$datum->earned > 0){
     $style = 'green';
 }else{
     $style = 'red';
 } @endphp
            <tr title="ID-{{ $datum->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $datum->date)->format('d-m-Y') }}</td>
                <td style="background-color: {{ $style }}; color: white">{{ number_format((float)$datum->earned, 2, ',', ' ') }}</td>
                <td>{{ number_format((float)$datum->salary, 2, ',', ' ') }}</td>
                <td>{{ number_format((float)$datum->park_commission, 2, ',', ' ') }}</td>
                <td>{{ number_format((float)$datum->gasoline_from_account, 2, ',', ' ') }}</td>
                <td>{{ number_format((float)$datum->gasoline_for_cash, 2, ',', ' ') }}</td>
                <td>{{ number_format((float)$datum->spare_parts, 2, ',', ' ') }}</td>
                <td>{!! $datum->comments !!}</td>
                <td>
                    <a href="{{ route('front.home.destroy', ['id' => $datum->id]) }}" class="btn btn-danger float-end"
                       onclick="return confirm('Удалить?')">Удалить</a>
                    <a href="{{ route('front.home.edit', ['id' => $datum->id]) }}" class="btn btn-info float-end">Редактировать</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex">
        {!! $data->links() !!}
    </div>

    <p></p>

    <h5>Добавить строку</h5>
    <form action="{{ route('front.home.store') }}" method="post">
        @csrf
        <div class="row g-3 align-items-center">

            <div class="col-md-1">
                <label for="inputPassword1" class="form-label">Дата</label>
                <input name="date" type="date" class="form-control" list="datalistOptions" id="inputPassword1" required>
            </div>

            <div class="col-md-1">
                <label for="inputPassword2" class="form-label">Заработал</label>
                <input name="earned" class="form-control" list="datalistOptions" id="inputPassword2" value="">
            </div>

            <div class="col-md-2">
                <label for="inputPassword3" class="form-label">Поступило на карту</label>
                <input name="salary" class="form-control" list="datalistOptions" id="inputPassword3" value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword4" class="form-label">Комиссия парка</label>
                <input name="park_commission" class="form-control" list="datalistOptions" id="inputPassword4"
                       value="40">
            </div>

            <div class="col-md-2">
                <label for="inputPassword5" class="form-label">Заправка со счёта парка</label>
                <input name="gasoline_from_account" class="form-control" list="datalistOptions" id="inputPassword5"
                       value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword6" class="form-label">Заправка за свои</label>
                <input name="gasoline_for_cash" class="form-control" list="datalistOptions" id="inputPassword6"
                       value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword7" class="form-label">Запчасти</label>
                <input name="spare_parts" class="form-control" list="datalistOptions" id="inputPassword7">
            </div>

            <div class="col-md-2">
                <label for="inputPassword8" class="form-label">Комментарий</label>
                <textarea name="comments" class="form-control" list="datalistOptions" id="inputPassword8"></textarea>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>

    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-striped">
                @php
                    $arr = [
                     'январь',
                     'февраль',
                     'март',
                     'апрель',
                     'май',
                     'июнь',
                     'июль',
                     'август',
                     'сентябрь',
                     'октябрь',
                     'ноябрь',
                     'декабрь'
                   ];
                @endphp
                <caption><b>Данные за {{ $arr[date('n')-1] }} месяц</b></caption>
                <tr>
                    <th>Заработано</th>
                    <th>Топливо с аккаунта</th>
                    <th>Топливо за свои</th>
                    <th>Топливо всего</th>
                    <th>Комиссия</th>
                    <th>Запчасти</th>
                    <th>Поступило на карту</th>
                    <th>Средний в день</th>
                    <th>Дней отр.</th>
                    <th>Итого чистыми</th>
                </tr>
                <tr>
                    @php $e = $ears - $gas - $coms - $spare_parts; @endphp
                    <td>{{ number_format($ears, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_from_account, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_for_cash, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas, 2, ',', ' ') }}</td>
                    <td>{{ number_format($coms, 2, ',', ' ') }}</td>
                    <td>{{ number_format($spare_parts, 2, ',', ' ') }}</td>
                    <td>{{ number_format($salarys, 2, ',', ' ') }}</td>
                    <td>{{ number_format($e / $days, 2, ',', ' ') }}</td>
                    <td>{{ $days }}</td>
                    <td>{{ number_format($e, 2, ',', ' ') }}</td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <caption><b>Данные за всё время работы</b></caption>
                <tr>
                    <th>Заработано</th>
                    <th>Топливо с аккаунта</th>
                    <th>Топливо за свои</th>
                    <th>Топливо всего</th>
                    <th>Комиссия</th>
                    <th>Запчасти</th>
                    <th>Поступило на карту</th>
                    <th>Средний в день</th>
                    <th>Дней отр.</th>
                    <th>Итого чистыми</th>
                </tr>
                <tr>
                    @php $e2 = $ears2 - $gas2 - $coms2 - $spare_parts2; @endphp
                    <td>{{ number_format($ears2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_from_account2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_for_cash2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($coms2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($spare_parts2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($salarys2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($e2 / $days2, 2, ',', ' ') }}</td>
                    <td>{{ $days2 }}</td>
                    <td>{{ number_format($ears2 - $gas2 - $coms2 - $spare_parts2, 2, ',', ' ') }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

