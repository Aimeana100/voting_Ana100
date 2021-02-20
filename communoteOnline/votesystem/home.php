<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	      	<?php
	      		$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
    			$title = $parse['election_title'];
	      	?>
	      	<h1 class="page-header text-center title"><b><?php echo strtoupper($title); ?></b></h1>
	        <div class="row">

	        	<!-- <div class="col-sm-12 col-sm-offset-1"> -->
	        		<?php
				        if(isset($_SESSION['error'])){
				        	?>
				        	<div class="alert alert-danger alert-dismissible">
				        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        	<ul>
					        		<?php
					        			foreach($_SESSION['error'] as $error){
					        				echo "
					        					<li>".$error."</li>
					        				";
					        			}
					        		?>
					        	</ul>
					        </div>
				        	<?php
				         	unset($_SESSION['error']);

				        }
				        if(isset($_SESSION['success'])){
				          	echo "
				            	<div class='alert alert-success alert-dismissible'>
				              		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				              		<h4><i class='icon fa fa-check'></i> Success!</h4>
				              	".$_SESSION['success']."
				            	</div>
				          	";
				          	unset($_SESSION['success']);
				        }
				    ?>
 
				    <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>

				    <?php
                    $sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
                    $vquery = $conn->query($sql);
                    if($vquery->num_rows > 0){
                        ?>
                        <div class="text-center">
                            <h3> You have already made your vote for this election. </h3>
                            <a href="#view" data-toggle="modal" class="btn btn-flat btn-primary btn-lg">check My Action</a>
                        </div>
                    <?php
                    }
                    else{
                        ?>
			    			<!-- Voting Ballot -->
						    <form method="POST" id="ballotForm" action="submit_ballot.php" >
				        		<?php
				        			include 'includes/slugify.php';
                                    $candidate = '';

				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {                                

                                        $sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
                                        $cquery = $conn->query($sql);
                                        while ($crow = $cquery->fetch_assoc()) {
                                            $slug = slugify($row['description']);
                                            $checked = '';
                                            if (isset($_SESSION['post'][$slug])) {
                                                $value = $_SESSION['post'][$slug];

                                                if (is_array($value)) {
                                                    foreach ($value as $val) {
                                                        if ($val == $crow['id']) {
                                                            $checked = 'checked';
                                                        }
                                                    }
                                                } else {
                                                    if ($value == $crow['id']) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                            }

                                            $input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red '.$slug.'" name="'.$slug."[]".'" value="'.$crow['id'].'" '.$checked.'>' : '<label><input style="font-size: 30px;" type="radio" class="flat-red '.$slug.'" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'> Tick to vote me</label>';

                                            $image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';

                                            $candidate .= '


                                            <div class="col-md-4 " style=" padding: 10px; ">
                                            <div class="card " style="padding: 10px; border-style: ridge; ">
                                              <img width="300" height="236" class="" src="'. $image.'" alt="contestant image">
                                              <div style=" margin-top: 5px;" class="">
                                              
                                              </div>
                                              <ul  style=" margin-top: 5px;" class="list-group list-group-flush ">
                                                <li class="list-group-item">    <h5 class="card-title cname">'. $crow['firstname'].' '.$crow['lastname']. '</h5>
                                            </li>
                                                <li class" list-group-item">Post : president </li>
                                                <li class" list-group-item">Study : year 4 </li>
                                                <li class" list-group-item">Votes : 100 </li>
                                                <li style="font-size:20px;" class" list-group-item">'.$input. '</li>
                                              </ul>
                                            </div>
                                            </div>
                                            
                                            
                                            ';

                                            //$candidate .= '
												
													//'.$input.'<img src="'.$image.'" height="100px" width="100px" class="clist"><span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
												
											//';
                                        }

                                        $instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';

                                        

                                        echo '
													<div class="box box-solid" id="'.$row['id'].'">
														<div class="box-header with-border">
															<h3 class="box-title"><b>'.$row['description'].'</b></h3>
														</div>
														<div class="box-body">
															<p>'.$instruct.'
																<span class="pull-right">
																	<button type="button" class="btn btn-success btn-sm btn-flat reset" data-desc="'.slugify($row['description']).'"><i class="fa fa-refresh"></i> Reset</button>
																</span>
															</p>
															<div id="candidate_list">
																
																	'.$candidate.'
																
															</div>
														</div>
                                                    </div>
                                                    
                                                    ';

                                        
						

                                        $candidate = '';
									}
				        		?>
					
								
				        		<div class="text-center">
					        		<button type="button" class="btn btn-success btn-flat" id="preview"><i class="fa fa-file-text"></i> Preview</button> 
					        		<button type="submit" class="btn btn-primary btn-flat" name="vote"><i class="fa fa-check-square-o"></i> Submit</button>
					        	</div>
				        	</form>

				        	<!-- End Voting Ballot -->
				    		<?php
				    	}

				    ?>
	        	<!-- </div> -->



	        </div>




	      </section>	  
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/ballot_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

	// $('.content').iCheck({
	// 	checkboxClass: 'icheckbox_flat-green',
	// 	radioClass: 'iradio_flat-green'
	// });

	$(document).on('click', '.reset', function(e){
	    e.preventDefault();
	    var desc = $(this).data('desc');
	    $('.'+desc).iCheck('uncheck');
	});

	$(document).on('click', '.platform', function(e){
		e.preventDefault();
		$('#platform').modal('show');
		var platform = $(this).data('platform');
		var fullname = $(this).data('fullname');
		$('.candidate').html(fullname);
		$('#plat_view').html(platform);
	});

	$('#preview').click(function(e){
		e.preventDefault();
		var form = $('#ballotForm').serialize();
		if(form == ''){
			$('.message').html('You must vote atleast one candidate');
			$('#alert').show();
		}
		else{
			$.ajax({
				type: 'POST',
				url: 'preview.php',
				data: form,
				dataType: 'json',
				success: function(response){
					if(response.error){
						var errmsg = '';
						var messages = response.message;
						for (i in messages) {
							errmsg += messages[i]; 
						}
						$('.message').html(errmsg);
						$('#alert').show();
					}
					else{
						$('#preview_modal').modal('show');
						$('#preview_body').html(response.list);
					}
				}
			});
		}
		
	});

});

</script>
</body>
</html>


