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
                        Category List Management
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
                        <div class="table-responsive">
                           <table class="display" id="basic-1">
                              <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Category Small Icon</th>
                                    <th>Category Title</th>
                                    <th>Total Event Host</th>
                                    <th>Category Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $city = $evmulti->query(
                                        "select id,img,cover,title,status from tbl_category"
                                    );
                                    $i = 0;
                                    while ($row = $city->fetch_assoc()) {
                                        $i = $i + 1; ?>
                                 <tr>
                                    <td>
                                       <?php echo $i; ?>
                                    </td>
                                    <td class="align-middle">
                                       <img src="<?php echo $row[
                                          "img"
                                          ]; ?>" width="60" height="60" alt=""/>
                                    </td>
                                    <td class="align-middle">
                                       <b> <?php echo $row[
                                          "title"
                                          ]; ?> </b>
                                    </td>
                                    <td>
                                       <b class="badge badge-info"><?php echo $evmulti->query(
                                          "select * from tbl_event where   cid=" . $row["id"] . ""
                                          )->num_rows . " Event Host"; ?></b>
                                    </td>
                                    <?php if ($row["status"] == 1) { ?>
                                    <td><span class="badge badge-success">Publish</span></td>
                                    <?php } else { ?>
                                    <td>
                                       <span class="badge badge-danger">Unpublish</span>
                                    </td>
                                    <?php } ?>
                                    <td style="white-space: nowrap; width: 15%;">
                                       <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                          <div class="btn-group btn-group-sm" style="float: none;">
                                             <a href="add_category.php?id=<?php echo $row[
                                                "id"
                                                ]; ?>" class="badge badge-info" ><i data-feather="edit-3"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
                              </tbody>
                           </table>
                        </div>
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
