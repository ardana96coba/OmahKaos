<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> <?= strtoupper($judul)?> </h2>
            </div>

            <div class="header">
                <a href="<?php echo site_url('laporan/cetak_produk/' ); ?>" class="btn btn-danger waves-effect">
                    <i class="material-icons">print</i>
                     <span> Cetak </span>
                </a>
            </div>

            

            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA PRODUK</th>
                                <th>KATEGORI</th>
                                <th>HARGA TOKO</th>
                                <th>HARGA JUAL</th>
                                <th>STOK</th>          
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <?php foreach($produk_view as $row){ ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $row->produk_nama ?></td>
                                <td><?= $row->kategori_nama ?></td>
                                <td><?= $row->produk_harga_toko ?></td>
                                <td><?= $row->produk_harga_jual ?></td>
                                <td><?= $row->produk_stok ?></td>              
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

            <?php echo form_open('produk/produk_add'); ?>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="produk_nama" id="produk_nama" required="required" class="form-control">
                            <label class="form-label">NAMA PRODUK</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="kategori_id" id="kategori_id" required="required" class="form-control show-tick">
                                <option value="">-- PILIH KATEGORI --</option>
                                <?php foreach ($kategori_view as $row) {  ?>
                                <option value="<?= $row->kategori_id ?>"><?= $row->kategori_nama ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="produk_harga_toko" id="produk_harga_toko" required="required" class="form-control">
                            <label class="form-label">PRODUK HARGA TOKO</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="produk_harga_jual" id="produk_harga_jual" required="required" class="form-control">
                            <label class="form-label">PRODUK HARGA JUAL</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="produk_info" id="produk_info" required="required" class="form-control">
                            <label class="form-label">PRODUK INFO</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="produk_stok" id="produk_stok" required="required" class="form-control">
                            <label class="form-label">PRODUK STOK</label>
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
