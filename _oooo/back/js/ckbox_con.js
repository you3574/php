/**�����ϴ� �ϰɸ���....****/
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
		//$('#deep_box').show();//������ư Ȱ��ȭ
	
    }
	
	/*function deep_data(){
		var flag = confirm("����� ������ �����ұ��?");
		if(flag==true){
			alert("����.");
			//location.href="�����ۼ�����";
			//document.write("<p> hello </p>");

		}
		else {
			alert("�ǰ���");
		}
	
	}*/
	/*function rm_check(){
		chk_value=0;
	}

	function modify(){
		alert(chk_value);
		
	
	}

	function alarm(){
		var msg = "����� ������ �����ñ��?";
		var flag = confirm(msg);
		if(flag==true) alert("����Ǿ����ϴ�.");
		else alert("����Ͽ����ϴ�.");
	}
