<!DOCTYPE html>
<html>
<head>
    <title>Pawan's best Calculator With User Input</title>
</head>
<body>
<div class="box">
    <div class="display"><input type="text" readonly style="width: 214px" id="d"></div>
    <div class="keys">
        <p><input type="button" class="button gray"
                  value="mrc" onclick='c("Created by *Pawan*")'>
            <input type="button" class="button gray"
                   value="m-" onclick='c("Created by *Adarsh* ")'>
            <input type="button" class="button gray"
                   value="m+" onclick='c("Created by *Alok*")'>
            <input type="button" class="button pink"
                   value="/" onclick='v("/")'></p>

        <p><input type="button" class="button black"
                  value="7" onclick='v("7")'><input type="button"
                                                    class="button black" value="8" onclick='v("8")'>
            <input type="button" class="button black" value="9"
                   onclick='v("9")'><input type="button"
                                           class="button pink" value="*" onclick='v("*")'></p>

        <p><input type="button" class="button black"
                  value="4" onclick='v("4")'><input type="button"
                                                    class="button black" value="5" onclick='v("5")'>
            <input type="button" class="button black" value="6"
                   onclick='v("6")'><input type="button"
                                           class="button pink" value="-" onclick='v("-")'></p>

        <p><input type="button" class="button black"
                  value="1" onclick='v("1")'><input type="button"
                                                    class="button black" value="2" onclick='v("2")'>
            <input type="button" class="button black" value="3"
                   onclick='v("3")'><input type="button"
                                           class="button pink" value="+" onclick='v("+")'></p>

        <p><input type="button" class="button black"
                  value="0" onclick='v("0")'><input type="button"
                                                    class="button black" value="." onclick='v(".")'>
            <input type="button" class="button black" value="C"
                   onclick='c("")'><input type="button"
                                          class="button orange" value="=" onclick='e()'></p>
    </div>
</div>
<style scoped="scoped">
    body {
        background-color: tan;
    }

    .box {
        background-color: #3d4543;
        height: 300px;
        width: 250px;
        border-radius: 10px;
        position: relative;
        top: 80px;
        left: 40%;
    }

    .display {
        background-color: #222;
        width: 220px;
        position: relative;
        left: 15px;
        top: 20px;
        height: 40px;
    }

    .display input {
        position: relative;
        left: 2px;
        top: 2px;
        height: 35px;
        color: black;
        background-color: #bccd95;
        font-size: 21px;
        text-align: right;
    }

    .keys {
        position: relative;
        top: 15px;
    }

    .button {
        width: 40px;
        height: 30px;
        border: none;
        border-radius: 8px;
        margin-left: 17px;
        cursor: pointer;
        border-top: 2px solid transparent;
    }

    .button.gray {
        color: white;
        background-color: #6f6f6f;
        border-bottom: black 2px solid;
        border-top: 2px #6f6f6f solid;
    }

    .button.pink {
        color: black;
        background-color: #ff4561;
        border-bottom: black 2px solid;
    }

    .button.black {
        color: white;
        background-color: #303030;
        border-bottom: black 2px solid;
        border-top: 2px #303030 solid;
    }

    .button.orange {
        color: black;
        background-color: #FF9933;
        border-bottom: black 2px solid;
        border-top: 2px #FF9933 solid;
    }

    .gray:active {
        border-top: black 2px solid;
        border-bottom: 2px #6f6f6f solid;
    }

    .pink:active {
        border-top: black 2px solid;
        border-bottom: #ff4561 2px solid;
    }

    .black:active {
        border-top: black 2px solid;
        border-bottom: #303030 2px solid;
    }

    .orange:active {
        border-top: black 2px solid;
        border-bottom: #FF9933 2px solid;
    }

    p {
        line-height: 10px;
    }
</style>
<script>
    function c(val) {
        document.getElementById("d").value = val;
    }
    function v(val) {
        document.getElementById("d").value += val;
    }
    function e() {
        try {
            c(eval(document.getElementById("d").value))
        }
        catch (e) {
            c('Error');
        }
    }
</script>
</body>
</html>
