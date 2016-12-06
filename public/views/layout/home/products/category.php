<div class="category" style="text-align: center">
    <img src="<?php print base_url('resources/img/sampul.png') ?>" class="img-responsive" style="margin-top:20px">
</div>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-8">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            foreach($data_products->result() as $hasil) {
                ?>
                <div class="col-md-4">
                    <div class="card penandaku-products">
                        <div class="card-content" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);padding:0px">
                            <a href="<?php echo base_url('products/'.$hasil->slug_products.'/') ?>" class="priview" style="transition: opacity ease-in-out .2s;height: 325px">
                                <img src="<?php echo base_url('resources/products/'.$hasil->thumbnail.'') ?>" style="padding:0px;min-height: 300px" class="img-responsive">
                            </a>
                        </div>
                        <div class="card-content">
                            <a href="<?php echo base_url('products/'.$hasil->slug_products.'/') ?>" style="color: #000;text-decoration:none;">
                                <div class="judul" style="font-family: Roboto;font-weight: 300;font-size: 20px;"><?php echo $hasil->nama_products ?></div>
                            </a>
                        </div>
                        <div class="detail" style="border-top: 1px solid rgba(160, 160, 160, 0.2);padding: 16px;font-size: 16px;font-family: Roboto;font-weight: 300">
                            <a href="<?php echo base_url('products/category/'.$hasil->slug.'/') ?>" style="color:#333;text-decoration: none"><i class="fa fa-folder-o"></i> <?php echo $hasil->nama_label ?></a> <div style="float:right;">Rp <?php echo $hasil->harga_products ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<hr style="margin-top:100px;width:100%">