<style>
.nav-tabs .nav-link {
      border: 1px solid #eff2f5;
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem;
      background: #f9f9f9;
      color: #a8a8a8;
      margin: 5px 2px 0 2px;
}
.style-alert-success{
      color: #23923d;
      border-color: #23923d;
      background: #e8f9ec;
}
.style-alert-danger{
      color: #dc3545;
      border-color: #dc3545;
      background: #ffe3e5;
}
.tab-content {
      padding: 0 20px 20px 20px;
      border-left: 1px solid #dee2e6;
      border-right: 1px solid #dee2e6;
      border-bottom: 1px solid #dee2e6;
}
</style> 
<div class="card" id="nicepage-pengumuman">
    <div class="card-header bg-secondary">
        <h3 class="card-title py-1">Pengumuman</h3>
    </div> 
        <div class="card-body">
            <?php      
            if($this->session->flashdata('alert')!=null) {?>
                  <?php $message = $this->session->flashdata('alert');?>
                  <?php if(isset($message['success'])) { ?>
                        <div id="nicepage-alert" class="alert style-alert-success alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                              </button>
                        <?php echo $message['success'];?>
                        </div>
                  <?php } ?>
                  <?php if(isset($message['fail'])) { ?>
                        <div id="nicepage-alert" class="alert style-alert-danger alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                              </button>
                        <?php echo $message['fail'];?>
                        </div>
                  <?php } ?>
            <?php
            }
            ?>
            <ul class="nav nav-tabs"role="tablist"> 
              <li class="nav-item">
                <a class="nav-link active" id="content-pengumuman-home-tab" data-toggle="pill" href="#content-pengumuman-home" role="tab"
                  aria-controls="content-home" aria-selected="true">Pengumuman</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" id="content-pengumuman-form-tab" data-toggle="pill" href="#content-pengumuman-form" role="tab"
                 aria-controls="content" aria-selected="false">Form</a>
              </li>  
            </ul>   
            <div class="tab-content">
              <div class="tab-pane fade show active" id="content-pengumuman-home">  
                    <?php include 'view_tab_pengumuman.php';?>
              </div>
              <div class="tab-pane fade" id="content-pengumuman-form">  
                    <?php include 'view_tab_form.php';?>
              </div>   
            </div>

        </div>
    </div>
</div>