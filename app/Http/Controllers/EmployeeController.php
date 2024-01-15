<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $title = 'Employees';
        $employees = Employee::with(['company'])->paginate(10);
        return view('app.employees.index', compact( 'title', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $title = $formName = sprintf('Create new employee');
        $companies = Company::all();
        return view('app.employees.edit', compact(['title', 'formName', 'companies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(EmployeeRequest $request)
    {
        $input = $request->except('_token', '_method');
        $employee = Employee::create($input);
        $request->session()->flash('success', sprintf('Employee id: %d created successfully', $employee->id));
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Employee $employee)
    {
        $title = sprintf('Show employee name: %s', $employee->name);
        return view('app.employees.show', compact(['title', 'employee']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Employee $employee)
    {
        $title = $formName = sprintf('Edit employee name: %s', $employee->name);
        $companies = Company::all();
        return view('app.employees.edit', compact(['title', 'employee', 'companies', 'formName']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EmployeeRequest  $request
     * @param  Employee  $employee
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $input = $request->except('_token', '_method');

        $employee->fill($input)->save();
        $request->session()->flash('success', sprintf('Employee with id: %d updated successfully', $employee->id));
        return redirect()->route('employees.show', ['employee' => $employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employee  $employee
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Employee $employee, Request $request)
    {
        $employee->delete();
        $request->session()->flash('success', sprintf('Company id:%d successfully deleted', $employee->id));
        return redirect()->route('employees.index');
    }
}
