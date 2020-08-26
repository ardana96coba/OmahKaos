SELECT 

-- a.barang_id as barang_masuk,
-- b.barang_id AS barng_keluar
a.barang_nama AS NamaBarang,
a.size,
IF(b.keluar IS NULL,a.masuk, a.masuk - b.keluar) AS total_saldo

FROM 

saldo_masuk1 a



 LEFT JOIN saldo_keluar1 b
     ON a.barang_id = b.barang_id AND a.size = b.size
