<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-table"></i>Category List
            </h1>
        </div>
    </div>
    <!-- END Datatables Header -->
    <?php
        $message = $this->session->flashdata('message');
        if(isset($message) && $message != "")
        echo successmessage($message);
    ?>
    <!-- Datatables Content -->
	<div class="block full">
        <div class="block-title">
            <h2><strong>Category</strong> Table</h2>
            <div class="block-options pull-right">
                <a href="#modal-new-category" class="btn btn-success" data-toggle="modal" title="Add New"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Sl.No</th>
                        <th>Category Name</th>
						<th>Status</th>
                        <th>Date Added</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($categories)) {
                        $i = 1; 
                        foreach($categories as $cate){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-capitalize"><?php echo $cate['category_name']; ?></td>
						<td class="">
                            <?php 
                            if($cate['status'] == 1) 
                                echo '<span class="label label-success">Active</span>';
                            else
                                echo '<span class="label label-warning">Deactive</span>';
                            ?>
                        </td>
                        <td class=""><?php echo date('d-m-Y H:i a', strtotime($cate['date_added'])); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#modal-update-category" data-id="<?php echo $cate['id']; ?>" onclick="fetchCatDetails(this);" data-toggle="modal" title="Update" class="btn btn-info enable-tooltip"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-id="<?php echo $cate['id']; ?>" onclick="deleteCatData(this);" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
                        }
                    }?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
