$(function () {
    'use strict';
    // Hid text Placeholder
    $('[placeholder]').focus(function () {
        $(this).attr('text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('text'));
    });

    //Hid and show password
    var passField = $('.password');
    $('.show-pass').hover(function () {
        passField.attr('type', 'text');
    }, function () {
        passField.attr('type', 'password');
    });
    //Confirm dialog when delete user
    $('.confirm').click(function () {
        return confirm('Are you sure to delete this user?')
    })

    $(document).ready(function () {
        addItem();
        deleteItem();
        getItemViewInTable();
        getItem();
        //editItem()
        updateItem()
    });

    //Add Item using Ajax
    function addItem() {
        $('.message-alert').html("Please Fill in the Blanks!");
        $('#add-item').click(function () {
            var name = $('#name-item').val();
            var description = $('#description-item').val();
            var price = $('#price-item').val();
            var country = $('#country-item').val();
            if (name == "" || description == "" || price == "" || country == "") {
                $('.message-alert').html("Please Fill in the Blanks!");
            } else {
                $.ajax({
                    url: 'innerpage/itemsPages/insertItems.php',
                    method: 'POST',
                    data: {
                        'name': name,
                        'description': description,
                        'price': price,
                        'country': country
                    },
                    success: function () {
                        $('.message-alert').html('Added successfully');
                        $('form').trigger('reset');
                        //getItemViewInTable();
                        //$('#items-table').Datatable().ajax.reload();
                        table.ajax.reload(null, false);
                    }
                })
            }
        })
    }

    var table;

    //Function to return items data from mysql AJAX table
    function getItemViewInTable() {
        table = $('#items-table').DataTable({
            ajax: {
                url: "innerpage/itemsPages/getItems.php",
                dataSrc: "items"
            },
            columns: [
                {"data": "itemID"},
                {"data": "Name"},
                {"data": "Description"},
                {"data": "Price"},
                {"data": "Date"},
                {"data": "Country"},
                {"data": "Rating"},
                {"data": "CatID"},
                {"data": "MemberID"},
                {"data": "Control"}
            ]
        });
    }

    $('#cancel').click(function () {
        $('form').trigger('reset');
        $('.message-alert').html("Please Fill in the Blanks!");
    });

    //Confirm Delete Item from table ajax
    function deleteItem() {
        $('#items-table').on('click', 'tr td #delete-btn', function () {
            const itemID = $(this).attr('itemID');
            var proceed = confirm('Are you sure to delete this Item?')
            if (proceed) {
                console.log(itemID);
                $.ajax({
                    url: 'innerpage/itemsPages/deleteItems.php',
                    method: 'POST',
                    data: {'itemID': itemID},
                    success: function () {
                        $('.message-item').html('Remove successfully');
                        table.ajax.reload(null, false);
                    }
                })
            }
        });
    }

    function getItem() {
        $('#items-table').on('click', 'tr td #edit-btn', function () {
            const itemID = $(this).attr('itemID');
            $.ajax({
                url: 'innerpage/itemsPages/getItem.php',
                method: 'POST',
                data: {'itemID': itemID},
                dataType: 'JSON',
                success: function (data) {
                    $('#itemID').val(data['itemID']);
                    $('#itemName').val(data['Name']);
                    $('#itemDescription').val(data['Description']);
                    $('#itemPrice').val(data['Price']);
                    $('#itemDate').val(data['Date']);
                    $('#itemCountry').val(data['Country']);
                    $('#itemRating').val(data['Rating']);
                    $('#itemCatID').val(data['CatID']);
                    $('#itemMemberID').val(data['MemberID']);
                }
            })
        });
    }

    function updateItem() {
        $('#update-item').click(function () {
            var itemID = $('#itemID').val();
            var itemName = $('#itemName').val();
            var itemDescription = $('#itemDescription').val();
            var itemPrice = $('#itemPrice').val();
            var itemDate = $('#itemDate').val();
            var itemCountry = $('#itemCountry').val();
            var itemRating = $('#itemRating').val();
            var itemCatID = $('#itemCatID').val();
            var itemMemberID = $('#itemMemberID').val();
            // console.log(itemID,itemName,itemDescription);
            $.ajax({
                url: 'innerpage/itemsPages/updateItems.php',
                method: 'POST',
                data: {
                    'itemID': itemID,
                    'name': itemName,
                    'description': itemDescription,
                    'price': itemPrice,
                    'date': itemDate,
                    'country': itemCountry,
                    'rating': itemRating,
                    'catID': itemCatID,
                    'memberID': itemMemberID,
                },
                success: function () {
                    table.ajax.reload(null, false);
                }
            })
        });
    }
});