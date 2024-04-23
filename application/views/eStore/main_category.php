<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
    <div class="site-wrap">
    <div class="site-blocks-cover inner-page" 
        style="background-repeat: no-repeat; 
        background-size: cover;
        background-position:center" 
         data-aos="fade">         
      <div class="container-fluid">
        <div class="row">
        <img class="img-fluid" src="<?= base_url('assets/img/').$main_category[0]->parent_category_image; ?>" alt="">
        <!-- <img class="img-fluid" src="</?= base_url('assets/img/pin_12.jpg'); ?>" alt=""> -->
        </div>
      </div>
    </div>

    <?php
        //  echo "<pre/>"; 
        //  print_r(($main_category[0]->children));
     ?>
    <div class="custom-border-bottom text-dark py-3">
        <div class="h1 ml-3"><?= $main_category[0]->parent_category_name; ?></div>
    <hr>
    <?php if(isset($main_category[0])){         
        for($i = 0; $i < count((array)$main_category[0]->children); $i++){
            // print_r($i);
         ?>
    <div class="col-md-6 col-sm-8 mb-4 mx-auto">     
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">                            
                            <div class="h5 mb-0 pl-2 font-weight-bold text-gray-800">
                            <a href="<?= base_url('shop-cat/').$main_category[0]->children[$i]['child_id']; ?>" class="text-danger stretched-link"> 
                            <?php print_r($main_category[0]->children[$i]['child_category_name']); ?>
                            </a></div>
                        </div>
                        <div class="col-auto pr-3">
                            <i class="fa fa-arrow-right fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>         
    </div>
    <?php } } ?>

    </div>


    
</body>
</html>