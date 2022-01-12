$(document).ready(function(){
    // Ajax Request for retriving Data
    function showData(){
        output = "";
        // x = "";
        $.ajax({
            url : "retrivechat.php",
            method : "GET",
            dataType : "json",
            success : function(data){
                if(data){
                    x = data;
                }else{
                    x ="";
                }
                for (let i = 0; i < x.length; i++) {

                    output +="<div class='chat chat-right'><div class='chat-body'><div class='chat-bubble'><div class='chat-content'><p>"+x[i].messages+"</p></div></div></div></div>"

                }
                $("#message").html(output);
            }
        })
    }
    showData();

    // Ajax Request for insert Data 

$("#btnsave").click(function(){
    // alert("worl");
    // e.preventDefault();
    // console.log("clicked");
    let textarea = $("#textarea").val();
    let email = $("#email").val();
    let mydata = {textarea:textarea,email:email};
    // console.log(mydata);
    $.ajax({
        url : "insertchat.php",
        method : "POST",
        data : JSON.stringify(mydata),
        success : function(data){
            // alert(data);
            // msg = "<div class='alert alert-dark mt-3'>"+data+"</div>";
            // $("#msg").html(msg);
            $("#textarea").val('');
            showData();
        }
    });
});

    // Ajax Request for retriving Data

    // $("#tbody").on("click",".btn-dell",function(){
    //     // console.log("delete");
    //     let id = $(this).attr("data-sid");
    //     // console.log(id);
    //     mydata = {sid : id};
    //     mythis = this;
    //     $.ajax({
    //         url : "delete.php",
    //         method : "POST",
    //         data : JSON.stringify(mydata),
    //         success : function(data){
    //             // console.log(data)

    //             if(data == 1){
    //                 msg = "<div class='alert alert-dark mt-3'>Data is successfully delete</div>";
    //                 $(mythis).closest("tr").fadeOut();
    //             }else if(data == 0){
    //                 msg = "<div class='alert alert-dark mt-3'>Data is not delete</div>";
    //             }
    //         $("#msg").html(msg);
    //         // showData();

    //         }
    //     });
    // });

        // Ajax Request for edit Data

        // $("#tbody").on("click",".btn-edit",function(){
        //     // console.log("edit");
        //     let id = $(this).attr("data-sid");
        //     // console.log(id);
        //     mydata = {sid:id};
        //     $.ajax({
        //         url : "edit.php",
        //         method : "POST",
        //         dataType : "json",
        //         data : JSON.stringify(mydata),
        //         success : function(data){
        //             // console.log(data);
        //             $("#stuid").val(data.id);
        //             $("#nameid").val(data.name);
        //             $("#emailid").val(data.email);
        //             $("#passwordid").val(data.password);
        //         }
        //     })
        // });

});