<?php

include ("dbConnect.php");
if(isset($_GET['id'])){

    /**
     * Take result from first table and add into into result string
     */
    $value = $_GET['id'];
    $dbQuery = $conn->prepare("SELECT * FROM MedicalAppointment WHERE Date='$value'");
    $dbQuery->execute();

    //$dbQuery->rowCount()."\n";

    $returnMarkUp = "";
    while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
        $returnMarkUp .= "<br><h2>";
        $returnMarkUp .= "Type: ".$dbRow["AppointmentType"];
        $returnMarkUp .= "<br><br>Date: ".$dbRow["Date"];
        $returnMarkUp .= "<br><br>Notes: <br><br>".$dbRow["Notes"];
    }

    /**
     * Now lets take all results from different table and add into result string
     */
    $dbQuery2 = $conn->prepare("SELECT * FROM MedicalAppointmentResults WHERE Date='$value'");
    $dbQuery2->execute();

    //$dbQuery2->rowCount()."\n";

    while ($dbRow2=$dbQuery2->fetch(PDO::FETCH_ASSOC)) {
        $returnMarkUp .= "<br><br><u>Medical Appointment Results</u><br><br><h2>";
        $returnMarkUp .= "Blood Pressure: ".$dbRow2["BloodPressure"];
        $returnMarkUp .= "<br><br>Urine Test: ".$dbRow2["UrineTest"];
        $returnMarkUp .= "<br><br>Baby Size: ".$dbRow2["BabySize"];
    }


    echo $returnMarkUp;
}