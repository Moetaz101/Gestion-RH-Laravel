<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        // Recherche
        if ($request->filled('search')) {
            $query->where('nom', 'like', "%{$request->search}%")
                  ->orWhere('prenom', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
        }

        // Tri
        if ($request->filled('sort')) {
            $query->orderBy($request->sort, $request->direction ?? 'asc');
        }

        $employees = $query->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:employees',
            'poste' => 'required',
            'date_embauche' => 'required|date',
            'salaire' => 'required|numeric',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'poste' => 'required',
            'date_embauche' => 'required|date',
            'salaire' => 'required|numeric',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
}
