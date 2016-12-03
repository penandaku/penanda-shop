<div class="col-md-9">
    <?php print $this->session->flashdata('notif'); ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-shopping-basket"></i> Products</div>
        <div class="panel-body">
            <?php
            $attributes = array('id' => 'frm_login');
            echo form_open_multipart('admin/products/save?source=header&utf8=✓', $attributes)
            ?>
            <div class="form-group">
                <label for="thumb" style="font-family: Roboto;font-weight: 300  ">Thumbnail Products</label>
                <input type="file" name="<?php echo $thumbnail ?>" value="<?php echo $data_products['thumbnail'] ?>" style="margin-bottom: 10px">

                <span class="label label-danger" style="margin-left: 3px">NOTE :</span> maximum file sebesar 50MB, ukuran gambar harus <strong>600 X 600</strong>.
                <hr>
            </div>
            <div class="form-group">
                <label for="nama" style="font-family: Roboto;font-weight: 300  ">Nama Products</label>
                <input type="text" name="nama" value="<?php echo $data_products['nama_products'] ?>" class="form-control" placeholder="Nama Products" required>
                <input type="hidden" name="type" value="<?php echo $type ?>">
                <input type="hidden" name="id" value="<?php echo $this->encryption->encode($data_products['id_products']) ?>">
            </div>
            <div class="form-group">
                <label for="sel1" style="font-family: Roboto;font-weight: 300">Products Label:</label>
                <select class="form-control" name="label" id="label" required>
                    <option value="" selected="selected">- - Pilih Label Products - -</option>
                    <?php
                    foreach($label_products->result_array() as $row)
                    {
                        if($row['id_label']== $data_products['label_id'])
                        {
                            ?>
                            <option value="<?php echo $row['id_label']; ?>" selected="selected"><?php echo $row['nama_label']; ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $row['id_label']; ?>"><?php echo $row['nama_label']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="harga" style="font-family: Roboto;font-weight: 300  ">Harga Products</label>
                <input type="number" name="harga" value="<?php echo $data_products['harga_products'] ?>" class="form-control" placeholder="Harga Products" required>
            </div>
            <div class="form-group">
                <label for="size" style="font-family: Roboto;font-weight: 300">Size Products</label>
                <br>
                <?php
                $size = explode(",", $data_products['size_products']);
                foreach($size as $k => $v):
                    ?>
                    <input type="checkbox" name ="size[]" value="<?php echo $v ?>" checked/> <?php echo $v ?>
                    <?php
                endforeach;
                ?>
            </div>
            <div class="form-group">
                <label for="pwd" style="font-family: Roboto;font-weight: 300">Descriptions</label>
                <textarea name="descriptions" class="ckeditor form-control" rows="6" required> <?php echo $data_products['descriptions_products'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="stock" style="font-family: Roboto;font-weight: 300  ">Stock Products</label>
                <input type="number" name="stock" value="<?php echo $data_products['stock_products'] ?>" class="form-control" placeholder="Stock Products" required>
            </div>
            <div class="form-group">
                <label for="link_toped" style="font-family: Roboto;font-weight: 300  ">Link Tokopedia</label>
                <input type="text" name="link_toped" value="<?php echo $data_products['link_tokopedia'] ?>" class="form-control" placeholder="http://tokopedia.com/penandashop/products/" required>
            </div>
            <div class="form-group">
                <label for="link_bl" style="font-family: Roboto;font-weight: 300  ">Link BukaLapak</label>
                <input type="text" name="link_bl" value="<?php echo $data_products['link_bukalapak'] ?>" class="form-control" placeholder="http://bukalapak.com/penandashop/products/" required>
            </div>
            <div class="form-group">
                <label for="link_shopee" style="font-family: Roboto;font-weight: 300  ">Link Shopee</label>
                <input type="text" name="link_shopee" value="<?php echo $data_products['link_shopee'] ?>" class="form-control" placeholder="http://shopee.co.id/penandashop/products/" required>
            </div>
            <button type="submit" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Updating..." class="penandaku-btn-products btn btn-md btn-default" style="font-family: Roboto;font-weight: 300;text-shadow: 0 -1px 0 rgba(0,0,0,0.15);background-color: #6cc644;background-image: -webkit-linear-gradient(#7bcc58, #60b838);background-image: linear-gradient(#7bcc58, #60b838);border-color: #55a532;color: #fff;width: 100%"><i class="fa fa-save"></i> Update</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</div>
</div>
<hr style="margin-top:200px;width:100%">
