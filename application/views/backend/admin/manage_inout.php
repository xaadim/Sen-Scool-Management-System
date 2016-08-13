Cette page vous permet de gérer les pointages des professeurs.</br>
Seuls les administrateurs ont accès à cette page. Une feuille de calcule Excel est utilisée dans cette et est hébergée par une application externe.
Toutes les modifications faites dans la feuille seront automatiquement enregistrées. 

</hr>

<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>#</div></th>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div>Gérer les heures</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $teachers   =   $this->db->get('teacher' )->result_array();
                                foreach($teachers as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <?php   if ($row['teacher_id'] == $row['teacher_id'] ) {
                                            echo  $row['name'];
                                        }
                                        else echo 'false';
                                    ;?>
                                    <a href="uploads/teacher_file/<?php echo $row['teacher_id'].'.php'?>" class="btn btn-info" style="float:right">Gérer les horaires</a> 

                            </td>
                            
                        <?php endforeach;?>
                    </tbody>
                </table>