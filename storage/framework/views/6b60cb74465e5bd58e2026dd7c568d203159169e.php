


<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'JS Grid Tables'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/jsgrid.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>TAGET INDICATOR LIBRARY</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Targer Indicator Library</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5>Targer Indicator Library</h5>
                        
                    </div> -->
                    
                    <div class="card-body">
                        <div class="d-inline">
                            
                        </div>
                        <div id="basicScenario" id="export-button"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/jsgrid/jsgrid.min.js')); ?>"></script>
    
    <script>
        let offices_data = [{Name: "", Id: 0}];
        getOfficesData();
        function getOfficesData() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "get_offices",
                dataType: "json",
                success: function(response) {
                    let results = response.results;
                    results.forEach(element => {
                        offices_data.push({
                            Name: element.name,
                            Id: element.id
                        })
                    });
                    initializeJsGrid();
                }
            });
        }

        function DecimalField(config) {
        jsGrid.fields.number.call(this, config);
    }

    DecimalField.prototype = new jsGrid.fields.number({

        filterValue: function() {
            return this.filterControl.val()
                ? parseFloat(this.filterControl.val() || 0, 10)
                : undefined;
        },

        insertValue: function() {
            return this.insertControl.val()
                ? parseFloat(this.insertControl.val() || 0, 10)
                : undefined;
        },

        editValue: function() {
            return this.editControl.val()
                ? parseFloat(this.editControl.val() || 0, 10)
                : undefined;
        }
    });

    jsGrid.fields.decimal = jsGrid.DecimalField = DecimalField;

        function initializeJsGrid() {
            $("#basicScenario").jsGrid({
                width: "100%",
                filtering: true,
                editing: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                deleteConfirm: "Do you really want to delete the indicator?",
                controller: {
                    loadData: function(filter) {
                        var deferred = $.Deferred();
                        $.ajax({
                            type: "GET",
                            url: "get_indicator",
                            dataType: "json",
                            data: filter,
                            success: function(response) {
                                deferred.resolve(response.results);
                            }
                        });
                        return deferred.promise();
                    },
                    insertItem: function(insertingClient) {
                        var deferred = $.Deferred();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "store_indicator",
                            dataType: "json",
                            data: insertingClient,
                            success: function(response) {
                                deferred.resolve(response.results);
                                $("#basicScenario").jsGrid("loadData");
                            }
                        });
                        return deferred.promise();
                    },
                    updateItem: function(updatingClient) {
                        var deferred = $.Deferred();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "update_indicator",
                            dataType: "json",
                            data: updatingClient,
                            success: function(response) {
                                deferred.resolve(response.results);
                            }
                        });
                        return deferred.promise();
                    },
                    deleteItem: function(deletingClient) {
                        var deferred = $.Deferred();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "delete_indicator",
                            dataType: "json",
                            data: deletingClient,
                            success: function(response) {
                                deferred.resolve(response.results);
                            }
                        });
                        return deferred.promise();
                    }
                },
                fields: [
                    {
                        name: "sort",
                        type: "number",
                        title: "Code",
                        validate: { message: "Code should be specified",  validator: "range", param: [1, 80] },
                        width: 60
                    },
                    {
                        name: "target_indicator_desc",
                        type: "text",
                        title: "Target Indicator",
                        validate: { message: "Target Indicator should be specified or put N/A", validator: "rangeLength", param: [1, 250] },
                        width: 150
                    },
                    {
                        name: "quantity",
                        type: "text",
                        title: "Quantity",
                        validate: { message: "Quantity should be specified or put N/A", validator: "rangeLength", param: [1, 250] },
                        width: 150
                    },
                    {
                        name: "quality",
                        type: "text",
                        title: "Quality",
                        validate: { message: "Quality should be specified or put N/A", validator: "rangeLength", param: [1, 250] },
                        width: 150
                    },
                    {
                        name: "timeliness",
                        type: "text",
                        title: "Timeliness",
                        validate: { message: "Quality should be specified or put N/A", validator: "rangeLength", param: [1, 250] },
                        width: 150
                    },
                    {
                        name: "sub_weight_allocation",
                        type: "decimal",
                        title: "Sub Weight Allocation",
                        validate: { message: "Sub Weight Allocation should be specified",  validator: "range", param: [1, 80] }, 
                        width: 85
                    },
                    {
                        name: "office_id",
                        type: "select",
                        title: "Offices",
                        width: 150,
                        items: offices_data,
                        valueField: "Id",
                        textField: "Name",
                        validate: { message: "Please Select Offices", validator: function(value) { return value > 0; } }
                    },
                    {
                        name: "parent_id",
                        type: "select",
                        title: "Is Parent",
                        width: 60,
                        items: [{
                                Name: "",
                                Id: 2
                            },
                            {
                                Name: "Yes",
                                Id: 1
                            },
                            {
                                Name: "No",
                                Id: 0
                            }
                        ],
                        valueField: "Id",
                        textField: "Name",
                        // validate: { message: "Please Select if it is Parent or Not", validator: "rangeLength", param: [1, 250] } 
                    },
                    // {
                    //     name: "created_at",
                    //     //type: "text",
                    //     title: "Date Created",
                    //     width: 80
                    // },
                    // {
                    //     name: "updated_at",
                    //     //type: "text",
                    //     title: "Date Updated",
                    //     width: 80
                    // },
                    // {
                    //     name: "country",
                    //     type: "select",
                    //     title: "Year",
                    //     items: [{
                    //             Name: "",
                    //             Id: 0
                    //         },
                    //         {
                    //             Name: "United States",
                    //             Id: 1
                    //         },
                    //         {
                    //             Name: "Canada",
                    //             Id: 2
                    //         },
                    //         {
                    //             Name: "United Kingdom",
                    //             Id: 3
                    //         },
                    //         {
                    //             Name: "France",
                    //             Id: 4
                    //         },
                    //         {
                    //             Name: "Brazil",
                    //             Id: 5
                    //         },
                    //         {
                    //             Name: "China",
                    //             Id: 6
                    //         },
                    //         {
                    //             Name: "Russia",
                    //             Id: 7
                    //         },
                    //         {
                    //             Name: "Philippines",
                    //             Id: 8
                    //         }
                    //     ],
                    //     valueField: "Id",
                    //     textField: "Name"
                    // },
                    // {
                    //     name: "married",
                    //     type: "checkbox",
                    //     title: "Is Married",
                    //     sorting: false
                    // },
                    {
                        type: "control"
                    }
                ]
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/indicator.blade.php ENDPATH**/ ?>