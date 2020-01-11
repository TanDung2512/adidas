<?php
    require_once("header.php");
?>

<div class="line-noti">
        <div class="noti-title">
            Notifications
        </div>
        <div class="noti-container">
            <ul class="a">
                <li>
                    <div>
                        Position <span id="absent-position">A5</span> is absent
                    </div>
                    <div>07:15</div>
                </li>
                <li>
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
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("noti") > -1) {
            document.getElementById("noti-title").classList.add("manager-page");
        }
    });
</script>
