/**수정하다 암걸릴뻔....****/
function check_only(chk){
        var obj = document.getElementsByName("box");
        for(var i=0; i<obj.length; i++){
            if(obj[i] != chk){
                obj[i].checked = false;
            }
        }
 }
	//var chk_value=0;
    function check_only(chk){
        var obj = document.getElementsByName("boxx");
		

        for(var i=0; i<obj.length; i++){
            if(obj[i] != chk){
                obj[i].checked = false;
            }
			else{
				chk_value=obj[i].value;

			}
        }
		alert("test");
		//$('#deep_box').show();//수정버튼 활성화
	
    }
	
	/*function deep_data(){
		var flag = confirm("사용자 정보를 열람할까요?");
		if(flag==true){
			alert("연다.");
			//location.href="아직작성안함";
			//document.write("<p> hello </p>");

		}
		else {
			alert("피곤해");
		}
	
	}*/
	/*function rm_check(){
		chk_value=0;
	}

	function modify(){
		alert(chk_value);
		
	
	}

	function alarm(){
		var msg = "사용자 정보를 가져올까요?";
		var flag = confirm(msg);
		if(flag==true) alert("변경되었습니다.");
		else alert("취소하였습니다.");
	}
