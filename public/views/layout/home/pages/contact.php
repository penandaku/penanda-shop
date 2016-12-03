<div class="container" style="margin-top: 50px">
	<div class="row">
		<div class="col-md-12">
		<div class="col-md-8">
			<?php echo $this->session->flashdata('notif') ?>
			<div class="card" style="border-top: 2px solid green;">
				<div class="card-content">
					<div class="contact-label" style="border-bottom: 1px solid #ddd;font-family: Roboto;font-weight: 300;font-size: 25px;margin-bottom: 10px">
						Kirim Pesan
					</div>
					<div class="form-contact">
					<?php
						$attributes = array('id' => 'frm_login');
						echo form_open('pages/save?source=header&utf8=✓', $attributes)
					?>
					  <div class="form-group">
					    <label for="nama" style="font-family: Roboto;font-weight: 300">Nama Lengkap</label>
					    <input type="text"  name ="nama" class="form-control" id="nama">
					  </div>
					  <div class="form-group">
					    <label for="email" style="font-family: Roboto;font-weight: 300">Alamat Email</label>
					    <input type="text" name ="email" class="form-control" id="email">
					  </div>
					  <div class="form-group">
					    <label for="subject" style="font-family: Roboto;font-weight: 300"> Isi Pesan</label>
					    <textarea class="form-control" name ="message" rows="6"></textarea>
					  </div>					  

					  <button type="submit" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sending..." class="penandaku-btn-contact btn btn-md btn-success"><i class="fa fa-send"></i> Kirim Pesan</button>
					<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
	      <div class="card" style="border-top: 2px solid green;">
	          <div class="card-content" style="border-bottom: 1px solid rgba(160, 160, 160, 0.2);font-size: 15px;font-family: Roboto;font-weight: 300">
	             <div class="user-company" style="margin-bottom:5px;border-bottom: 1px solid #ddd;padding-bottom: 5px"><i class="fa fa-building-o"></i> Penanda Shop</div>
	             <div class="user-address" style="margin-bottom:5px;border-bottom: 1px solid #ddd;padding-bottom: 5px"><i class="fa fa-map-marker"></i> Sumber Penganten, Jogoroto, Jombang <br><div style="margin-left:13px">Jawa Timur, Indonesia </div></div>
	             <div class="user-phone" style="margin-bottom:5px;border-bottom: 1px solid #ddd;padding-bottom: 5px"><i class="fa fa-whatsapp x-2"></i> 0857 8585 2224 <br> <div style="margin-left: 17px">081231155450</div></div>
	             <div class="user-email" style="margin-bottom:5px;padding-bottom: 5px"><i class="fa fa-envelope-o"></i> info@shop.penandaku.com <br> <div style="margin-left: 19px">ridaulmaulayya@gmail.com</div></div>
	          </div>
	      </div>		
		</div>
	</div>
</div>
</div>
<hr style="margin-top:200px;width:100%">