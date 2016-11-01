Cette page vous permet de gérer les factures et les paiements des élèves. Vous pouvez créer des factures de paiement complet, d'avance ou créer un</br>
reçu de non paiement qui sera envoyé électroniquement à l'élève et à ses parents pour réclamer  un paiement.</br>
</hr>
<b>Conseil: Ne pas mettre d'espaces, ni de virgules ou de points pour séparer les milles.</b></br>
<b>Exemple: </b>Ecrivez <b>10000</b> au lieu de <b>10 000 ou 10.000 ou 10,000</b>. </br>
<b>NB:</b> Le FCFA est automatiquement ajouté à la facture, inutile de le mettre.

</hr>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('invoice/payment_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_invoice/payment');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                            <th><div>Matricule</div></th>
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
							<td><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->matricule; ?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
                            <td><?php echo $row['title'];?></td>
							<td><?php echo $row['description'];?></td>
                            <td><?php echo number_format($row['amount'], 0, '.', ' ').' FCFA';?></td>
                            <td><?php echo number_format($row['amount_paid'], 0, '.', ' ').' FCFA';?></td>
							<td><?php echo number_format($row['due'], 0, '.', ' ').' FCFA';?></td>
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
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <?php if ($row['due'] != 0):?>

                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-bookmarks"></i>
                                                <?php echo get_phrase('take_payment');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php endif;?>
                                    
                                    <!-- VIEWING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-credit-card"></i>
                                                <?php echo get_phrase('view_invoice');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/invoice/delete/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
            <?php echo form_open(base_url() . 'index.php?admin/invoice/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo get_phrase('invoice_informations');?></div>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                <?php 
                                    $scholar_year = $this->db->get_where('scholar_year' , array('active' => 1) )->result_array();
                                    foreach ($scholar_year as $sy):?>
                                    <input type="hidden" class="form-control" name="id_scholar_year" value="<?php echo $sy['id_scholar_year']; ?>">
                                <?php endforeach; ?>
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="Reçu de paiement"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('month');?></label>
                                    <div class="col-sm-9">
                                        <select name="month" class="form-control">
                                            <?php 
                                            for($i=1;$i<=12;$i++):
                                                if($i==1)$m='Janvier';
                                                else if($i==2)$m='Février';
                                                else if($i==3)$m='Mars';
                                                else if($i==4)$m='Avril';
                                                else if($i==5)$m='Mai';
                                                else if($i==6)$m='Juin';
                                                else if($i==7)$m='Juillet';
                                                else if($i==8)$m='Août';
                                                else if($i==9)$m='Septembre';
                                                else if($i==10)$m='Octobre';
                                                else if($i==11)$m='Novembre';
                                                else if($i==12)$m='Decembre';
                                            ?>
                                                <option value="<?php echo $m;?>"
                                                    <?php if($month==$i)echo 'selected="selected"';?>>
                                                        <?php echo $m;?>
                                                            </option>
                                            <?php 
                                            endfor;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
                                    <div class="col-sm-9">
                                        <select name="student_id" class="form-control" style="" >
                                            <?php 
                                            $this->db->order_by('class_id','asc');
                                            $students = $this->db->get('student')->result_array();
                                            foreach($students as $row):
                                            ?>
                                                <option value="<?php echo $row['student_id'];?>">
                                                    <?php echo $row['name'];?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description" placeholder="Inscription ou Mensualité"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="datepicker form-control" name="date" value="" data-start-view="2"/>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo get_phrase('payment_informations');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('total');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount"
                                            placeholder="<?php echo get_phrase('enter_total_amount');?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment_now');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount_paid"
                                        placeholder="<?php echo get_phrase('enter_amount_paid');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option value="payé"><?php echo get_phrase('paid');?></option>
                                            <option value="avance"><?php echo get_phrase('un_paid');?></option>
                                            <option value="non payé"><?php echo get_phrase('unpaid');?></option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
                                    <div class="col-sm-9">
                                        <select name="method" class="form-control">
                                            <option value="1"><?php echo get_phrase('cash');?></option>
                                            <option value="2"><?php echo get_phrase('check');?></option>
                                            <option value="3"><?php echo get_phrase('card');?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success"><?php echo get_phrase('add_invoice');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>