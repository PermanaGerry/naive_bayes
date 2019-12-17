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

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border box-primary">
        <h3 class="box-title">Nama Penyakit</h3>

        <div class="box-tools pull-right box-primary">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
            data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <form role="form" action="<?= base_url('admin/penyakit/save') ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Code Penyakit</label>
            <input type="text" class="form-control" value="<?= $penyakit->code; ?>" disabled>
            <input type="hidden" id="id" name="id" value="<?= $penyakit->id?>">
            <input type="hidden" id="code" name="code" value="<?= $penyakit->code?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Penyakit</label>
            <input type="text" class="form-control" id="penyakit" name="penyakit"
              value="<?= $penyakit->nama_penyakit; ?>">
          </div>
        </div>

        <div class="box-footer">
          <a href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code); ?>"
            class="btn btn-default">Refresh</a>
          <button type="submit" class="btn btn-primary pull-right" name="submit-form"
            value="update-field">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /Main content -->

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border box-primary">
        <h3 class="box-title">Relasi Gejala Dan Penyebab</h3>

        <div class="box-tools pull-right box-primary">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
            data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>

      <div class="box-body">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#list-gejala" data-toggle="tab" aria-expanded="false">Gejala</a></li>
            <li class=""><a href="#list-penyebab" data-toggle="tab" aria-expanded="true">Penyebab</a></li>
            <li class="dropdown pull-right">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-gear"></i> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1"
                    href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code.'/gejala'); ?>">Tambah
                     Gejala</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1"
                    href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code.'/penyebab'); ?>">Tambah
                     Penyebab</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="list-gejala">
              <div class="">
                <table id="table-penyakit-gejala" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Nama Gejala</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($gejalas as $gejala) : 
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $gejala->code_gejala; ?></td>
                      <td><?= $gejala->nama_gejala; ?></td>
                      <td>
                        <a class="btn delete"
                          href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code.'/gejala/delete/'.$gejala->id); ?>">
                          <i class="fa fa-trash-o"></i> Hapus
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Nama Gejala</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="list-penyebab">
              <table id="table-penyakit-penyebab" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama Penyebab</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no = 1;
                      foreach($penyebabs as $penyebab) : 
                    ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $penyebab->code_penyebab; ?></td>
                    <td><?= $penyebab->nama_penyebab; ?></td>
                    <td>
                      <a class="btn delete"
                        href="<?= base_url('admin/penyakit/penyebab-gejala/'.$penyakit->code.'/penyebab/delete/'.$penyebab->id); ?>">
                        <i class="fa fa-trash-o"></i> Hapus
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama Penyebab</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
      </div>

      <div class="box-footer">
      </div>

    </div>
    <!-- /.box -->

  </section>
  <!-- /Main content -->

</div>