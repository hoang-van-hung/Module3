<?php
namespace App\Http\Repositories;


use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeRepository extends Repository
{
    function getAll()
    {
        return Employee::orderby('id','DESC')->paginate(4);
    }

    function getById($id)
    {
        return Employee::findOrFail($id);
    }

    function store($employee)
    {
        $employee->save();
    }

    function delete($employee)
    {
        $employee->delete();
    }
}
