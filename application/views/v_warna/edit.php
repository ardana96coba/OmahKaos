<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= strtoupper($judul)?></h2>
            </div>

            <div class="body">
            <?php echo form_open('warna/warna_update/'.$warna['warna_id']); ?>

                <div class="form-group form-float">
                         <div class="form-line">
                            <input type="text" name="warna_nama" id="warna_nama" required="required" value="<?php echo $warna['warna_nama'];  ?>" class="form-control">
                            <label class="form-label">NAMA warna</label>
                        </div>
                    </div>
                
                <button class="btn btn-primary waves-effect" type="submit">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>