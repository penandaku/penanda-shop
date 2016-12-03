<div class="col-md-9">
  <?php print $this->session->flashdata('notif'); ?>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-shopping-bag"></i> Upload Featured</div>
      <div class="panel-body">
      <div class="form-featured">
    	<?php
            $attributes = array('id' => 'frm_login');
            echo form_open_multipart('admin/featured/update?source=header&utf8=✓', $attributes)
        ?>
      	<div class="form-group">
	      	<label style="font-family: Roboto;font-weight: 300;"> Pilih Gambar Featured</label>
	        <input type="file" name="userfile" style="margin-bottom: 10px" required>

	        <span class="label label-danger" style="margin-left: 3px">NOTE :</span> maximum file sebesar 50MB, ukuran gambar featured <strong>2000 X 700</strong>.
        	<hr>
        </div>

        <div class="form-group">
        	<label style="font-family: Roboto;font-weight: 300;"> Link Featured</label>
        	<input type="text" name="link" class="form-control" placeholder="Link Featured" required>
        	<input type="hidden" name="id" value="<?php echo $this->encryption->encode('1') ?>">
        </div>	

        <button type="submit" id="load" style="width: 100%" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Uploading..." class="penandaku-btn-featured btn btn-md btn-success"><i class="fa fa-upload"></i> Upload</button>

      <?php echo form_close(); ?> 

      </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-shopping-bag"></i> Image Featured</div>
      	<div class="panel-body">
        <table class="table table-bordered table-striped" style="margin-top:10px">
          <tbody>
          <thead>
            <tr>
              <th class="text-center">IMAGE FEATURED</th>
              <th class="text-center">LINK FEATURED</th>
            </tr>
          </thead>
          <?php
      		    foreach($data_featured->result() as $hasil){
      		?>
            <tr>
              <td class="text-center"><img src="<?php echo base_url() ?>resources/featured/<?php echo $hasil->image_featured ?>" class="img-responsive"></td>
              <td><a href="<?php echo $hasil->link_featured ?>" target='_BLANK'><?php echo $hasil->link_featured ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>      	
      	</div>
      </div>
    </div>    
</div>

</div>
</div>
<hr style="margin-top:200px;width:100%">
