
    var foods = [
        {title: 'Arroz blanco', link: 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=921&q=80'},
        {title: 'Pollo al limón con verduras a la plancha', link:'https://images.unsplash.com/photo-1532550907401-a500c9a57435?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Ensalada de pasta', link:'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Albondigas con tomate y albahaca', link:'https://images.unsplash.com/photo-1515516969-d4008cc6241a?ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80'},
        {title: 'Sopa de calabaza con cebolla y pasas', link:'https://images.unsplash.com/photo-1505253668822-42074d58a7c6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Queso fresco con tomate, vinagre de módena, aceitunas y albahaca', link:'https://images.unsplash.com/photo-1529312266912-b33cfce2eefd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Tostada de aguacate con huevo frito', link:'https://images.unsplash.com/photo-1504382262782-5b4ece78642b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Salmon a la plancha con calabacín, zanahora y espinacas', link:'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Pipirrana', link:'https://images.unsplash.com/reserve/oMRKkMc4RSq7N91OZl0O_IMG_8309.jpg?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80'},
        {title: 'Ensalada con manzana', link:'https://images.unsplash.com/photo-1527763874622-d23474336e68?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Hamburguesa de buey con tomate, cebolla y lechuga', link:'https://images.unsplash.com/photo-1499028344343-cd173ffc68a9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Estofado de cerdo, con zanahoria, patata, calabaza, champiñones', link:'https://images.unsplash.com/photo-1519699788450-ad34386a3bfc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Mejillones al vapor', link:'https://images.unsplash.com/photo-1550065528-7dd6b266b245?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Paella con marisco', link:'https://images.unsplash.com/photo-1534080564583-6be75777b70a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Salmón con espinacas y bechamel', link:'https://images.unsplash.com/photo-1485921325833-c519f76c4927?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=80'},
        {title: 'Entrecot con tomate y huevo escalfado', link:'https://images.unsplash.com/photo-1485704686097-ed47f7263ca4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1069&q=80'},
        {title: 'Ensalada de brocoli, granada, almendra y perejil', link:'https://images.unsplash.com/photo-1510629954389-c1e0da47d414?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Patatas, cebolla, zanahora, calabaza y merluza al horno con tomillo', link:'https://images.unsplash.com/photo-1521423602372-67579db446c4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'},
        {title: 'Quinoa con queso, nueces, uvas, salmón y albahaca', link:'https://images.unsplash.com/photo-1505576733088-f8a0f2f4b8a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80'},
        {title: 'Pizza de tomate, queso, pimiento y cebolla', link:'https://images.unsplash.com/photo-1507273026339-31b655f3752d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'},
        {title: 'Berenjena rellena con carne, cebolla, zanahoria, champiñones y queso', link:'https://images.unsplash.com/photo-1518779578993-ec3579fee39f?ixlib=rb-1.2.1&auto=format&fit=crop&w=375&q=80'},
        {title: 'Tostada de cebolla, pimiento, tomate, pollo y queso', link:'https://images.unsplash.com/photo-1505575967455-40e256f73376?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80'},

    ];

    function getRandomToEat(){
        var randomToEat = foods[Math.floor(Math.random()* foods.length)];

        $('#foodShow').html(randomToEat.title);
        $('#photo').attr('src', randomToEat.link);

    }

   
