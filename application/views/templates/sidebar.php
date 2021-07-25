<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light">SISTEM PERIZINAN SANTRI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="<?= base_url() ?>" class="nav-link <?php echo $this->uri->segment(1) == '' ? 'active': '' ?>" >
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <!-- Data Training -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataTraining"  class="nav-link <?php echo $this->uri->segment(1) == 'DataTraining' ? 'active': '' ?>">
            <i class="fas fa-school"></i>
            <p>
              Data Training
            </p>
          </a>
        </li>
        <!-- Data Training  -->

        <!-- Data Uji -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataUji" class="nav-link <?php echo $this->uri->segment(1) == 'DataUji' ? 'active': '' ?>">
            <i class="fas fa-school"></i>
            <p>
              Data Uji
            </p>
          </a>
        </li>
        <!-- Data Uji  -->

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>