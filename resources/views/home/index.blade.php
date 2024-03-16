@extends('layouts/index')

@section('content')
    <style>
        .table-header-fixed table {
            overflow-y: auto;
            height: 50vh; /* !!!  HEIGHT MUST BE IN [ vh ] !!! */
        }

        .table-header-fixed thead th {
            background-color: white;
            position: sticky;
            top: 0;
        }
    </style>
    <div class="table-header-fixed">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>№№</th>
                <th>Дата</th>
                <th>День недели</th>
                <th>Заработал</th>
                <th>Бонусы</th>
                <th>Чай</th>
                <th>Поступило<br>на карту</th>
                <th>Комиссия<br>парка</th>
                <th>Заправка со<br>счёта парка</th>
                <th>Заправка<br>за свои</th>
                <th>Запчасти</th>
                <th>Комментарий</th>
                <th></th>
            </tr>
            </thead>
            @php $page_data = $data->sortBy('date'); @endphp
            <tbody>
            @foreach($page_data as $datum)
                @php if ((float)$datum->earned > 0){
     $style = 'green';
 }else{
     $style = 'red';
 } @endphp
                <tr title="ID-{{ $datum->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $datum->date)->format('d-m-Y') }}</td>
                    <td>{{ $datum->day_week }}</td>
                    <td style="background-color: {{ $style }}; color: white">{{ number_format((float)$datum->earned, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->bonus, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->tea, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->salary, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->park_commission, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->gasoline_from_account, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->gasoline_for_cash, 2, ',', ' ') }}</td>
                    <td>{{ number_format((float)$datum->spare_parts, 2, ',', ' ') }}</td>
                    <td>{!! $datum->comments !!}</td>
                    <td style="width: 240px">
                        <a href="{{ route('front.home.destroy', ['id' => $datum->id]) }}"
                           class="btn btn-danger float-end"
                           onclick="return confirm('Удалить?')">Удалить</a>
                        <a href="{{ route('front.home.edit', ['id' => $datum->id]) }}" class="btn btn-info float-end">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        {!! $data->links() !!}
    </div>
    <hr>
    <figure>
        <blockquote class="blockquote">
            <p>Пагинация по месяцам</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Доступный временной промежуток <cite title="Source Title">от <b>
                    <?php $dt1 = \Carbon\Carbon::createFromFormat('Y-m-d', $date_all->min('date'));
                    echo $dt1->format('d.m.Y');
                    ?></b> по <b><?php
                                 $dt2 = \Carbon\Carbon::createFromFormat('Y-m-d', $date_all->max('date'));
                                 echo $dt2->format('d.m.Y'); ?></b>
            </cite>
        </figcaption>
    </figure>
    <form class="row" action="{{ route('front.home.index') }}">
        <div class="mt-3 col-2">
            <label for="datePagination" class="form-label">За какой месяц показать</label>
            <input
                type="month"
                min="{{ $dt1->format('Y-m') }}"
                max="{{ $dt2->format('Y-m') }}"
                value="{{ $dt2->format('Y-m') }}"
                name="show_month"
                class="form-control"
                id="datePagination">
        </div>
        <div class="col-2 mt-5">
            <button type="submit" class="btn btn-success mb-3">Показать</button>
        </div>
        <div class="col-2 mt-5" style="margin-left: -190px">
            <a href="{{ route('front.home.index') }}" class="btn btn-dark mb-3 text-white">Сбросить</a>
        </div>
    </form>

    <hr>
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
                <label for="select_week" class="form-label">День недели</label>
                <select name="day_week" class="form-select" aria-label="select_week">
                    <option value="Пн">Пн</option>
                    <option value="Вт">Вт</option>
                    <option value="Ср">Ср</option>
                    <option value="Чт">Чт</option>
                    <option value="Пт">Пт</option>
                    <option value="Сб">Сб</option>
                    <option value="Вс">Вс</option>
                </select>
            </div>

            <div class="col-md-1">
                <label for="inputPassword2" class="form-label">Заработал</label>
                <input name="earned" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword2" value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword2" class="form-label">Бонус</label>
                <input name="bonus" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword2" value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword2" class="form-label">Чай</label>
                <input name="tea" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword2" value="">
            </div>

            <div class="col-md-1 text-center" style="margin-top: -7px">
                <label for="inputPassword3" class="form-label">Поступило на карту</label>
                <input name="salary" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword3" value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword4" class="form-label">Комиссия парка</label>
                <input name="park_commission" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword4"
                       value="40">
            </div>

            <div class="col-md-1 text-center" style="margin-top: -7px">
                <label for="inputPassword5" class="form-label">Заправка со счёта парка</label>
                <input name="gasoline_from_account" type="number" step="0.01" class="form-control"
                       list="datalistOptions" id="inputPassword5"
                       value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword6" class="form-label">Заправка за свои</label>
                <input name="gasoline_for_cash" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword6"
                       value="">
            </div>

            <div class="col-md-1">
                <label for="inputPassword7" class="form-label">Запчасти</label>
                <input name="spare_parts" type="number" step="0.01" class="form-control" list="datalistOptions"
                       id="inputPassword7">
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

    <hr>

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
                <caption><b>Данные за {{ $arr[$current_month] }} месяц</b></caption>
                <tr>
                    <th>Заработано</th>
                    <th>Бонусы</th>
                    <th>Чай</th>
                    <th>Топливо с аккаунта</th>
                    <th>Топливо за свои</th>
                    <th>Топливо всего</th>
                    <th>Комиссия</th>
                    <th>Запчасти</th>
                    <th>Поступило на карту</th>
                    <th>Средний в день</th>
                    <th>Дней отр.</th>
                    <th>Итого чистыми<br>до уплаты налогов</th>
                </tr>
                <tr>
                    @php $e = $ears - $gas - $coms - $spare_parts + $bonuses + $tea; @endphp
                    <td>{{ number_format($ears, 2, ',', ' ') }}</td>
                    <td>{{ number_format($bonuses, 2, ',', ' ') }}</td>
                    <td>{{ number_format($tea, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_from_account, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_for_cash, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas, 2, ',', ' ') }}</td>
                    <td>{{ number_format($coms, 2, ',', ' ') }}</td>
                    <td>{{ number_format($spare_parts, 2, ',', ' ') }}</td>
                    <td>{{ number_format($salarys, 2, ',', ' ') }}</td>
                    <td>@if($days != 0)
                            {{ number_format($e / $days, 2, ',', ' ') }}
                        @else
                            0
                        @endif</td>
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
                    <th>Бонусы</th>
                    <th>Чай</th>
                    <th>Топливо с аккаунта</th>
                    <th>Топливо за свои</th>
                    <th>Топливо всего</th>
                    <th>Комиссия</th>
                    <th>Запчасти</th>
                    <th>Поступило на карту</th>
                    <th>Средний в день</th>
                    <th>Дней отр.</th>
                    <th>Итого чистыми<br>до уплаты налогов</th>
                </tr>
                <tr>
                    @php $e2 = $ears2 - $gas2 - $coms2 - $spare_parts2 + $bonuses2 + $tea2; @endphp
                    <td>{{ number_format($ears2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($bonuses2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($tea2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_from_account2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas_for_cash2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($gas2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($coms2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($spare_parts2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($salarys2, 2, ',', ' ') }}</td>
                    <td>{{ number_format($e2 / $days2, 2, ',', ' ') }}</td>
                    <td>{{ $days2 }}</td>
                    <td>{{ number_format($e2, 2, ',', ' ') }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

