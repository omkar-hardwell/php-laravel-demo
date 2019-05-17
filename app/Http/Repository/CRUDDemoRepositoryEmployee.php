<?php

namespace App\Http\Repository;

use App\Employee;

class CRUDDemoRepositoryEmployee extends Repository
{
    // CRUDDemoRepositoryEmployee repository class.

    /**
     * @var Employee|null
     */
    protected $_employee = null;

    /**
     * CRUDDemoRepositoryEmployee constructor.
     * @param Employee $_employee
     */
    public function __construct(Employee $_employee)
    {
        $this->_employee = $_employee;
    }

    /**
     * Fetch employee.
     * @param null $employeeId
     * @return mixed
     */
    public function getEmployee($employeeId = null)
    {
        return ($employeeId) ?
            Employee::where('employee_id', $employeeId)->first() :
            Employee::join('departments', 'employees.department_id', '=', 'departments.department_id')
                ->select('employees.employee_id', 'employees.name As emp_name', 'employees.date_of_joining',
                    'employees.gender', 'employees.address', 'employees.salary', 'departments.name')
                ->orderBy('employees.employee_id', 'desc')->get()->toArray();
    }

    /**
     * Add employee.
     * @param $employeeDetail
     */
    public function addEmployee($employeeDetail)
    {
        $employee = new Employee($employeeDetail);
        $employee->save();
    }

    /**
     * Update employee.
     * @param $employeeId
     * @param $employeeDetail
     */
    public function updateEmployee($employeeId, $employeeDetail)
    {
        Employee::where('employee_id', '=', $employeeId)
            ->update($employeeDetail);
    }

    /**
     * Delete employee.
     * @param $employeeId
     */
    public function deleteEmployee($employeeId)
    {
        Employee::where('employee_id', '=', $employeeId)->delete();
    }
}
