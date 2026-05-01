<?php
function Title()
{
    echo 'Dayal Enterprises';
}
function prt($file)
{
    echo base_url('img/page/' . $file);
}
function phone()
{
    echo '8604420040';
}
function email()
{
    echo 'sales@dayalenterprises.in';
}
function address()
{
    echo 'VARANASI , UP 221011,U.P.,India';
}
function Whatsapp($msg)
{
    echo "https://api.whatsapp.com/send?phone=918604420040&text=" . urlencode($msg);
}
function BlankHeight($web, $mob)
{
?>
    <div style="height:<?php echo $web; ?>px" class="g-web-show"></div>
    <div style="height:<?php echo $mob; ?>px" class="g-mob-show"></div>
<?php
}
function Product($product)
{
?>
    <section id="our_store" class="our_store" style="background: #C8073D;
background: linear-gradient(90deg, rgba(200, 7, 61, 1) 0%, rgba(166, 10, 54, 1) 31%, rgba(0, 82, 148, 1) 100%);">
        <div class="container">
            <div class="row">
                <?php if (!empty($product)) : ?>
                    <?php foreach ($product as $p) : ?>

                        <?php
                        $img = FCPATH . 'upload/productmain/' . $p['ID'] . '.jpg';
                        $imgUrl = file_exists($img)
                            ? base_url('upload/productmain/' . $p['ID'] . '.jpg')
                            : base_url('img/page/no-image.jpg');
                        ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="rt-product-wrapper g-drop-shadow">
                               
                                    <div class="product-thumbnail-wrapper">
                                        <div class="product-image">
                                            <img src="<?= $imgUrl ?>" class="" alt="<?= esc($p['PName']) ?>">
                                        </div>

                                    </div>
                                    <div class="rt-product-meta-wrapper">
                                        <h3 class="product_title">
                                            <a href="<?php Whatsapp("Hi,send " .  esc($p['PName']) . " details") ?> " target="_blank">
                                                <?= esc($p['PName']) ?>
                                            </a>
                                        </h3>
                                         <div class="rt-cartprice-wrapper">

                                        <div class="">
                                            <a href="<?php echo site_url('productdetail/' .$p['ID']) ?> " class="product-btn"  style="background-color: #aa0332;">View More</a>
                                              <a href="<?php Whatsapp("Hi,send " .  esc($p['PName']) . " details") ?> " class="product-btn" style="background-color :#005294;"  target="_blank">Order Now</a>
                                        </div>
                                        
                                    </div>
                                    </div>
                                   
                                   

                               
                            </div>

                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
              
            </div>

        </div>
    </section>
<?php
}
?>