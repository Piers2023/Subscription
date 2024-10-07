
<nav class="navbar navbar-expand-lg navbar-dark mb-5 bg-dark sticky-top">
  
  <a class="navbar-brand" href="<?php echo site_url('main'); ?>">Subscription</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('main'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('main/calendar') ?>">Calendar</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Settings
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url('main/add_data') ?>">Add Data</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">

      </li>
    </ul>
    <button type="button" class="btn btn-outline-danger " data-toggle="modal" data-target="#modal_logout"> Logout </button>
  </div>
</nav>

<?php $this->load->view('modal_validate') ?>