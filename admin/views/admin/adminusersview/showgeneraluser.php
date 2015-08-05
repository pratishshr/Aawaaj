        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           General Users
          </h1>
        </section>

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
           		<table class="table table-bordered">
           			<tr>
	           			<th>ID</th>
	           			<th>Username</th>
	           			<th>Name</th>
	           			<th>Contact No</th>
	           			<th>Age</th>
	           			<th>Status</th>
	           			<th>Action</th>
           			</tr>

                </table>

                <?php foreach($this->userrepository->get_all() as $user{
                    echo("hawa");
                } 
                  ?>

           			<tr>
           				<td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           			</tr>

          		</table>   
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     