<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "SELECT * FROM voters ";
		$query = $conn->query($sql);

		while($row = $query->fetch_assoc()){
			if($row['voters_id'] == $email){				
				$_SESSION['error'] = 'ERROR : you can not register more than once go to register again ';
				header('location: ../index.php');
				exit();
			}

		}
		


		$voter = $email;
		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname,email, photo) VALUES ('$voter', '$password', '$firstname', '$lastname', '$email', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up register form first';
	}

	header('location: ../index.php');
?>