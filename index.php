<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class="heading">
                <h1>Todo List</h1>
                <hr/>
            </div>
            <div class="input">
                <input type="text" class="todotaker" id="inp"/>
                <button class="todobtn" id="todobutton">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="30"
                            height="30"
                            fill="#fff"
                            class="bi bi-plus"
                            viewBox="0 0 16 16"
                    >
                        <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                        />
                    </svg>
                </button>
            </div>
            <div class="list"></div>
            <div class="clearall">
                <button class="all">Clear All</button>
            </div>
        </div>
        <div class="modal">
            <div class="cont" id="cont"></div>
        </div>
    </body>
</html>
<?php