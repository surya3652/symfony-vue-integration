<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employee;

/**
 * @Route("/api", name="api_")
 */

class ApiController extends AbstractController{

    /**
     * @Route("/emp", name="project_index", methods={"GET"})
     */
    public function get_emp(): Response
    {
        $employees = $this->getDoctrine()
            ->getRepository(Employee::class)
            ->findAll();
 
        $data = [];

        foreach ($employees as $e) {
           $data[] = [
               'emp_id' => $e->getEmpId(),
               'emp_name' => $e->getEmpName(),
               'emp_designation' => $e->getEmpDesignation(),
           ];
        }
        return $this->json($data);
    }

    /**
     * @Route("/emp", name="employee_new", methods={"POST"})
     */

    public function post_emp(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->request->get('emp_id');
        if($this->$entityManager->getRepository(Employee::class)->find($id)){
            return $this->json('The employee with this id ' . $id . ' is already found');
        }
        $employees = new Employee();
        $employees->setEmpId($request->request->get('emp_id')); 
        $employees->setEmpName($request->request->get('emp_name'));
        $employees->setEmpDesignation($request->request->get('emp_designation'));
 
        $entityManager->persist($employees);
        $entityManager->flush();
 
        return $this->json('Created new employee successfully with id ' . $employees->getEmpId());
    }

    /**
     * @Route("/emp/{id}", name="employee_existing", methods={"GET"})
    */

    public function get_emp_with_id(int $id): Response
    {
        $employee = $this->getDoctrine()->getRepository(Employee::class)->find($id);
 
        if (!$employee) {
            return $this->json('No employee found for id' . $id, 404);
        }
 
        $data =  [
            'emp_id' => $employee->getEmpId(),
            'emp_name' => $employee->getEmpName(),
            'emp_designation' => $employee->getEmpDesignation(),
        ];
         
        return $this->json($data);
    }
    /**
     * @Route("/emp/{id}", name="emp_edit", methods={"PUT"})
     */
    public function put_emp(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $employees = $entityManager->getRepository(Employee::class)->find($id);
 
        if (!$employees) {
            return $this->json('No project found for id' . $id, 404);
        }
 
        $employees->setEmpName($request->request->get('emp_name'));
        $employees->setEmpDesignation($request->request->get('emp_designation'));
        $entityManager->flush();
 
        $data =  [
            'emp_id' => $employees->getEmpId(),
            'emp_name' => $employees->getEmpName(),
            'emp_designation' => $employees->getEmpDesignation(),
        ];
         
        return $this->json($data);
    }

    /**
     * @Route("/emp/{id}", name="emp_delete", methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $employees = $entityManager->getRepository(Employee::class)->find($id);
 
        if (!$employees) {
            return $this->json('No employee found for id ' . $id, 404);
        }
 
        $entityManager->remove($employees);
        $entityManager->flush();
 
        return $this->json('Deleted a project successfully with id ' . $id);
    }
 
}