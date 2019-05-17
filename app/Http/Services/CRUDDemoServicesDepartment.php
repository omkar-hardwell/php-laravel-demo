<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repository\CRUDDemoRepositoryDepartment;

class CRUDDemoServicesDepartment extends Services
{
    // CRUDDemoServicesDepartment service class

    /**
     * @var CRUDDemoRepositoryDepartment|null
     */
    protected $_repository = null;

    /**
     * @var Request|null
     */
    protected $_request = null;

    /**
     * CRUDDemoServices constructor.
     * @param Request $_request
     * @param CRUDDemoRepositoryDepartment $_repository
     */
    public function __construct(Request $_request, CRUDDemoRepositoryDepartment $_repository)
    {
        $this->_request = $_request;
        $this->_repository = $_repository;
    }

    /**
     * Fetch department details.
     * @param null $departmentId
     * @return mixed
     */
    public function getDepartment($departmentId = null)
    {
        return $this->_repository->getDepartment($departmentId);
    }

    /**
     * Add department.
     */
    public function addDepartment()
    {
        $departmentDetail = $this->_request->only('name');
        $this->_repository->addDepartment($departmentDetail);
    }

    /**
     * Update department.
     * @param $departmentId
     */
    public function updateDepartment($departmentId)
    {
        $departmentDetail = $this->_request->only('name');
        $this->_repository->updateDepartment($departmentId, $departmentDetail);
    }

    /**
     * Delete department.
     * @param $departmentId
     */
    public function deleteDepartment($departmentId)
    {
        $this->_repository->deleteDepartment($departmentId);
    }
}
