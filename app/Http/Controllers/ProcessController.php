<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Http\Requests\StoreprocessRequest;
use App\Http\Requests\UpdateprocessRequest;

class ProcessController extends Controller
{
    public function index()
    {
        $data = Process::orderBy('date', 'desc')->paginate(30);

        $like_date = '%' . date('Y') . '-' . date('m') . '%';

        $ears = Process::where('date', 'like', $like_date)->sum('earned');
        $coms = Process::where('date', 'like', $like_date)->sum('park_commission');
        $gas_from_account = Process::where('date', 'like', $like_date)->sum('gasoline_from_account');
        $gas_for_cash = Process::where('date', 'like', $like_date)->sum('gasoline_for_cash');
        $gas = $gas_for_cash + $gas_from_account;
        $spare_parts = Process::where('date', 'like', $like_date)->sum('spare_parts');

        $d = Process::where('date', 'like', $like_date)->get();
        $days = 0;
        foreach ($d as $item){
            if ((int)$item->earned > 0){
                $days++;
            }
        }

        $ears2 = Process::sum('earned');
        $coms2 = Process::sum('park_commission');
        $gas_from_account2 = Process::sum('gasoline_from_account');
        $gas_for_cash2 = Process::sum('gasoline_for_cash');
        $gas2 = $gas_for_cash2 + $gas_from_account2;
        $spare_parts2 = Process::sum('spare_parts');

        $d2 = Process::get('earned');
        $days2 = 0;
        foreach ($d2 as $item2){
            if ((int)$item2->earned > 0){
                $days2++;
            }
        }

        // Заработано за последний месяц
        // с вычетом комиссии и топлива
        $cash = ($ears - $coms - $gas_from_account - $gas_for_cash);

        // Заработано за всё время
        // с вычетом комиссии и топлива
        $cash2 = ($ears2 - $coms2 - $gas_from_account2 - $gas_for_cash2);

        // Поступило на карту за последний месяц
        $salarys = Process::where('date', 'like', $like_date)->sum('salary');
        // Поступило на карту за всё время
        $salarys2 = Process::sum('salary');

        return view('home.index', compact(
            'data',
            'cash',
            'cash2',
            'salarys',
            'salarys2',
            'ears',
            'ears2',
            'gas_from_account',
            'gas_from_account2',
            'gas_for_cash',
            'gas_for_cash2',
            'gas',
            'gas2',
            'coms',
            'coms2',
            'spare_parts',
            'spare_parts2',
            'days',
            'days2',
        ));
    }


    /*public function create()
    {
        //
    }*/


    public function store(StoreprocessRequest $request)
    {
        $data = $request->validate([
            "date" => ['string'],
            "earned" => ['nullable', 'string'],
            "salary" => ['nullable', 'string'],
            "park_commission" => ['nullable', 'string'],
            "gasoline_from_account" => ['nullable', 'string'],
            "gasoline_for_cash" => ['nullable', 'string'],
            "spare_parts" => ['nullable', 'string'],
        ]);

        Process::create($data);

        return back();
    }


    /*public function show(Process $process)
    {
        //
    }*/


    public function edit($id)
    {
        $data = Process::where('id', $id)->firstOrFail();

        return view('home.edit', compact('data'));
    }


    public function update(UpdateprocessRequest $request)
    {
        $data = $request->validate([
            'id' => ['string'],
            "date" => ['string'],
            "earned" => ['nullable', 'string'],
            "salary" => ['nullable', 'string'],
            "park_commission" => ['nullable', 'string'],
            "gasoline_from_account" => ['nullable', 'string'],
            "gasoline_for_cash" => ['nullable', 'string'],
            "spare_parts" => ['nullable', 'string'],
        ]);

        Process::where('id', $data['id'])->update($data);

        return redirect()->route('front.home.index');
    }


    public function destroy($id)
    {
        Process::where('id', $id)->delete();

        return redirect()->route('front.home.index');
    }
}
