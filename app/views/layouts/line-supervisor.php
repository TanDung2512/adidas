<?php
    require_once("header.php");
?>

<div class="supervisor-content">
    <div class="line-container">
        <p class="line-title">LINE <span id="line-name">A15</span></p>
        <div class="line-map">
            <img src="app/assets/images/map.png" alt="line-map" />
        </div>
    </div>
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
</div>
