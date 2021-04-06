<?php
$this->load->view('templates/header');
?>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>CodeIgniter Contact Form</h2>
    </div>
    <div class="row">
        <div class="col">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>        
        <?php } ?>
        <?php if(validation_errors()) { ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
        <?php } ?>
    </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- <div class="card"> -->
               <!--  <div class="card-header bg-default"><i class="fa fa-envelope"></i> Contact us.
                </div> -->
                <div class="card-body">
                    <form action="<?php print site_url();?>contact/send" method="POST" class="add-emp" id="add-emp">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="email">Contact No</label>
                            <input type="text" name="contact_no" class="form-control" id="contact-no" placeholder="Contact No.">
                        </div>
                        <div class="form-group">
                            <textarea name="comment" cols="3" rows="4" class="form-control" id="comment" placeholder="Comment"></textarea>
                        </div>
                        
                        <div class="mx-auto float-right">
                            <button type="reset" name="reset_add_emp" id="re-submit-emp" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                            <button type="submit" name="add_emp" id="submit-emp" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-info text-white text-uppercase"><i class="fa fa-address-card" aria-hidden="true"></i> Address</div>
                <div class="card-body">
                    <address>
                    <h5>Customer service:</h5>
                    <div title="Phone"><strong>Phone:</strong> +9 976 543 100</div> 
                    <div title="E-mail"><strong>E-mail: </strong><a href="mailto:contact@techarise.com" target="_top" rel="noopener noreferrer">contact@techarise.com</a></div>
                </address>
                <br>
                <hr>
                <br>
                <address>
                    <h5>Head Office:</h5>
                    <div>Company Inc, </div>
                    <div>L/01 Rotterdam Rd East,</div>
                    <div>89088 Southampton, United States</div>
                    <div title="Phone"><strong>Phone:</strong> +9 976 543 100</div>
                    <div><a href="mailto:contact@techarise.com" target="_top" rel="noopener noreferrer">contact@techarise.com</a></div>
                </address>

                </div>

            </div>
        </div> -->
    </div>

</div>
</section>
<?php
$this->load->view('templates/footer');
?>