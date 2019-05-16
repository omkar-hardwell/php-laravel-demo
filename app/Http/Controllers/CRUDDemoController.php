<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CRUDDemoServicesDepartment;
use App\Http\Services\CRUDDemoServicesEmployee;

class CRUDDemoController extends Controller
{
    // Sample of CRUD operations.

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
     * @param CRUDDemoServicesDepartment $department
     * @param CRUDDemoServicesEmployee $employee
     */
    public function __construct(CRUDDemoServicesDepartment $department, CRUDDemoServicesEmployee $employee){
        // User authorization
        $this->middleware('auth');

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
     * @param $request Request object.
     * @return Department view page.
     */
    public function save_department(Request $request)
    {
        // Validating name field
        $this->validate($request, [
            'name' => 'required',
        ]);

        $department_details = [
            'name' => $request->get('name')
        ];
        $this->department->addDepartment($department_details);

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
     * @param $request Request object.
     * @param $department_id - Identification of department
     * @return Department view page.
     */
    public function update_department(Request $request, $department_id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $department_details = [
            'name' => $request->get('name')
        ];
        $this->department->updateDepartment($department_id, $department_details);

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
     * @param $request Request object.
     * @return Employee view page.
     */
    public function save_employee(Request $request)
    {
        // Validating employee fields
        $this->validate($request, [
            'emp_department' => 'required',
            'emp_name' => 'required',
            'emp_date_of_joining' => 'required|date|date_format:Y-m-d',
            'emp_gender' => 'required',
            'emp_address' => 'required',
            'emp_salary' => 'required|numeric'
        ]);

        $employee_details = [
            'department_id' => $request->get('emp_department'),
            'name' => $request->get('emp_name'),
            'date_of_joining' => $request->get('emp_date_of_joining'),
            'gender' => $request->get('emp_gender'),
            'address' => $request->get('emp_address'),
            'salary' => $request->get('emp_salary')
        ];
        $this->employee->addEmployee($employee_details);

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
     * @param $request Request object.
     * @param $employee_id - Identification of employee.
     * @return Employee view page.
     */
    public function update_employee(Request $request, $employee_id)
    {
        // Validating employee fields
        $this->validate($request, [
            'emp_department' => 'required',
            'emp_name' => 'required',
            'emp_date_of_joining' => 'required|date|date_format:Y-m-d',
            'emp_gender' => 'required',
            'emp_address' => 'required',
            'emp_salary' => 'required|numeric'
        ]);

        $employee_details = [
            'department_id' => $request->get('emp_department'),
            'name' => $request->get('emp_name'),
            'date_of_joining' => $request->get('emp_date_of_joining'),
            'gender' => $request->get('emp_gender'),
            'address' => $request->get('emp_address'),
            'salary' => $request->get('emp_salary')
        ];
        $this->employee->updateEmployee($employee_id, $employee_details);

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
