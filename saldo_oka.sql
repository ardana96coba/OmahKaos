SELECT 
m.baju_id AS baju_id,
mf.motif_nama AS motif,
b.baju_photo AS baju_photo,
w.warna_nama AS warna,
m.size_id,
IF(k.keluar IS NULL,m.masuk, m.masuk - k.keluar) AS total_saldo

FROM s_masuk m

LEFT JOIN s_keluar k
	ON m.baju_id = k.baju_id AND m.size_id = k.size_id
LEFT JOIN baju b
	ON m.baju_id = b.baju_id
LEFT JOIN motif mf
	ON b.motif_id = mf.motif_id
LEFT JOIN warna w
	ON b.warna_id = w.warna_id
