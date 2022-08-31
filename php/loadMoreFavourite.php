<?php
session_start();
require_once('link.php');
$client = 'https://ipfs.fleek.co/ipfs/';
$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if(isset($_SESSION['userAddress'])){
    $user_address = $_SESSION['userAddress'];
}else{
    $user_address = '';
}
    if (isset($_POST['rowCount'])) {
        $rowCount = mysqli_real_escape_string($con, $_POST['rowCount']);
        $limitRow = mysqli_real_escape_string($con, $_POST['limit']);
        $user_address = mysqli_real_escape_string($con, $_POST['user_uuid']);    

            $query = "SELECT * FROM `favourite_videos` INNER JOIN `video_info` ON `favourite_videos`.`video_info_id`=`video_info`.`video_uuid` WHERE `user_id`= '$user_address' ORDER BY `favourite_videos`.`favourite_video_id` DESC limit $rowCount,$limitRow";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $thumbnail_other = $client.$row['thumbnail_ipfs'];
                    $video_id_other = $row['video_uid'];
                    $chapter_part_other = $row['video_id'];
                    $chapter_name_other = $row['name'];
                    $chapter_id_other = $row['video_id'];
                    $module_name_other = $row['module'];
                    $module_other = $row['module_uuid'];
                    $video_uuid_other = $row['video_uuid'];
                    $from_time = $row['from_time'];
                    $date = date_create($from_time);
                    $published_date = date_format($date,"d M,Y");                    
            ?>
<div class="col-xl-3 col-lg-4 col-md-6">
    <div class="gen-carousel-movies-style-1 movie-grid style-1">
        <div class="gen-movie-contain">
            <div class="gen-movie-img">
                <img src="<?= $thumbnail_other ?>" alt="streamlab-image">
                <div class="gen-movie-add">
                    <div class="wpulike wpulike-heart">
                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                            <button type="button" class="wp_ulike_btn wp_ulike_put_image"
                                onclick="removeVid('<?= $user_address ?>','<?= $video_uuid_other ?>')"></button>
                        </div>
                    </div>
                    <ul class="menu bottomRight">
                        <li class="share top">
                            <i class="fa fa-share-alt"></i>
                            <ul class="submenu">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_link; ?>/single-movie?course=<?= $video_id_other ?>&module=<?= $module_other ?>&t=<?= $chapter_name_other;  ?>"
                                        class="facebook"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                        </li>
                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_link; ?>/single-movie?course=<?= $video_id_other ?>&module=<?= $module_other ?>&t=<?= $chapter_name_other;  ?>"
                                class="facebook"
                                onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a>
                        </li>
                        </li>
                        <li><a href="https://twitter.com/share?url=<?= $post_link; ?>/single-movie?course=<?= $video_id_other ?>&module=<?= $module_other ?>&text=<?= $chapter_name_other;  ?>"
                                class="facebook"
                                onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                    </li>
                    </ul>
                </div>
                <div class="gen-movie-action">
                    <a href="single-movie?course=<?= $video_id_other ?>&module=<?= $module_other ?>" class="gen-button">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
            <div class="gen-info-contain">
                <div class="gen-movie-info">
                    <h3><a
                            href="single-movie?course=<?= $video_id_other ?>&module=<?= $module_other ?>"><?= $chapter_name_other ?></a>
                    </h3>
                </div>
                <div class="gen-movie-meta-holder">
                    <ul>
                        <li><?= $published_date ?></li>
                        <li>
                            <a href="adventure.html"><span><?= $module_name_other ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  
            $i = $i + 1;
                            }
                        }
                    }
            ?>