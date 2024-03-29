<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Http\Requests\StoreprocessRequest;
use App\Http\Requests\UpdateprocessRequest;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('show_month')){
            $data = Process::where('date', 'like', '%'.$request->input('show_month').'%')->orderBy('date', 'desc');
        }else{
            $data = Process::orderBy('date', 'desc');
        }
        $data = $data->paginate(31);

        $date_all = Process::get('date');

        if ($request->has('show_month')) {
            $like_date = '%' . $request->input('show_month') . '%';
            $current_month = explode('-', $request->input('show_month'));
            if (count($current_month) > 1){
                $current_month = (int)$current_month[1] - 1;
            }
        }else{
            $like_date = '%' . date('Y') . '-' . date('m') . '%';
            $current_month = (date('n')-1);
        }

        $ears = Process::where('date', 'like', $like_date)->sum('earned');
        $coms = Process::where('date', 'like', $like_date)->sum('park_commission');
        $gas_from_account = Process::where('date', 'like', $like_date)->sum('gasoline_from_account');
        $gas_for_cash = Process::where('date', 'like', $like_date)->sum('gasoline_for_cash');
        $gas = $gas_for_cash + $gas_from_account;
        $spare_parts = Process::where('date', 'like', $like_date)->sum('spare_parts');
        $bonuses = Process::where('date', 'like', $like_date)->sum('bonus');
        $tea = Process::where('date', 'like', $like_date)->sum('tea');

        $d = Process::where('date', 'like', $like_date)->get();
        $days = 0;
        foreach ($d as $item) {
            if ((int)$item->earned > 0) {
                $days++;
            }
        }

        $ears2 = Process::sum('earned');
        $coms2 = Process::sum('park_commission');
        $gas_from_account2 = Process::sum('gasoline_from_account');
        $gas_for_cash2 = Process::sum('gasoline_for_cash');
        $gas2 = $gas_for_cash2 + $gas_from_account2;
        $spare_parts2 = Process::sum('spare_parts');
        $bonuses2 = Process::sum('bonus');
        $tea2 = Process::sum('tea');

        $d2 = Process::get('earned');
        $days2 = 0;
        foreach ($d2 as $item2) {
            if ((int)$item2->earned > 0) {
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
            'date_all',
            'data',
            'cash',
            'cash2',
            'salarys',
            'salarys2',
            'ears',
            'ears2',
            'bonuses',
            'bonuses2',
            'tea',
            'tea2',
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
            'current_month'
        ));
    }


    public function store(StoreprocessRequest $request)
    {
        $data = $request->validate([
            "date" => ['string'],
            "day_week" => ['string'],
            "earned" => ['nullable', 'string'],
            "bonus" => ['nullable', 'string'],
            "tea" => ['nullable', 'string'],
            "salary" => ['nullable', 'string'],
            "park_commission" => ['nullable', 'string'],
            "gasoline_from_account" => ['nullable', 'string'],
            "gasoline_for_cash" => ['nullable', 'string'],
            "spare_parts" => ['nullable', 'string'],
            "comments" => ['nullable', 'string'],
        ]);

        Process::create($data);

        return back();
    }


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
            "day_week" => ['string'],
            "earned" => ['nullable', 'string'],
            "bonus" => ['nullable', 'string'],
            "tea" => ['nullable', 'string'],
            "salary" => ['nullable', 'string'],
            "park_commission" => ['nullable', 'string'],
            "gasoline_from_account" => ['nullable', 'string'],
            "gasoline_for_cash" => ['nullable', 'string'],
            "spare_parts" => ['nullable', 'string'],
            "comments" => ['nullable', 'string'],
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
