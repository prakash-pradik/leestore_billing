                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-left">
                            <span id="year-copy1">2024</span> &copy; <a href="#" target="_blank">Lee Store</a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <legend>User Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">Admin</p>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password Update</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
        <!-- END User Settings -->

<div id="modal-new-category" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-success">
                <h2 class="modal-title"><i class="fa fa-plus"></i> Add New Category</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/insert_category'); ?>" id="category-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" id="purchase_type" name="purchase_type" value="buy">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Name..">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-md-4 control-label">Details</label>
                        <div class="col-md-8">
                            <textarea id="category_details" name="category_details" rows="4" class="form-control" placeholder="Tell us details.."></textarea>
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

<div id="modal-update-category" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Update Category</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/update_category'); ?>" id="category-update-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" class="category_id" name="category_id" value="">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" id="update_category_name" name="category_name" class="form-control category_name" placeholder="Name..">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-md-4 control-label">Details</label>
                        <div class="col-md-8">
                            <textarea id="update_category_details" name="category_details" rows="4" class="form-control category_details" placeholder="Tell us details.."></textarea>
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

<div id="modal-view-buysell" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-shopping-cart"></i> View Details</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="javascript:;" class="form-horizontal form-bordered" >
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Name :</label>
                        <div class="col-md-8">
                            <strong><p class="form-control-static view_customer_name"></p></strong>
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>

