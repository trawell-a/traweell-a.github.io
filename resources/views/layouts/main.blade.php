<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="animate.css"/>
    <style>
        .dom{ 
            margin-left: 710px; 
            } 
        @media only screen and (max-width: 576px) { 
            .dom{ 
                margin-left: 100px; 
            } 
        }
        .fon {
            width: 100%;
            height: 100%;
            margin-bottom: 30px;
            background: white;
            opacity: 0.9;
        }
        body {
            background-image: url(https://sun9-40.userapi.com/c858220/v858220850/1f191a/uNQ1vhjD-Yw.jpg);
            background-size: cover;
        }
        .card-img-top {
            /* Ширина картинки */
            width: 100%;
            /* Высота картинки: 15% высоты окна браузера (Viewport Width) */
            height: 15vw; 
            /* Свойство, которое растягивает картинку, не меняя ее пропорции */
            object-fit: cover;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .edit {
            position: absolute;
            top: 10px;
            left: 10px;
            color: black;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand mr-auto dom" style="font-family: 'Sacramento', cursive;" href="/"> TRAWELL </a>
    </nav>
    <p align="center" >В нашем сайте вы можете выбирать страну для путешествий</p>
    <p align="center" >и вкратце узнать о её отличительных чертах =)</p>
    @yield('template')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>