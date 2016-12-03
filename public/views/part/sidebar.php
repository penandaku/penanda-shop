<div class="container" style="margin-top:50px">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group" style="font-family: Roboto;font-weight: 300;">
        <div class="list-group-item" style="background-color:#f5f5f5">Panel System</div>
        <a href="<?php print base_url() ?>admin/dashboard/" class="list-group-item <?php if(isset($dashboard)) { echo 'active-panel-member'; } ?>"><i class="fa fa-home"></i> Dashboard </a>
        <a href="<?php print base_url() ?>admin/label/" class="list-group-item <?php if(isset($label)) { echo 'active-panel-member'; } ?>"><i class="fa fa-folder"></i> Kelola Label</a>
        <a href="<?php print base_url() ?>admin/products/" class="list-group-item <?php if(isset($products)) { echo 'active-panel-member'; } ?>"><i class="fa fa-shopping-basket"></i> Kelola Products</a>
        <a href="<?php print base_url() ?>admin/order/" class="list-group-item <?php if(isset($order)) { echo 'active-panel-member'; } ?>"><i class="fa fa-shopping-cart"></i> Kelola Order </a>
        <a href="<?php print base_url() ?>admin/contact/" class="list-group-item <?php if(isset($contact)) { echo 'active-panel-member'; } ?>"><i class="fa fa-envelope-o"></i> Contact <span class="badge" style="background-color: green"><?php echo $this->db->count_all('tbl_contact') ?></span></a>
      </div>
      <div class="list-group" style="font-family: Roboto;font-weight: 300;">
        <div class="list-group-item" style="background-color:#f5f5f5">Panel Setting</div>
          <a href="<?php print base_url() ?>admin/featured/" class="list-group-item <?php if(isset($featured)) { echo 'active-panel-member'; } ?>"><i class="fa fa-shopping-bag"></i> Setting Featured</a>
          <a href="<?php print base_url() ?>admin/account/" class="list-group-item <?php if(isset($api)) { echo 'active-panel-member'; } ?>"><i class="fa fa-user-circle"></i> Setting Account</a>
          <a href="<?php print base_url() ?>admin/setting/" class="list-group-item <?php if(isset($setting)) { echo 'active-panel-member'; } ?>"><i class="fa fa-cogs"></i> Setting System</a>
      </div>
    </div>
