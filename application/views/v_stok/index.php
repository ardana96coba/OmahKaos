<div class="row clearfix">

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

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> <?= strtoupper($judul)?> </h2>
            </div>

            <div class="header">
           <!--      <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#defaultModal">
                    <i class="material-icons">add</i><span>Tambah</span>
                </button> -->

                <!-- <a href="<?php //echo site_url('laporan/cetak_masuk_industri/' ); ?>" class="btn btn-danger waves-effect">
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
                                
                                <th>TOTAL BAJU</th>      
                                <th>FOTO</th>      
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <?php foreach($stok_view as $row){ ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $row->motif ?> - <?= $row->warna ?></td>
                                <td> <?= $row->size_id ?></td>
                                <td><?= $row->total_saldo ?></td>
                               
                                
                              <td><img width="100" height="75" src="<?php echo base_url('images/baju/');?><?= $row->baju_photo ?>"></td>
                               
                                         
                            </tr>
                             <?php } ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>