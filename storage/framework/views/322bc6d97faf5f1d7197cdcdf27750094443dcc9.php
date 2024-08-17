


<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'JS Grid Tables'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/jsgrid.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>DIVISION LIBRARY</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Division Library</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5>Office Library</h5>
                        
                    </div> -->
                    
                    <div class="card-body">
                        <div class="d-inline">
                        </div>
                        <div id="basicScenario"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/jsgrid/jsgrid.min.js')); ?>"></script>
    
    <script>
        $("#basicScenario").jsGrid({
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 9,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete the division?",
            controller: {
                loadData: function(filter) {
                    var deferred = $.Deferred();
                    $.ajax({
                        type: "GET",
                        url: "get_division",
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
                        url: "store_division",
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
                        url: "update_division",
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
                        url: "delete_division",
                        dataType: "json",
                        data: deletingClient,
                        success: function(response) {
                            deferred.resolve(response.results);
                        }
                    });
                    return deferred.promise();
                }
            },
            fields: [{
                    name: "id",
                    //type: "text",
                    title: "#",
                    width: 10
                },
                {
                    name: "name",
                    type: "text",
                    title: "Division",
                    validate: { message: "Division should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 200
                },
                {
                    name: "code",
                    type: "text",
                    title: "Abbreviation",
                    validate: { message: "Abbreviation should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 40
                },
                {
                    name: "created_at",
                    //type: "text",
                    title: "Date Created",
                    width: 70
                },
                // {
                //     name: "updated_at",
                //     //type: "text",
                //     title: "Date Updated",
                //     width: 70
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/division.blade.php ENDPATH**/ ?>