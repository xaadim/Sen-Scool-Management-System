<?php
$teacher_info	=	$this->crud_model->get_teacher_info($param2);
foreach($teacher_info as $row):?>

<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-3">
			
			<a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" 
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

                    <?php if($row['teacher_id'] != ''):?>
                    <tr>
                        <td>Identifiant</td>
                        <td><b><?php echo $row['teacher_id'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['name'] != ''):?>
                    <tr>
                        <td>Nom</td>
                        <td><b><?php echo $row['name'];?></b></td>
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
                        <td>Addresse</td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    
                    
                </table>
			</div>
		</div>	
            <div class="col-sm-offset-3 col-sm-5">
                <button href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_edit/<?php echo $row['teacher_id'];?>');"
                class="btn btn-info">Modifier la fiche <i class="entypo-pencil"></i></button>
            </div>	
	</section>
	
	
	
</div>


<?php endforeach;?>