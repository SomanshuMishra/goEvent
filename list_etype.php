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
                        Ticket Type & Price List Management
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
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                    <th>Event Ticket Price</th>
                                    <th>Event Ticket Limit</th>
                                    <th>Ticket Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $city = $evmulti->query(
                                        "select * from tbl_type_price where sponsore_id=" .
                                            $sdata["id"] .
                                            ""
                                    );
                                    $i = 0;
                                    while (
                                        $row = $city->fetch_assoc()
                                    ) {
                                        $i = $i + 1; ?>
                                 <tr>
                                    <td>
                                       <?php echo $i; ?>
                                    </td>
                                    <td>
                                       <?php
                                          $e = $evmulti
                                              ->query(
                                                  "select * from tbl_event where id=" .
                                                      $row[
                                                          "event_id"
                                                      ] .
                                                      ""
                                              )
                                              ->fetch_assoc();
                                          echo $e["title"];
                                          ?>
                                    </td>
                                    <td>
                                       <?php echo "<strong>" .
                                          $row["type"] .
                                          "</strong>"; ?>
                                    </td>
                                    <td>
                                       <?php echo $row["price"] .
                                          $set["currency"]; ?>
                                    </td>
                                    <td>
                                       <?php echo $row["tlimit"] .
                                          " Peoples"; ?>
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
                                             <a href="add_etype.php?id=<?php echo $row[
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
