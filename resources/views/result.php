
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 35px;
            }

            .input-font {
                font-size: 15px;
                text-align: left;
            }

            .output-font {
                font-size: 20px;
                text-align: left;
            }

            .underline
            {
           		text-decoration: underline;
            }

            .none
            {
            	list-style-type:none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">PHP/Laravel Test</div>
                <h1 class="underline">Input</h1>
                <h3>(retrieved from ./input.txt)</h3>
                <ul class="none input-font">
                <?php foreach ($data['input'] as $row) :?>
					<li><?= $row;?></<li>
       			<?php endforeach;?>
       			</ul>
                <h1 class="underline">Output</h1>
                <ul class="none output-font">
                <?php foreach ($data['output'] as $row) :?>
					<li><?= $row;?></<li>
       			<?php endforeach;?>
       			</ul>
            </div>
        </div>
    </body>
</html>
