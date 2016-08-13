Cette page vous permet de consulter les avis et événements diffuser à tout le monde ayant un accès autorisé à l'application <br>
par les administrateurs du système. Merci de les contacter depuis la page <a href="index.php?student/message"> Message </a>si vous avez un avis ou événement à passer à tout le monde<br>
L'avis ou l'évenement sera automatiquement ajoutée dans le calendrier depuis la page d'accueil.<br>
<hr>
<div class="row">
	<div class="col-md-12">

		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('noticeboard_list');?>
                    	</a></li>
		</ul>
    	
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('notice');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($notices as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['notice_title'];?></td>
							<td class="span5"><?php echo $row['notice'];?></td>
							<td><?php echo date('d M,Y', $row['create_timestamp']);?></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
           
			
            
		</div>
	</div>
</div>