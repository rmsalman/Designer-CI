
      <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
             <th>Title</th>
             <th>User</th>
             <th>Plan</th>
             <th>Designer</th>
             <th>User Status</th>
             <th>Designer Status</th>
             <th>Admin Status</th> 
             <th>Admin to designer Status</th> 
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
            <td><?= $order->name; ?></td>
            <td><?= $order->p_title; ?></td>
            <td><?= $order->d_name; ?></td>
            <td><?= status($order->user_status); ?></td>
            <td><?= status($order->designer_status); ?></td>
            <td><?= status($order->admin_status); ?></td>
            <td><?= status($order->admin_status_to_designer); ?></td>
            <td><?= $order->o_created_at; ?></td>
            <td><?= $order->o_updated_at; ?></td>
          </tr>
       
          <?php 
          }
          ?>
        </tbody>
      </table>

