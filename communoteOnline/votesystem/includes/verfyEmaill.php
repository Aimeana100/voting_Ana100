<?php
include('conn.php');
if (isset($_GET['email']) AND $_GET['email'] != "" ){

    $staff_email = $_GET['staff_email'];

		$sql = "SELECT * FROM voters ";
		$query = $conn->query($sql);
         
        
        while($voter = $query->fetch_assoc()){
            if($voter['voters_id'] == $staff_email){
                echo json_encode(array("success"=> true, "meassage"=> "email already registered"));

            }
        }
  
}
else
{
    echo json_encode(array("success"=> false, "meassage"=> "sorry provide email"));
    
}



	?>
