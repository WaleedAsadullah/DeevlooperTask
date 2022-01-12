$(document).ready(function(){
    // Ajax Request for retriving Data
    function showData(){
        output = "";
        // x = "";
        $.ajax({
            url : "retrive.php",
            method : "GET",
            dataType : "json",
            success : function(data){
                if(data){
                    x = data;
                }else{
                    x ="";
                }
                for (let i = 0; i < x.length; i++) {
                    output += "<tr><td>"+x[i].id+"</td><td>"+x[i].name+"</td><td>"+x[i].email+"</td><td>"+x[i].password+"</td><td><button class='btn btn-warning btn-sm btn-edit' data-sid="+x[i].id+">Edit</button><button class='btn btn-danger btn-sm btn-dell' data-sid="+x[i].id+">Delete</button></td></tr>";
                }
                $("#tbody").html(output);
            }
        })
    }
    showData();

    // Ajax Request for insert Data 

$("#btnsave").click(function(e){
    e.preventDefault();
    // console.log("clicked");
    let stid = $("#stuid").val();
    let name = $("#nameid").val();
    let email = $("#emailid").val();
    let password = $("#passwordid").val();
    let mydata = {id:stid,name:name,email:email,password:password};
    // console.log(mydata);
    $.ajax({
        url : "insert.php",
        method : "POST",
        data : JSON.stringify(mydata),
        success : function(data){
            // console.log(data);
            msg = "<div class='alert alert-dark mt-3'>"+data+"</div>";
            $("#msg").html(msg);
            $("#myform")[0].reset();
            showData();
        }
    });
});

    // Ajax Request for retriving Data

    $("#tbody").on("click",".btn-dell",function(){
        // console.log("delete");
        let id = $(this).attr("data-sid");
        // console.log(id);
        mydata = {sid : id};
        mythis = this;
        $.ajax({
            url : "delete.php",
            method : "POST",
            data : JSON.stringify(mydata),
            success : function(data){
                // console.log(data)

                if(data == 1){
                    msg = "<div class='alert alert-dark mt-3'>Data is successfully delete</div>";
                    $(mythis).closest("tr").fadeOut();
                }else if(data == 0){
                    msg = "<div class='alert alert-dark mt-3'>Data is not delete</div>";
                }
            $("#msg").html(msg);
            // showData();

            }
        });
    });

        // Ajax Request for edit Data

        $("#tbody").on("click",".btn-edit",function(){
            // console.log("edit");
            let id = $(this).attr("data-sid");
            // console.log(id);
            mydata = {sid:id};
            $.ajax({
                url : "edit.php",
                method : "POST",
                dataType : "json",
                data : JSON.stringify(mydata),
                success : function(data){
                    // console.log(data);
                    $("#stuid").val(data.id);
                    $("#nameid").val(data.name);
                    $("#emailid").val(data.email);
                    $("#passwordid").val(data.password);
                }
            })
        });

});