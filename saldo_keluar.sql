SELECT
  k.baju_id   AS baju_id,
  b.baju_photo AS baju_photo,
  w.warna_nama AS warna,
  mf.motif_nama AS motif,
  -- a.baju_nama AS baju_nama,
  k.size_id       AS size_id,
  IF(k.keluar_jumlah IS NULL,0,SUM(k.keluar_jumlah)) AS keluar
FROM keluar k
   LEFT JOIN baju b
     ON (b.baju_id = k.baju_id)

LEFT JOIN motif mf
ON (b.motif_id = mf.motif_id)

LEFT JOIN warna w
ON (b.warna_id = w.warna_id)

WHERE k.pending = 'T'

GROUP BY b.baju_id,k.size_id

