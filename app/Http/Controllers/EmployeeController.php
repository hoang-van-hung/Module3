<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeSer;

    public function __construct(EmployeeService  $employeeService)
    {
        $this->employeeSer = $employeeService;
    }

    public function index()
    {
        $employees = $this->employeeSer->getAll();
        return view('admin.employees.list',compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $this->employeeSer->store($request);
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee= $this->employeeSer->getById($id);
        return view('admin.employees.edit',compact('employee'));
    }

    function update($id,Request $request)
    {
        $this->employeeSer->update($id,$request);
        return redirect()->route('employee.index');

    }

    function delete($id)
    {
         $this->employeeSer->delete($id);
         return redirect()->route('employee.index');

    }
}
