  <!-- BEGIN SIDEBAR -->
  <nav id="page-leftbar" role="navigation">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="acc-menu" id="sidebar">

          <li><a href="<?= site_url('/') ?>" target="_blank"><i class="	fa fa-search"></i> <span>Search Result</span></a></li>
          <li class="divider"></li>
          <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <li>
              <a href="javascript:;"><i class="fa fa-plus-square"></i> <span>Create</span> </a>
              <ul class="acc-menu">


                  <li><a href="<?= site_url('courseindex') ?>"><span>Course</span></a></li>
                  <li><a href="<?= site_url('subjectindex') ?>">Subject</a></li>

              </ul>
          </li>

          <li><a href="<?= site_url('studentindex') ?>"><i class="fa fa-group"></i> Student</a></li>
          <li><a href="<?= site_url('admissionindex') ?>"><i class="	fa fa-book"></i> Admission</a></li>
          <li><a href="<?= site_url('admitcard') ?>"><i class="fa fa-credit-card"></i> Admit Card</a></li>
          <li><a href="<?= site_url('result') ?>"><i class="fa fa-calendar"></i> Result Create/Edit</a></li>
          <li><a href="<?= site_url('resultprint') ?>"><i class="fa fa-print"></i> Result Print</a></li>
      </ul>
      <!-- END SIDEBAR MENU -->
  </nav>

  <!-- BEGIN RIGHTBAR -->