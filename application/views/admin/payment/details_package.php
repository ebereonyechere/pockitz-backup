<div class="row">
   <div class="col-md-12">
     <div class="card">
       <div class="card-header">
         <h3 class="card-title"><i class="fa fa-binoculars"></i> <?php echo $this->lang->line("details")." - ".$this->lang->line("package settings"); ?></h3>
       </div><!-- /.box-header -->

         <div class="card-content">
             <div class="card-body">

                 <!-- form start -->
                 <form class="form-horizontal">
                     <div class="form-group">
                         <label class="col-sm-2 control-label" for="name">  </label>
                         <div class="col-sm-10 col-md-6 col-lg-6" style="padding-top:7px">
                             <h3><?php echo $this->lang->line("package name")?> :
                                 <?php echo $value[0]["package_name"];?> @
                                 <?php echo $payment_config[0]['currency']; ?> <?php echo $value[0]["price"];?> /
                                 <?php echo $value[0]["validity"];?> <?php echo $this->lang->line("days")?>
                             </h3>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-2 control-label" for=""></label>
                         <div class="col-sm-10 table-responsive">

                             <table class="table table-bordered table-condensed table-hover table-striped" style="width:auto;">
                                 <tr>
                                     <td colspan="3" align="center"><?php echo $this->lang->line("0 means unlimited");?></td>
                                 </tr>
                                 <?php

                                 $current_modules=array();
                                 $current_modules=explode(',',$value[0]["module_ids"]);
                                 $monthly_limit=json_decode($value[0]["monthly_limit"],true);
                                 $bulk_limit=json_decode($value[0]["bulk_limit"],true);

                                 echo "<tr>";
                                 echo "<th class='text-center success'>";
                                 echo $this->lang->line("modules");
                                 echo "</th>";
                                 echo "<th class='text-center success' colspan='2'>";
                                 echo $this->lang->line("Analysis Limit");
                                 echo "</th>";
                                 // echo "<th class='text-center success' colspan='2'>";
                                 //   echo $this->lang->line("Bulk Limit");
                                 // echo "</th>";
                                 echo "</tr>";

                                 foreach($modules as $module)
                                 {

                                     if(in_array($module["id"],$current_modules))
                                     {
                                         echo "<tr>";
                                         echo "<td>";
                                         echo "<b>".$this->lang->line($module['module_name'])."</b>";
                                         echo "</td>";

                                         $xmonthly_val=0;
                                         $xbulk_val=0;

                                         if(in_array($module["id"],$current_modules))
                                         {
                                             $xmonthly_val=$monthly_limit[$module["id"]];
                                             $xbulk_val=$bulk_limit[$module["id"]];
                                         }

                                         if(in_array($module["id"],array(36,37)))
                                         {
                                             $type="hidden";
                                             $limit="";

                                         }
                                         else
                                         {
                                             $type="number";
                                             if($module["id"]=="1") $limit=$this->lang->line("Limit");
                                             else $limit=$module['extra_text'];
                                         }

                                         echo "<td style='padding-left:10px'>".$limit."</td><td><input type='".$type."' disabled='disabled' value='".$xmonthly_val."' style='width:70px;' name='monthly_".$module['id']."'></td>";
                                         echo "</tr>";
                                     }
                                 }
                                 ?>
                             </table>
                             <span class="red" ><?php echo "<br/><br/>".form_error('modules'); ?></span>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
   </div>
</div>

<style type="text/css" media="screen">
  td,th{background:#fff}
</style>