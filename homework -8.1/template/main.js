
function getProduct(data) {
    var products_table = "<table class='table-bordered'><tr><th>Наименование</th><th>Категория</th><th>Цена</th><th>Описание</th><th>Редактировать</th><th>Удалить</th></tr>";
    products_table += '<td>' + data.name + '</td>';
    products_table += '<td>' + data.category_id + '</td>';
    products_table += '<td>' + data.price + '</td>';
    products_table += '<td>' + data.description + '</td>';
    products_table += "<td><a  id=" + data.id + " class='edit' href='edit.php'>Редактировать</a></td>";
    products_table += "<td><a id=" + data.id + " class='delete' href=''>Удалить</a></td></tr>";
    products_table += '</table>';
    $('.product_table').html(products_table);
};

function getProducts(data) {
    var products_table = "<table  class='table-bordered'><tr><th>id</th><th>Наименование</th><th>Категория</th><th>Цена</th><th>Описание</th><th>Посмотреть</th><th>Редактировать</th><th>Удалить</th></tr>";
    for (var i = 0; i < data.length; i++) {
        var id = data[i].id;
        products_table += '<td>' + data[i].id + '</td>';
        products_table += '<td>' + data[i].name + '</td>';
        products_table += '<td>' + data[i]['category'].name + '</td>';
        products_table += '<td>' + data[i].price + '</td>';
        products_table += '<td>' + data[i].description + '</td>';
        products_table += '<td><a  id=' + id + ' class="show" href="">товар</a></td>';
        products_table += '<td><a  id=' + id + ' class="edit" href="">Редактировать</a></td>';
        products_table += '<td><a  id=' + id + ' class="delete" href="">Удалить</a></td></tr>';
    }
    products_table += '</table>';
    $('.product_table').html(products_table);
};



// показать все товары
(function () {
    $("#button").on('click', function () {
        $.ajax({
            cache: false,
            url: '/api.php',
            method: 'GET',
            dataType: 'json'
        }).done(function (data) {
           getProducts(data);
        });
    });
})();


// посмотреть один товар

(function () {
    $(document).delegate('a.show', 'click', function (e) {
        e.preventDefault();
        id = this.id;
        $.ajax({
            cache: false,
            url: '/api2.php?id=' + id,
            method: 'GET',
            dataType: 'json'
        }).done(function (data) {
            getProduct(data);
        });
    });
})();

//добавить товар

(function () {
    $('.success').remove();
    $("#put").on('click', function () {
        var name = $('#name').val();
        var price = $('#price').val();
        var category = $('#category').val();
        var description = $('#description').val();

        $.ajax({
            cache: false,
            url: '/api.php',
            method: 'POST',
            data: {
                name: name,
                price: price,
                category: category,
                description: description
            },
            dataType: 'json'
        }).done(function () {
            $('.add_form').append("<div class='success'>товар добавлен</div>");
            setTimeout(function () {
                $('.success').remove();
                $('.add_form').find('input[type=text],textarea').val('');
            }, 1000);
        });

        setTimeout(function () {
            $.ajax({
                cache: false,
                url: '/api.php',
                method: 'GET',
                dataType: 'json'
            }).done(function (data) {
                getProducts(data);
            });
        }, 2000);

    });
})();

// удалить товар

(function () {
    $(document).delegate('a.delete', 'click', function (e) {
        e.preventDefault();
        var id = this.id;
        var tr = $(this).closest('tr');
        // alert(id);
        $.ajax({
            cache: false,
            url: '/api.php?id=' + id,
            method: 'DELETE',
            dataType: 'json'
        }).done(function () {
            tr.fadeOut(100, function () {
                $(this).remove();
            });
        });
    });
})();

//редактировать товар

(function () {
    $(document).delegate('a.edit', 'click', function (e) {
        e.preventDefault();
        var id = this.id;
        $.ajax({
            cache: false,
            url: '/api2.php?id=' + id,
            method: 'GET',
            dataType: 'json'
        }).done(function (data) {
            $('#edit_name').val(data.name);
            $('#edit_price').val(data.price);
            $('#edit_category').val(data.category_id);
            $('#edit_description').val(data.description);
            $('.id').text(data.id);
        });
    });
})();


(function () {
    $('.success').remove();
    $("#edit").on('click', function () {
        var name = $('#edit_name').val();
        var price = $('#edit_price').val();
        var category = $('#edit_category').val();
        var description = $('#edit_description').val();
        var id = $('.id').text();
        $.ajax({
            cache: false,
            url: '/api.php?id=' + id,
            method: 'POST',
            data: {
                name: name,
                price: price,
                category: category,
                description: description,
            },
            dataType: 'json'
        }).done(function (data) {
            $('.edit_form').append("<div class='success'>товар редактирован</div>");
            setTimeout(function () {
                $('.success').remove();
            }, 1000);
            getProduct(data);
        });
    });
})();




