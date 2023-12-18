<?php
include 'partials/header.php';

// fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>


<section class="featured">
        <div class="container posts__container_background">
            <div class="post__thumbnail">
                <img src="./images/Communication-Tower.png">
            </div>
            <div class="post__info">
                <h1 class="post__title"><a href="">PT. Evantama Network System</a></h1>
                <p class="post__body">
                    All around the world, the growth of telecommunication & IT business is going to be very lucrative. Business players are facing a fierce competition. What will make them survive and success is the differentiation and vice versa, what makes them different is what will make them success.
                </p>
            </div>
            </div>
        </div>
    </section>
    <!--======================= END OF FEATURED ==================-->
    <section class="featured">
        <div class="container posts__container_background">
            <div class="post__thumbnail">
                <img src="./images/nodes.png">
            </div>
            <div class="post__info">
                <h1 class="post__title"><a href="">Easy & Complete Solution</a></h1>
                <p class="post__body">
                PT. Evantama Network System is one of the largest telecommunications subcontractors in Indonesia. PT. Evantama Network System has existed since 2009, and until now PT. Evantama Network System has collaborated with telecommunication operators in Indonesia
                </p>
            </div>
            </div>
        </div>
    </section>
<!--======================= END OF FEATURED ==================-->





<section class="category__button">
    <div class="container category__button-container">
        <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while($category = mysqli_fetch_assoc($all_categories)) :  ?>
        <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>
<!--======================= END OF CATEGORY BUTTON ==================-->




<?php
include 'partials/footer.php';

?>