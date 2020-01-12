<?php
    require_once("header.php");
?>

<button onclick="document.getElementById('id037').style.display='block'" class="w3-button w3-black">Red</button>
<button onclick="document.getElementById('id036').style.display='block'" class="w3-button w3-black">Yellow</button>
<button onclick="document.getElementById('id038').style.display='block'" class="w3-button w3-black">Red&Yellow</button>


<div class="supervisor-content">
    <div class="line-container">
        <p class="line-title">LINE <span id="line-name">
            <?php 
            print_r($_REQUEST["line_name"]);
            ?>
        </span></p>

        <div class="line-map">
            <div class="map-pic">
                <img src="app/assets/images/map.png" alt="line-map"  />

            <?php
            // print_r($_REQUEST["line_workers"]);
            foreach($_REQUEST["line_workers"] as $w) { 
                $data = " ";
                foreach($w as $key => $property){
                    if(is_numeric($key)){
                        $key = (string)$key;
                    }

                    $str = "data-" . $key . "=" . "\"" .$property . "\" ";
                    $data = $data . $str;
                }


                if ($w["position"] == 0) {
                    echo '<div
                    class="position position-'. $w["op_name"] . ' green-worker"
                    onclick="pushModal(this)"
                    ' . $data .' 
                >
                    <img src="app/assets/images/worker.png" alt="worker" />
                </div>';
                } else if ($w["position"] == 1) {
                    echo '<div class="position position-'. $w["op_name"] . ' red-worker" 
                    onclick="pushModal(this)"
                    ' . $data . '
                    >

                    <img src="app/assets/images/worker.png" alt="worker" />
                </div>';
                } else {
                    echo '<div class="position position-'. $w["op_name"] . ' yellow-worker"
                    onclick="pushModal(this)"
                    ' . $data . '
                    >
                    <img src="app/assets/images/worker.png" alt="worker" />
                </div>';
                }}
                ?>

                
            </div>
    

           
        </div>
    </div>
</div>

<div id="id01" class="w3-modal">
    <div class="operator-container w3-modal-content">
        <div class="operator-modal green-modal w3-container">
            <span
                onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright"
                >&times;</span
            >
            <div class="modal-content">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Standard
                </div>
                <div id = "data-position" class="worker-position">
                    L3 - A1
                </div>
                <div class="worker-skill">
                   Skill: <span id = "data-skill" >attaching</span> 
                </div>
                <div id = "data-status" class="worker-status">
                    Working
                </div>
                <!-- <div class="status-btn">
                    <button>
                        Absent
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</div>


<div id="id037" class="w3-modal">
    <div class="operator-container w3-modal-content">
        <div class="operator-modal red-modal w3-container">
            <span
                onclick="document.getElementById('id037').style.display='none'"
                class="w3-button w3-display-topright"
                >&times;</span
            >
            <div class="modal-content">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran Red
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Standard
                </div>
                <div  class="worker-position">
                   Skill: <span id = "data-position">L3 - A1</span> 
                </div>
                <div id = "data-skill" class="worker-skill">
                    attaching
                </div>
                <!-- <div id = "data-status" class="worker-status">
                
                </div> -->
                <div class="worker-red-absent">
                        Absent
                </div>
            </div>
        </div>
    </div>
</div>


<div id="id036" class="w3-modal">
    <div class="operator-container w3-modal-content">
        <div class="operator-modal yellow-modal w3-container">
            <span
                onclick="document.getElementById('id036').style.display='none'"
                class="w3-button w3-display-topright"
                >&times;</span
            >

            <div class="modal-content">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran Yellow
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Multi-skill
                </div>
                <div id = "data-position" class="worker-position-yellow">
                    
                </div>
                <div id = "data-skill" class="worker-skill">
                    attaching
                </div>
                <div  class="worker-status">
                    Assigned to <span id = "data-status">L3 - A1</span>
                </div>
                <div class="status-btn">
                    <button>
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="id038" class="w3-modal">  
    <div class="operator-container-big w3-modal-content">
        <div class="operator-modal-big w3-container">
            <span
                onclick="document.getElementById('id038').style.display='none'"
                class="w3-button w3-display-topright"
                >&times;</span
            >

            <div class="modal-content red-modal">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran Red
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Standard
                </div>
                <div  class="worker-position">
                   Skill: <span id = "data-position">L3 - A1</span> 
                </div>
                <div id = "data-skill" class="worker-skill">
                    attaching
                </div>
                <div id = "data-status" class="worker-status">
                
                </div>
                <div class="worker-red-absent">
                        Absent
                </div>
            </div>

            <div class="modal-content yellow-modal">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran Yellow
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Multi-skill
                </div>
                <div id = "data-position" class="worker-position-yellow">
                    
                </div>
                <div id = "data-skill" class="worker-skill">
                    attaching
                </div>
                <div  id = "data-worker-status" class="worker-status">
                    Assigned to <span id = "data-status">L3 - A1</span>
                </div>
                <div class="status-btn">
                    <button>
                        Confirm
                    </button>
                </div>
            </div>

           

        </div>
    </div>
