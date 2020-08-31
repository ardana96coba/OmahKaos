SELECT
  m.baju_id   AS baju_id,
  b.baju_photo AS baju_photo,
  w.warna_nama AS warna,
  mf.motif_nama AS motif,
  -- a.baju_nama AS baju_nama,
  m.size_id       AS size_id,
  IF(m.masuk_jumlah IS NULL,0,SUM(m.masuk_jumlah)) AS masuk
FROM masuk m
   LEFT JOIN baju b
     ON (b.baju_id = m.baju_id)

LEFT JOIN motif mf
ON (b.motif_id = mf.motif_id)

LEFT JOIN warna w
ON (b.warna_id = w.warna_id)

GROUP BY m.baju_id,m.size_id