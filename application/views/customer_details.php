<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-user"></i>Customer Details
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="javascript:window.history.go(-1);" class="text-info"><h5>Back Page</h5></a></li>
        <!-- <li><a href="javascript:window.history.go(-1);" class="text-info"><h5>Back Page</h5></a></li> -->
    </ul>
    <!-- END Datatables Header -->

    <div class="row">
        <div class="col-lg-4">
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="fa fa-file-o"></i> <strong>Customer</strong> Info</h2>
                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <?php 
                        if(!empty($customer) && isset($customer->profile_image) && $customer->profile_image != NULL) 
                            $photo = base_url().'uploads/'.$customer->profile_image.'.jpg'; 
                        else 
                            $photo = base_url(IMG).'/placeholders/avatars/avatar4@2x.jpg';
                    ?>
                    <a href="javascript:void(0)">
                        <img src="<?php echo $photo; ?>" alt="avatar" class="img-circle" style="width:100px; height:100px;object-fit: cover">
                    </a>
                    <h3>
                        <strong><?php if(!empty($customer)) echo $customer->name; ?></strong><br><small></small>
                    </h3>
                    <?php if(!empty($customer)) $customerId =  $customer->id; else $customerId = '';?>
                    <input type="hidden" id="sup_id" value="<?php echo $customerId; ?>">
                </div>
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 50%;"><strong>Social Title</strong></td>
                            <td>Mr.</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Phone Number</strong></td>
                            <td><?php if(!empty($customer)) echo $customer->phone_number; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Address</strong></td>
                            <td><?php if(!empty($customer)) echo $customer->address; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Status</strong></td>
                            <td>
                                <?php if(!empty($customer)) 
                                    if($customer->status == 1) {
                                        echo '<span class="label label-success"><i class="fa fa-check"></i> Active</span>';
                                    } else {
                                        echo '<span class="label label-danger"><i class="fa fa-user-times"></i> Deactive</span>';
                                } ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
            <!-- END Customer Info Block -->

        </div>
        <div class="col-lg-8">
            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <h2><i class="fa fa-mobile"></i> <strong>Products</strong> By Customers</h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <div class="table-responsive">
                    <table id="sales-datatable" class="table table-vcenter table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Sl.No</th>
                                <th class="">Details</th>
                                <th class="text-left">No.of Stocks</th>
                                <th class="">Date & Time</th>
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($stocks)) {
                                $i = 1; 
                                foreach($stocks as $stock){
                            ?>
                            <tr>
                                <td class="text-center" style="width: 10%;"><?php echo $i; ?></td>
                                <td class="text-capitalize" style="width: 30%;"><?php echo $stock['product_name']; ?></td>
                                <td class="text-left"><strong class="text-success"><?php echo $stock['no_of_stock']; ?></strong></td>
                                <td><?php echo date('d-m-Y h:i a', strtotime($stock['date_added'])); ?></td>
                                <!-- <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="#modal-update-stock" data-toggle="modal" title="Edit" data-id="<?php echo $stock['id']; ?>" data-number="<?php echo $stock['no_of_stock']; ?>" onclick="fetchStockData(this)" class="btn btn-default enable-tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-id="<?php echo $stock['id']; ?>" onclick="deleteStockData(this);" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td> -->
                            </tr>
                            <?php
                            $i++;
                                }
                            }?>
                            
                        </tbody>
                    </table><br/>
                </div>
                <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->
            
        </div>
    </div>
</div>

<div id="modal-update-stock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Update Stock</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/update_stock/'.$customerId); ?>" id="stock-update-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" id="update_stock_id" name="update_stock_id" value="">
                    <div class="form-group">
                        <label class="col-md-4 control-label">No.of Stock</label>
                        <div class="col-md-8">
                            <input type="text" id="update_stock_number" name="update_stock_number" class="form-control" placeholder="Stock..">
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
    var base_url = document.getElementById("base_url").value; //$('#base_url').val();
    var supplierId = document.getElementById("sup_id").value;

    function deleteStockData(mythis){
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
                        data: {id : id, tbl_name : 'godown'},
                        success: function(res){
                            
                            $(mythis).parent().parent().parent().remove();
                            swal("Deleted!", "Data Successfully Deleted", "success");
                            setTimeout(() => {
                                window.location.href = base_url+'supplier/'+supplierId;    
                            }, 3000);
                        }
                    });
                }
            })
    }
    function fetchStockData(mythis){
        document.getElementById("update_stock_id").value = $(mythis).data('id');
        document.getElementById("update_stock_number").value = $(mythis).data('number');
    }
</script>
