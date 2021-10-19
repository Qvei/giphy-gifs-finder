<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search form</title>
    <style>
      .img{border: 1px solid #ddd;border-radius: 4px;padding: 5px;margin:10px 0 0 10px;width: 90%;height: auto;}
      .input{width: 30%;height: 30px;padding:0 3px 0 3px;border-radius: 4px;margin:0 10px 10px 7px;}
      .offset{width: 40px;height: 30px;padding:0 3px 0 3px;border-radius: 4px;margin:0 10px 10px 25px;}
      .key{width: 30%;height: 30px;padding:0 3px 0 3px;border-radius: 4px;margin:0 10px 10px 0;}
      .input:hover{border:1px solid blue;}
      .btn{height: 30px;padding:5px;margin:0 0 0 7px;text-align: center;}
      .btn:hover{background-color:blue;color:white;}
      #rating{width: 50px;height: 30px;padding:5px;border-radius: 4px;margin:0;}
      .l{width: 50px;height: 30px;padding:5px;border-radius: 4px;margin-left:7px;}
      .grid-container {display: grid;grid-template-columns: auto auto;grid-gap: 5px;padding: 5px;}
      .grid-container > div {text-align: center;padding:5px;}
      .labl{margin-left: 30px;}
    </style>
  </head>
  <body>

    <h1>Simple Search GIF's on GIPHY</h1>

    <form>
        <input class="key" name="key" type="text" placeholder="api_key..">
        <input class="input" name="name" type="text" placeholder="image name..">
        <br>
        <label for="rating">image rating</label>
        <select name="rating" id="rating">
        <? $var1 = ['g','pg','pg-13','r']; // Acceptable rating values from giphy
          foreach ($var1 as $r) { ?>
            <option value="<?= $r; ?>"><?= $r; ?></option>
        <? } ?>
        </select>
        <label class="labl" for="limit">limit</label>
        <select class="l" name="limit" id="limit">
        <? for($b=1;$b<=50;$b++){ ?>
            <option value="<?= $b; ?>"><?= $b; ?></option>
        <? } ?>
        </select>
        <input class="offset" name="offset" type="num" placeholder="offset">
        <br><br>
        <input class="btn" type="button" value="search">
    </form>

    <div class="grid-container"></div>


    <!-- scripts --->  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts.js"></script>

  </body>
</html>