(function(){
	var $ = {};
	// get请求方法封装
	$.get = function(url,callback,type=null){
		// 创建
		var xhr = new XMLHttpRequest();
		// 状态监听
		xhr.onreadystatechange = function(){
			// 接收数据完成时
			if (xhr.readyState == 4) {
				// 根据不同的type值返回不同的数据格式
				if (type == null) {callback(xhr.responseText);}
				if (type == 'xml') {callback(xhr.responseXML);}
				if (type == 'json') {
					//将后台返回的字符串转为数组或对象
					var data = JSON.parse(xhr.responseText);
					callback(data);
				}
			}
		}
		// 启动
		xhr.open('get',url);
		// 发送
		xhr.send();
	}
	// 将$赋值给window顶层对象
	window.$ = $;
})();