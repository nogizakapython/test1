<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY56</title>
  <style type="text/css">
     table,td,tr {
      border:solid black 1px;
      color:#F0F;
     } 
     table {
      width:200px;
      background-color:#FF9 ;
     }
     caption {
      text-align:left;
     }
     
  </style>  
</head>
<body>
  <table>
  <caption>商品一覧</caption>
     <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>カテゴリー名</th>
     </tr>
     <?php foreach ($product_data as $value) { ?>
      <tr>
        <td><?php print $value['product_name']; ?></td>
        <td><?php print $value['price']; ?></td>
        <td><?php print $value['category_name']; ?></td>
      </tr>  
    <?php } ?>  
  </table>
</body>
</html>