<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-table"></i>Customers List
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
            <h2><strong>Customers</strong> Table</h2>
            <div class="block-options pull-right">
                <a href="#modal-new-customer" class="btn btn-success" data-toggle="modal" title="Add New"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Sl.No</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($customers)) {
                        $i = 1; 
                        foreach($customers as $cus){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="text-capitalize"><a href="<?php echo base_url('customer/'.$cus['id']); ?>" class="text-info"><?php echo $cus['name']; ?></a></td>
						<td class="text-capitalize"><?php echo $cus['phone_number']; ?></td>
                        <td class=""><?php echo $cus['address']; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#modal-update-customer" data-id="<?php echo $cus['id']; ?>" onclick="fetchCustomerDetails(this);" data-toggle="modal" title="Update" class="btn btn-info enable-tooltip"><i class="fa fa-pencil"></i></a>

                                <a href="javascript:void(0)" data-id="<?php echo $cus['id']; ?>" onclick="deleteCustomerData(this);" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
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

<div id="modal-new-customer" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-success">
                <h2 class="modal-title"><i class="fa fa-plus"></i> Add New Customer</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/insert_customer'); ?>" id="customer-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Full Name</label>
                        <div class="col-md-8">
                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Name..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number</label>
                        <div class="col-md-8">
                            <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Phone Number..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea id="customer_address" name="customer_address" rows="4" class="form-control" placeholder="Address.."></textarea>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>

<div id="modal-update-customer" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Update Customer</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/update_customer'); ?>" id="customer-update-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" name="customer_id" id="customer_id">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Full Name</label>
                        <div class="col-md-8">
                            <input type="text" id="update_customer_name" name="customer_name" class="form-control" placeholder="Name..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number</label>
                        <div class="col-md-8">
                            <input type="text" id="update_customer_phone" name="customer_phone" class="form-control" placeholder="Phone Number..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea id="update_customer_address" name="customer_address" rows="4" class="form-control" placeholder="Address.."></textarea>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>

<script>
    function fetchCustomerDetails(mythis){
        var id = $(mythis).data('id');
        $.ajax({
            url: base_url+'admin/fetch_data',
            type: 'post',
            data: {id : id, tbl_name : 'customers'},
            dataType: "json",
            success: function(res){
                $('#customer_id').val(res.id);
                $('#update_customer_name').val(res.name);
                $('#update_customer_phone').val(res.phone_number);
                $('#update_customer_address').val(res.address);
            }
        });
    }

    function deleteCustomerData(mythis){
        var id = $(mythis).data('id');
        swal({
            title: "Are you sure?", 
            text: "You won't be able to revert this!", 
            type: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            showCancelButton: true
        })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: base_url+'admin/delete_by_id',
                        type: 'post',
                        data: {id : id, tbl_name : 'customers'},
                        success: function(res){
                            
                            $(mythis).parent().parent().parent().remove();
                            swal("Deleted!", "Data Successfully Deleted", "success");
                            setTimeout(() => {
                                window.location.href = base_url+'customers';    
                            }, 3000);
                        }
                    });
                }
            })
    }
</script>