SELECT
  category_id
  , count(*) AS '商品数'
FROM
  product
GROUP BY
  category_id;