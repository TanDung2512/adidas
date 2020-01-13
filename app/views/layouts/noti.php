<?php
    require_once("header.php");
?>

<div class="line-noti">
        <div class="noti-title">
            Notifications
        </div>
        <div class="noti-container">
            <ul class="a">
            <?php 
                if(isset($_REQUEST["log"]) and $_REQUEST["log"] != false){
                    foreach($_REQUEST["log"] as $log){
                        echo '
                        <li>
                            <div>
                                '.$log->message .'
                            </div>
                            <div>'.$log->time_created.'</div>
                        </li>
                        ';
                    }

                }
                else {
                    echo '
                    <li>

                    </li>
                    ';
                }

            ?>
                <!-- <li>
                    <div class="list-li">
                        <span id="occupied-name">Tan Thanh</span> is assigned to
                        <span id="occupied-position">A5</span>
                    </div>
                    <div>07:20</div>
                </li>
                <li>
                    <div>
                        Position <span id="fillin-position">A5</span> is
                        occupied
                    </div>
                    <div>
                        07:30
                    </div>
                </li> -->
            </ul>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("noti") > -1) {
            document.getElementById("noti-title").classList.add("manager-page");
        }
        setInterval(() => {
            $.ajax({
                method: "GET",
                url: "/adidas/noti/raw-data",
            }).done(function (data) {
                let html = "";
                data = JSON.parse(data);
                for (let i of data) {
                    html += `<li>
                                <div>
                                    ${i["message"]}
                                </div>
                                <div>
                                    ${i["time_created"]}
                                </div>
                            </li>`;
                }
                $(".a li").remove();
                $(".a").append(html);
            })
        }, 3000);
    });
</script>
