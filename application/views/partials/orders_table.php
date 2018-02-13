
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
             <th>Title</th>
             <?php if(!is_designer()){ ?>
             <th>User</th>
             <th>Plan</th>
             <?php } ?>
             <?php if(!is_user()){ ?>
             <th>Designer</th>
             <?php } ?>
             <?php if(!is_designer()){ ?>
             <th>User Status</th>
             <?php } ?>
             <?php if(!is_user()){ ?>
             <th>Designer Status</th>
             <?php } ?>
             <?php if(!is_designer()){ ?>
             <th>Admin Status</th> 
             <?php } ?>
             <?php if(!is_user()){ ?>
             <th>Admin to designer Status</th> 
             <?php } ?>
             <th>Created</th> 
             <th>Updated</th> 
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($orders as $order) {
          ?>
          
          <tr>
            <td><a href="<?= base_url('plans/orderdetail/'. $order->id .'/'.$order->user_id .'/'); ?>"><?= $order->order_title; ?></a></td>
             <?php if(!is_designer()){ ?>
            <td><?= $order->name; ?></td>
            <td><?= $order->p_title; ?></td>
             <?php } ?>
             <?php if(!is_user()){ ?>
            <td><?= $order->d_name; ?></td>
             <?php } ?>
             <?php if(!is_designer()){ ?>
            <td><?= status($order->user_status); ?></td>
             <?php } ?>
             <?php if(!is_user()){ ?>
            <td><?= status($order->designer_status); ?></td>
             <?php } ?>
             <?php if(!is_designer()){ ?>
            <td><?= status($order->admin_status); ?></td>
             <?php } ?>
             <?php if(!is_user()){ ?>
            <td><?= status($order->admin_status_to_designer); ?></td>
             <?php } ?>
            <td><?= $order->o_created_at; ?></td>
            <td><?= $order->o_updated_at; ?></td>
          </tr>
       
          <?php 
          }
          ?>
        </tbody>
      </table>

