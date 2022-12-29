<?php require_once './body/profile_header.html'; ?>
<div class="main_container_app">
    <section class="chat_container_app">
        <div class="chat_header_app">
            <div class="content_app">
            <?php
                $c=1;
                
                $con=mysqli_connect('localhost', 'root', '', 'id19159302_dbname');
                
                $sel="SELECT * FROM registration";
                $query=$con->query($sel);
                while ($row=$query->fetch_assoc())
                {
                ?><?php if ($row['image']): ?>
                    <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" class="post_photo">
                        <?php endif; ?></div>
                        <?php
                }
            ?>
                <div class="chat_profile_details_app">
                <div class="post_photo">
               
                    <p>active now</p>
                </div>
            </div>
            <a class="chat_back_app" href="">Back</a>
        </div>
        <div class="chat_search_app">
            <span class="chat_search_text_app">Search user to start chat</span>
            <input class="" type="text" placeholder="Enter name to search...">
            <button class="">
                <i class="fas fa-search_app"></i>
            </button>
        </div>
        <div class="chat_users_list_app"></div>
    </section>
</div>
<?php require_once './body/footer.html'; ?>