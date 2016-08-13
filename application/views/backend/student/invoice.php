Regarder ici toutes vos factures et paiments, vous pouvez exporter en PDF ou imprimer les factures.<br>
N'hésitez pas à nous signaler des erreurs en écrivrant à l'administrateur un message depuis 
<a href="<?php echo base_url(); ?>index.php?student/message/message_new"> Message </a>. 
</hr>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('invoice/payment_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                            <th><div><?php echo get_phrase('student');?></div></th>
                            <th><div><?php echo get_phrase('title');?></div></th>
                            <th><div><?php echo get_phrase('description');?></div></th>
                            <th><div><?php echo get_phrase('total');?></div></th>
                            <th><div><?php echo get_phrase('amount_paid');?></div></th>
                            <th><div><?php echo get_phrase('due');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('date');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
					</thead>
                    <tbody>
                    	<?php foreach($invoices as $row):?>
                        <tr>
                            <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['amount_paid'];?></td>
                            <td><?php echo $row['due'];?></td>

                            <td>
                                <span class="badge badge-<?php  
                                    if($row['status']=='payé')echo 'success'; 
                                    if($row['status']=='non payé')echo 'danger';
                                    if($row['status']=='avance')echo 'warning';?>">
                                    <?php echo $row['status'];?>
                                </span>
                            </td>
                                                   

                            <td><?php echo $row['creation_timestamp'];?></td>
							<td>
                            <?php echo form_open('student/invoice/make_payment');?>
                                	<input type="hidden" name="invoice_id" 		value="<?php echo $row['invoice_id'];?>" />
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id'];?>');">
                                                <i class="entypo-credit-card"></i>
                                                    Voir la facture
                                            </a>
                                </form>
                                
                            
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			
            
		</div>
	</div>
</div>

