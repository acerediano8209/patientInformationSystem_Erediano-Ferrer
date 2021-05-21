<?php
include "../../includes/DBconn.php";

if (isset($_POST['type'])) :

    $beds = new BedsController();

    switch ($_POST['type']) {

        case "addBed":

            echo $beds->addBed(
                $_POST['in_bedname'],
                $_POST['in_rateperday'],
                $_POST['in_bedtype']
               
            );
            break;
            
        case "editBed":
            echo $beds->updateBed(
                $_POST['bed_id'],
                $_POST['in_bedname'],
                $_POST['in_rateperday'],
                $_POST['in_bedtype']
            );
            break;
        case "deleteBed":
            echo $beds->deleteBed($_POST['id']);
            break;
     
    }
endif;
class BedsController
{
    function addBed($bedname, $rateperday, $bedtype)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "INSERT INTO beds (bedname,rateperday,bedtype) VALUES (:bedname,:rateperday, :bedtype)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':bedname', $bedname);
        $query->bindparam(':rateperday', $rateperday);
        $query->bindparam(':bedtype', $bedtype);
    
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function viewAllBeds()
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM beds ORDER BY bed_id DESC");
    }
  
   
    public function getBed($bed_id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM beds where bed_id = '$id' LIMIT 1");
    }


    public function updateBed($id, $bedname, $rateperday, $bedtype)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE beds SET bedname=:bedname,rateperday=:rateperday,bedtype=:bedtype WHERE bed_id=:bed_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':bed_id', $id);
        $query->bindparam(':bedname', $bedname);
        $query->bindparam(':rateperday', $rateperday);
        $query->bindparam(':bedtype', $bedtype);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function deleteBed($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "DELETE FROM bed WHERE bed_id=:bed_id";
        $query = $dbConn->prepare($sql);
        try {
            if ($query->execute(array(':bed_id' => $id))) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
}
