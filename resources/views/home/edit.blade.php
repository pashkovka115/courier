@extends('layouts/index')

@section('content')

    <h5>Добавить строку</h5>
    <form action="{{ route('front.home.update', ['id' => $data->id]) }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row g-3 align-items-center">

            <div class="col-md-1">
                <label for="inputPassword1" class="form-label">Дата</label>
                <input name="date" type="date" class="form-control" list="datalistOptions" id="inputPassword1" required value="{{ $data->date }}">
            </div>

            <div class="col-md-1">
                <label for="inputPassword2" class="form-label">Заработал</label>
                <input name="earned" class="form-control" list="datalistOptions" id="inputPassword2" value="{{ $data->earned }}">
            </div>

            <div class="col-md-2">
                <label for="inputPassword3" class="form-label">Поступило на карту</label>
                <input name="salary" class="form-control" list="datalistOptions" id="inputPassword3" value="{{ $data->salary }}">
            </div>

            <div class="col-md-1">
                <label for="inputPassword4" class="form-label">Комиссия парка</label>
                <input name="park_commission" class="form-control" list="datalistOptions" id="inputPassword4"
                       value="{{ $data->park_commission }}">
            </div>

            <div class="col-md-2">
                <label for="inputPassword5" class="form-label">Заправка со счёта парка</label>
                <input name="gasoline_from_account" class="form-control" list="datalistOptions" id="inputPassword5"
                       value="{{ $data->gasoline_from_account }}">
            </div>

            <div class="col-md-1">
                <label for="inputPassword6" class="form-label">Заправка за свои</label>
                <input name="gasoline_for_cash" class="form-control" list="datalistOptions" id="inputPassword6"
                       value="{{ $data->gasoline_for_cash }}">
            </div>

            <div class="col-md-1">
                <label for="inputPassword7" class="form-label">Запчасти</label>
                <input name="spare_parts" class="form-control" list="datalistOptions" id="inputPassword7"
                       value="{{ $data->spare_parts }}">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

