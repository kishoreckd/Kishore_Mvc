<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Lists</title>
    <link rel="stylesheet" href="./views/products/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
    
</head>
<body>
<table>
<tr>
        <th rowspan>id</th>
        <th>Product_name</th>
        <th>Price</th>
        <th>Image</th>
        <th>SKU</th>
        <th>Brand</th>
        <th>Manufactured</th>
        <th>Available_Stock</th>
        <th>edit</th>



</tr>
        <?php foreach ($allproducts as $index => $product):?>

    <tr>
        <td><?php echo $index+1?></td>
        <td><?php echo $product->product_name?></td>
        <td><?php echo $product->price?></td>
        <td><img class="productimage" src="<?php echo $product->image?>"></td>
        <td><?php echo $product->sku?></td>
        <td><?php echo $product->brand?></td>
        <td><?php echo $product->manufactured?></td>
        <td><?php echo $product->availabe_stock?></td>
        <td>
            <form action="/view" method="post">
                <input type="hidden" name="view" value="<?php echo $product->id?>">
                <button type="submit" name="action"  value="view"><i class="fas fa-edit"></i>
            </button>
            </form>

            <form action="/delete" method="post">
            <input type="text" name="delete" value="<?php echo $product->id?>">
            <button type="submit" name ="action" value ="delete">delete</button>

            </form>
        </td>

    </tr>

    <?php endforeach;?>
<!--<a href="./views/user/create.php"> create new one</a>-->

<form action="/create" method="post">
    <button type ="submit"  >Create new one</button>
</form>
    
   

</table>
  

</body>
</html>