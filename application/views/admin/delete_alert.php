<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
    <div class="container">
        <div class="col-md-6 mx-auto my-5">
             
            <div class='h2 bg-warning pl-4 pt-3 pb-3 text-dark'><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
            </svg> CAUTION</div>
            <div class='h4'>- It Will Delete All Record Related to Selected Product Item</div>
            <div class='h4'>- Product Image will be Deleted</div>
            <div class='h4'>- Product Details(name, description, price) will be Deleted</div>
            <div class='h4'>- Product Color Variation Images will be Deleted</div>
            <div class='h4'>- Product Variation Details(color, size, quantity) will be Deleted</div>
            <hr>
            <div class="float-right">
                <a href="<?= base_url('show-main-product'); ?>" class="btn btn-outline-dark" role="button" aria-pressed="true">Back</a>
                <a href="<?= base_url('confirm-delete/').$product_uuid; ?>" class="btn btn-outline-danger" role="button" aria-pressed="true">Yes, I'm sure - Delete All</a>
            </div>
    <?php 
    // var_dump($product_uuid);
    ?>
            
        </div>
    </div>
    

    
</body>
</html>