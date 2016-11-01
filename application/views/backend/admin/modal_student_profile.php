<?php
$student_info	=	$this->crud_model->get_student_info($param2);
foreach($student_info as $row):?>

<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-3">
			
			<a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 
                	class="img-responsive img-circle" />
			</a>
			
		</div>
		
		<div class="col-sm-9">
			
			<ul class="profile-info-sections">
				<li style="padding:0px; margin:0px;">
					<div class="profile-name">
							<h3><?php echo $row['name'];?></h3>
					</div>
				</li>
			</ul>
			
		</div>
		
		
	</header>
	
	<section class="profile-info-tabs">
		
		<div class="row">
			
			<div class="">
            		<br>
                <table class="table table-bordered">

                    <?php if($row['student_id'] != ''):?>
                    <tr>
                        <td>Matricule</td>
                        <td><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->matricule; ?></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['class_id'] != ''):?>
                    <tr>
                        <td>Classe</td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['section_id'] != '' && $row['section_id'] != 0):?>
                    <tr>
                        <td>Séction</td>
                        <td><b><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['birthday'] != ''):?>
                    <tr>
                        <td>Date de naissance</td>
                        <td><b><?php echo $row['birthday'];?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['place_of_birth'] != ''):?>
                    <tr>
                        <td>Lieu de naissance</td>
                        <td><b><?php echo $row['place_of_birth'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['sex'] != ''):?>
                    <tr>
                        <td>Sexe</td>
                        <td><b><?php echo $row['sex'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                
                    <?php if($row['phone'] != ''):?>
                    <tr>
                        <td>Téléphone</td>
                        <td><b><?php echo $row['phone'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['email'] != ''):?>
                    <tr>
                        <td>E-mail</td>
                        <td><b><?php echo $row['email'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['address'] != ''):?>
                    <tr>
                        <td>Address</td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    <!-- <?php if($row['parent_id'] != ''):?> -->
                    <?php if($row['parent_name'] != ''):?>
                    <tr>
                        <td>Noms des parents</td>
                        <td><b><?php echo $row['parent_name'];?></b></td>
                        <!-- <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->name;?></b></td> -->
                    </tr>
                    <?php endif;?>
                    <?php if($row['parent_phone'] != ''):?>
                    <tr>
                        <td>Téléphone des parents</td>
                        <td><b><?php echo $row['parent_phone'];?></b></td>
                        <!-- <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;?></b></td> -->
                    </tr>
                    <?php endif;?>
                    <tr>
                        <td>Transport de l'élève</td>
                        <td><b><?php echo $this->db->get_where('transport' , array('transport_id' => $row['transport_id']))->row()->route_name;?></b></td>
                    </tr>
                    <?php endif;?>
                    
                </table>
			</div>
		</div>	
            <div class="col-sm-offset-3 col-sm-5">
                <button  href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');"
                class="btn btn-info">Modifier la fiche <i class="entypo-pencil"></i></button>
            </div>	
	</section>
	
	
	
</div>


<?php endforeach;?>