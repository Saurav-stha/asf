<?php


function htmlFormat($subject,$url,$text="")
{
    return '
    
    <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
                }
            .container {
                max-width: 600px;
                margin: 100px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333;
                margin-bottom: 20px;
            }
            .message {
                font-size: 18px;
                margin-bottom: 30px;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .btn:hover {
            background-color: #0056b3;
            }
            </style>
            </head>
            <body>
                <div class="container">
                    <h1>'.$subject.'</h1>
                    <p class="message">'.$text.'</p>
                    <a href="'. $url .'" class="btn">Back to Homepage</a>
                </div>
            </body>
            </html>
    
    ';
}