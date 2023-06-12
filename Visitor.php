<?php

// Абстрактний клас Сутність, який визначає метод прийняття відвідувача
abstract class Entity {
    abstract public function accept(Visitor $visitor);
}

// Клас Компанія
class Company extends Entity {
    private $departments;

    public function __construct(array $departments) {
        $this->departments = $departments;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitCompany($this);
    }

    public function getDepartments() {
        return $this->departments;
    }
}

// Клас Департамент
class Department extends Entity {
    private $employees;

    public function __construct(array $employees) {
        $this->employees = $employees;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitDepartment($this);
    }

    public function getEmployees() {
        return $this->employees;
    }
}

// Клас Співробітник
class Employee extends Entity {
    private $position;
    private $salary;

    public function __construct($position, $salary) {
        $this->position = $position;
        $this->salary = $salary;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitEmployee($this);
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSalary() {
        return $this->salary;
    }
}

// Абстрактний клас Відвідувач, який визначає методи відвідування кожної сутності
abstract class Visitor {
    abstract public function visitCompany(Company $company);
    abstract public function visitDepartment(Department $department);
    abstract public function visitEmployee(Employee $employee);
}

// Конкретний відвідувач для отримання зарплатної відомості
class SalaryReportVisitor extends Visitor {
    private $report = [];

    public function visitCompany(Company $company) {
        $departments = $company->getDepartments();

        foreach ($departments as $department) {
            $department->accept($this);
        }
    }

    public function visitDepartment(Department $department) {
        $employees = $department->getEmployees();

        foreach ($employees as $employee) {
            $employee->accept($this);
        }
    }

    public function visitEmployee(Employee $employee) {
        $position = $employee->getPosition();
        $salary = $employee->getSalary();

        $this->report[$position] = $salary;
    }

    public function getReport() {
        return $this->report;
    }
}

// Клієнтський код
// Створення об'єктів компанії, департаментів та співробітників
$employee1 = new Employee('Manager', 5000);
$employee2 = new Employee('Developer', 4000);
$employee3 = new Employee('Accountant', 3000);

$department1 = new Department([$employee1, $employee2]);
$department2 = new Department([$employee3]);

$company = new Company([$department1, $department2]);

// Створення відвідувача для отримання зарплатної відомості
$visitor = new SalaryReportVisitor();

// Отримання зарплатної відомості для компанії
$company->accept($visitor);
$companyReport = $visitor->getReport();

// Отримання зарплатної відомості для окремого департаменту
$department1->accept($visitor);
$department1Report = $visitor->getReport();
