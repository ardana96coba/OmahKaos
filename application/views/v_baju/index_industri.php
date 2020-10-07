<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> <?= strtoupper($judul)?> </h2>
            </div>

            <div class="header">
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#defaultModal">
                    <i class="material-icons">add</i><span>Tambah Baju</span>
                </button>

                <!-- <a href="<?php //echo site_url('laporan/cetak_baju_industri/' ); ?>" class="btn btn-danger waves-effect">
                    <i class="material-icons">print</i>
                    <span> Cetak </span>
                </a> -->
            </div>

            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA BAJU</th>
                                <th>MOTIF BAJU</th>
                                <th>WARNA BAJU</th>
                                <th>PHOTO BAJU</th>
                                
                                <th>AKSI</th>            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <?php foreach($baju_view as $row){ ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $row->motif_nama ?> - <?= $row->warna_nama ?></td>
                                <td><?= $row->motif_nama ?></td>
                                <td><?= $row->warna_nama ?></td>
                                
                              
                                <td><img width="100" height="75" src="<?php echo base_url('images/baju/');?><?= $row->baju_photo ?>"></td>
                                <td>
                                    <a href="<?= site_url('baju/baju_edit/'.$row->baju_id); ?>" 
                                       class="btn btn-warning waves-effect btn-xs">
                                       <i class="material-icons">edit</i></a> 
                                    <a href="<?= site_url('baju/baju_delete/'.$row->baju_id); ?>" 
                                       class="btn btn-danger waves-effect btn-xs" 
                                       onclick="return confirm('Apakah Anda Yakin Menghapus Baju <?= $row->motif_nama ?> <?= $row->warna_nama ?> ?')">
                                       <i class="material-icons">close</i></a>

                                    <a href="<?= site_url('baju/baju_edit_photo/'.$row->baju_id); ?>" 
                                       class="btn btn-info waves-effect btn-xs">
                                       <i class="material-icons">add_a_photo</i></a>   
                                </td>              
                            </tr>
                             <?php } ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"> TAMBAH <?= strtoupper($judul)?> BARU</h4>
            </div>
            <div class="modal-body">

            <?php echo form_open_multipart('baju/baju_add'); ?>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="baju_id" id="baju_id" required="required" class="form-control" value="<?= $baju_id ?>">
                            <label class="form-label">baju ID</label>
                        </div>
                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="motif_id" id="motif_id" required="required" class="form-control show-tick" data-live-search="true">
                                <option value="">-- PILIH MOTIF Baju --</option>
                                <?php foreach ($motif_view as $row) {  ?>
                                <option value="<?= $row->motif_id ?>"><?= $row->motif_nama ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="warna_id" id="warna_id" required="required" class="form-control show-tick" data-live-search="true">
                                <option value="">-- PILIH WARNA --</option>
                                <?php foreach ($warna_view as $row) {  ?>
                                <option value="<?= $row->warna_id ?>"><?= $row->warna_nama ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="baju_jenis" id="baju_jenis" required="required" class="form-control show-tick">
                                <option value="">-- PILIH JENIS --</option>
                                <option value="GAMIS">GAMIS</option>
                                <option value="ANAK">BAJU ANAK</option>
                             
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="baju_genre" id="baju_genre" required="required" class="form-control show-tick">
                                <option value="">-- PILIH GENRE --</option>
                                <option value="L">LAKI - LAKI</option>
                                <option value="P">PEREMPUAN</option>
                             
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="baju_harga" id="baju_harga" required="required" class="form-control" >
                            <label class="form-label">HARGA BAJU</label>
                        </div>
                    </div>

                    <label>UPLOAD FILE - PHOTO</label>
                        <div class="form-group">
                                <input type="file" name="filephoto">
                        </div>

                    <div class="form-group"><div class="form-line"></div></div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                <button type="reset" class="btn btn-danger waves-effect">Reset</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
