        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">General User's Table</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

            <?php if(isset($_GET['action']) && $_GET['action']=="delete"){ ?>
                     <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        Deleted Succesfully!
                     </div> 
            <?php  } ?>         
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Contact No</th>
                  <th>User Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                

                

                

              </table>   
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     