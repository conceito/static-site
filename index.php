<?php include("config.php") ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="pt-BR" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="pt-BR" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="pt-BR" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="pt-BR" class="no-js"> <!--<![endif]-->
<head>
<?php include("head_before.php") ?>
<title><?php echo $titleSite?></title>
<meta name="title" content="--PAGE TITLE HERE-- - <?php echo $titleSite?>">
<meta name="description" content="--DESCRIPTION HERE--">
<?php include("head_after.php") ?>
</head>
<body class="<?php body_class()?>">

<?php include("header.php") ?>

<div id="main" class="clearfix" role="main">

	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<h1>Page title</h1>

			</div>
		</div>
	</div>

</div><!-- main -->

<?php include("footer.php") ?>

<script type="text/javascript">
(function($){

})(jQuery);
</script>

</body>
</html>
