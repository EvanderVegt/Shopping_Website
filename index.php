<?php
session_start();
$product_ids = array();
//session_destroy();

if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {



        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {

            $_SESSION['shopping_cart'][$count] = array
                (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_GET, 'quantity'),
            );
        } else {

            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    } else {
        $_SESSION['shopping_cart'][0] = array
            (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_GET, 'quantity'),
        );
    }
}

if (filter_input(INPUT_GET, 'action') == 'delete') {

    foreach ($_SESSION['shopping_cart'] as $key => $product) {

        if ($product['id'] == filter_input(INPUT_GET, 'id')) {

            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

function pre_r($array) {
    echo'<pre>';
    print-r($array);
    echo'</pre>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Simple_Shopping_cart</title>
        <link rel =" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel =" stylesheet" href="cart.css"/>
    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="signUp.php" ><span class="glyphicon glyphicon-user"style="padding-top: 10px"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"style="padding-top: 10px"></span> Login</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style=" padding-top: 100px">
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'cart');
            $query = 'SELECT * FROM products ORDER by id ASC';
            $result = mysqli_query($connect, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
                                <div class="products">
                                    <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                                    <h4 class="text-info"><?php echo $product['name']; ?></h4>
                                    <h4>$ <?php echo $product['price']; ?></h4>
                                    <input type="text" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info"
                                           value="Add to Cart" />
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
            }
            if (isset($_SESSION['shopping_cart'])) {
                if (count($_SESSION['shopping_cart']) > 0) {
                    ?>

                    <div style="clear:both"></div>  
                    <br />  
                    <div class="table-responsive">  
                        <table class="table">  
                            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
                            <tr>  
                                <th width="40%">Product Name</th>  
                                <th width="10%">Quantity</th>  
                                <th width="20%">Price</th>  
                                <th width="15%">Total</th>  
                                <th width= "5%">Action</th>  
                            </tr>  
                            <?php
                        }
                    }
                    if (!empty($_SESSION['shopping_cart'])) {

                        $total = 0;

                        foreach ($_SESSION['shopping_cart'] as $key => $product) {
                            ?>  
                            <tr>  
                                <td><?php echo $product['name']; ?></td>  
                                <td><?php echo $product['quantity']; ?></td>  
                                <td><?php echo $product['price']; ?></td>  
                                <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
                                <td>
                                    <a href="index.php?action=delete&id=<?php echo $product['id']; ?>">
                                        <div class="btn-danger">Remove</div>
                                    </a>
                                </td>  
                            </tr>  
                            <?php
                            $total = $total + ($product['quantity'] * $product['price']);
                        }
                        ?>  
                        <tr>  
                            <td colspan="3" align="right">Total</td>  
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                            <td></td>  
                        </tr>  
                        <tr>
                            <td colspan="5">
                                        <a href="#" class="button">Checkout</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>  
                </table>  
            </div>
        </div>
    </body>
</html>
