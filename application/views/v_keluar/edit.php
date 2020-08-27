<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= strtoupper($judul)?></h2>
            </div>

            <div class="body">
            <?php echo form_open('keluar/keluar_update/'.$keluar['keluar_id']); ?>

              <!--   <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="keluar_id" id="keluar_id" required="required" value="<?php echo $keluar['keluar_id'];  ?>" class="form-control" readonly>
                            <label class="form-label">ID keluar</label>
                        </div>
                    </div> -->
                    
                    <label class="form-label">BAJU</label>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="baju_id" id="baju_id" required="required" class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH BAJU --</option>
                                <?php
                                foreach($baju_view as $row)
                                {
                                  $selected = "";
                                  if($row->baju_id == $keluar['baju_id'])
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
                        <select name="size_id" id="size_id" required="required" class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH SIZE --</option>
                                <?php
                                foreach($size_view as $row)
                                {
                                  $selected = "";
                                  if($row->size_id == $keluar['size_id'])
                                    $selected = 'selected="selected"';

                                  echo "<option value='".$row->size_id."' $selected> &nbsp; &nbsp;" .$row->size_nama.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="form-group form-float">
                    <label>Status</label>
                    <div class="demo-radio-button">

                         <?php if ($keluar['pending'] == "Y") { ?>
                        <input name="pending" type="radio" id="pending_1" value="Y" checked />
                        <label for="pending_1">Pending</label>
                        <input name="pending" type="radio" id="pending_2" value="T"/>
                        <label for="pending_2">Tidak</label>
                        <?php }else { ?>

                        <input name="pending" type="radio" id="pending_1" value="Y" />
                        <label for="pending_1">Pending</label>
                        <input name="pending" type="radio" id="pending_2" value="T" checked />
                        <label for="pending_2">Tidak</label>
                    <?php }?>

                        
                    </div>
                    
                </div>

                 <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="keluar_jumlah" id="keluar_jumlah" required="required" class="form-control" value="<?php echo $keluar['keluar_jumlah'];  ?>">
                            <label class="form-label">JUMLAH</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="keluar_buyer" id="keluar_buyer" required="required" class="form-control" value="<?php echo $keluar['keluar_buyer'] ?>">
                            <label class="form-label">BUYER</label>
                        </div>
                    </div>



                <a href="<?= site_url('keluar'); ?>" 
                                       class="btn btn-danger waves-effect btn-xs">
                                       <i class="material-icons">close</i></a>

                
                <button class="btn btn-primary waves-effect" type="submit">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>