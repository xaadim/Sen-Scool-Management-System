Cette page permet de gérer les uniformes. Vous pouvez ajouter des catégories
depuis la page <a href="<?php echo base_url();?>index.php?admin/uniformes_category">Catégorie des uniformes</a><br>
<b>Conseil: Ne pas mettre d'espaces, ni de virgules ou de points pour séparer les milles.</b></br>
<b>Exemple: </b>Ecrivez <b>10000</b> au lieu de <b>10 000 ou 10.000 ou 10,000</b>. </br>
<b>NB:</b> Le FCFA est automatiquement ajouté à la facture, inutile de le mettre.

</hr>
<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/uniformes_add/');" 
class="btn btn-primary pull-right">
<i class="entypo-plus-circled"></i>
<?php echo get_phrase('add_uniformes_type');?>
</a> 
<br><br>
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('category_uniformes');?></div></th>
            <th><div><?php echo get_phrase('price_on');?></div></th>
            <th><div><?php echo get_phrase('number');?></div></th>
            <th><div><?php echo get_phrase('total_price');?></div></th>
            <th><div><?php echo get_phrase('options');?></div></th>
        </tr>
    </thead>
    <tbody>
         <?php 
            $uniformes   =   $this->db->get('uniformes' )->result_array();
            foreach($uniformes as $row):?>
        <tr>
            <td><?php echo $count++;?></td>
            <td>
                <?php 
                    if ($row['uniformes_category_id'] != 0 || $row['uniformes_category_id'] != '')
                        echo $this->db->get_where('uniformes_category' , array('uniformes_category_id' => $row['uniformes_category_id']))->row()->name;
                ?>
            </td>
            <td><?php echo number_format($row['price'], 0, '.', ' ').' FCFA';?></td>
            <td><?php echo $row['number'];?></td>
            <td><?php echo number_format($row['price'] * $row['number'], 0, '.', ' ').' FCFA';?></td>
            <td>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        
                        <!-- UNIFORMES EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/uniformes_edit/<?php echo $row['uniformes_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                        </li>
                        <li class="divider"></li>
                        
                        <!-- UNIFORMES DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/uniformes/delete/<?php echo $row['uniformes_id'];?>');">
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



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        

        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [
                    
                    {
                        "sExtends": "xls",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(6, false);
                            
                            this.fnPrint( true, oConfig );
                            
                            window.print();
                            
                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(0, true);
                                      datatable.fnSetColumnVis(6, true);
                                  }
                            });
                        },
                        
                    },
                ]
            },
            
        });
        
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
        
</script>

