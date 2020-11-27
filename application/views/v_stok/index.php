<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= strtoupper($judul)?></h2>
            </div>

            <div class="body">
            <?php echo form_open('stok/view/'); ?>

            
                    
                <label class="form-label">BAJU</label>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="baju_id" id="baju_id"  class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH BAJU --</option>
                                <?php
                                foreach($baju_view as $row)
                                {
                                  $selected = "";
                                  if($row->baju_id == $masuk['baju_id'])
                                    $selected = 'selected="selected"';

                                  echo "<option value='".$row->baju_id."' $selected> &nbsp; &nbsp;" .$row->motif_nama.' - '.$row->warna_nama.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>

                 <label class="form-label">SIZE</label>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="size_id" id="size_id" class="form-control show-tick" data-live-search="true">
                            <option value=0>-- PILIH SIZE --</option>
                                <?php
                                foreach($size_view as $row)
                                {
                                  $selected = "";
                                  if($row->size_id == $masuk['size_id'])
                                    $selected = 'selected="selected"';

                                  echo "<option value='".$row->size_id."' $selected> &nbsp; &nbsp;" .$row->size_nama.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>


                
                <button class="btn btn-primary waves-effect" type="submit">Cari</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>


    <?php foreach($stok_view as $row){ ?>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?= $row->motif ?> - <?= $row->warna ?> 
                </h2>
                
            </div>
            <div align="center">
               <img  width="200" height="200" src="<?php echo base_url('images/baju/');?><?= $row->baju_photo ?>"> 
            </div>
            
            <div class="body">
               <table>
                   <tr>
                       <td> STOK</td>
                       <td> : </td>
                       <td><?= $row->total_saldo ?></td>
                   </tr>

                   <tr>
                       <td> SIZE</td>
                       <td> : </td>
                       <td><?= $row->size_id ?></td>
                   </tr>

               </table>
            </div>
        </div>
    </div>


    <?php } ?>
</div>

<div class="row clearfix">

    

    
</div>