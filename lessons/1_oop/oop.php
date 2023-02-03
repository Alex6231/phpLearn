<?php
/* Здоровье (hp) персонажа не может превышать 100ед.*/
    class Person{
        private $name;
        private $lastname;
        private $age;
        private $hp;
        private $mother;
        private $father;

        public function __construct($name, $lastname, $age, $mother=null, $father=null){
            $this->name = $name;
            $this->lastname = $lastname;
            $this->age = $age;
            $this->hp = 100;
            $this->mother = $mother;
            $this->father = $father;
        }
        public function sayHi(){
            return "Привет, меня зовут ".$this->name." у меня ".$this->hp." здоровья";
        }
        public function getHp(){
            return $this->hp;
        }
        public function getName(){
            return $this->name." ".$this->lastname;
        }
        public function getLastname(){
            return $this->lastname;
        }
        public function getAge(){
            return $this->age;
        }
        public function getMother(){
            return $this->mother;
        }

        public function getFather(){
            return $this->father;
        }

        public function setHp($hp){
            if($this->hp+$hp > 100) $this->hp = 100;
            else $this->hp = $this->hp + $hp;
        }
        public function info(){
            $result = "Имя: ".$this->getName()."<br>";
            if($this->getMother()){
                $result .= "Имя матери: ".$this->getMother()->getName()."<br>";
                if($this->getMother()->getFather()){
                    $result .= "Имя дедушки по маминой линии: ".$this->getMother()->getFather()->getName()."<br>";
                }
                if($this->getMother()->getMother()) {
                    $result .= "Имя бабушки по маминой линии: ".$this->getMother()->getMother()->getName()."<br>";
                }
            }
            if($this->getFather()){
                $result .= "Имя отца: ".$this->getFather()->getName()."<br>";
                if($this->getFather()->getFather()){
                    $result .= "Имя дедушки по папиной линии: ".$this->getFather()->getFather()->getName()."<br>";
                }
                if($this->getFather()->getMother()) {
                    $result .= "Имя бабушки по папиной линии: ".$this->getFather()->getMother()->getName()."<br>";
                }
            }

            return $result;
        }
    }
    $medKit = 50;
    $person7 = new Person("Anastasia", "Ivanova", 79);
    $person6 = new Person("Alexander", "Ivanov", 89);
    $person5 = new Person("Viktoriya", "Petrova", 80);
    $person4 = new Person("Igor", "Petrov", 75);
    $person3 = new Person("Ivan", "Ivanov", 35, $person7, $person6);
    $person2 = new Person("Olga", "Petrova", 40, $person5, $person4);
    $person1 = new Person("Alex", "Ivanov", 10, $person2, $person3);
    echo $person2->info();
    /*echo $person1->getHp()."<br>"; // 100
    $person1->setHp(-30);
    echo $person1->getHp()."<br>"; // 70
    $person1->setHp($medKit);
    echo $person1->getHp()."<br>"; // 100*/