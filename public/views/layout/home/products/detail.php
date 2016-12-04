<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-8">
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content">
                    <div class="contact-label" style="border-bottom: 1px solid #ddd;font-family: Roboto;font-weight: 300;font-size: 30px;margin-bottom: 10px">
                        <?php echo $data_products->nama_products ?>
                    </div>
                    <div class="detail-products" style="font-family: Roboto;font-weight: 300;font-size: 16px">
                        <img src="<?php echo base_url('resources/products/'.$data_products->thumbnail.'')?>" class="img-responsive" style="width: 100%;margin-bottom: 10px;border-radius: 5px">
                        <?php echo $data_products->descriptions_products ?>
                    </div>
                </div>
            </div>
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content" style="text-align: center">
                    <label style="font-family: Roboto; font-size: 18px;font-weight: 300;">
                        ORDER VIA
                    </label>
                    <div class="order" style="margin-top: 10px;font-family: Roboto;font-weight: 300">
                        <a href="<?php echo $data_products->link_tokopedia ?>/" target="_BLANK" class="btn btn-success btn-tokopedia" style="background-color: #3fa23f;border-color: #3fa23f"><i class="fa fa-shopping-bag"></i> Tokopedia</a>
                        <a href="<?php echo $data_products->link_bukalapak ?>/" target="_BLANK" class="btn btn-success btn-bukalapak" style="background-color: #d4315d;border-color: #d4315d"><i class="fa fa-shopping-basket"></i> Bukalapak</a>
                        <a href="<?php echo $data_products->link_shopee ?>/" target="_BLANK" class="btn btn-success btn-shopee" style="background-color: #d65f17;border-color: #d65f17"><i class="fa fa-shopping-cart"></i> Shopee</a>
                    </div>
                </div>
            </div>
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content"">
                    <?php echo $disqus ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);">
                    <div class="price" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);margin-bottom: 15px;padding-bottom: 5px;font-size: 18px"">
                    <label style="font-family: Roboto;font-weight: 300"> Harga Products</label>
                    <br>
                    <?php
                        echo 'IDR'. ' - ' .$data_products->harga_products;
                    ?>
                    </div>
                    <div class="size" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);padding-bottom: 5px;font-size: 18px;margin-bottom: 15px"">
                            <label style="font-family: Roboto;font-weight: 300"> Available Products Size</label>
                            <br>
                            <?php
                            $size = explode(",", $data_products->size_products);
                            foreach($size as $k => $v):
                                ?>
                                <input type="checkbox" checked readonly/> <?php echo $v ?>
                                <?php
                            endforeach;
                            ?>
                    </div>
                    <div class="stock" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);margin-bottom: 15px;padding-bottom: 5px;font-size: 18px"">
                         <label style="font-family: Roboto;font-weight: 300"> Available Products Stock</label>
                        <br>
                        <?php
                            echo $data_products->stock_products . ' ' . 'Pcs';
                         ?>
                    </div>
                </div>
            </div>
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);">
                    <div class="other-products-title" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);margin-bottom: 10px;padding-bottom: 2px;font-size: 18px;"">
                        <label style="font-family: Roboto;font-weight: 300;">
                            <span> Other Products</span>
                        </label>
                    </div>
                <div class="other-products">
                    <img src="<?php echo base_url('resources/products/'.$data_products->thumbnail.'')?>" alt="Person" width="96" height="96">
                    <a href="" style="color: #333;text-decoration: none"> JAKET HODDIE GITHUB</a>
                </div>
                </div>
            </div>
            <div class="card" style="border-top: 2px solid green;">
                <div class="card-content" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);">
                    <div class="follow" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);margin-bottom: 15px;padding-bottom: 5px;font-size: 18px;"">
                    <label style="font-family: Roboto;font-weight: 300;">
                        <span> Follow Us!</span>
                    </label>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<hr style="margin-top:200px;width:100%">