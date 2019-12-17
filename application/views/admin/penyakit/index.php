<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper" style="min-height: 1136px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php echo $pagetitle; ?>
    <?php echo $breadcrumb; ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List penyakit</h3>
            <div class="pull-right">
              <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
                <a id="form" class="btn btn-block btn-primary create"
                  data-create="<?= site_url('admin/penyakit/save') ?>">
                  <i class="fa fa-plus-square"></i> Tambah
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Code</th>
                  <th>Nama Penyakit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $no = 1;
                    foreach($penyakits as $penyakit) : 
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $penyakit->code; ?></td>
                  <td><?= $penyakit->nama_penyakit; ?></td>
                  <td>
                    <div class="grid-dropdown-actions dropdown">
                      <a href="#" style="padding: 0 10px;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-ellipsis-v"></i>
                      </a>
                      <ul class="dropdown-menu"
                        style="min-width: 70px !important;box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);border-radius:0;left: -65px;top: 5px;">
                        <li>
                          <a href="<?= base_url('admin/penyakit/penyebab-gejala/').$penyakit->code; ?>">
                            <i class="fa fa-pencil"></i> Edit</a>
                        </li>
                        <li>
                          <a class="btn delete" href="<?= base_url('admin/penyakit/delete') . '/' . $penyakit->id; ?>">
                            <i class="fa fa-trash-o"></i> Hapus
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Code</th>
                  <th>Nama Penyakit</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>

  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="modal-penyakit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <form id="form-penyakit" name="form_penyakit" method="POST" role="form">
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="box-body">
            <!-- <div class="form-group">
                            <label for="code">Code penyakit</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="Code penyakit">
                        </div> -->
            <div class="form-group">
              <label for="code">Code penyakit</label>
              <div class="input-group">
                <span class="input-group-addon">pt-</span>
                <input type="text" name="code" class="form-control" id="code" placeholder="Code penyakit">
              </div>
            </div>
            <div class="form-group">
              <label for="penyakit">Nama penyakit</label>
              <input type="text" name="penyakit" class="form-control" id="penyakit" placeholder="Nama penyakit">
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" id="submit-form" name="submit-form" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->