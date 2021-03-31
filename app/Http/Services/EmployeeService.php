<?php
namespace App\Http\Services;


use App\Http\Repositories\EmployeeRepository;
use App\Models\Employee;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use MongoDB\Driver\Session;

class EmployeeService extends BaseService
{
    protected $employeeRepo;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepo = $employeeRepository;
    }

    public function getAll()
    {
        return $this->employeeRepo->getAll();
    }

    function getById($id)
    {
        return $this->employeeRepo->getById($id);
    }

    function store($request)
    {
        $employee = new Employee();
        $employee->fill($request->all());
        $path = $this->updateLoadFile($request, 'image', 'Employee');
        $employee->image = $path;
        $this->employeeRepo->store($employee);

    }
    function update($id, $request)
    {
        $employee = $this->employeeRepo->getById($id);
        $employee->fill($request->all());
        $path = $this->updateLoadFile($request, 'image', 'Employee');
        $employee->image = $path;
        $this->employeeRepo->store($employee);
    }

    function delete($id)
    {
        $employee = $this->employeeRepo->getById($id);
        $this->employeeRepo->delete($employee);
    }
}
