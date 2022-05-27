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
                <a href="<?php echo base_url('itemCRUD_create') ?>" class="btn btn-success pull-right">Add </a>
              </div>
            </div>
            <div class="card-body">

            <table id="item_list" class="table table-bordered">

<thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th width="220px">Action</th>
    </tr>
</thead>

</table>            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
