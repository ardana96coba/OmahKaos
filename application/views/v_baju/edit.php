<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= strtoupper($judul)?></h2>
            </div>

            <div class="body">
            <?php echo form_open('baju/baju_update/'.$baju['baju_id']); ?>

                <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="baju_id" id="baju_id" required="required" value="<?php echo $baju['baju_id'];  ?>" class="form-control" readonly>
                            <label class="form-label">ID BAJU</label>
                        </div>
                    </div>
                    
                    <label class="form-label">MOTIF</label>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="motif_id" id="motif_id" required="required" class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH MOTIF --</option>
                                <?php
                                foreach($motif_view as $row)
                                {
                                  $selected = "";
                                  if($row->motif_id == $baju['motif_id'])
                                    $selected = 'selected="selected"';

                                  echo "<option value='".$row->motif_id."' $selected> &nbsp; &nbsp;" .$row->motif_nama.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>

                 <label class="form-label">WARNA</label>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="warna_id" id="warna_id" required="required" class="form-control show-tick" data-live-search="true">
                            <option value="">-- PILIH WARNA --</option>
                                <?php
                                foreach($warna_view as $row)
                                {
                                  $selected = "";
                                  if($row->warna_id == $baju['warna_id'])
                                    $selected = 'selected="selected"';

                                  echo "<option value='".$row->warna_id."' $selected> &nbsp; &nbsp;" .$row->warna_nama.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                </div>

                    <label class="form-label">Jenis</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="baju_jenis" id="baju_jenis" required="required" class="form-control show-tick">

                                <?php if ($baju['baju_jenis'] == "GAMIS") { ?>
                                <option value="">-- PILIH JENIS --</option>
                                <option value="GAMIS" selected="selected">GAMIS</option>
                                <option value="ANAK">BAJU ANAK</option>
                                <?php } else { ?>

                                <option value="">-- PILIH JENIS --</option>
                                <option value="GAMIS">GAMIS</option>
                                <option value="ANAK" selected="selected">BAJU ANAK</option>
                                <?php }?>
                             
                            </select>
                        </div>
                    </div>

                    <label class="form-label">GENRE</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="baju_genre" id="baju_genre" required="required" class="form-control show-tick">

                                <?php if ($baju['baju_genre'] == "L") { ?>
                                <option value="">-- PILIH JENIS --</option>
                                <option value="L" selected="selected">LAKI - LAKI</option>
                                <option value="P">PEREMPUAN</option>
                                <?php } else { ?>

                                <option value="">-- PILIH JENIS --</option>
                                <option value="L">LAKI - LAKI</option>
                                <option value="P" selected="selected">PEREMPUAN</option>
                                <?php }?>
                             
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="baju_harga" id="baju_harga" required="required" class="form-control" value="<?php echo $baju['baju_harga'];  ?>">
                            <label class="form-label">HARGA BAJU</label>
                        </div>
                    </div>

               

                <a href="<?= site_url('baju'); ?>" 
                                       class="btn btn-danger waves-effect btn-xs">
                                       <i class="material-icons">close</i></a>
                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>