


<?php $__env->startSection('title', 'GRIP | Section Library'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/jsgrid.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Section Library</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Section Library</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
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
        let section_data = [{Name: "", Abbri: "", Id: 0}];
        getOfficesData();
        function getOfficesData() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "get_division",
                dataType: "json",
                success: function(response) {
                    let results = response.results;
                    results.forEach(element => {
                        section_data.push({
                            Name: element.name,
                            Abbri: element.code,
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
            deleteConfirm: "Do you really want to delete the section?",
            controller: {
                loadData: function(filter) {
                    var deferred = $.Deferred();
                    $.ajax({
                        type: "GET",
                        url: "get_section",
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
                        url: "store_section",
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
                        url: "update_section",
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
                        url: "delete_section",
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
                    name: "division_id",
                    type: "select",
                    title: "Division",
                    width: 50,
                    items: section_data,
                    valueField: "Id",
                    textField: "Abbri",
                    validate: { message: "Please Select Division", validator: function(value) { return value > 0; } }
                },
                {
                    name: "sec_name",
                    type: "text",
                    title: "Section",
                    validate: { message: "Section should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 200
                },
                {
                    name: "sec_code",
                    type: "text",
                    title: "Abbreviation",
                    validate: { message: "Abbreviation should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 40
                },
                {
                    type: "control"
                }
            ]
        });
    }
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/pages/section.blade.php ENDPATH**/ ?>