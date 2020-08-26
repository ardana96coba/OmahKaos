        <style>

        .header {
            text-align: center;
        }

        .footer {
            text-align: center;
            padding-top: 30px;
            font-size: 9px;
        }

        table {
            color: #232323;
            border-collapse: collapse;
        }

        th{
            text-align: center;
        }

        table, th, td {
            border: 1px solid #000;
            font-size: 11px;
            border-spacing: 0;
            margin-left: 20px;
        }


        table td {
          padding: 5px 5px;
        }

        hr {
            border: 0.5px solid #ffcc00;
        }

        </style>

        <div class="header">
            <h2> LAPORAN <br> PRODUK INDUSTRI</h2>
        </div>
        <table align="center">
             <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PRODUK</th>
                    <th>KATEGORI</th>
                    <th>HARGA TOKO</th>
                    <th>STOK</th>
                    <th>INFO PRODUK</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                <?php foreach($industri_view as $row){ ?> 
 
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= strtoupper($row->produk_nama) ?></td>
                    <td><?= strtoupper($row->kategori_nama) ?></td>
                    <td><?= strtoupper($row->produk_harga_toko) ?></td>
                    <td><?= strtoupper($row->produk_stok) ?></td>
                    <td><?= strtoupper($row->produk_info) ?></td>
                </tr> 
                <?php } ?>

                      
            </tbody>
        </table>

        <div class="footer">
            <small> INDUSTRI &copy; <?= date('Y') ?>. All Right Reserverd</small>
        </div>