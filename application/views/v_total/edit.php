<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= strtoupper($judul)?></h2>
            </div>

            <div class="body">
            <?php echo form_open('masuk/masuk_update/'.$masuk['masuk_id']); ?>

              <!--   <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="masuk_id" id="masuk_id" required="required" value="<?php echo $masuk['masuk_id'];  ?>" class="form-control" readonly>
                            <label class="form-label">ID masuk</label>
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
                        <select name="size_id" id="size_id" required="required" class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH SIZE --</option>
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

                 <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="masuk_jumlah" id="masuk_jumlah" required="required" class="form-control" value="<?php echo $masuk['masuk_jumlah'];  ?>">
                            <label class="form-label">JUMLAH</label>
                        </div>
                    </div>

                
                <button class="btn btn-primary waves-effect" type="submit">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>