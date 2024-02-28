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
 

        foreach ($employees as $e) {
           $data[] = array(
               'emp_id' => $e->getEmpId(),
               'emp_name' => $e->getEmpName(),
               'emp_designation' => $e->getEmpDesignation(),
           );
        }
        return $this->json($data);
    }

    /**
     * @Route("/emp", name="employee_new", methods={"POST"})
     */

    public function post_emp(Request $request): Response
    {
        $parameters = json_decode($request->getContent(),true);

        $incoming_id = $parameters['emp_id'];
        $current = $this->getDoctrine()->getRepository(Employee::class)->find($incoming_id);
        
        if ($current) {
            return $this->json('The user with given ID ' . $incoming_id . ' is already exists' );
        }

        $employees = new Employee();
        $employees->setEmpId($parameters['emp_id']); 
        $employees->setEmpName($parameters['emp_name']);
        $employees->setEmpDesignation($parameters['emp_designation']);
        
        $entityManager = $this->getDoctrine()->getManager();
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
            return $this->json('No Employee found for id ' . $id);
        }
 
        $parameters = json_decode($request->getContent(), true);
        $employees->setEmpName($parameters['emp_name']);
        $employees->setEmpDesignation($parameters['emp_designation']);
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
            return $this->json('No employee found for id ' . $id);
        }
 
        $entityManager->remove($employees);
        $entityManager->flush();
 
        return $this->json('Deleted Employee successfully with id ' . $id);
    }
 
}