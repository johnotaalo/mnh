
<script src="<?php echo base_url(); ?>js/js_libraries.js"></script>
<script src="<?php echo base_url(); ?>js/js_ajax_load.js"></script>
<?php $this -> load -> view('segments/nav-public'); ?>

<div id="site-title">

</div>


<div class="login-container">
    <div class="row">
       <div id="form-description">

       </div>
        <div id="form-login">
            <form id="authenticate" name="authenticate" action="<?php echo base_url().'session/new'?>" method="post" accept-charset="utf-8">
                <h2><?php echo $login_message; ?></h2>

                <!--p style="margin-bottom:5px"><label for="username">Facility Name</label</p><p><input id="username" name="username" type="text" placeholder="Facility Name"></p-->

                <div class="form-group">
                    <select id="username" name="username">
                        <option selected="selected" value="">Select District/Sub County</option>
                        <?php echo $this->selectDistricts; ?>
                    </select>
                </div>

                <div class="form-group">
                    <input id="usercode" name="usercode" type="password"/>
                </div>
                <label style="color: #e34848;display:none" for="buttonsPane" >Invalid District/Sub County and Password Combination!</label>
                <div class="buttonsPane">
                    <button type="submit" class="" style="width:inherit">Begin <?php echo $survey ?> Survey</button>
                </div>
            </form>
        </div>
    </div>

    <!--p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p-->



</div><!-- container -->

