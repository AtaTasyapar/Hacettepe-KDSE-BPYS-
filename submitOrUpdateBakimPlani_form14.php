<?php
require_once("config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

?>
<?php

if (isset($_POST["patient_name"])) {
    if(isset($_POST["isUpdate"])){        
        $stmt = $db->prepare("UPDATE form14 SET
        update_date = ?,
        problem_info = ?,
        nurse_description = ?,
        noc_output = ?,
        noc_indicator = ?,
        nurse_attempt = ?,
        evaluation = ?
        WHERE form_id = ?");
$stmt->execute([
    $_POST["creation_date"],
    $_POST["problem_info"],
    $_POST["nurse_description"],
    $_POST["noc_output"],
    $_POST["noc_indicator"],
    $_POST["nurse_attempt"],
    $_POST["evaluation"],
    $_POST["form_id"]
]);

        echo "successfully updated!";
    }
    else{

        
        
        
        $stmt = $db->prepare("INSERT INTO form14 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                problem_info,
                nurse_description,
                noc_output,
                noc_indicator,
                nurse_attempt,
                evaluation
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST["form_num"],
        $_POST["patient_name"],
        $_POST["patient_id"],
        $_POST["creation_date"],
        $_POST["update_date"],
        $_POST["problem_info"],
        $_POST["nurse_description"],
        $_POST["noc_output"],
        $_POST["noc_indicator"],
        $_POST["nurse_attempt"],
        $_POST["evaluation"]
    ]);
    echo "successfully inserted!";
    
}
}
else{
    echo "Error.";
}
?>