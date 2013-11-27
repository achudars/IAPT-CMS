<!-- @IAPT: A div that can be styled if desired for any introductory text.-->			
			<div id="intro">
			    <!-- @IAPT: This is our first heading in the main section - it is distinct from the top heading of the site, and 
			        will be encountered in order by machines that process headings on websites -->
				<h1><?php echo $title; ?></h1>
				<p>Welcome one and all to the newly release Congo Online Shop.  Here you will find books, videos and more all delivered to your door!*</p>
			    <p id="proviso">*Delivery not yet available.</p>
			</div>

<!-- @IAPT This loop takes the $products variable from our View code (i.e. booksView.php or videosView.php and prints it all out.  -->
<?php foreach($products as $product): ?>
	<div class="product">
		<h3><?php echo $product->getName(); ?></h3>
		<h4>Details:</h4>
		<ul>
			<li>
				<strong>Publisher:</strong>
				<?php echo $product->getPublisher(); ?>
			</li>
			<li>
				<strong>Format:</strong>
				<?php echo $product->getType(); ?>
			</li>
			<li>
				<strong>Price:</strong>
				<?php echo $product->getPrice(); ?>
			</li>
		</ul>
		 <h4>At a glance</h4>
           <p><?php echo $product->getDescription(); ?> </p>
	
	</div>
<?php endforeach; ?>


