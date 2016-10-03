<?php
    $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
    $this->db->where('sender', $current_user);
    $this->db->or_where('reciever', $current_user);
    $message_threads = $this->db->get('message_thread')->result_array();
    $ss		=	$this->db->get_where('scholar_year' , array('active' => 1) )->result_array();
    foreach ($message_threads as $row):

    // defining the user to show
    if ($row['sender'] == $current_user)
        $user_to_show = explode('-', $row['reciever']);
    if ($row['reciever'] == $current_user)
        $user_to_show = explode('-', $row['sender']);

    $user_to_show_type = $user_to_show[0];
    $user_to_show_id = $user_to_show[1];
    $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
    ?>
<?php endforeach; ?>

<div class="row">
	<div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
		<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
		<!-- Profile picture -->
        <!-- <div style="width: 50px; height: 50px;">
            <img src="<?php echo $this->crud_model->get_image_url('admin' , $row['admin_id']);?>" alt="...">
        </div> -->
    </div>
	<!-- Raw Links -->
	<div class="col-md-12 col-sm-12 clearfix ">

		<ul class="list-inline links-list pull-right">
			
			<!-- Language Selector 	-->		
           	<!-- <li class="dropdown language-selector">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        <i class="entypo-globe"></i> language
                    </a>
				
				<ul class="dropdown-menu <?php if ($text_align == 'left-to-right') echo 'pull-left'; else echo 'pull-right';?>">
					<?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field)
                            {
                                if($field == 'phrase_id' || $field == 'phrase')continue;
                                ?>
                                    <li class="<?php if($this->session->userdata('current_language') == $field)echo 'active';?>">
                                        <a href="<?php echo base_url();?>index.php?multilanguage/select_language/<?php echo $field;?>">
                                            <img src="assets/images/flag/<?php echo $field;?>.png" style="width:16px; height:16px;" />	
												 <span><?php echo $field;?></span>
                                        </a>
                                    </li>
                                <?php
                            }
                            ?>
                    
				</ul>
				
			</li> -->
			
			<li class="sep"></li>
			
			<li>
				<a href="<?php echo base_url();?>index.php?login/logout">
					Déconnexion <i class="entypo-logout right"></i>
				</a>
			</li>
			<li>
				<a href="#">
					Aide <i class="entypo-help right"></i>
				</a>
			</li>
		</ul>
		
        <ul class="list-inline links-list pull-right">
       <li > <?php foreach ($ss as $hh):?>
		  <a href="<?php echo base_url(); ?>index.php?admin/scholar_year" ><b> <?php echo $hh['name']; ?></b>	</a>	  
		<?php endforeach; ?>
		</li>
        <!-- user  -->			
           	<li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        	<i class="entypo-user"></i> <?php echo $this->session->userdata('name');?>
                        	<span class="badge badge-danger pull-right">
		                        <?php echo $unread_message_number; ?>
		                    </span>
                    </a>


				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/message">
		                <i class="entypo-mail"></i>
		                <?php echo get_phrase('message'); ?>
		                <?php if ($unread_message_number > 0): ?>
		                    <span class="badge badge-danger pull-right">
		                        <?php echo $unread_message_number; ?>
		                    </span>
		                <?php endif; ?>
		            </a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
				<?php if ($account_type == 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo base_url();?>index.php?parents/manage_profile">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php?parents/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
			</li>
        </ul>
        
        
		
	</div>
	
</div>

<hr style="margin-top:0px;" />