<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>design/images/user.png" width="48" height="48" alt="<?= $ses_nama?>" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper($ses_nama) ?></div>
                    <div class="email"><?= $ses_username?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>users"><i class="material-icons">person</i>Users</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>login"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">

                    <?php if($ses_level == 'admin') { ?>
                   <li class="header">MENU UTAMA</li>

                    <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>MASTER</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>warna">Warna</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>motif">Motif</a>
                            </li>
                            <li >
                                <a href="<?php echo base_url(); ?>baju">Baju</a>
                            </li>
                        
                            
                        </ul>
                    </li>


                    <li>
                        <a href="<?php echo base_url(); ?>masuk">
                            <i class="material-icons">reorder</i>
                            <span>PEMASUKAN</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>keluar">
                            <i class="material-icons">reorder</i>
                            <span>PENJUALAN</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>total">
                            <i class="material-icons">assignment</i>
                            <span>TOTAL SALDO</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>stok/index/5">
                            <i class="material-icons">assignment</i>
                            <span>Stock</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>pembayaran">
                            <i class="material-icons">attach_money</i>
                            <span>PEMBAYARAN</span>
                        </a>
                    </li>

                    <?php } ?>

                     
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">RESELLER APP</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>