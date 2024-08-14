


<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'JS Grid Tables'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/jsgrid.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>OBJECTIVES, PROGRAMS, PROJECT, ACTIVITY LIBRARY</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Objectives, Programs, Project, Activity Library</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5>Objectives, Programs, Project, Activity Library</h5>
                        
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
        let category_data = [{Name: "", Id: 0}];
        getCategoryData();
        function getCategoryData() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "get_category",
                dataType: "json",
                success: function(response) {
                    let results = response.results;
                    results.forEach(element => {
                        category_data.push({
                            Name: element.name,
                            Id: element.id
                        })
                    });
                    initializeJsGrid();
                }
            });
        }

    function initializeJsGrid() {
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
            deleteConfirm: "Do you really want to delete the activity?",
            controller: {
                loadData: function(filter) {
                    var deferred = $.Deferred();
                    $.ajax({
                        type: "GET",
                        url: "get_activity",
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
                        url: "store_activity",
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
                        url: "update_activity",
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
                        url: "delete_activity",
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
                    name: "category_id",
                    type: "select",
                    title: "KRA Category",
                    items: category_data,
                    valueField: "Id",
                    textField: "Name",
                    validate: { message: "Category should be specified", validator: function(value) { return value > 0; } }
                },
                {
                    name: "name",
                    type: "text",
                    title: "Objective, Program, Project, Activity",
                    width: 100,
                    validate: { message: "Objective, Program, Project, and Activity should be specified", validator: "rangeLength", param: [1, 250] }
                },
                {
                    name: "discription",
                    type: "text",
                    title: "Description",
                    width: 100,
                    validate: { message: "Description should be specified", validator: "rangeLength", param: [1, 250] }
                },
                // {
                //     name: "category_id",
                //     type: "text",
                //     title: "Category",
                //     width: 40
                
                // },
               
                {
                    name: "created_at",
                    //type: "text",
                    title: "Date Created",
                    width: 55
                },
                // {
                //     name: "updated_at",
                //     //type: "text",
                //     title: "Date Updated",
                //     width: 55
                // },
                // {
                //     name: "address",
                //     type: "text",
                //     title: "Indicator",
                //     width: 200
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/activity.blade.php ENDPATH**/ ?>