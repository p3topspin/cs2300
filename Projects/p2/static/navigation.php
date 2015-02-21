<!-- Static navigation bar for all pages. -->
<div class="header">

	<a class="bold slab-serif black big link section" href="index.php">Written</a>

	<div class="sections">
		<a class="sans-serif gray small link light section" href="index.php">ALL</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=business&amp;content=&amp;date=&amp;submit=Submit">BUSINESS</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=politics&amp;content=&amp;date=&amp;submit=Submit">POLITICS</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=entertainment&amp;content=&amp;date=&amp;submit=Submit">ENTERTAINMENT</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=science&amp;content=&amp;date=&amp;submit=Submit">SCIENCE</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=tech&amp;content=&amp;date=&amp;submit=Submit">TECH</a>
		<a class="sans-serif gray small link light section" href="search.php?search=&amp;title=&amp;author=&amp;category=world&amp;content=&amp;date=&amp;submit=Submit">WORLD</a>
	</div>

	<a class="bold slab-serif black link right section" id="search" href="#"><i class="fa fa-search"></i></a>
	<a class="sans-serif black link right section" href="write.php">Write for us</a>

</div>

<!-- Slide down from nav bar when search icon is clicked in navigation bar -->
<div class="hidden">

	<form class="search" action="search.php" method="get">

		<!-- Toggle this when .option is clicked. See main.js -->
		<div class="general">
			<input class="input focus" type="text" name="search" placeholder="Search Terms">
			<div class="option">
				<a class="sans-serif green link" href="#">Advanced Search</a>
			</div>
		</div>

		<!-- Toggle this when .option is clicked. See main.js -->
		<div class="advanced">
			<input class="input focus" type="text" name="title" placeholder="Title">
			<input class="input" type="text" name="author" placeholder="Author">
			<input class="input" type="text" name="category" placeholder="Category">
			<input class="input" type="text" name="content" placeholder="Article Content">
			<input class="input" type="text" name="date" placeholder="Date">
			<div class="option">
				<a class="sans-serif green link" href="#">General Search</a>
			</div>
		</div>

		<input class="input submit" name="submit" type="submit" value="Submit">

	</form>

</div>
