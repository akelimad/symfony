$(document).ready(function() {
	'use strict'
    //init product images switcher
    $(".sidebar-wrapper .nav li").click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });
    //demo.initStatsDashboard();
    demo.initVectorMap();
    demo.initCirclePercentage();

    $('div.dataTables_wrapper div.dataTables_filter input').click(function(){
        alert("ok");
    });

    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Recherche . e.g(prix= 100)",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');

    // ************************************* //
    //       delete product with ajax
    // ************************************* //
    $('.remove-product').click(function () {
        var url = Routing.generate('product_delete', {'id': $(this).data('id')});
        var $tr = $(this).closest('tr');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                    "_method": "DELETE",
                    "form[_token]": $("#csrf_token").data("token")
                    }
                }).done(function(response){
                    swal('Deleted!', 'Product has been deleted.', 'success');
                    $tr.find('td').fadeOut(1000,function(){ $tr.remove(); });
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });

    // ************************************* //
    //       delete cat with ajax
    // ************************************* //
    $('.remove-category').click(function () {
        var url = Routing.generate('category_delete', {'id': $(this).data('id')});
        var $tr = $(this).closest('tr');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                    "_method": "DELETE",
                    "form[_token]": $("#csrf_token").data("token")
                    }
                }).done(function(response){
                    swal('Deleted!', 'Category has been deleted.', 'success');
                    $tr.find('td').fadeOut(1000,function(){ $tr.remove(); });
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });

    // ************************************* //
    //       delete cat with ajax
    // ************************************* //
    $('.remove-package').click(function () {
        var url = Routing.generate('package_delete', {'id': $(this).data('id')});
        var $tr = $(this).closest('tr');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                    "_method": "DELETE",
                    "form[_token]": $("#csrf_token").data("token")
                    }
                }).done(function(response){
                    swal('Deleted!', 'Package has been deleted.', 'success');
                    $tr.find('td').fadeOut(1000,function(){ $tr.remove(); });
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });

    // ************************************* //
    //       delete cat with ajax
    // ************************************* //
    $('.remove-provider').click(function () {
        var url = Routing.generate('provider_delete', {'id': $(this).data('id')});
        var $tr = $(this).closest('tr');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                    "_method": "DELETE",
                    "form[_token]": $("#csrf_token").data("token")
                    }
                }).done(function(response){
                    swal('Deleted!', 'Provider has been deleted.', 'success');
                    $tr.find('td').fadeOut(1000,function(){ $tr.remove(); });
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });

    // ************************************* //
    //       manage images of product
    // ************************************* //
    $('.remove-img-link').click(function(){
        var id= $(this).data('id');
        var url = Routing.generate('imageproduct_delete', {'id': id });
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: 'POST',
                    url:  url,
                    data: {
                    "_method": "DELETE",
                    "form[_token]": $("#csrf_token").data("token")
                    },
                    success: function() {
                        $(this).parents("#media-"+ id).remove();
                    }
                }).done(function(response){
                    $("#media-"+ id).remove();
                    swal('Deleted!', 'image has been deleted.', 'success');
                }).fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            });
            },
            allowOutsideClick: false     
        }); 
    });



    
    $("#filter-by-cat").change(function(evt){
        var category_id = $(this).val();
        var url = Routing.generate('filter-by-cat', {'category_id': category_id});
        var product_results = $('#product-results');
        //alert(url);
        $.ajax({
            ajax: true,
            type: 'GET',
            url:  url,
            dataType: 'html',
            success: function(data){
                product_results.empty().html(data.products);
                console.log(data);
            },
            error: function(){
                console.log("error ...");
            }
        });
    });

    $("#filter-by-prov").change(function(){
        var prov = $(this).val();
        alert(prov);
    });









});