<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number"><?php echo $count_users; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Penyakit</span>
                                    <span class="info-box-number"><?php echo $count_penyakit; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Penyebab</span>
                                    <span class="info-box-number"><?php echo $count_penyebab; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Gejala</span>
                                    <span class="info-box-number"><?php echo $count_gejala; ?></span>
                                </div>
                            </div>
                        </div>

                </section>
            </div>
