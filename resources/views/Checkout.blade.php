<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
</head>
<body>
    <p id="output">Press Checkout to start payment !</p>
   <style>
    button {
        display: inline-block;
        background-color: #000000;
        border-radius: 10  px;
        border: 4px  #000000;
        color: #ffffff;
        text-align: center;
        font-size: 28px;
        padding: 20px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
      }
      button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }
      button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }
      button:hover {
        background-color: #2e00fa;
      }
      button:hover span {
        padding-right: 25px;
      }
      button:hover span:after {
        opacity: 1;
        right: 0;
      }
      p{
            text-align: center;
            font-size: 28px;
            font-family: "Times New Roman", Times, serif;
        }
      .wrapper{
        text-align: center;
        }
   </style><div class="wrapper"> <button class="button" onclick ="authentication_request()">Check Out</button> </div>
</body>
</html>