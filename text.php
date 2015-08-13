<?php

require_once 'includes/constants.php';

class text{

    private $conn;

    function __construct(){
        $this->conn   =   new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('There was a problem connecting to the database.');
    }

    function registerUser()
    {

        if(isset($_POST['submit']) ){

            if($_POST['carrier'] === "--"){
                echo "<p class='alert alert-danger text-center'>Please Select Your Carrier</p>";
                return false;
            }

            if($_POST['carrier'] != "--" && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['number'])){
                $first = $_POST['first'];
                $last = $_POST['last'];
                $phone = $_POST['number'];
                $carriers = $_POST['carrier'];

                $sql = "SELECT address
                FROM gateway
                WHERE slug = '$carriers'";

                $get = $this->conn->query($sql);
                $carrier = $get->fetch_array(MYSQLI_ASSOC);

                $to      = $phone.'@'.$carrier['address'];
                $subject = "";
                $message = "I don't know how to do a phone number (yet), but this is cool.";
                $headers = 'From: YourEmail@YourEmail.com' . "\r\n" .
                            'Reply-To: YourEmail@YourEmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                $name = $first." ".$last;

                $sql    = "INSERT INTO numbers(first_name, last_name, phone, carrier) VALUES ('$first', '$last', '$phone', '$carriers') ";

                // Insert the data into the database
                // Send SMS via the users phone number to the registered company address.
                // If both return true, display success message
                if($this->conn->query($sql) && mail( $to, $subject, $message, $headers ) ){
                echo "<p class='alert alert-success text-center'>Thanks, ".$first. "! You will soon begin receiving notifications at ".$phone."</p>";
                } else{
                echo "<p class='alert alert-danger text-center'>Something went wrong.</p>";
                }
            }

        } else{

        }
    }

    function getAddress(){

    }

}














 ?>
