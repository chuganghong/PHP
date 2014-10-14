<?php
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{<?php
class corporatedrone {
    private $employeeid;
    private $tiecolor;
    // Define a setter and getter for $employeeid
    function setEmployeeID($employeeid) {
        $this->employeeid = $employeeid;
    }
    function getEmployeeID() {
        return $this->employeeid;
    }
    // Define a setter and getter for $tiecolor
    function setTiecolor($tiecolor) {
        $this->tiecolor = $tiecolor;
    }
    function getTiecolor() {
        return $this->tiecolor;
    }
}
    // Create new corporatedrone object
    $drone1 = new corporatedrone();
    
    // Set the $drone1 employeeid member
    $drone1->setEmployeeID("12345");
    
    // Set the $drone1 tiecolor member
    $drone1->setTiecolor("red");
    
    // Clone the $drone1 object
    $drone2 = clone $drone1;
    
    // Set the $drone2 employeeid member
    $drone2->setEmployeeID("67890");
    
    // Output the $drone1 and $drone2 employeeid members
    echo "drone1 employeeID: ".$drone1->getEmployeeID()."<br />";
    echo "drone1 tie color: ".$drone1->getTiecolor()."<br />";
    echo "drone2 employeeID: ".$drone2->getEmployeeID()."<br />";
    echo "drone2 tie color: ".$drone2->getTiecolor()."<br />";
?>

    public $object1;
    public $object2;

    function __clone()
    {
      
        // 强制复制一份this->object， 否则仍然指向同一个对象
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);

?> 