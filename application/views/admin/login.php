<?php $parameters=array(); 
echo form_open('c_admin/login',$parameters);?>
<h3>MNCH Login</h3>
  <div class="row">
    <div class="large-12 columns">
      <label>Username
        <input type="text" placeholder="John Doe" />
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Password
        <input type="password" placeholder="password" />
      </label>
    </div>
  </div>
  <button type="submit">Sign In</button>
<?php echo form_close();?>

