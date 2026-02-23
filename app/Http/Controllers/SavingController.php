<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\Bank;
use App\Models\SavingType;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
        $savings = Saving::with(['bank', 'savingType', 'user'])->orderBy('start_date','desc')->paginate(20);
        return view('savings.index', compact('savings'));
    }

    public function create()
    {
        $banks = Bank::orderBy('name')->get();
        $types = SavingType::orderBy('name')->get();
        return view('savings.create', compact('banks','types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'nullable|exists:banks,id',
            'saving_type_id' => 'nullable|exists:saving_types,id',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'ongoing' => 'sometimes|boolean',
            'interest_rate' => 'nullable|numeric|min:0',
        ]);

        $data['ongoing'] = $request->has('ongoing');

        Saving::create($data);

        return redirect()->route('savings.index')->with('success', 'Saving created.');
    }

    public function show(Saving $saving)
    {
        $saving->load(['bank','savingType','user']);
        return view('savings.show', compact('saving'));
    }

    public function edit(Saving $saving)
    {
        $banks = Bank::orderBy('name')->get();
        $types = SavingType::orderBy('name')->get();
        return view('savings.edit', compact('saving','banks','types'));
    }

    public function update(Request $request, Saving $saving)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'nullable|exists:banks,id',
            'saving_type_id' => 'nullable|exists:saving_types,id',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'ongoing' => 'sometimes|boolean',
            'interest_rate' => 'nullable|numeric|min:0',
        ]);

        $data['ongoing'] = $request->has('ongoing');

        $saving->update($data);

        return redirect()->route('savings.index')->with('success', 'Saving updated.');
    }

    public function destroy(Saving $saving)
    {
        $saving->delete();
        return redirect()->route('savings.index')->with('success', 'Saving deleted.');
    }
}
