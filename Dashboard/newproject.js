function addTask() {
    var project_name = document.getElementById("project-name").value;
    var progress = document.getElementById("progress").value;
    var start_date = document.getElementById("start-date").value;
    var due_date = document.getElementById("due-date").value;
    var label_color = document.getElementById("label-color").value;
    var task_description = document.getElementById("task-description").value;
    var file = document.getElementById("file").value;
    var comment = document.getElementById("comment").value;

    console.log("Params: " + params); // ดูว่า params ถูกต้องหรือไม่

    // สร้าง object XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // กำหนด method และ url ของการ request
    xhr.open("POST", "save_task.php", true);

    // ตั้งค่า header สำหรับการส่งข้อมูลแบบ form data
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // ตรวจสอบ ready state และ status ของ XMLHttpRequest
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Response: " + xhr.responseText); // ดู response ที่ได้จาก server
            // สามารถเพิ่มการ redirect หรือปรับปรุง UI ต่อจากนี้ได้
        }
    };

    // สร้าง string สำหรับส่งข้อมูล
    var params = "project_name=" + project_name +
                  "&progress=" + progress +
                  "&start_date=" + start_date +
                  "&due_date=" + due_date +
                  "&label_color=" + label_color +
                  "&task_description=" + task_description +
                  "&file=" + file +
                  "&comment=" + comment;

    // ส่ง request
    xhr.send(params);
}