</div>

<script>
    
    setTimeout(() => {
        $.ajax({
            method: "GET",
            url: "/adidas/line-supervisor/raw-data",
        }).done(function (data) {
            let html = ``;
            data = JSON.parse(data);

            for(let emp of data) {
                let temp = "";
                for(let i in emp) {
                    temp += ` data-${i}= "${emp[i]}" `
                }
                
                
                let color = "";
                if(emp["position"] == 0) {
                    color+="green-worker";
                }
                else if(emp["position"] == 1) {
                    color+="red-worker";
                }
                else {
                    color+="yellow-worker";
                }
                
                html += `
                    <div
                        class="position position-${emp["op_name"]} ${color}"
                        onclick="pushModal(this)"
                        ${temp} 
                    >
                        <img src="app/assets/images/worker.png" alt="worker" />
                    </div>
                 `;
            }
            $(".line-map .map-pic div").remove();
            $(".line-map .map-pic").append(html);
        })
    }, 3000);

    function getType(id){
        console.log(id)
        switch(id) {
            case "0":
                return "Standard";
            case "1":
                return "Multi-skill";
            case 2:
                return "Line Supervisor";
        }
    }

    function getPosition(id){
        switch(id) {
            case "0":
                return "Occupied";
            case "1":
                return "Vacant";
            case 2:
                return "Fill-in";
        }
    }



    function pushModal(worker){
        if($(worker).data("position") == 0) {
            let children = $("#id01 div[id^='data-']");
            $.each(children, function(child){
                let id = $(this).attr("id").replace('data-','');
                

                if(id == "ava"){
                    $(this).attr("url",$(worker).data("ori_" + id));
                }
                else if(id == "type"){
                    $(this).text(getType($(worker).data("ori_" + id)));
                }
                else if(id == "position") {
                    $(this).text(getPosition($(worker).data(id)));
                }
                else if($(worker).data("ori_" + id)){
                    $(this).text($(worker).data("ori_" + id));
                }
            })
            $('#id01').css("display","block");
        }
        else if ($(worker).data("position") == 2 || $(worker).data("position") == 3) {
            $("#id038").find(".status-btn>button").on("click", function(){
                //call ajax;
                $.ajax({
                    method: "POST",
                    url: "/adidas/line-supervisor/confirm",
                    data: {
                        line_id: $("#line-name").text(),
                        ori_id: $(worker).data("ori_id"),
                        replace_worker_id: $(worker).data("worker_id"),
                        replace_name: $(worker).data("name"),
                        op_id: $(worker).data("op_id")
                    }
                }).done(function (data) {
                    console.log(data);
                    if (data == 1) {
                        document.getElementById('id01').style.display='none';
                        location.reload();
                    }
                });
            });

            let children = $("#id038 .red-modal div[id^='data-']");
            
            $.each(children, function(child){
                let id = $(this).attr("id").replace('data-','');
                if(id == "ava"){
                    $(this).attr("url",$(worker).data("ori_" + id));
                }
                else if(id == "type"){
                    $(this).text(getType($(worker).data("ori_" + id)));
                }
                else if(id == "position") {
                    $(this).text(getPosition($(worker).data(id)));
                }
                else if($(worker).data("ori_" + id)){
                    $(this).text($(worker).data("ori_" + id));
                }
            })

            children = $("#id038 .yellow-modal div[id^='data-']");
            $.each(children, function(child){
                let id = $(this).attr("id").replace('data-','');
                if(id == "id") {
                    $(this).text($(worker).data("worker_id"));
                }
               else if(id == "worker-status") {
                    $(this).text(`Assign to ${$(worker).data("op_name")}` );
                }
                else if(id == "type"){
                    $(this).text(getType($(worker).data(id)));
                }
                else if(id == "position") {
                    $(this).text(getPosition($(worker).data(id)));
                }
               else if(id == "ava"){
                    $(this).attr("url",$(worker).data(id));
                }
                else if($(worker).data(id)){
                    $(this).text($(worker).data(id));
                }
            })
             if($(worker).data("position") == 3) {
                $("#id038 .yellow-modal .status-btn").css("display", "none");
            }
            $("#id038").css("display","block");
        }
        else {
            document.getElementById('id037').style.display='block';
        }
        
    }

</script>