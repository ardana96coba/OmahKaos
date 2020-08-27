<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> <?= strtoupper($judul)?> </h2>
            </div>

            <div class="header">
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#defaultModal">
                    <i class="material-icons">add</i><span>Tambah</span>
                </button>

                <!-- <a href="<?php //echo site_url('laporan/cetak_keluar_industri/' ); ?>" class="btn btn-danger waves-effect">
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
                                <th>SIZE</th>
                                <th>JUMLAH</th>
                                <th>TANGGAL</th>
                                <th>AKSI</th>            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <?php foreach($keluar_view as $row){ ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $row->motif_nama ?> - <?= $row->warna_nama ?></td>
                                <td> <?= $row->size_nama ?></td>
                                <td><?= $row->keluar_jumlah ?></td>
                                <td><?= $row->keluar_tanggal?></td>
                                
                              
                               
                                <td>
                                    <a href="<?= site_url('keluar/keluar_edit/'.$row->keluar_id); ?>" 
                                       class="btn btn-warning waves-effect btn-xs">
                                       <i class="material-icons">edit</i></a> 
                                    <a href="<?= site_url('keluar/keluar_delete/'.$row->keluar_id); ?>" 
                                       class="btn btn-danger waves-effect btn-xs" 
                                       onclick="return confirm('Apakah Anda Yakin Menghapus?')">
                                       <i class="material-icons">close</i></a>

                                     
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

            <?php echo form_open('keluar/keluar_add'); ?>



                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="baju_id" id="baju_id" required="required" class="form-control show-tick" data-live-search="true">
                                <option value="">-- PILIH BAJU --</option>
                                <?php foreach ($baju_view as $row) {  ?>
                                <option value="<?= $row->baju_id ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->motif_nama ?> - <?= $row ->warna_nama ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="size_id" id="size_id" required="required" class="form-control show-tick" data-live-search="true">
                                <option value="">-- PILIH SIZE --</option>
                                <?php foreach ($size_view as $row) {  ?>
                                <option value="<?= $row->size_id ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->size_nama ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="keluar_jumlah" id="keluar_jumlah" required="required" class="form-control">
                            <label class="form-label">JUMLAH</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="demo-radio-button">
                            <input name="pending" type="radio" id="radio_1" value="Y"checked />
                            <label for="radio_1">Pending</label>
                            <input name="pending" type="radio" id="radio_2" valie="T"/>
                            <label for="radio_2">Tidak</label>
                            
                        </div>
                    </div>


                   
                    
                  

                   

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
