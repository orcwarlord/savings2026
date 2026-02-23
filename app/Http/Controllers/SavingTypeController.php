<?php

namespace App\Http\Controllers;

use App\Models\SavingType;
use Illuminate\Http\Request;

class SavingTypeController extends Controller
{
    public function index()
    {
        $types = SavingType::orderBy('name')->paginate(20);
        return view('saving_types.index', compact('types'));
    }

    public function create()
    {
        return view('saving_types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:saving_types,name',
            'description' => 'nullable|string',
        ]);

        SavingType::create($data);

        return redirect()->route('saving-types.index')->with('success', 'Saving type created.');
    }

    public function show(SavingType $savingType)
    {
        return view('saving_types.show', ['type' => $savingType]);
    }

    public function edit(SavingType $savingType)
    {
        return view('saving_types.edit', ['type' => $savingType]);
    }

    public function update(Request $request, SavingType $savingType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:saving_types,name,' . $savingType->id,
            'description' => 'nullable|string',
        ]);

        $savingType->update($data);

        return redirect()->route('saving-types.index')->with('success', 'Saving type updated.');
    }

    public function destroy(SavingType $savingType)
    {
        $savingType->delete();
        return redirect()->route('saving-types.index')->with('success', 'Saving type deleted.');
    }
}
