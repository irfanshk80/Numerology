<?php ?>
<!DOCTYPE>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<head>
<title>Guru Profile</title>
<style type="text/css">
.content {
width: 100%;
//margin-left: 250px;
}
.left {
Background: aqua;
width: 200px;
height: 150px;
float: left;
margin: 0 auto;
}
.right {
width: 200px;
height: 150px;
float: left;
margin: 0 auto;
}
</style>
</head>

<div><h3>Guru Details</h3></div>
<div align="center" class="content">
<div class="left">
<div align="left">Name: <?php echo $model->guruName;?></div><br>
<div align="left">City: <?php echo $model->guruCity;?></div><br>
<div align="left">Country: <?php echo $model->guruCountry;?></div><br>
<div align="left">Description: <?php echo $model->guruDescription;?></div>
</div>
<div class="right">
<img src="images/<?php echo $model->guruPhoto;?>" height="150px" width="200px"/>
</div>

</div>

</html>