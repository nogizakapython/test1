SELECT
  category_id,
  price,
  count(1) AS '商品数'
FROM
  product
GROUP BY
  category_id, price;