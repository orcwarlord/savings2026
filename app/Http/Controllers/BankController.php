<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('id')->paginate(20);
        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:1000',
        ]);

        Bank::create($data);

        return redirect()->route('banks.index')->with('success', 'Bank created.');
    }

    public function show(Bank $bank)
    {
        return view('banks.show', compact('bank'));
    }

    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:1000',
        ]);

        $bank->update($data);

        return redirect()->route('banks.index')->with('success', 'Bank updated.');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index')->with('success', 'Bank deleted.');
    }
}
