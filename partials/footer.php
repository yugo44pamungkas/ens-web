<?php
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

<footer>
        <div class="footer__socials">
            <a href="https://web.facebook.com/people/PT-Evantama-Network-System/100067521193647/?paipv=0&eav=AfY4f6AzrmK7aWecVxY3S0Kkrkq2I9suvGNDFAoiTP9aOjCAQQ_3vRtOLLkEbdmeP-w&_rdc=1&_rdr" target="_blank"><i class="uil uil-facebook-f"></i></a>
            <a href="https://www.instagram.com/evantama.id/?hl=en" target="_blank"><i class="uil uil-instagram"></i></a>
            <a href="https://www.linkedin.com/company/evantama-network-system-ens/" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
        </div>
       
        <div class="footer__copyright">
            <small>Copyright &copy;2023 PT. EVANTAMA NETWORK SYSTEM</small>
        </div>
    </footer>



    <script src="<?= ROOT_URL ?>/js/main.js"></script>
</body>
</html>