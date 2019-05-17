<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CRUDDemoServicesDepartment;
use App\Http\Services\CRUDDemoServicesEmployee;

class CRUDDemoController extends Controller
{
    // Sample of CRUD operations.

    /**
     * @var Request|null
     */
    protected $request = null;

    /**
     * @var CRUDDemoServicesDepartment|null
     */
    protected $department = null;

    /**
     * @var CRUDDemoServicesEmployee|null
     */
    protected $employee = null;

    /**
     * CRUDDemoController constructor.
     * @param Request $request
     * @param CRUDDemoServicesDepartment $department
     * @param CRUDDemoServicesEmployee $employee
     */
    public function __construct(Request $request, CRUDDemoServicesDepartment $department, CRUDDemoServicesEmployee $employee)
    {
        $this->request = $request;
        $this->department = $department;
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Home page.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display a listing of the departments.
     *
     * @return Department view page.
     */
    public function view_departments()
    {
        $departments = $this->department->getDepartment();

        return view('showDepartments', compact('departments'));
    }

    /**
     * Add department detail.
     *
     * @return Department add page.
     */
    public function add_department()
    {
        return view('addDepartment');
    }

    /**
     * Save department detail.
     * @return Department view page.
     */
    public function save_department()
    {
        // Validating name field
        $this->validate($this->request, [
            'name' => 'required',
        ]);

        $this->department->addDepartment();

        return redirect('/crud/departments');
    }

    /**
     * Edit department detail.
     * @param $department_id - Identification of department
     * @return Department edit page.
     */
    public function edit_department($department_id)
    {
        $department = $this->department->getDepartment($department_id);

        return view('editDepartment', compact('department', 'department_id'));
    }

    /**
     * Update department detail.
     * @param $department_id - Identification of department
     * @return Department view page.
     */
    public function update_department($department_id)
    {
        $this->validate($this->request, [
            'name' => 'required',
        ]);

        $this->department->updateDepartment($department_id);

        return redirect('/crud/departments');
    }

    /**
     * Delete department detail.
     * @param $department_id - Identification of department
     * @return Department view page.
     */
    public function delete_department($department_id)
    {
        $this->department->deleteDepartment($department_id);

        return redirect('/crud/departments');
    }

    /**
     * Display a listing of the employee.
     *
     * @return Employee view page.
     */
    public function view_employees()
    {
        $employees = $this->employee->getEmployee();

        return view('showEmployees', compact('employees'));
    }

    /**
     * Add department detail.
     *
     * @return Employee add page.
     */
    public function add_employee()
    {
        $departments = $this->department->getDepartment();

        return view('addEmployee', compact('departments'));
    }

    /**
     * Save department detail.
     * @return Employee view page.
     */
    public function save_employee()
    {
        // Validating employee fields
        $this->validate($this->request, [
            'department_id' => 'required',
            'name' => 'required',
            'date_of_joining' => 'required|date|date_format:Y-m-d',
            'gender' => 'required',
            'address' => 'required',
            'salary' => 'required|numeric'
        ]);

        $this->employee->addEmployee();

        return redirect('/crud/employees');
    }

    /**
     * Edit employee detail.
     * @param $employee_id - Identification of employee.
     * @return Employee edit page.
     */
    public function edit_employee($employee_id)
    {
        $employee = $this->employee->getEmployee($employee_id);
        $departments = $this->department->getDepartment();

        return view('editEmployee', compact('employee', 'employee_id', 'departments'));
    }

    /**
     * Update employee detail.
     * @param $employee_id - Identification of employee.
     * @return Employee view page.
     */
    public function update_employee($employee_id)
    {
        // Validating employee fields
        $this->validate($this->request, [
            'department_id' => 'required',
            'name' => 'required',
            'date_of_joining' => 'required|date|date_format:Y-m-d',
            'gender' => 'required',
            'address' => 'required',
            'salary' => 'required|numeric'
        ]);

        $this->employee->updateEmployee($employee_id);

        return redirect('/crud/employees');
    }

    /**
     * Delete employee detail.
     * @param $employee_id - Identification of employee.
     * @return Employee view page.
     */
    public function delete_employee($employee_id)
    {
        $this->employee->deleteEmployee($employee_id);

        return redirect('/crud/employees');
    }
}
