<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repository\CRUDDemoRepositoryEmployee;

class CRUDDemoServicesEmployee extends Services
{
    // CRUDDemoServicesEmployee service class

    /**
     * @var CRUDDemoRepositoryEmployee|null
     */
    protected $_repository = null;

    /**
     * @var Request|null
     */
    protected $_request = null;

    /**
     * CRUDDemoServicesEmployee constructor.
     * @param Request $_request
     * @param CRUDDemoRepositoryEmployee $_repository
     */
    public function __construct(Request $_request, CRUDDemoRepositoryEmployee $_repository)
    {
        $this->_request = $_request;
        $this->_repository = $_repository;
    }

    /**
     * Fetch employee details.
     * @param null $employeeId
     * @return mixed
     */
    public function getEmployee($employeeId = null)
    {
        return $this->_repository->getEmployee($employeeId);
    }

    /**
     * Add employee.
     */
    public function addEmployee()
    {
        $employeeDetail = $this->_request->except('_token');
        $this->_repository->addEmployee($employeeDetail);
    }

    /**
     * Update employee.
     * @param $employeeId
     */
    public function updateEmployee($employeeId)
    {
        $employeeDetail = $this->_request->except('_token');
        $this->_repository->updateEmployee($employeeId, $employeeDetail);
    }

    /**
     * Delete employee.
     * @param $employeeId
     */
    public function deleteEmployee($employeeId)
    {
        $this->_repository->deleteEmployee($employeeId);
    }
}
