<?php
   include "filemanager/head.php"; ?>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
   <!-- Page Header Start-->
   <?php include "filemanager/navbar.php"; ?>
   <!-- Page Header Ends                              -->
   <!-- Page Body Start-->
   <div class="page-body-wrapper">
      <!-- Page Sidebar Start-->
      <?php include "filemanager/sidebar.php"; ?>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
         <div class="container-fluid">
            <div class="page-title">
               <div class="row">
                  <div class="col-6">
                     <h3>
                        Setting Management
                     </h3>
                  </div>
                  <div class="col-6">
                  </div>
               </div>
            </div>
         </div>
         <!-- Container-fluid starts-->
         <div class="container-fluid">
            <div class="row size-column">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="h5_set"><i data-feather="settings"></i>  General  Information</h5>
                        <form method="post" enctype="multipart/form-data">
                           <div class="row">
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Website Name</label>
                                 <input type="text" class="form-control "
                                  placeholder="Enter Store Name" value="<?php echo $set[
                                    "webname"
                                    ]; ?>" name="webname" required="">
                                 <input type="hidden" name="type" value="edit_setting"/>
                                 <input type="hidden" name="id" value="1"/>
                              </div>
                              <div class="form-group mb-3 col-4" style="margin-bottom: 48px;">
                                 <label><span class="text-danger">*</span> Website Image</label>
                                 <div class="custom-file">
                                    <input type="file" name="weblogo" class="custom-file-input form-control">
                                    <label class="custom-file-label">Choose Website Image</label>
                                    <br>
                                    <img src="<?php echo $set["weblogo"]; ?>" width="60" height="60" alt=""/>
                                 </div>
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label for="cname">Select Timezone</label>
                                 <select name="timezone" class="form-control" required>
                                    <option value="">Select Timezone</option>
                                    <?php
                                       $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                                       $limit = count($tzlist);
                                       ?>
                                    <?php for ($k = 0; $k < $limit; $k++) { ?>
                                    <option <?php echo $tzlist[$k]; ?> <?php if ($tzlist[$k] == $set["timezone"]) {
                                       echo "selected";
                                       } ?>><?php echo $tzlist[$k]; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Currency</label>
                                 <input type="text" class="form-control"
                                  placeholder="Enter Currency"  value="<?php echo $set[
                                    "currency"
                                    ]; ?>" name="currency" required="">
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Minimum Payout for Store</label>
                                 <input type="text" class="form-control numberonly"
                                  placeholder="Enter Payout for Store"  value="<?php echo $set[
                                    "pstore"
                                    ]; ?>" name="pstore" required="">
                              </div>
                              <div class="form-group mb-3 col-12">
                                 <h5 class="h5_set"><i data-feather="bell"></i> Onesignal Information</h5>
                              </div>
                              <div class="form-group mb-3 col-6">
                                 <label><span class="text-danger">*</span> User App Onesignal App Id</label>
                                 <input type="text" class="form-control "
                                  placeholder="Enter User App Onesignal App Id"  value="<?php echo $set[
                                    "one_key"
                                    ]; ?>" name="one_key" required="">
                              </div>
                              <div class="form-group mb-3 col-6">
                                 <label><span class="text-danger">*</span> User  App Onesignal Rest Api Key</label>
                                 <input type="text" class="form-control "
                                  placeholder="Enter User Boy App Onesignal Rest Api Key"  value="<?php echo $set[
                                    "one_hash"
                                    ]; ?>" name="one_hash" required="">
                              </div>
                              <div class="form-group mb-3 col-6">
                                 <label><span class="text-danger">*</span> Sponsore Onesignal App Id</label>
                                 <input type="text" class="form-control "
                                  placeholder="Enter Sponsore Onesignal App Id"  value="<?php echo $set[
                                    "s_key"
                                    ]; ?>" name="s_key" required="">
                              </div>
                              <div class="form-group mb-3 col-6">
                                 <label><span class="text-danger">*</span> Sponsore Onesignal Rest Api Key</label>
                                 <input type="text" class="form-control "
                                  placeholder="Enter Sponsore Onesignal Rest Api Key"  value="<?php echo $set[
                                    "s_hash"
                                    ]; ?>" name="s_hash" required="">
                              </div>
                              <div class="form-group mb-3 col-12">
                                 <h5 class="h5_set"><i data-feather="gift"></i>
                                  Refer And Earn Information And Tax Information</h5>
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Sign Up Credit</label>
                                 <input type="text" class="form-control numberonly"
                                  placeholder="Enter Sign Up Credit"  value="<?php echo $set[
                                    "scredit"
                                    ]; ?>" name="scredit" required="">
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Refer Credit</label>
                                 <input type="text" class="form-control numberonly"
                                  placeholder="Enter Refer Credit"  value="<?php echo $set[
                                    "rcredit"
                                    ]; ?>" name="rcredit" required="">
                              </div>
                              <div class="form-group mb-3 col-4">
                                 <label><span class="text-danger">*</span> Tax (%)</label>
                                 <input type="number" step="0.01" class="form-control"
                                  placeholder="Enter Tax"  value="<?php echo $set[
                                    "tax"
                                    ]; ?>" name="tax" required="">
                              </div>
                              <div class="col-12">
                                 <button type="submit" name="edit_setting"
                                  class="btn btn-primary mb-2">Edit Setting</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Container-fluid Ends-->
      </div>
      <!-- footer start-->
   </div>
</div>
<?php include "filemanager/script.php"; ?>
<!-- Plugin used-->
</body>
</html>
