<?php
if(!isset($_COOKIE['LoginUser']) 
  || $_COOKIE['LoginUser']==null
  || $_COOKIE['LoginUser']==""){
  header("Location: login.html");
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>木土子口 - 账单</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/table.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="nav">
          <div class="burger">
            <div class="burger__patty"></div>
          </div>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="#1" class="nav__link c-blue"><img src="img/home-icon.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="#2" class="nav__link c-yellow scrolly"><img src="img/about-icon.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="#3" class="nav__link c-red"><img src="img/projects-icon.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="#4" class="nav__link c-green"><img src="img/bill2.png" alt=""></a>
            </li>
          </ul>
        </nav>


        <section class="panel b-green" id="4">
          <article class="panel__wrapper">
            <div class="panel__content">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="contact-content">
                      <div class="heading">
                        <h5 style="color: #fff;text-align: right;">您好，<?php echo $_COOKIE['LoginUser']?>!  <a href="server/logout.php">登出</a></h5>
                        <h4>账单管理</h4>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="contat-form">
                            <form id="zdtj" action="" method="post" onsubmit="return false">
                              <fieldset>
                                <input name="price" type="text" class="form-control" id="price" placeholder="价格(单位：元)" required="">
                              </fieldset>
                              <fieldset>
                                <input name="num" type="text" class="form-control" id="num" placeholder="数量(不填默认为1)">
                              </fieldset>
                              <fieldset class="noteset">
<!--                               	<input class="note maicai" type="button" value="买菜"/>
                              	<input class="note riyong" type="button" value="日用"/> -->
                              	<select id="msg" name="msg">
                              		<option value="买菜">买菜</option>
                              		<option value="日用">日用</option>
                              		<option value="其它">其它</option>
                              	</select>
                              </fieldset>
                              <fieldset id="dscr" style="display: none;">
                                <textarea name="msg" rows="6" class="form-control" placeholder="描述" required=""></textarea>
                              </fieldset>
                              <fieldset>
                                <!-- <button type="submit" id="form-submit" class="btn">添加至清单</button> -->
                                <button id="form-submit" onclick="sub()" class="btn col-md-3 col-xs-12">添加至账单</button>
                              </fieldset>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      	<div class="col-md-12">
                      		<table id="example" style="color: #fff;" class="table table-border table-bordered table-bg table-sort table-responsive">
					            <thead>
					            <tr class="text-c">
					            	<th width="40">编号</th>
					                <th width="80">价格</th>
					                <th width="80">数量</th>
					                <th width="80">描述</th>
                          <th width="80">角色</th>
					                <th width="80">日期</th>
					                <th width="40">操作</th>

					            </tr>
					            </thead>
					            <tbody>

					            </tbody>
					        </table>
                      	</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="footer">
                      <p>Copyright &copy; 2018 Greg Lee 
                      | More Info <a href="http://www.greglee.xin/" target="_blank" title="GregLee">GregLee</a> - Collect from <a href="http://www.greglee.xin/" title="GregLee" target="_blank">GregLee</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </section>
      

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="layer/layer.js"></script>
		<script src="js/my.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
      $(function(){
        if(getCookie("LoginUser")==null){
          // window.location.href = "login.html";
        }
      });
			var table = $('#example').DataTable({
		        "aaSorting": [[4, "desc"]],//默认第几个排序
		        "bStateSave": true,//状态保存
		        "pading": false,
		        "aoColumnDefs": [
		//            {"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		//            {"orderable": true, "aTargets": [0, 1]}// 不参与排序的列
		        ],
		        ajax: {
		            url: 'server/bill-list.php',
		            dataSrc: 'data',
		            type: "get",
		        },
		        columns: [
		        	{'data': 'id'},
		            {'data': 'price'},
		            {'data': 'num'},
		            {'data': 'msg'},
                {'data': 'username'},
		            {'data': 'addTime'},
		            {'data': 'option'},
		        ],
		    });
			function sub(){
				// console.log($("#price").val());
				var price = $("#price").val();
				var num = $("#num").val();
				var msg = $("#msg").val();
        var dscr = $("#dscr textarea").val();
        // console.log(dscr);
        // console.log(p1);
				if(price == "" || msg == ""){
					return;
				}
        var p1=$("#msg").children('option:selected').val();
        if(p1 == "其它"){
          if(dscr == ""){
            return;
          }else{
            msg = dscr;
          }
        }
				$.ajax({
					type: "post",
					data: {"price":price,"num":num,"msg":msg},
					url: 'server/bill-add.php',
					success: function(result){
						// console.log(result);
						$("#price").val("");
						table.ajax.reload();
					},
					error: function(){
						console.log("error!");
					},
				});
			}
			function delBill(id){
				layer.confirm('您确定要删除此条记录嘛~(づ￣ 3￣)づ', {
				  	btn: ['确定','算了'] //按钮
				}, function(){
					$.ajax({
						type: "post",
						data: {"id":id},
						url: 'server/bill-delete.php',
						success: function(result){
							if(result == "true"){
								table.ajax.reload();
								layer.msg('已经帮您删除辣~o(*￣︶￣*)o', {icon: 1});
							}else{
								layer.msg('删除出现异常~(⊙o⊙)…', {icon: 2});
							}
						},
						error: function(){
							console.log("error!");
						},
					});
				}, function(){
				  layer.msg('操作取消~（￣□￣）', {icon: 2});
				});
			}
			function getCookie(name)
			{
				var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
				if(arr=document.cookie.match(reg))
					return unescape(arr[2]);
				else
					return null;
			}
      $("#msg").change(function(){
        var p1=$(this).children('option:selected').val();
        if(p1=="其它"){
          $("#dscr").css("display","block");
        }else{
          $("#dscr").css("display","none");
        }
      });
		</script>
    </body>
</html>
