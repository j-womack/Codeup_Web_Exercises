<?php

class Person {
    public $firstName;
    public $lastName;
}

class Cohort {
    public $name;
    public $startDate;
    public $endDate;
    public $students = array();

    public function addStudent($student) {
        $this->students[] = $student;
        return 'Welcome to ' . $this->name . ' ' . 
            $student->firstName . ' ' . $student->lastName . 
            '.' . PHP_EOL;
    }
}

$person1 = new Person();

$person1->firstName = 'First Name';
$person1->lastName  = 'Last Name';





?>