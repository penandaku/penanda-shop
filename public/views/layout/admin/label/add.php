<div class="col-md-9">
  <?php print $this->session->flashdata('notif'); ?>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-folder"></i> label</div>
      <div class="panel-body">
      <div class="form-label">
    	<?php
            $attributes = array('id' => 'frm_login');
            echo form_open('admin/label/save?source=header&utf8=✓', $attributes)
        ?>
		  <div class="form-group">
		    <label for="email" style="font-family: Roboto;font-weight: 300">Nama Label</label>
		    <input type="text" name="nama" class="form-control" required>
		    <input type="hidden" name="type" value="<?php echo $type ?>">
		  </div>
		  <div class="form-group">
		    <label for="pwd" style="font-family: Roboto;font-weight: 300">Descriptions</label>
		    <textarea name="descriptions" class="form-control" rows="6" required></textarea>
		  </div>
		  <button type="submit" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Saving..." class="penandaku-btn-label btn btn-md btn-default" style="font-family: Roboto;font-weight: 300;text-shadow: 0 -1px 0 rgba(0,0,0,0.15);background-color: #6cc644;background-image: -webkit-linear-gradient(#7bcc58, #60b838);background-image: linear-gradient(#7bcc58, #60b838);border-color: #55a532;color: #fff;width: 100%"><i class="fa fa-save"></i> Save</button>
		<?php echo form_close(); ?>
		</div>
      </div>
    </div>
</div>

</div>
</div>
<hr style="margin-top:200px;width:100%">
