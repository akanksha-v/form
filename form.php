<html>
<head>
    <title>form</title>
    <style>
     body{
        margin:0px auto;
        font-family: 'Gotu', sans-serif;
        font-size:26px;
        color:red;
        
    }
    form{
        position:relative;
        margin:4px;
        top:10%;
        left:15%;
        padding:4px;
    }
    button{margin-top:15px;
     height:50px;
     width:120px;
     font-size:18px;
     color:salmon;
    }
    button:hover{
        transform:scale(1.5);
        cursor: pointer;
        background-color:salmon;
        color:white;
    }
    label{
        position:relative;
        top:16%;
        left:20%;
        color:maroon;
        text-decoration: underline;
        font-size:40px;
        font-family:algerian;
    }
    </style>
</head>
<body>
<label><u>Blood Donation Form</u></label><br/><br/>
<form action="action.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" id="file-input" hidden required>
<div id='container'>
  <button>Select an image</button>
  <img id='preview'>
</div>
<br/><br/>
Full Name:&nbsp;&nbsp;<input type="text" name="name" required><br/><br/>
Father/Husband Name:&nbsp;&nbsp;<input type="text" name="fname" required><br/><br/>
Age:&nbsp;&nbsp;<input type="number" name="age" min="18" required><br/><br/>
Blood Group:&nbsp;&nbsp;<input type="varchar" name="bgrp" required><br/><br/>
Address:&nbsp;&nbsp;<input type="text" name="address" required><br/><br/>

Nearest Hospital:&nbsp;&nbsp;<input type="text" name="hospital" required><br/><br/>

<input type="submit" name="submit" value="submit">
</form>

<script>
var input = document.querySelector('#file-input');

document.querySelector('button').addEventListener('click',function(){
  input.click();
});

input.addEventListener('change',preview);
function preview(){
    var fileObject = this.files[0];
    var fileReader = new FileReader();
    fileReader.readAsDataURL(fileObject);
    fileReader.onload = function(){
        var result = fileReader.result;
        var img = document.querySelector('#preview');
        img.setAttribute('src',result);
    }
}
</script>
</body>
</html>