<div id="modal-new-product" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-success">
                <h2 class="modal-title"><i class="fa fa-plus"></i> Add New Product</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/insert_product'); ?>" id="product-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-8">
                                    <select id="category_name" name="category_name" class="form-control">
                                        <option value="">Please select</option>
                                        <?php if(!empty($categories)) {
                                            foreach($categories as $cate){
                                        ?>
                                            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['category_name']; ?></option>
                                        <?php
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Brand Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="brand_name" name="brand_name" class="form-control" placeholder="Brand Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IMEI Number 1</label>
                                <div class="col-md-8">
                                    <input type="text" id="imei_number1" name="imei_number1" class="form-control" placeholder="IMEI 1..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IMEI Number 2</label>
                                <div class="col-md-8">
                                    <input type="text" id="imei_number2" name="imei_number2" class="form-control" placeholder="IMEI 1..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Serial Number</label>
                                <div class="col-md-8">
                                    <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial #..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-8">
                                    <input type="text" id="price" name="price" class="form-control" placeholder="Price..">
                                </div>
                            </div>
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

<div id="modal-update-product" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Update Product</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/update_product'); ?>" id="product-update-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" class="product_id" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="product_name" name="product_name" class="form-control product_name" placeholder="Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-8">
                                    <select id="category_name" name="category_name" class="form-control category_name">
                                        <option value="">Please select</option>
                                        <?php if(!empty($categories)) {
                                            foreach($categories as $cate){
                                        ?>
                                            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['category_name']; ?></option>
                                        <?php
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Brand Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="brand_name" name="brand_name" class="form-control brand_name" placeholder="Brand Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IMEI Number 1</label>
                                <div class="col-md-8">
                                    <input type="text" id="imei_number1" name="imei_number1" class="form-control imei_number1" placeholder="IMEI 1..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IMEI Number 2</label>
                                <div class="col-md-8">
                                    <input type="text" id="imei_number2" name="imei_number2" class="form-control imei_number2" placeholder="IMEI 1..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Serial Number</label>
                                <div class="col-md-8">
                                    <input type="text" id="serial_number" name="serial_number" class="form-control serial_number" placeholder="Serial #..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-8">
                                    <input type="text" id="price" name="price" class="form-control price" placeholder="Price..">
                                </div>
                            </div>
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

<div id="modal-new-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-success">
                <h2 class="modal-title"><i class="fa fa-plus"></i> Add New Staff</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/insert_staff'); ?>" id="staff-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Full Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_full_name" name="staff_full_name" class="form-control" placeholder="Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_phone_number" name="staff_phone_number" class="form-control" placeholder="Phone Number..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">User Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_user_name" name="staff_user_name" class="form-control" placeholder="User Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_password" name="staff_password" class="form-control" placeholder="******">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="staff_email" name="staff_email" class="form-control" placeholder="Email..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_dob" name="staff_dob" class="form-control input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-8">
                                    <select id="staff_gender" name="staff_gender" class="form-control">
                                        <option value="">Please select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label">Profile Image</label>
                                <div class="col-md-8">
                                    <input type="file" id="staff_photo" name="staff_photo">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea id="staff_address" name="staff_address" rows="4" class="form-control" placeholder="Address.."></textarea>
                                </div>
                            </div>
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

<div id="modal-update-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-info">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Update Staff</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/update_staff'); ?>" id="staff-update-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" class="staff_edit_id" name="staff_edit_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Full Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_full_name" name="staff_full_name" class="form-control staff_full_name" placeholder="Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_phone_number" name="staff_phone_number" class="form-control staff_phone_number" placeholder="Phone Number..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">User Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_user_name" name="staff_user_name" class="form-control staff_user_name" placeholder="User Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_password" name="staff_password" class="form-control staff_password" placeholder="******">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="staff_email" name="staff_email" class="form-control staff_email" placeholder="Email..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-8">
                                    <input type="text" id="staff_dob" name="staff_dob" class="form-control staff_dob input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-8">
                                    <select id="staff_gender" name="staff_gender" class="form-control staff_gender">
                                        <option value="">Please select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea id="staff_address" name="staff_address" rows="4" class="form-control staff_address" placeholder="Address.."></textarea>
                                </div>
                            </div>
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

<div id="modal-new-stock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-success">
                <h2 class="modal-title"><i class="fa fa-plus"></i> Add New Stock</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/insert_stock'); ?>" id="stock-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" id="purchase_type" name="purchase_type" value="buy">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Category</label>
                        <div class="col-md-8">
                            <select id="stock_category" name="stock_category" class="form-control" >
                                <option value="">Please select</option>
                                <?php if(!empty($categories)) {
                                    foreach($categories as $cate){
                                ?>
                                    <option value="<?php echo $cate['id']; ?>"><?php echo $cate['category_name']; ?></option>
                                <?php
                                    }
                                }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Products</label>
                        <div class="col-md-8">
                            <select id="stock_product_id" name="stock_product_id" class="form-control">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="supplier_type" name="supplier_type" value="old">
                    <div id="old_supplier_block">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Supplier</label>
                            <div class="col-md-8">
                                <select id="stock_supplier_id" name="stock_supplier_id" class="form-control">
                                    <option value="">Please select</option>
                                    <?php if(!empty($suppliers)) {
                                        foreach($suppliers as $sup){
                                    ?>
                                        <option value="<?php echo $sup['id']; ?>"><?php echo $sup['supplier_name']; ?></option>
                                    <?php
                                        }
                                    }?>
                                </select>
                                <a href="javascript:void(0)" onclick="showSupplierBlock('new');" class="sub_text">New Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div id="new_supplier_block" style="display:none;">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Supplier Name</label>
                            <div class="col-md-8">
                                <input type="text" id="supplier_name" name="supplier_name" class="form-control" placeholder="Name..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Supplier Phone</label>
                            <div class="col-md-8">
                                <input type="text" id="supplier_phone" name="supplier_phone" class="form-control" placeholder="Phone..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Details</label>
                            <div class="col-md-8">
                                <textarea id="supplier_details" name="supplier_details" rows="4" class="form-control" placeholder="Tell us details.."></textarea>

                                <a href="javascript:void(0)" onclick="showSupplierBlock('old');" class="sub_text">Old Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">No.of Stock</label>
                        <div class="col-md-8">
                            <input type="text" id="stock_number" name="stock_number" class="form-control" placeholder="Stock..">
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

<div id="modal-assign-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center bg-warning">
                <h2 class="modal-title"><i class="fa fa-chain-broken"></i> Assign Role</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url('admin/assign_role'); ?>" id="assginRole-validation" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" name="assign_emp_id" id="assign_emp_id" >
                    <div class="form-group">
                        <label class="col-md-4 control-label">Role Type</label>
                        <div class="col-md-8">
                            <select id="staff_role_type" name="staff_role_type" class="form-control">
                                <option value="">Please select</option>
                                <option value="biller">Biller</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Assign</button>
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
	
    function fetchDetails1(mythis){
        $('#user_id').val( $(mythis).data('user_id') );
		$('#user_name').val( $(mythis).data('name') );
		$('#user_phone').val( $(mythis).data('phone') );
    }

    function fetchCatDetails(mythis){
        var id = $(mythis).data('id');
        $.ajax({
            url: base_url+'admin/fetch_data',
            type: 'post',
            data: {id : id, tbl_name : 'categories'},
            dataType: "json",
            success: function(res){
                $('.category_id').val(res.id);
                $('.category_name').val(res.category_name);
                $('.category_details').val(res.details);
            }
        });
    }

    function deleteCatData(mythis){
        //$.fn.dataTable.ext.errMode = 'none';
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
                        data: {id : id, tbl_name : 'categories'},
                        success: function(res){
                            
                            $(mythis).parent().parent().parent().remove();
                            swal("Deleted!", "Data Successfully Deleted", "success");
                            setTimeout(() => {
                                window.location.href = base_url+'categories';    
                            }, 3000);
                        }
                    });
                }
            })
    }

    function fetchProductDetails(mythis){
        var id = $(mythis).data('id');
        $.ajax({
            url: base_url+'admin/fetch_data',
            type: 'post',
            data: {id : id, tbl_name : 'products'},
            dataType: "json",
            success: function(res){
                $('.product_id').val(res.id);
                $('.product_name').val(res.product_name);
                $(".category_name").val(res.category_id).change();
                $('.brand_name').val(res.brand_name);
                $('.imei_number1').val(res.imei_number1);
                $('.imei_number2').val(res.imei_number2);
                $('.serial_number').val(res.serial_number);
                $('.price').val(res.price);
            }
        });
    }

    function deleteProductData(mythis){
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
                        data: {id : id, tbl_name : 'products'},
                        success: function(res){
                            
                            $(mythis).parent().parent().parent().remove();
                            swal("Deleted!", "Data Successfully Deleted", "success");
                            setTimeout(() => {
                                window.location.href = base_url+'products';    
                            }, 3000);
                        }
                    });
                }
            })
    }

    function fetchStaffDetails(mythis){
        var id = $(mythis).data('id');
        $.ajax({
            url: base_url+'admin/fetch_data',
            type: 'post',
            data: {id : id, tbl_name : 'employees'},
            dataType: "json",
            success: function(res){

                $('#assign_emp_id').val(res.id);
                $('#staff_role_type').val(res.role_type).change();

                $('.staff_edit_id').val(res.id);
                $('.staff_full_name').val(res.full_name);
                $('.staff_phone_number').val(res.phone_number);
                $('.staff_user_name').val(res.user_name);
                $('.staff_password').val(res.password);
                $('.staff_email').val(res.email);
                $('.staff_dob').val(res.dob);
                $('.staff_gender').val(res.gender).change();
                $('.staff_address').val(res.address);
            }
        });
    }

    function deleteStaffData(mythis){
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
                        data: {id : id, tbl_name : 'employees'},
                        success: function(res){
                            
                            $(mythis).parent().parent().parent().remove();
                            swal("Deleted!", "Data Successfully Deleted", "success");
                            setTimeout(() => {
                                window.location.href = base_url+'staffs';    
                            }, 3000);
                        }
                    });
                }
            })
    }
</script>