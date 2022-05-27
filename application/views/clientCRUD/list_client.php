<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header" style="border-bottom: 0px;">
              <div class="box-header" style="float: right;">
                <a href="<?php echo base_url('clientCRUD_create') ?>" class="btn btn-success pull-right">Add </a>
              </div>
            </div>
            <div class="card-body">
            <table id="client_list" class="table table-bordered">

<thead>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>Address</th>
        <th>Mobile</th>
        <th width="220px">Action</th>
    </tr>
</thead>


<tbody>
 <?php foreach ($data as $item) { ?>      
  <tr>
      
        <td><?php echo $item->id; ?></td>
        <td><?php echo $item->name; ?></td>
        <td><?php echo $item->addr; ?></td>   
        <td><?php echo $item->mobile; ?></td>   

      <td>
      <div class="icon">
      <form method="post" action="<?php echo base_url('clientCRUD_delete/'.$item->id);?>">
        <a class="btn btn-info" href="<?php echo base_url('clientCRUD_show/'.$item->id) ?>"> show</a>
        <a class="btn btn-primary" href="<?php echo base_url('clientCRUD_edit/'.$item->id) ?>"> Edit</a>
        <button type="submit" class="btn btn-danger"> Delete</button>
      </form>
      </div>
      </td>

  </tr>
    <?php } ?>
</tbody>
</table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
