<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;

class CRUDDemoController extends Controller
{
    // Sample of CRUD operations.

    /**
     * CRUDDemoController constructor.
     */
    public function __construct(){
        // User authorization
        $this->middleware('auth');
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
        $departments = Department::all()->toArray();

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

        $crud = new Department([
            'name' => $request->get('name')
        ]);
        $crud->save();

        return redirect('/crud/departments');
    }

    /**
     * Edit department detail.
     * @param $department_id - Identification of department
     * @return Department edit page.
     */
    public function edit_department($department_id)
    {
        $department = Department::where('department_id', $department_id)->first();

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
        // Validating name field
        $this->validate($request, [
            'name' => 'required',
        ]);

        Department::where('department_id', '=', $department_id)->update(['name' => $request->get('name')]);

        return redirect('/crud/departments');
    }

    /**
     * Delete department detail.
     * @param $department_id - Identification of department
     * @return Department view page.
     */
    public function delete_department($department_id)
    {
        Department::where('department_id', '=', $department_id)->delete();

        return redirect('/crud/departments');
    }

    /**
     * Display a listing of the employee.
     *
     * @return Employee view page.
     */
    public function view_employees()
    {
        $employees = Employee::join('departments', 'employees.department_id', '=', 'departments.department_id')
            ->select('employees.employee_id', 'employees.name As emp_name', 'employees.date_of_joining', 'employees.gender', 'employees.address', 'employees.salary', 'departments.name')
            ->get()->toArray();

        return view('showEmployees', compact('employees'));
    }

    /**
     * Add department detail.
     *
     * @return Employee add page.
     */
    public function add_employee()
    {
        $departments = Department::all()->toArray();

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

        $employee = new Employee([
            'department_id' => $request->get('emp_department'),
            'name' => $request->get('emp_name'),
            'date_of_joining' => $request->get('emp_date_of_joining'),
            'gender' => $request->get('emp_gender'),
            'address' => $request->get('emp_address'),
            'salary' => $request->get('emp_salary')
        ]);
        $employee->save();

        return redirect('/crud/employees');
    }

    /**
     * Edit employee detail.
     * @param $employee_id - Identification of employee.
     * @return Employee edit page.
     */
    public function edit_employee($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->first();
        $departments = Department::all()->toArray();

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

        Employee::where('employee_id', '=', $employee_id)
            ->update([
                'department_id' => $request->get('emp_department'),
                'name' => $request->get('emp_name'),
                'date_of_joining' => $request->get('emp_date_of_joining'),
                'gender' => $request->get('emp_gender'),
                'address' => $request->get('emp_address'),
                'salary' => $request->get('emp_salary')
            ]);

        return redirect('/crud/employees');
    }

    /**
     * Delete employee detail.
     * @param $employee_id - Identification of employee.
     * @return Employee view page.
     */
    public function delete_employee($employee_id)
    {
        Employee::where('employee_id', '=', $employee_id)->delete();

        return redirect('/crud/employees');
    }
}
