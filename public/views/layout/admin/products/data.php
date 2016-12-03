<div class="col-md-9">
  <?php print $this->session->flashdata('notif'); ?>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-shopping-basket"></i> Products</div>
      <div class="panel-body">
      <a href="<?php print base_url() ?>admin/products/add/" class="btn btn-success" style="font-family: Roboto;font-weight: 300;text-shadow: 0 -1px 0 rgba(0,0,0,0.15);background-color: #6cc644;background-image: -webkit-linear-gradient(#7bcc58, #60b838);background-image: linear-gradient(#7bcc58, #60b838);border-color: #55a532;"><i class="fa fa-plus-circle"></i> Add Products</a>
          <table class="table table-bordered table-striped" style="margin-top:10px;font-family: Roboto;font-weight: 300;">
              <tbody>
              <thead>
              <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">NAMA PRODUCTS</th>
                  <th class="text-center">KATEGORI</th>
                  <th class="text-center">OPTIONS</th>
              </tr>
              </thead>
              <?php
              $no = $this->uri->segment('4') + 1;
              foreach($data_products->result() as $hasil){
                  ?>
                  <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $hasil->nama_products ?></td>
                      <td><?php echo $hasil->nama_label ?></td>
                      <td class="text-center">
                          <a class='badge badge-success' style="font-family: Roboto;font-weight: 400;background-color: #358420;" href='<?php echo base_url() ?>admin/products/edit/<?php echo $this->encryption->encode($hasil->id_products) ?>'><i class="fa fa-pencil"></i> Edit Data</a>
                          <a class='badge badge-danger' style="font-family: Roboto;font-weight: 400;background-color: #842020;" href='<?php echo base_url() ?>admin/products/delete/<?php echo $this->encryption->encode($hasil->id_products) ?>'><i class="fa fa-trash"></i> Delete Data</a>
                      </td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
          <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
</div>

</div>
</div>
<hr style="margin-top:100px;width:100%">
