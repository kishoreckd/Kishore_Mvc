<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Lists</title>
    <link rel="stylesheet" href="./views/products/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>


<form action="/create" method="post"><button type ="submit" class="btn btn-primary"  >Create new one</button>
</form>
<table class="table table-hover">
<tr>
        <th scope="col"rowspan>id</th>
        <th scope="col">Product_name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">SKU</th>
        <th scope="col">Brand</th>
        <th scope="col">Manufactured</th>
        <th scope="col">Available_Stock</th>
        <th scope="col">edit</th>
    <th scope="col">delete</th>




</tr>
        <?php foreach ($allproducts as $index => $product):?>

    <tr>
        <td><?php echo $index+1?></td>
        <td><?php echo $product->product_name?></td>
        <td>₹<?php echo $product->price?></td>
        <td><img class="productimage" src="<?php echo $product->image?>"></td>
        <td><?php echo $product->sku?></td>
        <td><?php echo $product->brand?></td>
        <td><?php echo $product->manufactured?></td>
        <td id="stocks"><?php echo $product->availabe_stock?>
<!--            --><?php //if( $product->availabe_stock < 10):?>
<!--                < p> --><?php //echo "*low quantity*" ?><!-- </p>-->
<!--            --><?php //endif; ?>
        </td>
        <td>
            <form action="/view" method="post">
                <input type="hidden" name="view" class="" value="<?php echo $product->id?>">
                <button type="submit" name="action" class="btn btn-success" value="view"><i class="fas fa-edit"></i>
            </button>
            </form>
        </td>
        <td>
            <form action="/delete" method="post">
            <input type="hidden" name="delete"  value="<?php echo $product->id?>">
            <button type="submi8t" name ="action" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>
            </button>

            </form>
        </td>

    </tr>

    <?php endforeach;?>

</table>

<script type="text/javascript">
    let all_stocks =  document.querySelectorAll("#stocks")
    all_stocks.forEach(element=>{
        console.log(element);
        if(Number(element.innerText)<10){
            element.parentElement.classList.remove();
            element.parentElement.classList.add("table-danger")
        }

    })
</script>
</body>

</html>