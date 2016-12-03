<div class="col-md-9">
    <?php print $this->session->flashdata('notif'); ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: Roboto;font-weight: 300;"><i class="fa fa-envelope"></i> Contact</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped" style="margin-top:10px;font-family: Roboto;font-weight: 300;">
                <tbody>
                <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">NAMA LENGKAP</th>
                    <th class="text-center">PESAN CONTACT</th>
                    <th class="text-center">TANGGAL CONTACT</th>
                    <th class="text-center">OPTIONS</th>
                </tr>
                </thead>
                <?php
                $no = $this->uri->segment('4') + 1;
                foreach($data_contact->result() as $hasil){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo $hasil->nama_contact ?></td>
                        <td><?php echo $hasil->pesan_contact ?></td>
                        <td><?php echo $hasil->tanggal_contact ?></td>
                        <td class="text-center">
                            <a class='badge badge-danger' style="font-family: Roboto;font-weight: 400;background-color: #842020;" href='<?php echo base_url() ?>admin/contact/delete/<?php echo $this->encryption->encode($hasil->id_contact) ?>'><i class="fa fa-trash"></i> Delete Data</a>
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
