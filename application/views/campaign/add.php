<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3  grid-margin stretch-card bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-plane"></h4><br/>1. Campaign
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-road"></h4><br/>2. Add Settings
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                  <div>
                   
                    <?php echo form_open_multipart('users/campaign/add',array('class'=>'pt-3')); ?>
			  <div class="form-group">
                  <label>Campaign Title</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" name="campaign_title" placeholder="Campaign Title" id="campaign_title">
                  </div>
                </div>
                <div class="form-group">
                  <label>Campaign Description</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Campaign Description" name="campaign_title" id="campaign_title">
                  </div>
                </div>
                <div class="form-group">
                  <label>Media Type</label>
                  <div class="input-group">
                    <select class="form-control form-control-lg border-left-0" name="media_type" id="media_type">
                    <option  class="form-control form-control-lg border-left-0" value="Image">Image</option>
                    <option  class="form-control form-control-lg border-left-0" value="Video">Video</option>
                  </select>
                  </div>
                </div>             
                <div class="form-group">
                  <label>Product Link</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="URL" name="product_link" id="product_link">
                  </div>
                </div>

                <div class="form-group">
                  <label>Ad Type</label>
                  <div class="input-group">
                    <select class="form-control form-control-lg border-left-0" name="media_type" id="media_type">
                    <option  class="form-control form-control-lg border-left-0" value="Image">In Between Video</option>
                    <option  class="form-control form-control-lg border-left-0" value="Video">Full Screen Video</option>
                  </select>
                  </div>
                </div> 


                <div class="mt-3">
				<button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SUBMIT</button>
                </div>
				<?php echo form_close() ?>
                 
                <!-- train section -->
                <div class="bhoechie-tab-content ">
                  <div>
                <?php echo form_open_multipart('users/campaign/add',array('class'=>'pt-3')); ?>
			  <div class="form-group">
                  <label>Campaign Title</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" name="campaign_title" placeholder="Campaign Title" id="campaign_title">
                  </div>
                </div>
                <div class="form-group">
                  <label>Campaign Description</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Campaign Description" name="campaign_title" id="campaign_title">
                  </div>
                </div>
                <div class="form-group">
                  <label>Media Type</label>
                  <div class="input-group">
                    <select class="form-control form-control-lg border-left-0" name="media_type" id="media_type">
                    <option  class="form-control form-control-lg border-left-0" value="Image">Image</option>
                    <option  class="form-control form-control-lg border-left-0" value="Video">Video</option>
                  </select>
                  </div>
                </div>             
                <div class="form-group">
                  <label>Product Link</label>
                  <div class="input-group">
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="URL" name="product_link" id="product_link">
                  </div>
                </div>

                <div class="form-group">
                  <label>Ad Type</label>
                  <div class="input-group">
                    <select class="form-control form-control-lg border-left-0" name="media_type" id="media_type">
                    <option  class="form-control form-control-lg border-left-0" value="Image">In Between Video</option>
                    <option  class="form-control form-control-lg border-left-0" value="Video">Full Screen Video</option>
                  </select>
                  </div>
                </div> 


                <div class="mt-3">
				<button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SUBMIT</button>
                </div>
				<?php echo form_close() ?>
            
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
            </div>
        </div>



          </div>
        </div>
        <!-- content-wrapper ends -->
      
      </div>
      <!-- main-panel ends -->
    </div>    

<script>
$(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>