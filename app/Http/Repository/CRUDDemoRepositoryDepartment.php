<?php

namespace App\Http\Repository;

use App\Department;

class CRUDDemoRepositoryDepartment extends Repository
{
    // CRUDDemoRepositoryDepartment repository class.

    /**
     * @var Department|null
     */
    protected $_department = null;

    /**
     * CRUDDemoRepositoryDepartment constructor.
     * @param Department $_department
     */
    public function __construct(Department $_department)
    {
        $this->_department = $_department;
    }

    /**
     * Fetch department.
     * @param null $departmentId
     * @return mixed
     */
    public function getDepartment($departmentId = null)
    {
        return ($departmentId) ? Department::where('department_id', $departmentId)->first() : Department::all()->sortBy('name')->toArray();
    }

    /**
     * Add department.
     * @param $departmentDetail
     */
    public function addDepartment($departmentDetail)
    {
        $department = new Department($departmentDetail);
        $department->save();
    }

    /**
     * Update department.
     * @param $departmentId
     * @param $departmentDetail
     */
    public function updateDepartment($departmentId, $departmentDetail)
    {
        Department::where('department_id', '=', $departmentId)
            ->update($departmentDetail);
    }

    /**
     * Delete department.
     * @param $departmentId
     */
    public function deleteDepartment($departmentId)
    {
        Department::where('department_id', '=', $departmentId)->delete();
    }
}
