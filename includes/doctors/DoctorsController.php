<?php
include "../../includes/DBconn.php";

if (isset($_POST['type'])) :

    $doctors = new DoctorsController();

    switch ($_POST['type']) {

        case "addDoctor":

            echo $doctors->addDoctor(
                $_POST['in_D_Firstname'],
                $_POST['in_D_Lastname'],
                $_POST['in_D_Address'],
                $_POST['in_D_Contact']
            );
            break;
        case "editDoctor":
            echo $doctors->updateDoctor(
                $_POST['id'],
                $_POST['in_D_Firstname'],
                $_POST['in_D_Lastname'],
                $_POST['in_D_Address'],
                $_POST['in_D_Contact']
            );
            break;
        case "deleteDoctor":
            echo $doctors->deleteDoctor($_POST['id']);
            break;
       
    }
endif;
class DoctorsController
{
    function addDoctor($d_firstname, $d_lastname, $d_address, $d_contact)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "INSERT INTO doctors (d_firstname,d_lastname,d_address,d_contact) VALUES (:d_firstname,:d_lastname, :d_address,:d_contact)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':d_firstname', $d_firstname);
        $query->bindparam(':d_lastname', $d_lastname);
        $query->bindparam(':d_address', $d_address);
        $query->bindparam(':d_contact', $d_contact);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function viewAllDoctors()
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM doctors ORDER BY doctor_id DESC");
    }
  
   
    public function getDoctor($doctor_id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM doctors where doctor_id = '$id' LIMIT 1");
    }


    public function updateDoctor($id, $d_firstname, $d_lastname, $d_address, $d_contact)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE doctors SET d_firstname=:d_firstname,d_lastname=:d_lastname,d_address=:d_address,d_contact=:d_contact WHERE doctor_id=:doctor_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':doctor_id', $id);
        $query->bindparam(':d_firstname', $d_firstname);
        $query->bindparam(':d_lastname', $d_lastname);
        $query->bindparam(':d_address', $d_address);
        $query->bindparam(':d_contact', $d_contact);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function deleteDoctor($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "DELETE FROM doctors WHERE doctor_id=:doctor_id";
        $query = $dbConn->prepare($sql);
        try {
            if ($query->execute(array(':doctor_id' => $id))) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
}
