Cette page permet de gérer les années scolaires. L'année scolaire activée sera celle qui sera envoyé en base de donnée dans la saisie <br>
des informations comme les nouvelles inscriptions, les réinscriptions, les paiements ... <br>
Vous pouvez ajouter, modifier ou supprimer les années

<hr />
<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    Liste des années scolaires
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    Ajouter une année scolaire
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
             <div class="tab-pane box active" id="list">
                
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div>Nom</div></th>
                            <th><div>Début</div></th>
                            <th><div>Fin</div></th>
                            <th><div>Etat</div></th>
                            <th><div>Options</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;foreach($scholar_year as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['start'];?></td>
                            <td><?php echo $row['end'];?></td>
                            <td>
                                <?php if ($row['active'] == 1):?>
                                    <span align="center">
                                      <span class="badge badge-success">Activé</span>  
                                    </span>
                                <?php endif;?>
                                <?php if ($row['active'] == 0):?>
                                    <span align="center">
                                      <span class="badge badge-danger"></span>  
                                    </span>
                                <?php endif;?>                            
                            </td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_scholar_year/<?php echo $row['id_scholar_year'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/scholar_year/delete/<?php echo $row['id_scholar_year'];?>');">
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
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/scholar_year/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nom de l'année scolaire</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Début de l'année</label>
                                <div class="col-sm-5">
                                    <select name="start" class="form-control" style="width:100%;">
                                        <option value="Janvier">Janvier</option>
                                        <option value="Février">Février</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Avril">Avril</option>
                                        <option value="Mai">Mai</option>
                                        <option value="Juin">Juin</option>
                                        <option value="Juillet">Juillet</option>
                                        <option value="Août">Août</option>
                                        <option value="Septembre">Septembre</option>
                                        <option value="Octobre">Octobre</option>
                                        <option value="Novembre">Novembre</option>
                                        <option value="Décembre">Décembre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Fin de l'année</label>
                                <div class="col-sm-5">
                                    <select name="end" class="form-control" style="width:100%;">
                                        <option value="Janvier">Janvier</option>
                                        <option value="Février">Février</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Avril">Avril</option>
                                        <option value="Mai">Mai</option>
                                        <option value="Juin">Juin</option>
                                        <option value="Juillet">Juillet</option>
                                        <option value="Août">Août</option>
                                        <option value="Septembre">Septembre</option>
                                        <option value="Octobre">Octobre</option>
                                        <option value="Novembre">Novembre</option>
                                        <option value="Décembre">Décembre</option>
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-3 control-label">Choisir comme année en cours</label>
                                <div class="col-sm-5">
                                
                                    <select name="active" class="form-control" style="width:100%;">
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-success"><?php echo get_phrase('save');?></button>
                              </div>
                            </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->
            
        </div>
    </div>
</div>