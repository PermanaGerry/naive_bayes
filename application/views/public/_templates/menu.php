<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark scrolling-navbar fixed-top" >
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="<?= base_url('/') ?>">
      <strong><?= $title; ?></strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#gejala">Indikasi Gejala</a>
        </li>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle border border-light rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Admin
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if(isset($user_login)) : ?>
            <a href="<?php echo base_url('admin'); ?>" class="dropdown-item">Admin</a>
            <a href="<?php echo site_url('auth/logout/admin'); ?>" class="dropdown-item"><?php echo lang('header_sign_out'); ?></a>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo base_url('/auth/login') ?>">Login</a>
            <?php endif; ?>
          </div>
        </li>
      </ul>

    </div>

  </div>
</nav>
<!-- Navbar -->