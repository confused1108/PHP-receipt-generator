<?php
/**
 * Created by PhpStorm.
 * User: Hitesh
 * Date: 25-Dec-17
 * Time: 7:55 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Invoice</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="wrap"><div>
        <h1>Checkout</h1>
        <form method="post" action="create_reciept.php">
            <fieldset>
                <legend>User Details</legend>
                <div class="col">
                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="Hitesh Ahuja" />
                    </p>
                    <p>
                        <label for="email">Email Address</label>
                        <input type="text" name="email" value="ahuja.hits812@yahoo.com" />
                    </p>
                </div>
                <div class="col">
                    <p>
                        <label for="address">Address</label>
                        <input type="text" name="address" value="ABV-IIITM" />
                    </p>
                    <p>
                        <label for="city">City</label>
                        <input type="text" name="city" value="Gwalior" />
                    </p>
                    <p>
                        <label for="province">Province</label>
                        <input type="text" name="province" value="Madhya Pradesh" />
                    </p>
                    <p>
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" value="474015" />
                    </p>
                    <p>
                        <label for="country">Country</label><input type="text" name="country" value="India" />
                    </p>
                </div>
            </fieldset>
            <fieldset>
                <legend>Your Cart</legend>
                <table>
                    <thead>
                    <tr><td>Product</td><td>Price</td></tr>
                    <thead>
                    <tbody>
                    <tr>
                        <td><input type='text' value='Product 1' name='product[]' /></td>
                        <td>$<input type='text' value='00.00' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' value='Product 2' name='product[]' /></td>
                        <td>$<input type='text' value='00.00' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' value='Product 3' name='product[]' /></td>
                        <td>$<input type='text' value='00.00' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' value='Product 4' name='product[]' /></td>
                        <td>$<input type='text' value='00.00' name='price[]' /></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
            <button type="submit">Submit Order</button>
        </form>
    </div></div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $('button').click(function () {
        $.post('create_reciept.php', $('form').serialize(), function () {
            $('div#wrap div').fadeOut( function () {
                $(this).empty().html("<h2>Thank you!</h2><p>Thank you for your order. Please <a href='reciept.pdf'>download your reciept</a>. </p>").fadeIn();
            });
        });
        return false;
    });
</script>
</html>