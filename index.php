<?php
   
    class User{

        public $userName;
        protected $email;
        public $role = "Member";

        public function __construct($userName, $email){
            $this->userName = $userName;
            $this->email = $email;
        }

        // Magic methods: https://www.php.net/manual/en/language.oop5.magic.php
        public function __destruct(){
            // Magic method - Runs at the end or whenever unset() is called
            echo "<br />The user $this->userName was removed";
        }

        public function __clone(){
            // Magic method - Method which runs when clone() is called. Can be used to do some changes
            // to the data of the cloned object
            $this->userName = $this->userName." (cloned)";
        }

        public function printData(){
            echo "Username: $this->userName <br />Email: $this->email <br />";
        }

        // getters
        public function getEmail(){
            return $this->email;
        }

        // setters
        public function setEmail($email){
            if(strpos($email, "@")>-1){
                $this->email = $email;
                return "Email Updated to $email";
            }
            else{
                return "Invalid email: $email";
            }
        }

        public function message(){
            return "$this->email sent a new message";
        }
    }

    class AdminUser extends User{
        private $adminLevel;
        public $role = "Admin";
        
        public function __construct($userName, $email, $adminLevel)
        {
            $this->adminLevel = $adminLevel;
            // Call parent constructor to set username and email values
            parent::__construct($userName, $email);
        }

        public function getAdminLevel(){
            return $this->adminLevel;
        }

        public function message(){
            return "$this->email, an admin sent a new meesage";
        }
    }

    $userOne = new User("ron", "ron@protonmail.com");
    $userTwo = new User("mili", "mili@protonmail.com");
    $userOne->printData();
    $userTwo->printData(); 
    echo "<br />".$userOne->getEmail();
    echo "<br />".$userTwo->getEmail();
    echo "<br />".$userTwo->setEmail("emigmail.com");
    echo "<br />".$userTwo->setEmail("emi@gmail.com");
    echo "<br />".$userTwo->getEmail();

    echo "<br />*****************************************<br />";

    $adminUser = new AdminUser("admin", "admin@site.com", 5);
    echo "<br />".$adminUser->userName;
    echo "<br />".$adminUser->getEmail();
    echo "<br />".$adminUser->getAdminLevel();

    echo "<br />".$userOne->role;
    echo "<br />".$userTwo->role;
    echo "<br />".$adminUser->role;

    echo "<br />".$userOne->message();
    echo "<br />".$userTwo->message();
    echo "<br />".$adminUser->message();

    $userThree = clone($userOne);

    echo "<br />Cloned Data: ".$userThree->userName;

    //unset($userOne);

?>
<html>
    <head>
        <title>PHP OOP Tutorial</title>
    </head>
    <body>

    </body>
</html>