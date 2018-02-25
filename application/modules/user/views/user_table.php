<div class="content-wrapper">
<!-- Content Header (Page header) -->
<!-- Main content -->
  <section class="content">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <div class="box-tools">
              <?php if(CheckPermission("users", "own_create")){ ?>
              <button type="button" class="btn-sm  btn btn-success modalButtonUser" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Add User</button>
              <?php } if(setting_all('email_invitation') == 1){  ?>
              <button type="button" class="btn-sm  btn btn-success InviteUser" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Invite People</button>
              <?php } ?>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="example11" class="cell-border example1 table table-striped table1 delSelTable">
              <thead>
                <tr>
                  <th><input type="checkbox" class="selAll"></th>
                  <th>Status</th>
									<th>Name</th>
									<th>Email</th>
                  <th>Type</th>
                  <th>Paid</th>
                  <th>Dues</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php 

$users = get_users();


 foreach ($users as $user) {

 $users_status = $this->User_model->users_stats($user->users_id, 1);
 $users_status_due = $this->User_model->users_stats($user->users_id, 0);

 $users_stats_so = $this->User_model->users_stats_so($user->users_id, 1);
 // echo $this->db->last_query();
 // break;
 $users_stats_so_due = $this->User_model->users_stats_so($user->users_id, 0);



   ?>
                <tr>
                  <td>
                    <input type="checkbox" name="selData" value="<?= $user->users_id; ?>">
                  </td>
                  <td>
                      <?= $user->status; ?>
                  </td>
                  <td>
                      <?= $user->name; ?>
                  </td>
                  <td>
                      <?= $user->email; ?>
                  </td>
                  <td>
                    <?= $user->user_type; ?>
                  </td>
                  <td>

                    <?=   $users_stats_so->total_priced + $users_status->total_priced; ?>
                  </td>
                  <td>
                    <?= $users_stats_so_due->total_priced + $users_status_due->total_priced; ?>
                  </td>
                  <td>
                    <a id="btnEditRow" class="modalButtonUser mClass" href="javascript:;" type="button" data-src="<?= $user->users_id; ?>" title="Edit">
                      <i class="fa fa-pencil" data-id=""></i>
                    </a>
                  <a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId(<?= $user->users_id; ?>, 'user')" data-target="#cnfrm_delete" title="delete">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>

<?php
 }
 ?>
              </tbody> 
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>  
<!-- Modal Crud Start-->
<div class="modal fade" id="nameModal_user" role="dialog">
  <div class="modal-dialog">
    <div class="box box-primary popup" >
      <div class="box-header with-border formsize">
        <h3 class="box-title">User Form</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <!-- /.box-header -->
      <div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
    </div>
  </div>
</div><!--End Modal Crud --> 
<script type="text/javascript">
  $(document).ready(function() {  

$('#example11').DataTable();

    var url = '<?php echo base_url();?>';//$('.content-header').attr('rel');
    var table = $('#example1').DataTable({ 
          dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "serverSide": true,
          "ajax": url+"user/dataTable",
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
      });
    
    setTimeout(function() {
      var add_width = $('.dataTables_filter').width()+$('.box-body .dt-buttons').width()+10;
      $('.table-date-range').css('right',add_width+'px');

        $('.dataTables_info').before('<button data-base-url="<?php echo base_url().'user/delete/'; ?>" rel="delSelTable" class="btn btn-default btn-sm delSelected pull-left btn-blk-del"> <i class="fa fa-trash"></i> </button><br><br>');  
    }, 300);
    $("button.closeTest, button.close").on("click", function (){});
  });
</script>            