SELECT
  a.baju_id   AS baju_id,
  w.warna_nama AS Warna,
  mf.motif_nama AS motif,
  -- a.baju_nama AS baju_nama,
  m.size_id       AS size_id,
  IF(m.masuk_jumlah IS NULL,0,SUM(m.masuk_jumlah)) AS masuk
FROM baju a
   LEFT JOIN masuk m
     ON (a.baju_id = m.baju_id)

LEFT JOIN motif mf
ON (a.motif_id = mf.motif_id)

LEFT JOIN warna w
ON (a.warna_id = w.warna_id)

GROUP BY a.baju_id,m.size_id